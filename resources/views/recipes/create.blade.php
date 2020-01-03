@extends('layouts.app')

@section('title', 'Create a new Recipe')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Create a new Recipe</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('recipes.store') }}">
                <div class="form-row">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>
                    <div class="form-group col-sm-12 col-md-6">
                        <label for="type">Class of Recipe</label>
                        <select name="types" id="type" class="form-control">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->description }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="preparation">Preparation</label>
                        <textarea name="preparation" id="preparation" cols="40" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="notes">Notes</label>
                        <textarea name="notes" id="notes" cols="40" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-outline-primary">Save Recipe</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
