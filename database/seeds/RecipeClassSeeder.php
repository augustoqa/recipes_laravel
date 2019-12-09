<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('INSERT INTO `recipe_classes`(`description`) VALUES(?)', ['Main course']);

        DB::insert('INSERT INTO `recipe_classes` SET `description` = :description', ['description' => 'Vegetable']);

        DB::table('recipe_classes')->insert(['description' => 'Starch']);
    }
}
