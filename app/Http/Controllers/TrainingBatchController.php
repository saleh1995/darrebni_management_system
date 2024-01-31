<?php

namespace App\Http\Controllers;

use App\Models\TrainingBatch;
use App\Http\Resources\TrainingBatchResource;
use App\Http\Requests\StoreTrainingBatchRequest;
use App\Http\Requests\UpdateTrainingBatchRequest;

class TrainingBatchController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TrainingBatch::all();
        return $this->ApiResponse(TrainingBatchResource::collection($data), 'All Training Batches');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingBatchRequest $request)
    {
        $data = TrainingBatch::create([
            'name' => $request->name,
            'TrainingBatchID' => $request->TrainingBatchID,
            'price' => $request->price,
            'currency' => $request->currency,
            'days' => json_encode($request->days, true),
            'coach_id' => $request->coach_id,
            'course_id' => $request->course_id,
            'brunch_id' => $request->brunch_id,
        ]);
        return $this->ApiResponse(TrainingBatchResource::make($data), 'Training Batch Stored Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainingBatch $TrainingBatch)
    {
        // $data = TrainingBatch::findOrFail($trainingBatch->id);
        return $this->ApiResponse(TrainingBatchResource::make($TrainingBatch), 'training batch Showed Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingBatchRequest $request, TrainingBatch $TrainingBatch)
    {
        $TrainingBatch->update([
            'name' => $request->name,
            'TrainingBatchID' => $request->TrainingBatchID,
            'price' => $request->price,
            'currency' => $request->currency,
            'days' => json_encode($request->days, true),
            'coach_id' => $request->coach_id,
            'course_id' => $request->course_id,
            'brunch_id' => $request->brunch_id,
        ]);
        return $this->ApiResponse(TrainingBatchResource::make($TrainingBatch), 'training Batch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainingBatch $TrainingBatch)
    {
        $TrainingBatch->delete();
        return $this->ApiResponse(null, 'training Batch deleted successfully');
    }
}
