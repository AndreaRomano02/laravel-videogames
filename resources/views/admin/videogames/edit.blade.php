@extends('layouts.app')

@section('title', "Edit $videogame->title")

@section('content')
    @include('includes.admin.form')
@endsection
@section('scripts')
    @Vite('resources/js/image-prev.js')
    @vite('resources/js/slug-gen.js')
@endsection
