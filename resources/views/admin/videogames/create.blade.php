@extends('layouts.app')

@section('title', 'Create Videogame')

@section('content')
    @include('includes.admin.form')
@endsection

@section('scripts')
    @Vite('resources/js/image-prev.js')
    @Vite('resources/js/slug-gen.js')



@endsection
