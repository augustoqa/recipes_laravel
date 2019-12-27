@extends('layouts.app')

@section('title', 'Create a new Recipe')

@section('content')
    <h1>Create a new Recipe</h1>

    <form method="post" action="{{ route('recipes.store') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="type">Class of Recipe</label>
            <select name="types" id="type">
            @foreach ($types as $type)
                <option value="{{ $type->id }}">{{ $type->description }}</option>
            @endforeach
            </select>
        </div>
        <div>
            <label for="preparation">Preparation</label>
            <textarea name="preparation" id="preparation" cols="40" rows="5"></textarea>
        </div>
        <div>
            <label for="notes">Notes</label>
            <textarea name="notes" id="notes" cols="40" rows="5"></textarea>
        </div>
        <div>
            <button type="submit">Save</button>
        </div>
    </form>
@endsection
