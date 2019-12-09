@extends('layouts.app')

@section('title', 'Classes')

@section('content')
    <h1>Recipe Classes</h1>

    <ul>
        @foreach ($classes as $class)
        <li>{{ $class->description }}</li>
        @endforeach
    </ul>
@endsection
