@extends('layouts.app')

@section('title', 'Recipes')

@section('content')
	<h1>Recipes</h1>

	@foreach ($recipes as $recipe)
	<p>
		{{ $recipe->id }} - {{ $recipe->title }} - {{ $recipe->type->description }}
	</p>	
	@endforeach
@endsection
