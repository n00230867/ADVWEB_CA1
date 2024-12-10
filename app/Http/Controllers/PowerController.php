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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Power $power)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Power $power)
    {
        //
    }
}
