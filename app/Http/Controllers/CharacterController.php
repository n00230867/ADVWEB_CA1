<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $characters = Character::all(); //Fetch all char
        return view('characters.index', compact('characters'));//Return the view with char
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('characters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'name' => 'required',
            'bio' => 'required|max:5000',
            'species' => 'required|max:100',
            'character_img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Check if the image is uploaded and handle it
        if ($request->hasFile('character_img')) {
            $character_imgName = time().'.'.$request->character_img->extension();
            $request->character_img->move(public_path('images/characters'), $character_imgName);
        }
    
        // Create a character record in the database
        Character::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'species' => $request->species,
            'character_img' => $character_imgName, // Store the image URL in the DB
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        // Redirect to the index page with a success message
        return to_route('characters.index')->with('success', 'Character created successfully!');
    }
    


    /**
     * Display the specified resource.
     */
    public function show(Character $character)
    {
        return view('characters.show')->with('character', $character);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Character $character)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Character $character)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Character $character)
    {
        //
    }
}
