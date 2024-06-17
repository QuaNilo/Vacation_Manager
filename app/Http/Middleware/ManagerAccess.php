<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ManagerAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user has either ROLE_SUPER_ADMIN or ROLE_ADMIN
            if (Auth::user()->hasRole([Role::ROLE_SUPER_ADMIN, Role::ROLE_ADMIN, Role::ROLE_MANAGER])) {
                return $next($request);
            }
        }

        // Redirect or return response for unauthorized access
        return redirect()->route('frontoffice.home');
    }
}
