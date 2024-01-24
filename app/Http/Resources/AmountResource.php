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
            'id'=>$this->id,
            'trainee_id'=>$this->trainee_id,
            'training_batche_id'=>$this->training_batche_id,
            'amount'=>$this->amount,
        ];
    }
}
