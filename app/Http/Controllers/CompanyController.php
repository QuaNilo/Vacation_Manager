<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the Company.
     */
    public function index(Request $request)
    {
        return view('companies.index');
    }
    public function join(Request $request)
    {
        return view('apply_register_company.join-company');
    }

public function requestJoin(Request $request)
{
    $company = Company::where('name', $request->company_name)->first();

    if ($company) {
        // Retrieve the authenticated user
        $user = auth()->user();

        if ($user) {
            $updateSuccessful = $user->update([
                'company_id' => $company->id,
                'company_join_request' => '2',
            ]);
            $user->assignRole(Role::ROLE_USER);

            if ($updateSuccessful) {
                flash('Request submitted')->overlay()->success()->duration(4000);
            } else {
                flash('Failed to update the user')->overlay()->warning()->duration(4000);
            }
        } else {
            flash('User not authenticated')->overlay()->warning()->duration(4000);
        }
    } else {
        flash('Company not found')->overlay()->warning()->duration(4000);
    }

    // Optional: Return a response or redirect
    return redirect()->back();
}

    public function deleteJoin(Request $request){
        $user = auth()->user();

        if ($user) {
            $updateSuccessful = $user->update([
                'company_id' => null,
                'company_join_request' => '3',
            ]);

            if ($updateSuccessful) {
                flash('Company request canceled successfully.')->overlay()->success()->duration(4000);
            } else {
                flash('Failed to cancel the company request.')->overlay()->warning()->duration(4000);
            }
        } else {
            flash('User not authenticated')->overlay()->warning()->duration(4000);
        }
        return redirect()->back();
    }

    public function companyDashboard(Request $request)
    {
        return view('companies.company-dashboard');
    }
    /**
     * Show the form for creating a new Company.
     */
    public function create()
    {
        $company = new Company();
        $company->loadDefaultValues();
        return view('companies.create', compact('company'));
    }

    /**
     * Store a newly created Company in storage.
     */
public function store(CreateCompanyRequest $request)
{
    try {
        $input = $request->all();
        $user = auth()->user();
        // Attempt to create the company
        $company = Company::create($input);

        // Associate the company with the authenticated user
        $user->company()->associate($company);
        $user->company_join_request = User::STATUS_JOIN_REQUEST_ACCEPTED;
        $user->removeRole(Role::ROLE_USER);
        $user->assignRole(Role::ROLE_MANAGER);
        $user->syncPermissions(Permission::PERMISSION_ADMIN_APP);
        $user->save();

        flash(__('Saved successfully.'))->overlay()->success();
    } catch (QueryException $exception) {
        // Check if the exception is due to a unique constraint violation
        if ($exception->errorInfo[1] === 1062) { // 1062 is the error code for duplicate entry
            flash(__('Error: Duplicate entry. Please provide unique values.'))->overlay()->error();
        } else {
            flash(__('An error occurred. Please try again later.'))->overlay()->error();
        }
    }

    return redirect(route('dashboard'));
}

    /**
     * Display the specified Company.
     */
    public function show(Company $company)
    {
        return view('companies.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified Company.
     */
    public function edit(Company $company)
    {
        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the specified Company in storage.
     */
    public function update(Company $company, UpdateCompanyRequest $request)
    {
        $company->fill($request->all());
        if($company->save()){
            flash(__('Updated successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('companies.index'));
    }

    /**
     * Remove the specified Company from storage.
     *
     * @throws \Exception
     */
    public function destroy(Company $company)
    {
        if($company->delete()){
            flash(__('Deleted successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('companies.index'));
    }
}
