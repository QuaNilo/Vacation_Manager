<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVacationRequest;
use App\Http\Requests\UpdateVacationRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\Vacation;
use Illuminate\Http\Request;

class VacationController extends Controller
{
    /**
     * Display a listing of the Vacation.
     */
    public function index(Request $request)
    {
        return view('vacations.index');
    }

    /**
     * Show the form for creating a new Vacation.
     */
    public function create()
    {
        $vacation = new Vacation();
        $vacation->loadDefaultValues();
        return view('vacations.create', compact('vacation'));
    }

    /**
     * Store a newly created Vacation in storage.
     */
    public function store(CreateVacationRequest $request)
    {
        $input = $request->all();

        /** @var Vacation $vacation */
        $vacation = Vacation::create($input);
        if($vacation){
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('vacations.index'));
    }

    /**
     * Display the specified Vacation.
     */
    public function show(Vacation $vacation)
    {
        return view('vacations.show')->with('vacation', $vacation);
    }

    /**
     * Show the form for editing the specified Vacation.
     */
    public function edit(Vacation $vacation)
    {
        return view('vacations.edit')->with('vacation', $vacation);
    }

    /**
     * Update the specified Vacation in storage.
     */
    public function update(Vacation $vacation, UpdateVacationRequest $request)
    {
        $vacation->fill($request->all());
        if($vacation->save()){
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('vacations.index'));
    }

    /**
     * Remove the specified Vacation from storage.
     *
     * @throws \Exception
     */
    public function destroy(Vacation $vacation)
    {
        if($vacation->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('vacations.index'));
    }
}
