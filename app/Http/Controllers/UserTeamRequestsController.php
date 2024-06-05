<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserTeamRequestsRequest;
use App\Http\Requests\UpdateUserTeamRequestsRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\UserTeamRequests;
use Illuminate\Http\Request;

class UserTeamRequestsController extends Controller
{
    /**
     * Display a listing of the UserTeamRequests.
     */
    public function index(Request $request)
    {
        return view('user_team_requests.index');
    }

    /**
     * Show the form for creating a new UserTeamRequests.
     */
    public function create()
    {
        $userTeamRequests = new UserTeamRequests();
        $userTeamRequests->loadDefaultValues();
        return view('user_team_requests.create', compact('userTeamRequests'));
    }

    /**
     * Store a newly created UserTeamRequests in storage.
     */
    public function store(CreateUserTeamRequestsRequest $request)
    {
        $input = $request->all();

        /** @var UserTeamRequests $userTeamRequests */
        $userTeamRequests = UserTeamRequests::create($input);
        if($userTeamRequests){
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('user-team-requests.index'));
    }

    /**
     * Display the specified UserTeamRequests.
     */
    public function show(UserTeamRequests $userTeamRequests)
    {
        return view('user_team_requests.show')->with('userTeamRequests', $userTeamRequests);
    }

    /**
     * Show the form for editing the specified UserTeamRequests.
     */
    public function edit(UserTeamRequests $userTeamRequests)
    {
        return view('user_team_requests.edit')->with('userTeamRequests', $userTeamRequests);
    }

    /**
     * Update the specified UserTeamRequests in storage.
     */
    public function update(UserTeamRequests $userTeamRequests, UpdateUserTeamRequestsRequest $request)
    {
        $userTeamRequests->fill($request->all());
        if($userTeamRequests->save()){
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('user-team-requests.index'));
    }

    /**
     * Remove the specified UserTeamRequests from storage.
     *
     * @throws \Exception
     */
    public function destroy(UserTeamRequests $userTeamRequests)
    {
        if($userTeamRequests->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('user-team-requests.index'));
    }
}
