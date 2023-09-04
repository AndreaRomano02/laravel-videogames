@extends('layouts.app')



@section('content')

    {{-- Header--}}
    <header>
        <h1>Cestino</h1>
    </header>

    {{-- Content--}}
    <ul>
        @foreach ($videogames as $videogame)
            <li>
                {{$videogame->title}}
                <form action="{{route('admin.videogames.restore', $videogame)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-success">
                        Restore
                    </button>
                </form>
                <a href="#" class="btn btn-danger">Delete</a>
            </li>
        @endforeach
    </ul>

    <a class="btn btn-secondary" href="{{route('admin.videogames.index')}}">Go Back</a>
@endsection