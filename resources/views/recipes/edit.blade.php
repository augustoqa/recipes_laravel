@extends('layouts.app')

@section('title', 'Update Recipe')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Update Recipe: {{ $recipe->title }}</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('recipes.update', ['recipe' => $recipe]) }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PATCH">
                <div class="form-row">
                    @include('recipes._fields')
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-outline-primary">Update Recipe</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
