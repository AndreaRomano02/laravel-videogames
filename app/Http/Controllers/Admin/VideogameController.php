<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use App\Models\Videogame;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;



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
    $publishers = Publisher::select('id', 'label')->get();

    return view('admin.videogames.create', compact('videogame', 'publishers'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    $request->validate(
      [
        'title' => 'required|string|max:100|unique:videogames',
        'image' => 'nullable|url',
        'description' => 'required|string',
      ],
      [
        'title.required' => 'Il titolo è obbligatorio',
        'title.max' => 'il titolo deve essere massimo :max caratteri',
        'title.unique' => "Esiste già un videogame dal titolo '$request->title'",
        'description.required' => "La descrizione è obbligatoria",
        'image.url' => "L'url inserito non è valido",
      ]
    );



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
    $publishers = Publisher::select('id', 'label')->get();

    return view('admin.videogames.edit', compact('videogame', 'publishers'))->with('alert-message', "Videogame '$videogame->title' edited successfully")->with('alert-type', 'success');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Videogame $videogame)
  {
    $request->validate(
      [
        'title' => ['required', 'string', 'max:100', Rule::unique('videogames', 'title')->ignore($videogame)],
        'image' => 'nullable|url',
        'description' => 'required|string',
      ],
      [
        'title.required' => 'Il titolo è obbligatorio',
        'title.max' => 'il titolo deve essere massimo :max caratteri',
        'title.unique' => "Esiste già un videogame dal titolo $request->title",
        'description.required' => "La descrizione è obbligatoria",
        'image.url' => "L'url inserito non è valido",
      ]
    );

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
    $videogame->delete();

    return to_route('admin.videogames.index')
      ->with('alert-type', 'success')
      ->with('alert-message', "videogame successfully tasfered in trash");
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

    return to_route('admin.videogames.trash')->with('alert-type', 'success')
      ->with('alert-message', "videogame successfully restored");;
  }

  public function drop(String $id)
  {
    $videogame = Videogame::onlyTrashed()->findOrFail($id);
    $videogame->forceDelete();

    return to_route('admin.videogames.trash')->with('alert-message', "Videogame dropped successfully")->with('alert-type', 'success');
  }

  public function dropAll()
  {
    Videogame::onlyTrashed()->forceDelete();

    return to_route('admin.videogames.trash')->with('alert-message', "Clear trash")->with('alert-type', 'success');
  }
}
