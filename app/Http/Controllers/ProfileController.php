<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){

    }

    public function passwordShow(Request $request){
                return view('site.profile.password-show');
    }
}
