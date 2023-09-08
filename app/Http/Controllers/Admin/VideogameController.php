<?php

namespace App\Http\Controllers\Admin;


use App\Models\Console;
use App\Http\Controllers\Controller;
use App\Models\Publisher;
use App\Models\Videogame;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;



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

    $consoles = Console::select('id', 'label')->get();
    $publishers = Publisher::select('id', 'label')->get();

    return view('admin.videogames.create', compact('videogame', 'publishers', 'consoles'))
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
        'consoles' => 'nullable|exists:consoles,id'
        'publisher_id' => 'nullable|exists:publishers,id'
      ],
      [
        'title.required' => 'Il titolo è obbligatorio',
        'title.max' => 'il titolo deve essere massimo :max caratteri',
        'title.unique' => "Esiste già un videogame dal titolo '$request->title'",
        'description.required' => "La descrizione è obbligatoria",
        'image.url' => "L'url inserito non è valido",
        'consoles.exists' => "una o più console inserita non è valida"
        'publisher_id.exists' => "L'editore è inesistente",

      ]
    );



    $data = $request->all();
    $data['is_explicit'] = $data['is_explicit'] ?? 0;
    $data['slug'] = Str::slug($data['title'], '-');

    $videogame = new Videogame();



    $videogame->fill($data);


    $videogame->save();

    // Check if console exists
    if (array_key_exists('consoles', $data)) $videogame->consoles()->attach($data['consoles']);
      


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

    $consoles = Console::select('id', 'label')->get();
    $console_videogame_ids = $videogame->consoles->pluck('id')->toArray();
    $publishers = Publisher::select('id', 'label')->get();

    return view('admin.videogames.edit', compact('videogame','publishers','consoles', 'console_videogame_ids'))->with('alert-message', "Videogame '$videogame->title' edited successfully")->with('alert-type', 'success');
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
        'consoles' => 'nullable|exists:consoles,id'
      ],
      [
        'title.required' => 'Il titolo è obbligatorio',
        'title.max' => 'il titolo deve essere massimo :max caratteri',
        'title.unique' => "Esiste già un videogame dal titolo $request->title",
        'description.required' => "La descrizione è obbligatoria",
        'image.url' => "L'url inserito non è valido",
        'consoles.exists' => "una o più console inserita non è valida"
      ]
    );

    $data = $request->all();
    $data['is_explicit'] = $data['is_explicit'] ?? 0;

    $data['slug'] = Str::slug($data['title'], '-');
    $videogame->update($data);

    // Delete or add console based on the database
    if(!Arr::exists($data, 'consoles') && count($videogame->consoles)) $videogame->consoles()->detach();
    elseif (Arr::exists($data, 'consoles')) $videogame->consoles()->sync($data['consoles']);

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

    if(count($videogame->consoles)) $videogame->consoles()->detach();

    return to_route('admin.videogames.trash')->with('alert-message', "Videogame dropped successfully")->with('alert-type', 'success');
  }

  public function dropAll()
  {
    Videogame::onlyTrashed()->forceDelete();


    return to_route('admin.videogames.trash')->with('alert-message', "Clear trash")->with('alert-type', 'success');
  }
}
