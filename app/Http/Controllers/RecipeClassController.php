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

    public function create()
    {
        return view('recipe_classes.create');
    }

    public function store()
    {
        DB::table('recipe_classes')->insert([
            'description' => request()->get('description')
        ]);

        return response()->redirectTo('/recipe-classes');
    }

    public function edit($id)
    {
        $class = DB::table('recipe_classes')->where('id', $id)->get()[0];

        return view('recipe_classes.edit', compact('class'));
    }

    public function update($id)
    {
        DB::table('recipe_classes')
            ->where('id', $id)
            ->update([
                'description' => request('description')
            ]);

        return response()->redirectTo('/recipe-classes');
    }
}
