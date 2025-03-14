<?php
namespace App\Actions\MagicLinkManager;
use App\Models\User;
use MagicLink\Actions\LoginAction;
use MagicLink\MagicLink;
class MagicLinkManager
{
    public static function generateMagicLink($user)
    {
        $action = new LoginAction($user);
        $action->response(redirect(route('companies.join')));

        $url = MagicLink::create($action)->url;
        return $url;
    }

}
