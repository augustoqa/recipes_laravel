<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class RecipeClassController extends Controller
{
    public function index()
    {
        $classes = DB::select('select * from `recipe_classes`');

        return view('recipe_classes.index', compact('classes'));
    }

    public function show($id)
    {
        $class = DB::select('select * from `recipe_classes` WHERE `id` = ?', [$id])[0];

        return view('recipe_classes.show', compact('class')) ;
    }
}
