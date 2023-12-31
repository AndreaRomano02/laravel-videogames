<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('videogames', function (Blueprint $table) {
      $table->id();
      $table->string('title', 100)->unique();
      $table->string('slug')->unique();
      $table->string('genre')->nullable();
      $table->string('image')->nullable();
      $table->boolean('is_explicit')->nullable()->default(null);
      $table->text('description');
      $table->string('price');
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('videogames');
  }
};
