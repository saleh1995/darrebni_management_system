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

    /**
     * Get the comments for the blog post.
     */
    public function trainingBatch(): HasMany
    {
        return $this->hasMany(TrainingBatch::class);
    }
}
