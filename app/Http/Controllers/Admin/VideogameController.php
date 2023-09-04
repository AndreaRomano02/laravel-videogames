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
    $videogame = new Videogame();
    return view('admin.videogames.create', compact('videogame'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $data = $request->all();
    $data['is_explicit'] = $data['is_explicit'] ?? 0;
    $data['slug'] = Str::slug($data['title'], '-');

    $videogame = new Videogame();


    $videogame->fill($data);


    $videogame->save();
    return to_route('admin.videogames.show', compact('videogame'))->with('alert-type', 'success')->with('alert-message', 'Videogame aggiunto con successo');;
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
  public function edit(Videogame $videogame)
  {
    return view('admin.videogames.edit', compact('videogame'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Videogame $videogame)
  {
    $data = $request->all();
    $data['is_explicit'] = $data['is_explicit'] ?? 0;

    $data['slug'] = Str::slug($data['title'], '-');
    $videogame->update($data);

    return to_route('admin.videogames.show', $videogame)->with('alert-message', "Videogame '$videogame->title' edited successfully")->with('alert-type', 'success');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Videogame $videogame)
  {
    $videogameName = $videogame->name;
    $videogame->delete();

    return to_route('admin.videogames.index')
      ->with('alert-type', 'success')
      ->with('alert-message', "$videogameName successfully deleted");
  }

  public function trash()
  {
    $videogames = Videogame::onlyTrashed()->get();
    return view('admin.videogames.trash', compact('videogames'));
  }

  public function restore(String $id)
  {
    $videogame = Videogame::onlyTrashed()->findOrFail($id);
    $videogame->restore();

    return to_route('admin.videogames.trash');
  }
}
