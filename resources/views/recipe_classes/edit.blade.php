@extends('layouts.app')

@section('title', "Edit Recipe Class #{$class->id}")

@section('content')
    <h1>Edit Recipe Class #{{ $class->id }}</h1>

    <form method="POST" action="{{ route('recipe-classes.update', ['id' => $class->id]) }}">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <div>
            <label for="description">Description</label>
            <input type="text" name="description" value="{{ $class->description }}" id="description">
        </div>

        <button type="submit">Update</button>
    </form>
@endsection
