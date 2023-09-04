@extends('layouts.app')

@section('title', 'Index')

@section('cdns')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
        integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=='
        crossorigin='anonymous' />
@endsection

@section('content')
    <header class="text-end mt-3">

        {{-- # Aggiungi --}}
        <a href="{{ route('admin.videogames.create') }}" class="btn btn-success">Crea un Videogame</a>
    </header>
    <div class="row row-cols-3 ">

        @foreach ($videogames as $videogame)
            <div class="card g-5">
                <img src="{{ $videogame->image }}" class="card-img-top" alt="{{ $videogame->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $videogame->title }}</h5>
                    <p><strong>Prezzo: </strong> {{ $videogame->price }}</p>
                    <p class="card-text">{{ $videogame->description }}</p>
                    <p><strong>Genere: </strong> {{ $videogame->genre }}</p>
                    @if ($videogame->is_explicit)
                        <p><strong>Over 18+</strong><i class="ms-2 fas fa-ban text-danger"></i></p>
                    @endif

                    <div class="d-flex align-items-center gap-2 justify-content-center">

                        {{-- # Vedi --}}
                        <a href="{{ route('admin.videogames.show', $videogame) }}" class="btn btn-primary">
                            <i class="fas fa-eye me-2"></i>
                            Vedi
                        </a>

                        {{-- # Modifica --}}
                        <a href="{{ route('admin.videogames.edit', $videogame) }}" class="btn btn-warning">
                            <i class="fas fa-pencil me-2"></i>
                            Modifica
                        </a>

                        {{-- # Elimina --}}
                        <form action="{{ route('admin.videogames.destroy', $videogame) }}" method="POST" id="delete-form">
                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger">
                                <i class="fas fa-trash me-2"></i>
                                Elimina
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')

@Vite('resources/js/confirm-delete.js')

@endsection