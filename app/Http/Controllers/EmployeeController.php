<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all('id', 'name');

        return view('employees.create', ['companies' => $companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmployeeRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:employees|max:255',
            'phone' => 'required|numeric|starts_with:370|digits:11',
            'company_id' => 'required'
        ]);

        // Store and save new employee
        $employee = new Employee([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_id' => $request->company_id
        ]);
        $employee->save();

        return redirect()->route('employees.index')->with('success_message', __('index.employee.created'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $employees = Employee::with('company_id');
        return view('employees.edit', ['employee' => $employee, 'companies' => $employees]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Employee $employee)
    {
        // Validation
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric|starts_with:370|digits:11',
            'company_id' => 'required'
        ]);

        // Update employee info with new data
        $employee->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_id' => $request->company_id
        ]);
        $employee->save();

        return redirect()->route('employees.index')->with('success_message', __('index.employee.updated'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success_message', __('index.employee.deleted'));
    }
}
