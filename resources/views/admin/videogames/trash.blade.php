@extends('layouts.app')



@section('content')

    {{-- Header--}}
    <header>
        <h1>Cestino</h1>

        <form action="{{route('admin.videogames.dropAll')}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">
                Svuota cestino
            </button>
        </form>
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

                <form action="{{route('admin.videogames.drop', $videogame)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">
                        Delete
                    </button>
                </form>
                
            </li>
        @endforeach
    </ul>

    <a class="btn btn-secondary" href="{{route('admin.videogames.index')}}">Go Back</a>
@endsection