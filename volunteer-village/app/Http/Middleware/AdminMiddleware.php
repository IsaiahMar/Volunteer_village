<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Admins live in the users table with role = 'admin' (see migrate_admin_to_users)
        if (!$request->user() || !$request->user()->isAdmin()) {
            return redirect()->route('admin.login')->with('error', 'Unauthorized access. Please login as admin.');
        }

        return $next($request);
    }
}
