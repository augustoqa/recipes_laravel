<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'title',
        'preparation',
        'notes',
        'recipe_class_id',
    ];

    public function type()
    {
        return $this->belongsTo(RecipeClass::class, 'recipe_class_id');
    }
}
