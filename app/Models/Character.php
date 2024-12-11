<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'species',
        'character_img',
        'created_at',
        'updated_at',
    ];

    public function powers()
    {
        return $this->hasMany(Power::class);
    }

    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
