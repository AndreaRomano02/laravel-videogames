@extends('layouts.app')

@section('content')

    <h1>{{$console->label}}</h1>


    {{-- Buttons --}}
    <div class="d-flex justify-content-between mt-2">

        <div class="left-side">
            <a class="btn btn-secondary" href="{{ route('admin.consoles.index') }}">Go Back</a>
        </div>

        <div class="right-side d-flex justify-content-end">
            <a class="btn btn-success me-2" href="{{ route('admin.consoles.edit', $console) }}">Edit</a>

            <form action="{{ route('admin.consoles.destroy', $console) }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

@endsection