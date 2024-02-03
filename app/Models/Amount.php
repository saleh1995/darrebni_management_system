<?php

namespace App\Models;

use App\Models\TrainingBatch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Amount extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'trainee_id',
        'training_batche_id'
    ];


    public function trainingBatch(): BelongsTo
    {
        return $this->belongsTo(TrainingBatch::class, 'training_batche_id');
    }

    public function trainee(): BelongsTo
    {
        return $this->belongsTo(Trainee::class, 'trainee_id');
    }
}
