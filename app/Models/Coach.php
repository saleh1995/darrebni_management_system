<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
         'ID',
    ];

    public function specializetion()
    {
        return $this->belongsTo(Specializetion::class);
    }
}
