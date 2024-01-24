<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'darrebni_id',
        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'email',
        'phone',
        'address',
        'image',
        'salary',
        'speciality',
        'brunch_id',
        'note',

    ];

    // public function employees()
    // {
    //     return $this->belongsTo(Brunch::class);
    // }

        public function specializetion()
    {
        return $this->belongsTo(Specializetion::class,'specializetion_id');
    }

    public function brunch()
    {
        return $this->belongsTo(Brunch::class,'brunch_id');
    }

}
