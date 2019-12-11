@extends('layouts.app')

@section('title', 'Classes')

@section('content')
    <h1>Recipe Classes</h1>



    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Description</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($classes as $class)
            <tr>
                <td>{{ $class->id }}</td>
                <td>
                    <a href="{{ route('recipe-classes.show', ['id' => $class->id]) }}">
                        {{ $class->description }}
                    </a>
                </td>
                <td>
                    <form method="POST" action="{{ route('recipe-classes.delete', ['id' => $class->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <a href="{{ route('recipe-classes.edit', ['id' => $class->id]) }}" class="btn btn-outline-secondary btn-sm">
                            <span class="oi oi-pencil"></span>
                        </a>
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            <span class="oi oi-trash"></span>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
