<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';

    protected $fillable = [
        'candidate_name',
        'party_affiliation',
        'position',
        'created_at',
        'updated_at'
    ];
}
