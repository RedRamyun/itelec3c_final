<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{   
    // Create Position form - Already exists
    public function create()
    {
        return view('create-position');
    }
    
    // Store new position
    public function store(Request $request)
    {
        $validated = $request->validate([
            'position_name' => 'required|string|max:255|unique:positions,position_name',
            'description' => 'nullable|string|max:500',
        ]);
        
        Position::create($validated);
        
        return redirect()->route('display.positions')
            ->with('success', 'Position created successfully!');
    }
    
    // Positions Table
    public function PositionsDisplay(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $positions = Position::where('position_name', 'LIKE', "%$search%")
                ->orWhere('position_id', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%")
                ->paginate(10)
                ->appends(['search' => $search]);
        } else {
            $positions = Position::paginate(10);
        }
        return view('PositionsDisplay', compact('positions'));
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

    // Force Delete Position (Permanent)
    public function forceDelete($id)
    {
        $position = Position::onlyTrashed()->findOrFail($id);
        $position->forceDelete();
        
        return redirect()->route('display.archived.positions')
            ->with('success', 'Position permanently deleted successfully!');
    }

    // Edit Position form
    public function edit($id)
    {
        $position = Position::findOrFail($id);
        return view('edit-position', compact('position'));
    }

    // Update Position
    public function update(Request $request, $id)
    {
        $position = Position::findOrFail($id);
        
        $validated = $request->validate([
            'position_name' => 'required|string|max:255|unique:positions,position_name,' . $id . ',position_id',
            'description' => 'nullable|string|max:500',
        ]);
        
        $position->update($validated);
        
        return redirect()->route('display.positions')
            ->with('success', 'Position updated successfully!');
    }

}