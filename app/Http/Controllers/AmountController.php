<?php

namespace App\Http\Controllers;

use App\Http\Requests\AmountRequest;
use App\Http\Resources\AmountResource;
use App\Models\Amount;

class AmountController extends Controller
{
    public function index(){
        $item=Amount::with(['trainingBatch','trainee'])->get();
        $amount=AmountResource::collection($item);
    return $this->ApiResponse($amount,'All amounts');
    }

    public function show($id){
        $item=Amount::with(['trainingBatch','trainee'])->findorfail($id);
        $amount=AmountResource::make($item);
        return $this->ApiResponse($amount,'specific amout');
    }

    public function store(AmountRequest $request){
        $item=Amount::create([
            'trainee_id'=>$request->trainee_id,
            'training_batche_id'=>$request->training_batche_id,
            'amount'=>$request->amount,
        ]);
        $amout=AmountResource::make($item);
        return $this->ApiResponse($amout,'created successfully');
    }

    public function update(AmountRequest $request,$id){
        $item=Amount::findorfail($id);
        $item->update([
            'trainee_id'=>$request->trainee_id,
            'training_batche_id'=>$request->training_batche_id,
            'amount'=>$request->amount,
        ]);
        $amout=AmountResource::make($item);
        return $this->ApiResponse($amout,'updated successfully');
    }

    public function delete($id){
        $item=Amount::findorfail($id);
        $item->delete();
        return $this->ApiResponse(null,'deleted successfully');
    }
}
