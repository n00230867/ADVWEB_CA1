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
    public function index(Request $request)
{
    $search = $request->input('search');

    $characters = Character::query()
        ->when($search, function ($query, $search) {
            return $query->where('name', 'like', '%' . $search . '%');
        })
        ->get();

    return view('characters.index', compact('characters'));
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
        } else{
            $character_imgName = null;
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
        return view('characters.edit', compact('character')); 
    }
    

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Character $character)
    // {
    //     // Validate the incoming request data
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'bio' => 'required|string|max:5000',
    //         'species' => 'required|string|max:255',
    //         'character_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    //     ]);

    //     // Prepare data for updating
    //     $data = $request->only(['name', 'bio', 'species', 'character_img']);

    //     if ($request->hasFile('character_img')) {
    //         // Delete old image if it exists
    //         if ($character->character_img && Storage::exists('public/images/characters/' . $character->character_img)) {
    //             Storage::delete('public/images/characters/' . $character->character_img);
    //         }
            
    //         // Store the new image and update the image path
    //         $character_imgName = time() . '.' . $request->file('character_img')->extension();
    //         $request->file('character_img')->storeAs('public/images/characters', $character_imgName);
    //         $data['character_img'] = $character_imgName;
    //     }

    //     // Update character with new data
    //     $character->update($data);

    //     // Redirect to the index page with a success message
    //     return redirect()->route('characters.index')->with('success', 'Character updated successfully!');
    // }
    public function update(Request $request, Character $character)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'bio' => 'required|string|max:5000',
        'species' => 'required|string|max:255',
        'character_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    // Store old image name to delete if necessary
    $oldImageName = $character->character_img;

    // Check if a new image file was uploaded
    if ($request->hasFile('character_img')) {
        // Generate a new image name
        $character_imgName = time() . '.' . $request->character_img->extension();
        // Move the new image to the public directory
        $request->character_img->move(public_path('images/characters'), $character_imgName);

        // Delete the old image from the public directory if it exists
        if ($oldImageName && file_exists(public_path('images/characters/' . $oldImageName))) {
            unlink(public_path('images/characters/' . $oldImageName));
        }
    } else {
        // If no new image, keep the old image name
        $character_imgName = $oldImageName;
    }

    // Update the character record with new data
    $character->update([
        'name' => $request->name,
        'character_img' => $character_imgName, // Store the image URL in the DB
        'species' => $request->species,
        'bio' => $request->bio,
    ]);

    // Redirect back to the index with a success message
    return to_route('characters.index')->with('success', 'Character updated successfully!');
}



    /**
     * Remove the specified resource from storage.
     */
   /**
 * Remove the specified resource from storage.
 */
    public function destroy(Character $character)
    {

        // Delete the character from the database
        $character->delete();

        // Redirect to the characters list with a success message
        return to_route('characters.index')->with('success', 'Character deleted successfully!');
    }

} 