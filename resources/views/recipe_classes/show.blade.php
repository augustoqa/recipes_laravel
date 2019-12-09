@extends('layouts.app')

@section('title', 'Detail Recipe')

@section('content')
    <h1>Detail Recipe Class #{{ $class->id }}</h1>
    <p>{{ $class->description }}</p>
@endsection
