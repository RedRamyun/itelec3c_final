<?php
namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\VoteCount;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    // Votes Table
    public function DisplayVotes(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $votes = Vote::join('voters', 'votes.voter_id', '=', 'voters.voter_id')
                ->join('candidates', 'votes.candidate_id', '=', 'candidates.candidate_id')
                ->where(function($query) use ($search) {
                    $query->where('voters.last_name', 'like', "%$search%")
                        ->orWhere('voters.first_name', 'like', "%$search%")
                        ->orWhere('votes.vote_id', 'like', "%$search%");
                })
                ->select('votes.*', 'voters.first_name', 'voters.last_name', 'candidates.candidate_name')
                ->paginate(10)
                ->appends(['search' => $search]);
        } else {
            $votes = Vote::join('voters', 'votes.voter_id', '=', 'voters.voter_id')
                ->join('candidates', 'votes.candidate_id', '=', 'candidates.candidate_id')
                ->select('votes.*', 'voters.first_name', 'voters.last_name', 'candidates.candidate_name')
                ->paginate(10);
        }
        
        return view('VotesDisplay', compact('votes'));
    }
    
    // Vote Counts Table
    public function VoteCountsDisplay(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $votecounts = VoteCount::join('candidates', 'vote_counts.candidate_id', '=', 'candidates.candidate_id')
                ->where('vote_count_id', 'LIKE', "%$search%")
                ->orWhere('candidates.candidate_name', 'LIKE', "%$search%")
                ->orWhere('vote_count', 'LIKE', "%$search%")
                ->select('vote_counts.*', 'candidates.candidate_name')
                ->get();
        } else {
            $votecounts = VoteCount::join('candidates', 'vote_counts.candidate_id', '=', 'candidates.candidate_id')
                ->select('vote_counts.*', 'candidates.candidate_name')
                ->get();
        }
        
        return view('VoteCountsDisplay', compact('votecounts'));
    }
}