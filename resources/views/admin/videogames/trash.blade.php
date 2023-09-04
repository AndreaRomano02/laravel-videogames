@extends('layouts.app')



@section('content')

    {{-- Header--}}
    <header>
        <h1>Cestino</h1>
    </header>

    {{-- Content--}}
    <ul>
        @foreach ($videogames as $videogame)
            <li>{{$videogame->title}}</li>
        @endforeach
    </ul>

    <a class="btn btn-secondary" href="{{route('admin.videogames.index')}}">Go Back</a>
@endsection