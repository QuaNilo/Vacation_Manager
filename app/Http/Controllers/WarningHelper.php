<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WarningHelper extends Controller
{
    public function display_warning_back($message, $route)
    {
        flash($message)->overlay()->warning()->duration(4000);
        return redirect()->route($route);
    }

        public function display_warning($message)
    {
        flash($message)->overlay()->warning()->duration(4000);
        return Redirect::back();
    }
}
