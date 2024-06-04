<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SiteController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index() : View
    {

        return view('site.index');
    }

}
