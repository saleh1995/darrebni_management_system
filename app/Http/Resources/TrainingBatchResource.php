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
            'days' => json_decode($this->days),// ???
            'course' => CourseResource::make($this->whenLoaded('course')),
            'brunch' => BrunchResource::make($this->whenLoaded('brunch')),
            'coach' => CoachReaource::make($this->whenLoaded('coach')),
            'amounts' => AmountResource::collection($this->whenLoaded('amounts')),
        ];
    }
}
