<?php

namespace App\Http\Controllers;

use App\Models\Console;
use Illuminate\Http\Request;

class ConsoleController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $consoles = Console::all();
    return view('admin.consoles.index', compact('consoles'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $console = new Console();
    
    return view('admin.consoles.create', compact('console'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {


    $data = $request->all();

    $console = new Console();

    $console->fill($data);

    $console->save();

    return to_route('admin.consoles.show', compact('console'))->with('alert-type', 'success')->with('alert-message', 'Console aggiunta con successo');
    
  }

  /**
   * Display the specified resource.
   */
  public function show(Console $console)
  {
    return view('admin.consoles.show', compact('console'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Console $console)
  {

  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Console $console)
  {
   
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Console $console)
  {
    
  }
}
