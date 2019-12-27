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
}
