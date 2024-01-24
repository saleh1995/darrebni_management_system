<?php

namespace App\Models;

use App\Models\TrainingBatch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coach extends Model
{
    use HasFactory;
    protected $fillable = [

        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'address',
        'email',
        'birth_date',
        'image',
        'notes',
        'salary_sp',
        'salary_us',
        'specializetion_id',
        'CoachID',
    ];

    public function specializetion()
    {
        return $this->belongsTo(Specializetion::class);
    }

    /**
     * Get the comments for the blog post.
     */
    public function trainingBatches(): HasMany
    {
        return $this->hasMany(TrainingBatch::class, 'coach_id');
    }
}
