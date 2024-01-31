<?php

namespace App\Http\Controllers;

use App\Http\Requests\CoachRequest;
use App\Http\Resources\CoachReaource;
use App\Http\Traits\ApiResponseTrait;

use App\Models\Coach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoachController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $item = Coach::with('trainingBatches')->all();
        $coach = CoachReaource::collection($item);
        return $this->apiResponse($coach, 'All Coaches');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(CoachRequest $request)
    {
        $item = Coach::create([
        'first_name'=> $request->first_name,
        'middle_name'=> $request->middle_name,
        'last_name'=> $request->last_name,
        'phone'=> $request->phone,
        'address'=> $request->address,
        'email'=> $request->email,
        'birth_date'=> $request->birth_date,
        'image'=> $request->image,
        'notes'=> $request->notes,
        'salary_sp'=>$request->salary_sp,
        'salary_us'=>$request->salary_us,
        'CoachID'=>$request->CoachID,
       'specializetion_id'=> $request->specializetion_id,
        ]);


        $coach = CoachReaource::make($item);
        return $this->apiResponse($coach, 'Created Coach');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = Coach::with('trainingBatches')->findOrFail($id);
        $coach = CoachReaource::make($item);
        return $this->apiResponse($coach, 'Specific Coach');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(CoachRequest $request, $id)
    {
        $item = Coach::findOrFail($id);
        if($request->has('image') && $request->image!=$item->image)
        {
            Storage::disk('public')->delete($item->image);
            $request->file('image')->store('images', 'public');
        }

        $item->update([
            'first_name'=> $request->first_name ? $request->first_name : $item->first_name,
            'middle_name'=> $request->middle_name ? $request->middle_name : $item->middle_name,
            'last_name'=> $request->last_name ? $request->last_name : $item->last_name,
            'phone'=> $request->phone? $request->phone : $item->phone,
            'address'=> $request->address? $request->address : $item->address,
            'email'=> $request->email? $request->email : $item->email,
            'birth_date'=> $request->birth_date? $request->birth_date : $item->birth_date,
            'image'=> $request->image? $request->image : $item->image,
            'notes'=> $request->notes? $request->notes : $item->notes,
            'salary_sp'=>$request->salary_sp? $request->salary_sp : $item->salary_sp,
            'salary_us'=>$request->salary_us? $request->salary_us : $item->salary_us,
            'CoachID'=>$request->CoachID? $request->CoachID : $item->CoachID,
           'specializetion_id'=> $request->specializetion_id? $request->specializetion_id : $item->specializetion_id,
            ]);

            $coach = CoachReaource::make($item);
            return $this->apiResponse($coach, 'Updated Coach');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $item = Coach::findOrFail($id);
        $item->delete();
        return $this->apiResponse(null, 'Deleted Coach');
    }
}
