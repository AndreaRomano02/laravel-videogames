@extends('layouts.app')

@section('title', 'Index')

@section('cdns')
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'
        integrity='sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=='
        crossorigin='anonymous' />
@endsection



@section ('content')

   <ul>
    @foreach($consoles as $console)
    <li>{{$console->label}}</li>
    @endforeach
   </ul>

@endsection