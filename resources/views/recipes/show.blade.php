@extends('layouts.app')

@section('title', 'Recipe detail')

@section('content')
    <h1>Detail of {{ $recipe->title }}</h1>

    <h4>Preparation</h4>
    <p>{{ $recipe->preparation }}</p>
    {{ $recipe->type->description }}

@endsection
