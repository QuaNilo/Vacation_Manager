<?php
/*
namespace App\Helpers;

use MagicLink\Actions\ActionAbstract;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use MagicLink\Actions\ResponseAction;

//class MagicLinkAction extends ActionAbstract
class MagicLinkAction extends ResponseAction
{
    protected $authIdentifier;

    protected $guard;

    /**
     * Constructor to action.
     *
     * @param  mixed  $httpResponse
     *//*
    public function __construct(Authenticatable $user, $httpResponse = null, ?string $guard = null)
    {
        $this->authIdentifier = $user->getAuthIdentifier();

        $this->response($httpResponse);

        $this->guard = $guard;
    }

    public function guard(string $guard): self
    {
        $this->guard = $guard;

        return $this;
    }

    /**
     * Execute Action.
     *//*
    public function run()
    {
        Auth::guard($this->guard)->loginUsingId($this->authIdentifier);
        request()->session()->regenerate();
        $user = auth()->user();
        //if the user is not verified, verify them
        if(!empty($user) && $user->email_verified_at == null){
            $user->email_verified_at = now();
            $user->save();
            $user->refresh();
        }

        return parent::run();
    }
}*/
