<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the regular login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Display the admin login view.
     */
    public function showAdminLogin(): View
    {
        return view('admin.admin-login');
    }

    /**
     * Handle an incoming authentication request for regular users.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'email' => trans('auth.failed'),
        ])->onlyInput('email');
    }

    /**
     * Handle an incoming authentication request for admins.
     */
    public function adminLogin(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        $admin = Admin::where('admin_name', $credentials['email'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->getAuthPassword())) {
            Auth::login($admin, $remember);
            Session::put('is_admin', true);
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        return back()->withErrors([
            'email' => trans('auth.failed'),
        ])->onlyInput('email');
        $request->session()->regenerate();

        // Get the authenticated user
        $user = Auth::user();

        // Redirect based on user role
        switch ($user->role) {
            case 'student':
                return redirect()->route('student.home');
            case 'teacher':
                return redirect()->route('teacher.home');
            case 'organization':
                return redirect()->route('organization.home');
            case 'admin':
                return redirect()->route('admin.dashboard');
            default:
                return redirect()->route('dashboard');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}


