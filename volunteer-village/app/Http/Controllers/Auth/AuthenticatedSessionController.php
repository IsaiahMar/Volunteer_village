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
    public function showLoginForm(): View
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
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        // Check if admin
        $admin = Admin::where('contact_info', $credentials['email'])->first();
        if ($admin && \Illuminate\Support\Facades\Hash::check($credentials['password'], $admin->password)) {
            Auth::login($admin, $remember);
            \Illuminate\Support\Facades\Session::put('is_admin', true);
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }

        // Regular user login
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
        
        // For debugging, let's try a hardcoded admin user
        if ($credentials['email'] === 'admin@volunteervillage.com' && $credentials['password'] === 'Quack123!') {
            // Create a new admin user if it doesn't exist
            $admin = Admin::firstOrCreate(
                ['contact_info' => 'admin@volunteervillage.com'],
                [
                    'admin_name' => 'Admin User',
                    'admin_pass' => Hash::make('Quack123!'),
                    'admin_type' => 'Admin'
                ]
            );
            
            Auth::login($admin, $remember);
            Session::put('is_admin', true);
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        
        return back()->withErrors([
            'email' => trans('auth.failed'),
        ])->onlyInput('email');
    }

    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}


