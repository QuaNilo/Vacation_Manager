<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use App\Models\Vacation;
use Carbon\Carbon;
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
        $user = auth()->user();
        $vacations_pending = Vacation::where('user_id', $user->id)
            ->where('approved', Vacation::STATUS_PENDING)
            ->orderBy('start', 'asc')->paginate(5);
        $vacations_history = Vacation::where('user_id', $user->id)
            ->orderBy('start', 'asc')->paginate(5);
        return view('site.calendar', compact(['user', 'vacations_pending', 'vacations_history']));
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

    public function frontOfficeGetVacations(Request $request)
    {
        $vacations = Vacation::where('approved', Vacation::STATUS_APPROVED)
            ->where('user_id', auth()->user()->id)
            ->get();
        return response()->json($vacations);
    }

    public function calendarSaveVacations(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        $durationInDays = abs($end->diffInDays($start));
        $user = User::find($request->user_id);
        if($durationInDays > $user->vacation_days){
            flash(__('Failed to create Vacation you only have ') . $user->vacation_days . 'days available.')->overlay()->danger();
            return redirect()->back();
        }
        $input = $request->all();
        $input['approved'] = Vacation::STATUS_PENDING;
        $vacation = Vacation::create($input);
        if($vacation){
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }
        return redirect(route('frontoffice.calendar'));
    }
}
