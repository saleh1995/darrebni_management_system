<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AmountResource extends JsonResource
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
            'amount' => $this->amount,
            'trainee' => TraineeResource::make($this->whenLoaded('trainee')),
            'training_batche' => TraineeResource::make($this->whenLoaded('trainingBatch')),
        ];
    }
}
