<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brunch extends Model
{
    use HasFactory;


    protected $fillable = [
        'prefix',
        'name',
    ];


    public function trainingBatches(): HasMany
    {
        return $this->hasMany(TrainingBatch::class,'brunch_id');
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class,'brunch_id');
    }
}
