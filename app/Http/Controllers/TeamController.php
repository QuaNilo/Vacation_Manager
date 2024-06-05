<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the Team.
     */
    public function index(Request $request)
    {
        return view('teams.index');
    }

    /**
     * Show the form for creating a new Team.
     */
    public function create()
    {
        $team = new Team();
        $team->loadDefaultValues();
        return view('teams.create', compact('team'));
    }

    /**
     * Store a newly created Team in storage.
     */
    public function store(CreateTeamRequest $request)
    {
        $input = $request->all();

        /** @var Team $team */
        $team = Team::create($input);
        $team->company()->associate(auth()->user()->company()->first());
        $team->save();
        if($team){
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('teams.index'));
    }

    /**
     * Display the specified Team.
     */
    public function show(Team $team)
    {
        return view('teams.show')->with('team', $team);
    }

    /**
     * Show the form for editing the specified Team.
     */
    public function edit(Team $team)
    {
        return view('teams.edit')->with('team', $team);
    }

    /**
     * Update the specified Team in storage.
     */
    public function update(Team $team, UpdateTeamRequest $request)
    {
        $team->fill($request->all());
        if($team->save()){
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('teams.index'));
    }

    /**
     * Remove the specified Team from storage.
     *
     * @throws \Exception
     */
    public function destroy(Team $team)
    {
        if($team->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('teams.index'));
    }
}
