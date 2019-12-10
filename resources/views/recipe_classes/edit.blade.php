@extends('layouts.app')

@section('title', "Edit Recipe Class #{$class->id}")

@section('content')
    <h1>Edit Recipe Class #{{ $class->id }}</h1>

    <form method="PUT" action="/recipe-classes/{{ $class->id }}/update">
        {{ method_field('PUT') }}
        {{ csrf_token() }}

        <div>
            <label for="description">Description</label>
            <input type="text" name="description" value="{{ $class->description }}" id="description">
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
