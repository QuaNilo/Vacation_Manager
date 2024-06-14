<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Get the currently authenticated user
        $user = Auth::user();
        // Check if the user has a company relationship
        if ($user && !$user->company()->first()) {
            // Redirect to the company creation route
            flash('You need to associate with a company')->overlay()->warning()->duration(4000);
            return redirect()->route('dashboard.apply-register-company');
        }
        return $next($request);
    }
}
