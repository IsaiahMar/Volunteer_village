<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_from_admin_pages(): void
    {
        $this->get('/admin/users')->assertRedirect('/login');
    }

    public function test_non_admins_cannot_access_admin_pages(): void
    {
        $user = User::factory()->create(['role' => 'student']);

        $this->actingAs($user)->get('/admin/users')->assertRedirect(route('admin.login'));
    }

    public function test_admins_can_access_admin_pages(): void
    {
        $admin = User::factory()->create(['role' => 'admin']);

        $this->actingAs($admin)->get('/admin/users')->assertOk();
    }

    public function test_non_admins_cannot_delete_schools(): void
    {
        $user = User::factory()->create(['role' => 'student']);
        $school = School::create([
            'name' => 'Test School',
            'address' => '1 Main St',
            'city' => 'Springfield',
            'state' => 'IL',
            'zip_code' => '62701',
            'phone' => '555-0100',
            'email' => 'school@example.com',
            'principal_name' => 'Pat Doe',
        ]);

        $this->actingAs($user)->delete("/schools/{$school->id}")->assertRedirect(route('admin.login'));
        $this->assertModelExists($school);
    }
}
