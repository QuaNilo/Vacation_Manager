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
        $input = $request->all();

        /** @var Company $company */
        $company = Company::create($input);
        if($company){
            flash(__('Saved successfully.'))->overlay()->success();
        }else{
            flash(__('Ups something went wrong'))->overlay()->danger();
        }

        return redirect(route('companies.index'));
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
