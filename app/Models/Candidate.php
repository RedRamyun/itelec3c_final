<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidate extends Model
{
    use SoftDeletes;
    
    protected $table = 'candidates';
    protected $primaryKey = 'candidate_id';
    
    protected $fillable = [
        'candidate_name',
        'party_affiliation',
        'imagepath',
        'position_id',
        'status',
        'created_at',
        'updated_at'
    ];

    protected $dates = ['deleted_at'];
    
    /**
     * Get the position that the candidate is running for
     */
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id', 'position_id');
    }

    /**
     * Get the vote count for this candidate
     */
    public function voteCount()
    {
        return $this->hasOne(VoteCount::class, 'candidate_id', 'candidate_id');
    }
}