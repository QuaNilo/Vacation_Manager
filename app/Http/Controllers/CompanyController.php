<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
//use App\Http\Controllers\AppBaseController;
use App\Models\Company;
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

        // Attempt to create the company
        $company = Company::create($input);

        // Associate the company with the authenticated user
        auth()->user()->company()->associate($company);
        auth()->user()->save();

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
