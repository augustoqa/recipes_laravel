@extends('layouts.app')

@section('title', 'Create a new Recipe')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Create a new Recipe</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('recipes.store') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-row">
                    @include('recipes._fields')
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-outline-primary">Save Recipe</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
