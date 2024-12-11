<?php

namespace App\Http\Controllers;

use App\Models\Power;
use App\Models\Character; // Add this line
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Character $character)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $character->powers()->create([
            'user_id' => auth()->id(),
            'rating' => $request->input('rating'),
            'comment' => $request->input('comment'),
            'character_id' => $character->id
        ]);

        return redirect()->route('characters.show', $character)->with('success', 'Power Rating added successfully!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Power $power)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Power $power)
    {
        // Check if the authenticated user is the owner of the power or an admin
        if (auth()->user()->id !== $power->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('characters.index')->with('error', 'Access denied.');
        }

        // Return the edit view with the power data
        return view('powers.edit', compact('power'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Power $power)
    {
        // Validate the incoming request data
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Update the power with the validated data
        $power->update($request->only(['rating', 'comment']));

        // Redirect back to the character's page with a success message
        return redirect()->route('characters.show', $power->character_id)->with('success', 'Rating updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Power $power)
    {
        // Check if the authenticated user is the owner of the power or an admin
        if (auth()->user()->id !== $power->user_id && auth()->user()->role !== 'admin') {
            return redirect()->route('characters.index')->with('error', 'Access denied.');
        }

        // Delete the power
        $power->delete();

        // Redirect back to the character's page with a success message
        return redirect()->route('characters.show', $power->character_id)->with('success', 'Power deleted successfully!');
    }
}
