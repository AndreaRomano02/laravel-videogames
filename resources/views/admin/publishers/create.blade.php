@extends('layouts.app')

@section('title', 'Create Publisher')

@section('content')
    @include('includes.publishers.form')
@endsection

@section('scripts')
    @Vite('resources/js/image-prev.js')
    @Vite('resources/js/slug-gen.js')



@endsection
