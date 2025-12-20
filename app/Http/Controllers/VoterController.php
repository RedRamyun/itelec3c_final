<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VoterController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $voters = Voter::whereNull('deleted_at')
                ->where(function($query) use ($search) {
                    $query->where('first_name', 'LIKE', "%$search%")
                        ->orWhere('last_name', 'LIKE', "%$search%")
                        ->orWhere('gender', 'LIKE', "%$search%")
                        ->orWhere('contact_information', 'LIKE', "%$search%");
                })
                ->orderBy('created_at', 'desc')
                ->paginate(10)
                ->appends(['search' => $search]); // Preserve search query in pagination links
        } else {
            $voters = Voter::whereNull('deleted_at')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        
        return view('voters-list', compact('voters'));
    }
    /**
     * Show the form for creating a new voter
     */
    public function create()
    {
        return view('create-voter');
    }

    /**
     * Generate unique voter key
     */
    private function generateVoterKey()
    {
        do {
            // Get current date in format MMDDYY (e.g., 121625 for Dec 16, 2025)
            $date = date('mdy'); // Changed from 'mdY' to 'mdy'
            
            // Generate random 9 digits
            $randomDigits = str_pad(rand(0, 999999999), 9, '0', STR_PAD_LEFT);
            
            // Combine to create voter key: elecvotph + date + - + random digits
            // Example: elecvotph121625-123456789
            $voterKey = 'elecvotph' . $date . '-' . $randomDigits;
            
            // Check if this key already exists
            $exists = Voter::where('voter_key', $voterKey)->exists();
            
        } while ($exists); // Keep generating until we get a unique key
        
        return $voterKey;
    }

    /**
     * Store a newly created voter in database
     */
    public function store(Request $request)
    {
        // Validations
        $request->validate([
            'fName' => 'required|string|max:255',
            'lName' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required',
            'contact' => 'required|string|max:11',
            'absimagepath' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Generate unique voter key
        $voterKey = $this->generateVoterKey();

        // Insert record to database
        $voter = Voter::create([
            'voter_key' => $voterKey,
            'first_name' => $request->input('fName'),
            'last_name' => $request->input('lName'),
            'birthdate' => $request->input('birthdate'),
            'gender' => $request->input('gender'),
            'contact_information' => $request->input('contact'),
            'imagepath' => $request->file('absimagepath')->store('voter_images', 'public'),
            'status' => 'Active'
        ]);

        // Redirect to success page with voter information
        return redirect()->route('voter.registered.success', ['id' => $voter->voter_id]);
    }

    /**
     * Display voter registration success page
     */
    public function registrationSuccess($id)
    {
        $voter = Voter::findOrFail($id);
        return view('voter-registered-success', compact('voter'));
    }

    /**
     * Show the form for editing a voter
     */
    public function edit($id)
    {
        $voter = Voter::findOrFail($id);
        return view('edit-voter', compact('voter'));
    }

    /**
     * Update the specified voter in database
     */
    public function update(Request $request, $id)
    {
        $voter = Voter::findOrFail($id);
        
        // Validations
        $request->validate([
            'fName' => 'required|string|max:255',
            'lName' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required',
            'contact' => 'required|string|max:11',
            'absimagepath' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Update voter data
        $voter->first_name = $request->input('fName');
        $voter->last_name = $request->input('lName');
        $voter->birthdate = $request->input('birthdate');
        $voter->gender = $request->input('gender');
        $voter->contact_information = $request->input('contact');

        // Update image if new one is uploaded
        if ($request->hasFile('absimagepath')) {
            // Delete old image
            if ($voter->imagepath) {
                Storage::disk('public')->delete($voter->imagepath);
            }
            $voter->imagepath = $request->file('absimagepath')->store('voter_images', 'public');
        }

        $voter->save();

        return redirect()->route('voters.list')
            ->with('success', 'Voter updated successfully!');
    }

    /**
     * Soft delete the specified voter
     */
    public function destroy($id)
    {
        $voter = Voter::findOrFail($id);
        $voter->deleted_at = now();
        $voter->save();

        return redirect()->route('voters.list')
            ->with('success', 'Voter deleted successfully!');
    }

    /**
     * Disable the specified voter
     */
    public function disable($id)
    {
        $voter = Voter::findOrFail($id);
        $voter->status = 'Disabled';
        $voter->save();

        return redirect()->route('voters.list')
            ->with('success', 'Voter disabled successfully!');
    }

    public function enable($id)
    {
        $voter = Voter::findOrFail($id);
        $voter->status = 'Active';
        $voter->save();
        
        return redirect()->route('voters.list')
            ->with('success', 'Voter enabled successfully!');
    }

public function ArchivedVotersDisplay(Request $request)
{
    $search = $request->input('search');
    
    if ($search) {
        $voters = Voter::onlyTrashed()
            ->where(function($query) use ($search) {
                $query->where('first_name', 'LIKE', "%$search%")
                    ->orWhere('last_name', 'LIKE', "%$search%")
                    ->orWhere('voter_key', 'LIKE', "%$search%")
                    ->orWhere('gender', 'LIKE', "%$search%")
                    ->orWhere('contact_information', 'LIKE', "%$search%");
            })
            ->orderBy('deleted_at', 'desc')
            ->get();
    } else {
        $voters = Voter::onlyTrashed()
            ->orderBy('deleted_at', 'desc')
            ->get();
    }
    
    return view('ArchivedVotersDisplay', compact('voters'));
}

public function restore($id)
{
    $voter = Voter::onlyTrashed()->findOrFail($id);
    $voter->restore();
    
    return redirect()->route('display.archived.voters')
        ->with('success', 'Voter restored successfully!');
}

public function forceDelete($id)
{
    $voter = Voter::onlyTrashed()->findOrFail($id);
    
    // Delete image if exists
    if ($voter->imagepath) {
        Storage::disk('public')->delete($voter->imagepath);
    }
    
    $voter->forceDelete();
    
    return redirect()->route('display.archived.voters')
        ->with('success', 'Voter permanently deleted!');
}
}