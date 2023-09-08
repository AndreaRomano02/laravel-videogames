<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'color'];

    public function videogame()
    {
        return $this->hasMany(Videogame::class);
    }
}
