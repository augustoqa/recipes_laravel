<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('recipe_classes')->truncate();

        $this->call(RecipeClassSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}
