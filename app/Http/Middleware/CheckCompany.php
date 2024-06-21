<?php

namespace App\Http\Middleware;

use App\Models\User;
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
//        dd(Auth::user()->getRoleNames());
        $user = Auth::user();
        if ($user) {
            if($user->company_join_request !== User::STATUS_JOIN_REQUEST_ACCEPTED || !$user->company()->first() ){
                flash('You need to associate with a company')->overlay()->warning()->duration(4000);
                return redirect()->route('dashboard.apply-register-company');

            }
        }
        return $next($request);
    }
}
