@extends('layouts.app')

@section('title', 'Recipes')

@section('content')
	<h1>Recipes</h1>

	<div class="text-right mb-3">
		<a href="{{ route('recipes.create') }}" class="btn btn-success">Add new Recipe</a>
	</div>

	<div class="row">
	@foreach ($recipes as $recipe)
	<div class="col-sm-6 col-md-4">
		<div class="card mb-3">
			<img src="#" class="card-img-top rounded-0" alt="">
			<div class="card-body">
				<h5 class="card-title">{{ $recipe->title }}</h5>
				<p class="card-text">{{ $recipe->preparation }}</p>
				<footer class="blockquote-footer text-right">{{ $recipe->type->description }}</footer>
				<a href="{{ route('recipes.show', ['recipe' => $recipe]) }}" class="btn btn-outline-primary">
					Details
				</a>
                <a href="{{ route('recipes.edit', ['recipe' => $recipe]) }}" class="btn btn-outline-secondary">
                    Edit
                </a>
			</div>
		</div>
	</div>
	@endforeach
	</div>
@endsection
