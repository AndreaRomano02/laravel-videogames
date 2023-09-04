@extends('layouts.app')



@section('content')

    {{-- Header--}}
    <header class="d-flex align-items-center justify-content-between mt-5 mb-5">
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

    <table class="table" class="mt-5">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Genre</th>
            <th scope="col">Price</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($videogames as $videogame)
          <tr>
              <td scope="col">{{$videogame->id}}</td>
              <td scope="col">{{$videogame->title}}</td>
              <td scope="col">{{$videogame->genre}}</td>
              <td scope="col">{{$videogame->price}}</td>
              <th scope="col" class="d-flex align-items-center justify-content-end">
                  {{-- Restore --}}
                  <form action="{{route('admin.videogames.restore', $videogame)}}" method="POST" class="me-2">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-success">
                        Restore
                    </button>
                </form>
                
                {{-- Delete--}}
                <form action="{{route('admin.videogames.drop', $videogame)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">
                        Delete
                    </button>
                </form>
            </th>
        </tr>
          @endforeach
      </table>
    </ul>

    <a class="btn btn-secondary" href="{{route('admin.videogames.index')}}">Go Back</a>
@endsection