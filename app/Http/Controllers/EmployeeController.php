<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Resources\EmployeeResource;

// class EmployeeController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      */
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      */
//     public function show(string $id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      */
//     public function edit(string $id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy(string $id)
//     {
//         //
//     }
// }

class EmployeeController extends Controller
{
    use ApiResponseTrait;


    public function index()
    {
        $employees=Employee::all();
        return $this->apiResponse(EmployeeResource::collection($employees)->resource, 'All employees',200);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'prefix' => 'required|string|max:25',
        //     'name' => 'required|string|max:255',

        // ]);

        $employee = Employee::create([
            'prefix' => $request->prefix,
            'name' => $request->name,
            'id'=>$request->id,
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
            'speciality' => $request->speciality,
            'brunch_id' => $request->brunch_id,
            'note' => $request->note,
        ]);


        return $this->apiResponse(EmployeeResource::make($employee)->resource, 'employee added successfully!', 200);

    }
    public function show(string $id)
    {
        $employee=Employee::find($id);
        return $this->apiResponse(EmployeeResource::make($employee)->resource, 'employee has been selected successfully!', 200);


    }
    // public function update(Request $request, string $id)
    // {
    //     $brunch=Employee::FindOrFail($id);
    // //     $brunch->prefix = $request->input('prefix');
    // // $brunch->name = $request->input('name');
    // $brunch->save();
    // return $this->apiResponse(EmployeeResource::make($brunch)->resource, 'Employee Updated successfully!', 200);

    // }

    public function delete(string $id)
    {
        $brunch=Employee::find($id);
        $brunch->delete();
        return $this->apiResponse(EmployeeResource::make($brunch)->resource, 'Employee Deleted successfully!', 200);

    }
}
