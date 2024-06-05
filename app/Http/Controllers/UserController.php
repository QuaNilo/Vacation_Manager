<?php

namespace App\Http\Controllers;

use App\Actions\MagicLinkManager\MagicLinkManager;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateMeRequest;
use App\Http\Requests\UpdateUserRequest;
//use App\Http\Controllers\AppBaseController;
use App\Mail\MagicLinkEmail;
use App\Models\Company;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the User.
     */
    public function index(Request $request)
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new User.
     */
    public function create()
    {
        $user = new User();
        $user->loadDefaultValues();
        if(auth()->user()->can(Permission::PERMISSION_MANAGE_APP)) {
            $roles = Role::pluck('name', 'id');
        }else{-
            $roles = Role::where('name', '!=', Role::ROLE_SUPER_ADMIN)->pluck('name', 'id');
        }
        return view('users.create', compact('user', 'roles'));
    }

    /**
     * Store a newly created User in storage.
     */
    public function store(CreateUserRequest $request)
    {

        $input = $request->except('permissions', 'password_confirmation');
        if(isset($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }
        $input['email_verified_at'] = Carbon::now();
        /** @var User $user */
        $user = User::create($input);
        $user->company()->associate(Company::where('id', auth()->user()->company()->first()->id)->first());
        $user->save();
        if($user){
            if(auth()->user()->can(Permission::PERMISSION_ADMIN_APP) && url()->previous() != route('profile.show')) {
                // Handle the user roles
                $this->syncPermissions($request, $user);
            }
            //assign default role if not have any
            if($user->roles()->count() == 0){
                $user->assignRole(Role::ROLE_USER);
            }
            $url_magicLink = MagicLinkManager::generateMagicLink($user);
            Mail::to($user->email)->send(new MagicLinkEmail($user, $url_magicLink));

            event(new Registered($user));
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     */
    public function show(User $user)
    {
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     */
    public function edit(User $user)
    {
        if(auth()->user()->can(Permission::PERMISSION_ADMIN_FULL_APP)) {
            $roles = Role::pluck('name', 'id');
            $permissions = Permission::all('name', 'id');
        }else{
            $roles = Role::where('name', '!=', Role::ROLE_SUPER_ADMIN)->pluck('name', 'id');
            $permissions = Permission::select('name', 'id')->where('name', '!=', Permission::PERMISSION_ADMIN_FULL_APP)->get();
        }

        return view('users.edit')
            ->with('user', $user)
            ->with('roles', $roles)
            ->with('permissions', $permissions);
    }

    /**
     * Update the specified User in storage.
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        if($request->has('password') && !empty($request->get('password'))){
            $userAttributes = $request->except('roles', 'permissions');
            $userAttributes['password'] = Hash::make($userAttributes['password']);
        }else{
            $userAttributes = $request->except('roles', 'permissions', 'password');
        }

        $user->fill($userAttributes);
        if($user->save()){
            if(auth()->user()->can(Permission::PERMISSION_ADMIN_APP) && url()->previous() != route('profile.show')) {
                // Handle the user roles
                $this->syncPermissions($request, $user);
            }
            //assign default role if not have any
            if($user->roles()->count() == 0){
                $user->assignRole(Role::ROLE_USER);
            }
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('users.index'));
    }

    /**
     * Update the specified User in storage.
     */
    public function updateMe(UpdateMeRequest $request)
    {
        /** @var User $user */
        $user = auth()->user();

        if (empty($user)) {
            flash(__('Not found'))->overlay()->danger();

            return redirect(route('users.index'));
        }

        $excludeKeys = ['roles', 'permissions', 'password'];
        $userAttributes = $request->except($excludeKeys);

        $user->fill($userAttributes);
        if($user->save()){
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('profile.show'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @throws \Exception
     */
    public function destroy(User $user)
    {
        if($user->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('users.index'));
    }

    /**
     * Sync the permission and roles on the $request with the user.
     * @param Request $request
     * @param $user
     * @return User
     */
    private function syncPermissions(Request $request, $user) : User
    {
        // Get the submitted roles
        $roles = $request->get('roles', []);
        $permissions = $request->get('permissions', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }
}
