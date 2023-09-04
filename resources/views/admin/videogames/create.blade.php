@extends('layouts.app')

@section('title', 'Create Videogame')

@section('content')
    <header class="my-3">
        <h1>Crea videogame</h1>
    </header>
    <hr>
    <form method="POST" action="{{ route('admin.videogames.store') }}">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control" id="title" name="title"
                        placeholder="Inserisci il titolo del videogame" value="{{ old('title') }}" maxlength="100"
                        required>
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" value="{{ Str::slug(old('name'), '-') }}"
                        disabled>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="genre" class="form-label">Genere</label>
                    <input type="text" class="form-control" id="genre" name="genre" value="{{ old('genre') }}"
                        required>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" id="description" name="description" rows="7" required>{{ old('dedscripotion') }}</textarea>
                </div>
            </div>

            <div class="col-11 mb-3">
                <label for="image" class="form-label">Url dell'immagine</label>
                <input type="url" class="form-control" id="image" name="image" value="{{ old('image') }}"
                    placeholder="Insersisci un url valido">
            </div>
            <div class="col-1">
                <img src="{{ old('image', 'https://media.istockphoto.com/id/1147544807/vector/thumbnail-image-vector-graphic.jpg?s=612x612&w=0&k=20&c=rnCKVbdxqkjlcs3xH87-9gocETqpspHFXu5dIGB4wuM=') }}"
                    alt="preview" class="img-fluid my-2" id="image-preview">
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="number" min="1" max="200" class="form-control" id="price" name="price"
                        value="{{ old('price') }}">
                </div>
            </div>
            <div class="col-6 d-flex align-items-center">
                <div class="form-check form-switch">
                    <label class="form-check-label" for="is_explicit">Explicit Content</label>
                    <input type="checkbox" class="form-check-input" id="is_explicit" name="is_explicit" value="1">
                </div>
            </div>
        </div>

        <hr>
        <footer class="d-flex justify-content-between">
            <a class="btn btn-secondary" href="{{ route('admin.videogames.index') }}">Torna alla lista</a>
            <button class="btn btn-success">Crea</button>
        </footer>
    </form>
@endsection

@section('scripts')
    @Vite('resources/js/image-prev.js')
    @Vite('resources/js/slug-gen.js')



@endsection
