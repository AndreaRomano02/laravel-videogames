@extends('layouts.app')

@section('content')

    {{-- Header --}}
    <header>
        <h1 class="text-center mt-5 mb-5">{{$videogame->title}}</h1>
    </header>

    {{-- Card--}}
    <div class="card mb-3">
        <img src="{{$videogame->image}}" class="card-img-top" alt="{{$videogame->title}}">
        <div class="card-body">
        
          <h5 class="card-title">{{$videogame->title}}</h5>
          <p class="card-text">{{$videogame->description}}</p>
          <div class="d-flex justify-content-start me-3">
              <div><strong>Genre: </strong>{{$videogame->genre}}</div>
              <div><strong>Price: </strong> {{$videogame->price}}</div>
            </div>
            @if ($videogame->is_explicit)
            <div class="mt-3"><strong>18+</strong></div>
            @endif
        </div>
    </div>

    {{-- Buttons --}}
    <div>
        
    </div>
@endsection
