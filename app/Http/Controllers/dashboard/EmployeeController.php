<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreEmployeeRequest;
use App\Http\Requests\Dashboard\UpdateEmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->paginate(3);
        return view('dashboard.pages.employee', ['employees' => $employees]);
    }

    public function store(StoreEmployeeRequest $request)
    {
        Employee::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'designation' => $request->input('designation'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'salary' => $request->input('salary')
        ]);
        return redirect('/employees')->with('addemployee', 'New Employee is Created Successfully!!!');

    }
    public function update(UpdateEmployeeRequest $request, $id)
    {

        Employee::where('id', $id)->update([
            'name' => $request->input('name1'),
            'email' => $request->input('email1'),
            'designation' => $request->input('designation1'),
            'address' => $request->input('address1'),
            'phone' => $request->input('phone1'),
            'salary' => $request->input('salary1')
        ]);
        return redirect('/employees')->with('updateemployee', 'Employee Record is Updated Successfully!!!');

    }
    public function delete(Request $request, $id)
    {
        Employee::where('id', $id)->delete();
        return redirect('/employees')->with('deleteemployee', 'Employee Record is Deleted Successfully!!!');
    }

}
