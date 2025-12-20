<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    //Name of table
    protected $table = 'votes';
    protected $primaryKey = 'vote_id';

    // Fields
    protected $fillable = [
        'voter_id',
        'candidate_id',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the voter who made this vote
     */
    public function voter()
    {
        return $this->belongsTo(Voter::class, 'voter_id', 'voter_id');
    }

    /**
     * Get the candidate who received this vote
     */
    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'candidate_id', 'candidate_id');
    }
}
