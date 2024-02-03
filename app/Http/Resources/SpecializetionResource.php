<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SpecializetionResource extends JsonResource
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
            'name' => $this->name,
            'coaches' => CoachReaource::collection($this->whenLoaded('coaches')),
            'employees' => EmployeeResource::collection($this->whenLoaded('employees')),
            'trainees' => TraineeResource::collection($this->whenLoaded('trainees')),
        ];
    }
}
