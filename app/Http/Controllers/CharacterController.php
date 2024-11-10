<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CharacterController extends Controller
{
    /**
     * Display a list of characters with optional search filtering.
     */
    public function index(Request $request)
    {
        $query = Character::query();
    
        // Filter by species if specified
        if ($request->filled('species')) {
            $query->where('species', $request->species);
        }
    
        // Search by character name if specified
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }
    
        // Get the filtered characters
        $characters = $query->get();
    
        return view('characters.index', compact('characters'));
    }
    /**
     * Show form for creating a new character.
     */
    public function create()
    {
        return view('characters.create');
    }

    /**
     * Validate and store a new character with an image.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'bio' => 'required|max:5000',
            'species' => 'required|max:100',
            'character_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handles image upload and naming.
        $character_imgName = $request->hasFile('character_img')
            ? time() . '.' . $request->character_img->extension()
            : null;
        
        if ($character_imgName) {
            $request->character_img->move(public_path('images/characters'), $character_imgName);
        }

        // Create character with validated data.
        Character::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'species' => $request->species,
            'character_img' => $character_imgName,
        ]);

        return to_route('characters.index')->with('success', 'Character created successfully!');
    }

    /**
     * Display a specific character's details.
     */
    public function show(Character $character)
    {
        return view('characters.show', compact('character'));
    }

    /**
     * Show form for editing a character.
     */
    public function edit(Character $character)
    {
        return view('characters.edit', compact('character'));
    }

    /**
     * Validate and update character information, keeping the existing image if no new one is uploaded.
     */
    public function update(Request $request, Character $character)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string|max:5000',
            'species' => 'required|string|max:255',
            'character_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional
        ]);

        // If a new image is uploaded, handle the upload and update the image name
        if ($request->hasFile('character_img')) {
            $character_imgName = time() . '.' . $request->character_img->extension();
            $request->character_img->move(public_path('images/characters'), $character_imgName);

            // Update character with new image
            $character->update([
                'character_img' => $character_imgName,
            ]);
        }

        // Update character data (name, bio, species) without affecting the image if not provided
        $character->update($request->only(['name', 'bio', 'species']));

        return to_route('characters.index')->with('success', 'Character updated successfully!');
    }

    /**
     * Delete a character from the database.
     */
    public function destroy(Character $character)
    {
        $character->delete();

        return to_route('characters.index')->with('success', 'Character deleted successfully!');
    }
}