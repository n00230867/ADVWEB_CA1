<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharacterController;
use App\Http\Controllers\PowerController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');
    Route::get('/characters/create', [CharacterController::class, 'create'])->name('characters.create');
    Route::get('/characters/{character}', [CharacterController::class, 'show'])->name('characters.show');

    Route::post('/characters', [CharacterController::class, 'store'])->name('characters.store');
    Route::get('/characters/{character}/edit', [CharacterController::class, 'edit'])->name('characters.edit');
    Route::delete('/characters/{character}', [CharacterController::class, 'destroy'])->name('characters.destroy');
    Route::put('/characters/{character}', [CharacterController::class, 'update'])->name('characters.update');

    Route::get('/characters', [CharacterController::class, 'index'])->name('characters.index');
});

//The code below creates a Routes for powers
Route::resource('powers', PowerController::class);

Route::post('characters/{character}/powers', [PowerController::class, 'store'])->name('powers.store');

require __DIR__.'/auth.php';
