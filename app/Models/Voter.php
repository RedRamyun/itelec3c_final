<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    //Name of table
    protected $table = 'voters';

    // Fields
    protected $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'gender',
        'contact_information',
        'imagepath',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

}
