<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteCount extends Model
{
    protected $table = 'vote_counts';

    protected $fillable = [
        'vote_count'
    ];
}
