<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'genre', 'image', 'is_explicit', 'description', 'price', 'publisher_id'];

    public function videogames()
    {
        return $this->belongsToMany(Videogame::class);
    }
}
