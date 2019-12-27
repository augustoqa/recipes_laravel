@extends('layouts.app')

@section('title', 'Update Recipe')

@section('content')
    <h1>Update Recipe: {{ $recipe->title }}</h1>

    <form method="post" action="{{ route('recipes.update', ['recipe' => $recipe]) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PATCH">
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $recipe->title }}">
        </div>
        <div>
            <label for="type">Class of Recipe</label>
            <select name="types" id="type">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}" {{ $type->id === $recipe->recipe_class_id ? 'selected' : '' }}>
                        {{ $type->description }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="preparation">Preparation</label>
            <textarea name="preparation" id="preparation" cols="40" rows="5">{{ $recipe->preparation }}</textarea>
        </div>
        <div>
            <label for="notes">Notes</label>
            <textarea name="notes" id="notes" cols="40" rows="5">{{ $recipe->notes }}</textarea>
        </div>
        <div>
            <button type="submit">Update</button>
        </div>
    </form>
@endsection
