<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishers = Publisher::all();
        return view('admin.publishers.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([], []);
        $data = $request->all();
        $publisher = new Publisher();
        $publisher->fill($data);
        $publisher->save();
        return to_route('admin.publishers.show', $publisher)->with('alert-type', 'success')->with('alert-message', 'Publisher aggiunto con successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        return view('admin.publishers.show', compact('publisher'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Publisher $publisher)
    {


        return view('admin.publishers.edit', compact('publisher'))->with('alert-message', "'$publisher->title' edited successfully")->with('alert-type', 'success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)

    {
        $request->validate([], []);
        $data = $request->all();
        $publisher->update($data);
        return to_route('admin.publishers.show', $publisher);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();
        return to_route('admin.publisher.index')->with('alert-message', "Publisher deleted")->with('alert-type', 'success');
    }
}
