<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingBatchResource extends JsonResource
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
            'TrainingBatchID' => $this->TrainingBatchID,
            'price' => $this->price,
            'currency' => $this->currency,
            'brunch' => $this->brunch,
            // 'coach' => CoachReaource::collection($this->whenLoaded('coach')),
            'course' => $this->course,
            'days' =>json_decode($this->course),

        ];
    }
}
