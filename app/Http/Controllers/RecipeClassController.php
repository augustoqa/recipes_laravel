<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeClassController extends Controller
{
    public function index()
    {
        $classes = ['Main course', 'Vegetable'];

        return view('recipe_classes.index', compact('classes'));
    }

    public function show($id)
    {
        return view('recipe_classes.show', compact('id')) ;
    }
}
