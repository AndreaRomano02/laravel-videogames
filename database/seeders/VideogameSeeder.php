<?php

namespace Database\Seeders;

use App\Models\Videogame;
use Illuminate\Support\Str;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideogameSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(Generator $faker): void
  {
    for ($i = 0; $i < 20; $i++) {
      $videogame = new Videogame();
      $videogame->title = $faker->text(25);
      $videogame->slug = Str::slug($videogame->title, '-');
      $videogame->genre = $faker->text(25);
      $videogame->image = $faker->imageUrl(250, 250);
      $videogame->is_explicit = rand(0, 1);
      $videogame->description = $faker->paragraph(10, true);
      $videogame->price = '$' . $faker->randomFloat(2, 1, 200);
      $videogame->save();
    }
  }
}
