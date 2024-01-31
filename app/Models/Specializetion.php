<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Specializetion extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function coaches(): HasMany
    {
        return $this->hasMany(Coach::class, 'specializetion_id');
    }

    public function employees(): HasMany
    {
        return $this->hasMany(Employee::class, 'specializetion_id');
    }

    public function trainees(): HasMany
    {
        return $this->hasMany(Trainee::class, 'specializetion_id');
    }
}
