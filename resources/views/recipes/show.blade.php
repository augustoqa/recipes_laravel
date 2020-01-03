@extends('layouts.app')

@section('title', 'Recipe detail')

@section('content')
    <div class="card">
        <h5 class="card-header">
            {{ $recipe->title }}
            <a href="{{ route('recipes') }}" class="btn btn-primary float-right">Return to list of Recipes</a>
        </h5>
        <div class="card-body">
            <h6>Peparation</h6>
            <p>{{ $recipe->preparation }}</p>

            <hr>

            <h6>Notes</h6>
            <p>{{ $recipe->notes }}</p>

            <hr>

            <p class="card-text text-right"><small class="text-muted">{{ $recipe->type->description }}</small></p>
        </div>
    </div>
@endsection
