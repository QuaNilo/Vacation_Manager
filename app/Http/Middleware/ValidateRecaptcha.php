<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Middleware to validate recaptcha response we need to enable it for the routes that we want and apply only on that rules
 */
class ValidateRecaptcha
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (config('recaptchav3.enable') && $request->isMethod('post') ) {
            if ($request->is('login')){
                $request->validate([
                    'g-recaptcha-response' => ['required', 'recaptchav3:login,0.5'],
                ]);
            }elseif ($request->is('register')){
                $request->validate([
                    'g-recaptcha-response' => ['required', 'recaptchav3:register,0.5'],
                ]);
            }elseif($request->routeIs('password.email')){
                $request->validate([
                    'g-recaptcha-response' => ['required', 'recaptchav3:forgotPassword,0.5'],
                ]);
            }elseif ($request->routeIs('password.reset')){
                $request->validate([
                    'g-recaptcha-response' => ['required', 'recaptchav3:resetPassword,0.5'],
                ]);
            }
        }
        return $next($request);
    }
}
