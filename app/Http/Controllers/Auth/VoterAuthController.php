<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VoterAuthController extends Controller
{
    /**
     * Show the voter login form
     */
    public function showLoginForm()
    {
        return view('voter-login');
    }

    /**
     * Authenticate voter using fullname and voter key
     */
    public function authenticate(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'fullname' => 'required|string',
            'voter_key' => 'required|string',
        ], [
            'fullname.required' => 'Please enter your full name',
            'voter_key.required' => 'Please enter your voter key',
        ]);

        // Parse the fullname into first_name and last_name
        $fullname_parts = explode(' ', trim($validated['fullname']), 2);
        $first_name = $fullname_parts[0];
        $last_name = isset($fullname_parts[1]) ? $fullname_parts[1] : '';

        // Find voter by first_name, last_name, and voter_key
        $voter = Voter::where('first_name', $first_name)
            ->where('last_name', $last_name)
            ->where('voter_key', $validated['voter_key'])
            ->whereNull('deleted_at')
            ->where('status', 'Active')
            ->first();

        if (!$voter) {
            return back()
                ->withErrors([
                    'fullname' => 'The provided credentials do not match our records.',
                ])
                ->withInput($request->only('fullname'));
        }

        // Check if voter has already voted
        if ($voter->has_voted) {
            return back()
                ->withErrors([
                    'voter_key' => 'You have already voted in this election.',
                ])
                ->withInput($request->only('fullname', 'voter_key'));
        }

        // Store voter session
        Session::put('voter_id', $voter->voter_id);
        Session::put('voter_name', $voter->first_name . ' ' . $voter->last_name);

        // Redirect to candidates page (view only)
        return redirect()->route('voter.candidates');
    }

    /**
     * Logout voter
     */
    public function logout(Request $request)
    {
        Session::flush();
        return redirect()->route('welcome');
    }
}
