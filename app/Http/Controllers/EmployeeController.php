<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index($id = null)
    {
        if($id == null)
        {
            return Employee::get();
        }else
        {
            return Employee::find($id);
        }
    }

    public function create(EmployeeRequest $request)
    {
        try {
            $employee = new Employee();
            $employee->name = $request->input('name');
            $employee->email = $request->input('email');
            $employee->phone = $request->input('phone');
            $employee->save();
            return $employee;
        }catch (\Exception $err)
        {
            return $err->getMessage();
        }
    }
    public function update($id,Request $request)
    {
        try {
            $employee = Employee::find($id);
            if($employee)
            {
                $employee->name = $request->input('name');
                $employee->email = $request->input('email');
                $employee->phone = $request->input('phone');
                $employee->save();
                return $employee;
            }else
            {
                return 'data not found';
            }

        }catch (\Exception $err)
        {
            return $err->getMessage();
        }
    }
    public function delete($id)
    {
        try {
            $employee = Employee::find($id);
            if($employee)
            {
                $employee->delete();
            }else
            {
                return 'data not found';
            }

        }catch (\Exception $err)
        {
            return $err->getMessage();
        }
    }
}
