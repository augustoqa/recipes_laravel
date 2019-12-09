@extends('layouts.app')

@section('title', 'Create Recipe Class')

@section('content')
    <h1>Create a new Recipe Class</h1>

    <form method="POST" action="/recipe-classes">
        {{ csrf_field() }}

        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" placeholder="Description">
        </div>

        <input type="submit" value="Save">
    </form>
@endsection
