<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Exception;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // $companies = Company::orderBy('id','desc')->paginate(10);
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('companies.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreCompanyRequest $request)
    {
     DB::beginTransaction();
        try{
            $filename = null;
            if($request->hasFile('logo')){
                $file = $request->file('logo');
                $filename = $file->hashName();
                $file->storeAs('public/images/',$filename);
                // $this->storeImage($file);
            }
            Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $filename,
            ]);
            DB::commit();
        }
        catch(Exception $ex){
            DB::rollBack();
            return redirect()->route('companies.index')->with('faild','faild add.');
        }

        return redirect()->route('companies.index')->with('success','Company has been created successfully.');
    }
    public function storeImage($file)
    {
      $filename = $file->getClientOriginalName();
      $file->storeAs('public/images/',$filename);
    }
    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(Company $company)
    {
        return view('companies.show',compact('company'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $filename = null;
        if($request->hasFile('logo')){
            //remove old logo
            if($company->logo && Storage::exists('public/images/' . $company->logo)) {
               Storage::delete('public/images/' . $company->logo);
             }

            $file = $request->file('logo');
            $filename = $file->hashName();
            $file->storeAs('public/images/',$filename);
            // $this->storeImage($file);
        }
        $company->update([
        'name' => $request->name,
        'email' => $request->email,
        'website' => $request->website,
        'logo' => $filename,
        ]);



        return redirect()->route('companies.index')->with('success','Company Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(Company $company)
    {
        //remove logo from Storage
        if($company->logo && Storage::exists('public/images/' . $company->logo)) {
            Storage::delete('public/images/' . $company->logo);
          }

        $company->delete();
        return redirect()->route('companies.index')->with('success','Company has been deleted successfully');
    }


}
