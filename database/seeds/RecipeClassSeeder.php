<?php

use App\RecipeClass;
use Illuminate\Database\Seeder;

class RecipeClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RecipeClass::create(['description' => 'Main course']);
        RecipeClass::create(['description' => 'Vegetable']);
        RecipeClass::create(['description' => 'Starch']);
        RecipeClass::create(['description' => 'Salad']);
    }
}
