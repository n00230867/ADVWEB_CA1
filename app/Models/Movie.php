<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'poseter', 'release', 'director', 'description'];

    //Movie can have many characters
    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }
}
