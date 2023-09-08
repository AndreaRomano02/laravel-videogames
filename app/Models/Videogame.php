<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Videogame extends Model
{
  use HasFactory;

  use SoftDeletes;

  
  protected $fillable = ['title', 'slug', 'genre', 'image', 'is_explicit', 'description', 'price', 'publisher_id'];

  public function consoles() 
  {
    return $this->belongsToMany(Console::class);
  }


  public function publisher()
  {
    return $this->belongsTo(Publisher::class);
}
