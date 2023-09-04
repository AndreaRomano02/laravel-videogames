@extends('layouts.app')

@section('content')
    <ul>
        @foreach ($videogames as $videogame)
            <li><strong>Titolo: </strong>{{ $videogame->title }}</li>
        @endforeach
    </ul>
@endsection
