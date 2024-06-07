<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVacationRequest;
use App\Models\Vacation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{

    public function index(Request $request)
    {
        return view('calendar.index');
    }
    public function getVacations(Request $request)
    {
        $vacations = Vacation::where('approved', Vacation::STATUS_APPROVED)->get();

        return response()->json($vacations);
    }

    public function create(CreateVacationRequest $request)
    {
        $input = $request->except('_token');
        $vacation = Vacation::create($input);
        if($vacation){
            flash(__('Vacation created successfully.'))->overlay()->success();
            return redirect(route('calendar.index'));
        }
        else{
            flash(__('Ups something went wrong'))->overlay()->danger();
            return redirect(route('calendar.index'));
        }


    }

}
