<?php

namespace App\Http\Controllers;

use App\RecipeClass;
use Illuminate\Http\Request;

class RecipeClassController extends Controller
{
    public function index()
    {
        return view('recipe_classes.index')
            ->with('classes', RecipeClass::all());
    }

    public function show($id)
    {
        $class = RecipeClass::findOrFail($id);

        return view('recipe_classes.show', compact('class')) ;
    }

    public function create()
    {
        return view('recipe_classes.create');
    }

    public function store()
    {
        request()->validate([
            'description' => 'required',
        ]);

        RecipeClass::create(request()->all());

        return response()->redirectToRoute('recipe-classes');
    }

    public function edit($id)
    {
        $class = RecipeClass::findOrFail($id);

        return view('recipe_classes.edit', compact('class'));
    }

    public function update($id)
    {
        RecipeClass::whereId($id)
            ->update(['description' => request('description')]);

        return response()->redirectToRoute('recipe-classes');
    }

    public function delete($id)
    {
        RecipeClass::whereId($id)->delete();

        return response()->redirectToRoute('recipe-classes');
    }
}
