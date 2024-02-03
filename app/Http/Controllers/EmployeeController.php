<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\EmployeeResource;



class EmployeeController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $employees = Employee::with(['brunch', 'specializetion'])->get();
        return $this->apiResponse(EmployeeResource::collection($employees)->resource, 'All employees', 200);
    }

    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create([
            'darrebni_id' => $request->darrebni_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $request->image,
            'salary' => $request->salary,
            'brunch_id' => $request->brunch_id,
            'specializetion_id' => $request->brunch_id,
            'note' => $request->note,
        ]);

        return $this->apiResponse(EmployeeResource::make($employee)->resource, 'employee added successfully!', 200);
    }
    public function show(string $id)
    {
        $employee = Employee::with(['brunch', 'specializetion'])->findOrFail($id);
        return $this->apiResponse(EmployeeResource::make($employee)->resource, 'employee has been selected successfully!', 200);
    }

    public function delete(string $id)
    {
        $brunch = Employee::find($id);
        $brunch->delete();
        return $this->apiResponse(EmployeeResource::make($brunch)->resource, 'Employee Deleted successfully!', 200);
    }

    public function update(EmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update([
            'darrebni_id' => $request->darrebni_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'birth_date' => $request->birth_date,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $request->image ?? $employee->image,
            'salary' => $request->salary,
            'specializetion_id' => $request->specializetion_id,
            'brunch_id' => $request->brunch_id,
            'note' => $request->note,
        ]);

        $coach = EmployeeResource::make($employee);
        return $this->apiResponse($coach, 'Updated employee');
    }


    public function employeesCount()
    {
        $brunch=Employee::all()->count();
        return $this->apiResponse($brunch, 'All Employees!', 200);

    }
}
