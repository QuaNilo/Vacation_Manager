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
            ->orderBy('start', 'asc')->paginate(5, ['*'], 'pending_page');
        $vacations_history = Vacation::where('user_id', $user->id)
            ->orderBy('start', 'asc')->paginate(5, ['*'], 'history_page');
        return view('site.calendar', compact(['user', 'vacations_pending', 'vacations_history']));
    }

    public function dashboard() : View
    {
        $team = auth()->user()->team()->first();
        $user = auth()->user();
        $vacations = Vacation::where('user_id', $user->id)->orderBy('start', 'asc')->paginate(5);
        $vacation_days_taken_total = Vacation::where('user_id', $user->id)
            ->where('approved', Vacation::STATUS_APPROVED)
            ->sum('vacation_days');
        $data = $this->getUsersVacationWeek($user);
        $vacation_next_month_team = $data['month'];
        $vacation_next_week_team = $data['week'];
        if($team){
            $team_users = $team->users()->paginate(5, ['*'], 'team_users_page');
            $team_user_count = Team::find($team->id)->users()->count();

        }
        return view('site.dashboard', compact(['team', 'user', 'team_user_count', 'vacations', 'team_users', 'vacation_days_taken_total', 'vacation_next_week_team', 'vacation_next_month_team']));
    }


    private function getUsersVacationWeek($user){
        $nextWeekStart = Carbon::now()->addWeek()->startOfWeek();
        $nextWeekEnd = Carbon::now()->addWeek()->endOfWeek();
        $nextMonthStart = Carbon::now()->addMonth()->startOfMonth();
        $nextMonthEnd = Carbon::now()->addMonth()->endOfMonth();
        $team_id = $user->team_id;
        $vacation_next_week_team = Vacation::whereHas('user', function ($query) use ($team_id) {
        $query->where('team_id', $team_id);
        })->whereBetween('start', [$nextWeekStart, $nextWeekEnd])
          ->orWhereBetween('end', [$nextWeekStart, $nextWeekEnd])
          ->count();

        $vacation_next_month_team = Vacation::whereHas('user', function ($query) use ($team_id) {
        $query->where('team_id', $team_id);
        })->whereBetween('start', [$nextMonthStart, $nextMonthEnd])
          ->orWhereBetween('end', [$nextMonthStart, $nextMonthEnd])
          ->count();

        return ['week' => $vacation_next_week_team, 'month' => $vacation_next_month_team];
    }
    public function frontOfficeGetVacations(Request $request)
    {
        $vacations = Vacation::where('approved', Vacation::STATUS_APPROVED)
            ->where('user_id', auth()->user()->id)
            ->get();
        return response()->json($vacations);
    }

    public function frontOfficeGetTeamVacations(Request $request)
    {
        $team_id = auth()->user()->team_id;
        $team_vacations = Vacation::whereHas('user', function ($query) use ($team_id) {
            $query->where('team_id', $team_id);
        })
            ->where('approved', Vacation::STATUS_APPROVED)
            ->get();
        return response()->json($team_vacations);
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
