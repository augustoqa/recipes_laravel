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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        DB::table('recipes')->truncate();
        DB::table('recipe_classes')->truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $this->call(RecipeClassSeeder::class);
        $this->call(RecipeSeeder::class);
    }
}
