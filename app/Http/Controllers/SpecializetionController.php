<?php

namespace App\Http\Controllers;

use App\Http\Requests\SpecializetionRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Resources\SpecializetionResource;
use App\Models\Specializetion;
use Illuminate\Http\Request;

class SpecializetionController extends Controller
{
    use ApiResponseTrait;

    public function index(){
        $item=Specializetion::all();
        $special=SpecializetionResource::collection($item);
        return $this->apiResponse($special,'All Specializetion');

    }

    public function show($id){
        $item=Specializetion::findorfail($id);
        $special=SpecializetionResource::make($item);
        return $this->apiResponse($special,'specific Specializetion');
    }


    public function store(SpecializetionRequest $request){

        $item=Specializetion::create([
            'name'=>$request->name,
        ]);

       $special=SpecializetionResource::make($item);
       return $this->apiResponse($special,'Specializetion created successfully');
    }

    public function update(SpecializetionRequest $request,$id){

        $item=Specializetion::findorfail($id);
        $item->update([
            'name'=>$request->name,
        ]);

       $special=SpecializetionResource::make($item);
       return $this->apiResponse($special,'Specializetion updated successfully');

    }

    public function delete($id){

        $item=Specializetion::findorfail($id);
        $item->delete();
       return $this->apiResponse(null,'Specializetion deleted successfully');

    }

}
