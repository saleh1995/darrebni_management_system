<?php

namespace App\Http\Controllers;

use App\Http\Traits\ApiResponseTrait;
use App\Models\Brunch;
use Illuminate\Http\Request;
use App\Http\Resources\BrunchResource;

class BrunchController extends Controller
{
    use ApiResponseTrait;


    public function index()
    {
        $brunches=Brunch::all();

        return $this->apiResponse(BrunchResource::collection($brunches)->resource, 'All Brunches',200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'prefix' => 'required|string|max:25',
            'name' => 'required|string|max:255',

        ]);

        $brunch = Brunch::create([
            'prefix' => $request->prefix,
            'name' => $request->name,
        ]);


        return $this->apiResponse(Brunch::make($brunch), 'Brunch added successfully!', 200);

    }
    public function show(string $id)
    {
        $brunch=Brunch::find($id);
        return $this->apiResponse(Brunch::make($brunch), 'Brunch has been selected successfully!', 200);


    }
    public function update(Request $request, string $id)
    {
        $brunch=Brunch::FindOrFail($id);
        $brunch->prefix = $request->input('prefix');
    $brunch->name = $request->input('name');
    $brunch->save();
    return $this->apiResponse(Brunch::make($brunch), 'Brunch Updated successfully!', 200);

    }

    public function delete(string $id)
    {
        $brunch=Brunch::find($id);
        $brunch->delete();
        return $this->apiResponse(Brunch::make($brunch), 'Brunch Deleted successfully!', 200);

    }
}
