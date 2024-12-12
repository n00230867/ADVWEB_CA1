<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin'){
            return redirect()->route('movies.index')->with('error', 'Access denied.');
        }
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:5000',
            'release' => 'required|max:100',
            'director' => 'required|max:100',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handles image upload and naming.
        $posterName = $request->hasFile('poster')
            ? time() . '.' . $request->poster->extension()
            : null;
        
        if ($posterName) {
            $request->poster->move(public_path('images/movies'), $posterName);
        }

        // Create movie with validated data.
        Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'release' => $request->release,
            'director' => $request->director,
            'poster' => $posterName,
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        // Eager load characters related to the movie
        $characters = $movie->characters; // Assuming you have a 'characters' relationship defined in the Movie model

        return view('movies.show', compact('movie', 'characters'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
