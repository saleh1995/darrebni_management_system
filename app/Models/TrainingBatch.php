<?php

namespace App\Models;

use App\Models\Coach;
use App\Models\Brunch;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingBatch extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'TrainingBatchID',
        'price',
        'currency',
        'days',
    ];

    public function brunch(): BelongsTo
    {
        return $this->belongsTo(Brunch::class, 'brunch_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function coach(): BelongsTo
    {
        return $this->belongsTo(Coach::class, 'coach_id');
    }

    public function amounts(): HasMany
    {
        return $this->hasMany(TrainingBatch::class, 'training_batche_id');
    }

    public function amount()
    {
        return $this->hasMany(Amount::class);
    }
}
