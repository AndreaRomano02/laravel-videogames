<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\VideogameController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GuestHomeController::class, 'index'])->name('guest.home');

Route::prefix('/admin')->name('admin.')->middleware(['auth'])->group(function () {
  Route::get('/', [AdminHomeController::class, 'index'])->name('home');

  Route::get('/videogames/trash', [VideogameController::class, 'trash'])->name('videogames.trash');
  Route::patch('/videogames/{videogame}/restore', [VideogameController::class, 'restore'])->name('videogames.restore');
  Route::delete('/videogames/dropAll', [VideogameController::class, 'dropAll'])->name('videogames.dropAll');
  Route::delete('/videogames/{videogame}/drop', [VideogameController::class, 'drop'])->name('videogames.drop');

  Route::resource('videogames', VideogameController::class);

  Route::resource('consoles', ConsoleController::class);


  Route::resource('publishers', PublisherController::class);
});

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
