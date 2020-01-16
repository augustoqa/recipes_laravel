<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeClass extends Model
{
    protected $fillable = ['description'];

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function isItself(Recipe $recipe)
    {
        return $recipe->recipe_class_id === $this->id;
    }
}
