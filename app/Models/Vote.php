<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //Name of table
    protected $table = 'votes';

    // Fields
    protected $fillable = [
        'voter_id',
        'created_at',
        'updated_at'
    ];
}
