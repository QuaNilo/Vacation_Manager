<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVacationRequest;
use App\Models\Vacation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

    public function UpdateSelectedVacation(Request $request)
    {
        Log::info('Incoming request:', $request->all());
        session(['editVacationID' => $request->id]); // Store the ID in the session
        return response()->json(['message' => 'Vacation updated successfully', 'data' => Vacation::find($request->id)]);

    }

}
