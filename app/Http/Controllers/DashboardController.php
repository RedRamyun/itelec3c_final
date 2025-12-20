<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Models\Candidate;
use App\Models\Position;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Count total registered voters (not deleted)
        $registeredVoters = Voter::whereNull('deleted_at')->count();
        
        // Count voted users (has_voted = 1)
        $votedUsers = Voter::whereNull('deleted_at')
            ->where('has_voted', 1)
            ->count();
        
        // Calculate voter turnout percentage
        $voterTurnout = $registeredVoters > 0 
            ? round(($votedUsers / $registeredVoters) * 100, 2) 
            : 0;
        
        // Count total candidates (not deleted)
        $totalCandidates = Candidate::whereNull('deleted_at')->count();
        
        // Count total positions (not deleted)
        $totalPositions = Position::whereNull('deleted_at')->count();
        
        return view('dashboard', compact(
            'registeredVoters',
            'votedUsers',
            'voterTurnout',
            'totalCandidates',
            'totalPositions'
        ));
    }
}