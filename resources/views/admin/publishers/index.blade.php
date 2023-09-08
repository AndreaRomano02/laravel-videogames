@extends('layouts.app')

@section('title', 'Publishers')

@section('cdns')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
        integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=='
        crossorigin='anonymous' />
@endsection

@section('content')


    <header class="text-end mt-3">

        {{-- # Aggiungi --}}
        <a href="{{ route('admin.publishers.create') }}" class="btn btn-success">Crea un Publisher</a>
    </header>
    <div class="row row-cols-3 ">

        @foreach ($publishers as $publisher)
            <div class="card g-5">
                <div class="card-body">
                    <h5 class="card-title">{{ $publisher->label }}</h5>

                    <p><strong>Name: </strong> {{ $publisher->label }}</p>

                    <div class="d-flex align-items-center gap-2 justify-content-center">



                        {{-- # Modifica --}}
                        <a href="{{ route('admin.publishers.edit', $publisher) }}" class="btn btn-warning">
                            <i class="fas fa-pencil me-2"></i>
                            Modifica
                        </a>

                        {{-- # Elimina --}}
                        <form action="{{ route('admin.publishers.destroy', $publisher) }}" method="POST"
                            class="delete-form" data-title="{{ $publisher->label }}" data-bs-toggle="modal"
                            data-bs-target="#deleteModal">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-trash me-2"></i>
                                Elimina
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @include('includes.admin.delete-model')

@endsection



@section('scripts')

    @vite('resources/js/confirm-delete.js')

@endsection
