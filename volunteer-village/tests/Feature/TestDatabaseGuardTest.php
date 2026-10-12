<?php

namespace Tests\Feature;

use Tests\TestCase;

class TestDatabaseGuardTest extends TestCase
{
    // RefreshDatabase wipes whatever database the tests point at, so make sure
    // that is never the local MySQL database from .env.
    public function test_tests_use_in_memory_sqlite(): void
    {
        $this->assertSame('sqlite', config('database.default'));
        $this->assertSame(':memory:', config('database.connections.sqlite.database'));
    }
}
