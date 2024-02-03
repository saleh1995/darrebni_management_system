<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'darrebni_id' => $this->darrebni_id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'birth_date' => $this->birth_date,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'image' => $this->image,
            'salary' => $this->salary,
            'note' => $this->note,
            'certificate'=>[
                'id'=>$this->specializetion->id,
                'name'=>$this->specializetion->name,
            ],
            'branch'=>[
                'id'=>$this->brunch->id,
                'prefix'=>$this->brunch->prefix,
                'name'=>$this->brunch->name,
            ],



        ];
    }
}
