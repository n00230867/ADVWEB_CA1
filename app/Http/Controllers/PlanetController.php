<?php

namespace App\Http\Controllers;

use App\Models\Planet;
use App\Models\Character;
use Illuminate\Http\Request;

class PlanetController extends Controller
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
    public function store(Request $request)
    {
        $request->validate([
            'character_id' => 'required|exists:characters,id',
            'name' => 'required|string|max:255',
            'climate' => 'required|string|max:255',
            'description' => 'required|string',
            'planet_img' => 'required|url',
        ]);

        Planet::create($request->all());

        return redirect()->back()->with('success', 'Planet added successfully!');
    }

    //     $character->planets()->create([
    //         'user_id' => auth()->id(),
    //         'name' => $request->input('name'),
    //         'climate' => $request->input('climate'),
    //         'description' => $request->input('description'),
    //         'planet_img' => $request->input('planet_img'),  
    //         'character_id' => $character->id
    //     ]);

    //     return redirect()->route('character.show', $character)->with('success', 'Planet added successfully.');
    // }

    /**
     * Display the specified resource.
     */
    public function show(Planet $planet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Planet $planet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Planet $planet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Planet $planet)
    {
        //
    }
}
