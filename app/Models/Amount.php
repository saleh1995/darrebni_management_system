<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amount extends Model
{
    use HasFactory;

    protected $fillable=[
        'trainee_id',
        'amount',
        'training_batche_id',
    ];



    public function trainee(){
        return $this->belongsTo(Trainee::class);
    }

    public function trainingBatch(){
        return $this->belongsTo(TrainingBatch::class);
    }

}
