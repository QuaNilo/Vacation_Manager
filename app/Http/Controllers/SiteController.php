<?php

namespace App\Http\Controllers;

use App\Models\Team;
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
        $team = auth()->user()->team()->first();
        $user = auth()->user();
        $vacations = Vacation::where('user_id', $user->id)->orderBy('start', 'asc')->paginate(5);
        if($team){
            $team_users = $team->users()->paginate(5);
            $team_user_count = Team::find($team->id)->users()->count();

        }
        return view('site.dashboard', compact(['team', 'user', 'team_user_count', 'vacations', 'team_users']));
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
