<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    //Name of table
    protected $table = 'voters';

    protected $primaryKey = 'voter_id';
    
    // Fields
    protected $fillable = [
        'first_name',
        'last_name',
        'birthdate',
        'gender',
        'contact_information',
        'imagepath',
        'has_voted',
        'status',
        'deleted_at',
    ];
    
    protected $casts = [
        'birthdate' => 'date',
        'has_voted' => 'boolean',
        'deleted_at' => 'datetime',
    ];
}