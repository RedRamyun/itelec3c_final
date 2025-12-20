<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoteCount extends Model
{
    protected $table = 'vote_counts';
    protected $primaryKey = 'vote_count_id';

    protected $fillable = [
        'candidate_id',
        'vote_count',
    ];
}
