<?php

namespace App\Http\Controllers;

use App\Models\Trainee;
use App\Http\Resources\TraineeResource;
use App\Http\Requests\StoreTraineeRequest;
use App\Http\Requests\UpdateTraineeRequest;
use App\Http\Traits\ApiResponseTrait;

class TraineeController extends Controller
{
    use ApiResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Trainee::with(['amounts','specializetion'])->get();
        return $this->ApiResponse(TraineeResource::collection($data), 'All Trainee');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTraineeRequest $request)
    {
        $data = trainee::create([
            'first_name_ar' => $request->first_name_ar,
            'middle_name_ar' => $request->middle_name_ar,
            'last_name_ar' => $request->last_name_ar,
            'first_name_en' => $request->first_name_en,
            'middle_name_en' => $request->middle_name_en,
            'last_name_en' => $request->last_name_en,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'date' => $request->date,
        ]);
        return $this->ApiResponse(TraineeResource::make($data), 'Trainee Stored Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trainee $trainee)
    {
        $data = trainee::with(['amounts','specializetion'])->findOrFail($trainee->id);
        return $this->ApiResponse(TraineeResource::make($data), 'Trainee Showed Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTraineeRequest $request, trainee $trainee)
    {
        $trainee->update([
            'first_name_ar' => $request->first_name_ar,
            'middle_name_ar' => $request->middle_name_ar,
            'last_name_ar' => $request->last_name_ar,
            'first_name_en' => $request->first_name_en,
            'middle_name_en' => $request->middle_name_en,
            'last_name_en' => $request->last_name_en,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'date' => $request->date,
        ]);
        return $this->ApiResponse(TraineeResource::make($trainee), 'Trainee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trainee $trainee)
    {
        $trainee->delete();
        return $this->ApiResponse(null, 'Trainee deleted successfully');
    }

    // public function update(UpdateTraineeRequest $request, trainee $trainee)
    // {
    //     $trainee->update([
    //         'first_name_ar' => $request->first_name_ar,
    //         'middle_name_ar' => $request->middle_name_ar,
    //         'last_name_ar' => $request->last_name_ar,
    //         'first_name_en' => $request->first_name_en,
    //         'middle_name_en' => $request->middle_name_en,
    //         'last_name_en' => $request->last_name_en,
    //         'email' => $request->email,
    //         'phone_number' => $request->phone_number,
    //         'date' => $request->date,
    //     ]);
    //     return $this->ApiResponse(TraineeResource::make($trainee), 'Trainee updated successfully');
    // }




}
