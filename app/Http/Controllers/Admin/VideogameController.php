<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VideogameController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $videogames = Videogame::all();
    return view('admin.videogames.index', compact('videogames'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   */
  public function show(Videogame $videogame)
  {
    return view('admin.videogames.show', compact('videogame'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Videogame $Videogame)
  {
    return view('admin.videogames.edit', compact('Videogame'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Videogame $videogame)
  {
    $data = $request->all();
    $data['slug'] = Str::slug($data['title'], '-');
    $videogame->update($data);

    return to_route('admin.videogames.show', $videogame)->with('alert-message', "Videogame '$videogame->title' edited successfully")->with('alert-type', 'success');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Videogame $videogame)
  {
    //
  }
}
