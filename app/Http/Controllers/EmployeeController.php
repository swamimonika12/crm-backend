<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('company')->paginate(10);
    
        return view('employee.index', compact('employees'));
    }

    public function create(Request $request)
    {
       $companies = \App\Models\Company::all();
        return view('employee.create', compact('companies'));
    }

    public function store(EmployeeRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('profile_img')) {
            $path = $request->file('profile_img')->store('employees', 'public');
            $data['profile_img'] = $path;
        }
        Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }

    public function edit(Employee $employee)
    {
        $companies = \App\Models\Company::all();
        return view('employee.edit', compact('employee', 'companies'));
    }

    public function update(EmployeeRequest $request,string $id)
    {
        $employee = Employee::findOrFail($id);
        $data = $request->validated();
        if ($request->hasFile('profile_img')) {
            
            if ($employee->profile_img) {
                Storage::disk('public')->delete($employee->profile_img);
            }

            $path = $request->file('profile_img')->store('employees', 'public');
            $data['profile_img'] = $path;
        }

        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    public function destroy(Employee $employee)
    {
        if ($employee->profile_img) {
            Storage::disk('public')->delete($employee->profile_img);
        }
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }

    public function show(Employee $employee)
    {
        return view('employee.show', compact('employee'));
    }
}
