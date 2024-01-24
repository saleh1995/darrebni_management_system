<?php

namespace App\Models;

use App\Models\Coach;
use App\Models\Brunch;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
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


    /**
     * Get the post that owns the comment.
     */
    public function brunch(): BelongsTo
    {
        return $this->belongsTo(Brunch::class);
    }
    /**
     * Get the post that owns the comment.
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
    /**
     * Get the post that owns the comment.
     */
    public function coach(): BelongsTo
    {
        return $this->belongsTo(Coach::class);
    }
}
