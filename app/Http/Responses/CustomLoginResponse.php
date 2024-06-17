<?php

namespace App\Http\Responses;

use App\Models\Role;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($user->hasRole([Role::ROLE_SUPER_ADMIN, Role::ROLE_ADMIN, Role::ROLE_MANAGER])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('frontoffice.home');
        }
    }
}
