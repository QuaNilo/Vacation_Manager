<?php

namespace App\Http\Controllers;

use App\Models\Vacation;
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
    public function calendar() : View
    {

        return view('site.calendar');
    }

    public function dashboard() : View
    {
        return view('site.dashboard');
    }

    public function profile()
    {
        return view('site.profile');
    }

    public function frontOfficeGetVacations(Request $request)
    {
        $vacations = Vacation::where('approved', Vacation::STATUS_APPROVED)
            ->where('user_id', auth()->user()->id)
            ->get();
        return response()->json($vacations);
    }
}
