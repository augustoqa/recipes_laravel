@extends('layouts.app')

@section('title', 'Create Recipe Class')

@section('content')
    <h1>Create a new Recipe Class</h1>

    <form method="POST" action="{{ route('recipe-classes.store') }}">
        {{ csrf_field() }}

        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Description">
            @if($errors->has('description'))
            <div class="alert alert-danger">
                {{ $errors->first('description') }}
            </div>
            @endif
        </div>

        <input type="submit" value="Save">
    </form>
@endsection
