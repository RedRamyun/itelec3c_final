<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Position;
use App\Models\Vote;
use App\Models\VoteCount;
use Illuminate\Http\Request;

class UserController extends Controller
{   
    // Votes Table
    public function DisplayVotes(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $votes = Vote::join('voters', 'votes.voter_id', '=', 'voters.voter_id')
                ->join('candidates', 'votes.candidate_id', '=', 'candidates.candidate_id')
                ->where('voters.last_name', 'like', "%$search%")
                ->orWhere('voters.first_name', 'like', "%$search%")
                ->orWhere('votes.vote_id', 'like', "%$search%")
                ->select('votes.*', 'voters.first_name', 'voters.last_name', 'candidates.candidate_name')
                ->get();
        } else {
            $votes = Vote::join('voters', 'votes.voter_id', '=', 'voters.voter_id')
                ->join('candidates', 'votes.candidate_id', '=', 'candidates.candidate_id')
                ->select('votes.*', 'voters.first_name', 'voters.last_name', 'candidates.candidate_name')
                ->get();
        }
        
        return view('VotesDisplay', compact('votes'));
    }

    // Candidates Table
    public function CandidatesDisplay(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $candidates = Candidate::join('positions', 'candidates.position_id', '=', 'positions.position_id')
                ->where('candidate_id', 'LIKE', "%$search%")
                ->orWhere('candidate_name', 'LIKE', "%$search%")
                ->orWhere('party_affiliation', 'LIKE', "%$search%")
                ->orWhere('positions.position_name', 'LIKE', "%$search%")
                ->select('candidates.*', 'positions.position_name')
                ->get();
        } else {
            $candidates = Candidate::join('positions', 'candidates.position_id', '=', 'positions.position_id')
                ->select('candidates.*', 'positions.position_name')
                ->get();
        }

        return view('CandidatesDisplay', compact('candidates'));
    }

    // Positions Table
    public function PositionsDisplay(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $positions = Position::where('position_name', 'LIKE', "%$search%")
                ->orWhere('position_id', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->get();
        } else {
            $positions = Position::get();
        }

        return view('PositionsDisplay', compact('positions'));
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

    public function ArchivedPositionsDisplay(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $positions = Position::onlyTrashed()
                ->where('position_name', 'LIKE', "%$search%")
                ->orWhere('position_id', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->get();
        } else {
            $positions = Position::onlyTrashed()->get();
        }

        return view('ArchivedPositionsDisplay', compact('positions'));
    }

    // Soft Delete Position
    public function delete($id)
    {
        $position = Position::findOrFail($id);
        $position->delete();
        
        return redirect()->route('display.positions')
            ->with('success', 'Position archived successfully!');
    }
    
    // Restore Position
    public function restore($id)
    {
        $position = Position::onlyTrashed()->findOrFail($id);
        $position->restore();
        
        return redirect()->route('display.archived.positions')
            ->with('success', 'Position restored successfully!');
    }
}