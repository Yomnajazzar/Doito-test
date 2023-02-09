<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        // $employees = Employee::orderBy('id','desc')->paginate(5);
        $employees = Employee::all();
        return view('employees.index', compact('employees'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $companies = Company::all();
        return view('employees.create',compact('companies'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->post());
        return redirect()->route('employees.index')->with('success','Employee has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Employee  $Employee
    * @return \Illuminate\Http\Response
    */
    public function show(Employee $Employee)
    {
        return view('employees.show',compact('Employee'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Employee  $Employee
    * @return \Illuminate\Http\Response
    */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employees.edit',compact('employee','companies'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Employee  $Employee
    * @return \Illuminate\Http\Response
    */
    public function update(UpdateEmployeeRequest $request, Employee $Employee)
    {

        $Employee->fill($request->post())->save();
        return redirect()->route('employees.index')->with('success','Employee Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Employee  $Employee
    * @return \Illuminate\Http\Response
    */
    public function destroy(Employee $Employee)
    {
        $Employee->delete();
        return redirect()->route('employees.index')->with('success','Employee has been deleted successfully');
    }



}
