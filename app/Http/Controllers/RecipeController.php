<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\RecipeClass;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index()
    {
        return view('recipes.index')
            ->with('recipes', Recipe::all());
    }

    public function show(Recipe $recipe)
    {
        return view('recipes.show', compact('recipe'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'recipe_class_id' => 'required|exists:recipe_classes,id',
            'preparation' => 'required'
        ]);

        Recipe::create($request->all());

        return response()->redirectToRoute('recipes');
    }

    public function create()
    {
        return view('recipes.create')->with('types', RecipeClass::all());
    }

    public function edit(Recipe $recipe)
    {
        return view('recipes.edit')
            ->with('recipe', $recipe)
            ->with('types', RecipeClass::all());
    }

    public function update(Recipe $recipe)
    {
        $recipe->update(request()->all());

        return response()->redirectToRoute('recipes');
    }

    public function delete(Recipe $recipe)
    {
        $recipe->delete();

        return response()->redirectToRoute('recipes');
    }
}
