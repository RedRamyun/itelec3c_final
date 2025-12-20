<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use SoftDeletes;
    
    protected $table = 'positions';
    protected $primaryKey = 'position_id';
    
    protected $fillable = [
        'position_name',
        'description',
        'created_at',
        'updated_at'
    ];
    
    protected $dates = ['deleted_at'];

    /**
     * Get the candidates for this position
     */
    public function candidates()
    {
        return $this->hasMany(Candidate::class, 'position_id', 'position_id');
    }

    /**
     * Get the vote counts for candidates in this position
     */
    public function voteCounts()
    {
        return $this->hasManyThrough(
            VoteCount::class,
            Candidate::class,
            'position_id',
            'candidate_id',
            'position_id',
            'candidate_id'
        );
    }
}