<?php

namespace App\Http\Middleware;

use App\Models\User;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckNotCompany
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
        if ($user) {
            $company = $user->company()->first();
            if($company && $user->company_join_request == User::STATUS_JOIN_REQUEST_ACCEPTED){
                // Redirect to the company creation route
                    flash('You already associated with a company')->overlay()->warning()->duration(4000);
                return redirect()->route('dashboard');
            }
        }
        return $next($request);
    }
}
