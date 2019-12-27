<?php

namespace Tests\Feature;

use App\Recipe;
use App\RecipeClass;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecipeModuleTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    function it_list_recipes()
    {
        $recipeClass = factory(RecipeClass::class)->create([
            'description' => 'Main course'
        ]);

        $recipe1 = factory(Recipe::class)->create([
            'title' => 'Irish Stew',
            'recipe_class_id' => $recipeClass->id,
        ]);

        $recipe2 = factory(Recipe::class)->create([
            'title' => 'Salsa Buena',
            'recipe_class_id' => $recipeClass->id,
        ]);

        $this->get(route('recipes'))
            ->assertStatus(200)
            ->assertViewIs('recipes.index')
            ->assertSee("Recipes")
            ->assertSee("Irish Stew")
            ->assertSee("Salsa Buena")
            ->assertSee('Main course');
    }

    /** @test */
    function it_loads_the_page_to_create_a_new_recipe() {
        $this->get(route('recipes.create'))
            ->assertStatus(200)
            ->assertViewIs('recipes.create')
            ->assertViewHas('types');
    }

    /** @test */
    function it_creates_a_new_recipe()
    {
        $recipeClass = factory(RecipeClass::class)->create();

        $this->post(route('recipes.store'), [
            'title' => 'Description of recipe',
            'preparation' => 'Instructions of preparation',
            'notes' => 'Some notes',
            'recipe_class_id' => $recipeClass->id,
        ])->assertRedirect('recipes');

        $this->assertDatabaseHas('recipes', [
            'title' => 'Description of recipe',
            'preparation' => 'Instructions of preparation',
            'notes' => 'Some notes',
            'recipe_class_id' => $recipeClass->id,
        ]);
    }

    /** @test */
    function it_show_a_recipe_detail() {
        $recipe = factory(Recipe::class)->create([
            'title' => 'Irish Stew',
        ]);

        $this->get(route('recipes.show', ['recipe' => $recipe->id]))
            ->assertStatus(200)
            ->assertViewIs('recipes.show')
            ->assertSee($recipe->title)
            ->assertSee($recipe->preparation)
            ->assertSee($recipe->type->description);
    }

    /** @test */
    function it_display_error_page_if_the_recipe_doesnt_exist() {
        $this->withExceptionHandling();

        $this->get(route('recipes.show', ['recipe' => 'hello']))
            ->assertStatus(404)
            ->assertSee('Not Found');
    }

    /** @test */
    function it_loads_update_recipe_page()
    {
        $recipe = factory(Recipe::class)->create();

        $this->get(route('recipes.edit', ['recipe' => $recipe]))
            ->assertStatus(200)
            ->assertSee("Update Recipe: {$recipe->title}")
            ->assertViewIs('recipes.edit')
            ->assertViewHas('recipe', function ($viewRecipe) use ($recipe) {
                return $viewRecipe->id === $recipe->id;
            });
    }

    /** @test */
    function if_update_a_recipe()
    {
        $recipe = factory(Recipe::class)->create([
            'title' => 'Salsa Buena',
            'preparation' => 'Preparation of Salsa Buena',
            'notes' => 'Some notes of Salsa Buena',
        ]);

        $newRecipeClass = factory(RecipeClass::class)->create();

        $this->from(route('recipes.edit', ['recipe' => $recipe]))
            ->patch(route('recipes.update', ['recipe' => $recipe]), [
                'title' => 'Salsa Mala',
                'preparation' => 'Preparation of Salsa Mala',
                'notes' => 'Some notes of Salsa Mala',
                'recipe_class_id' => $newRecipeClass->id
            ])->assertRedirect('recipes');

        $this->assertDatabaseHas('recipes', [
            'id' => $recipe->id,
            'title' => 'Salsa Mala',
            'preparation' => 'Preparation of Salsa Mala',
            'recipe_class_id' => $newRecipeClass->id
        ]);
    }

    /** @test */
    function it_deletes_a_recipe()
    {
        $recipe = factory(Recipe::class)->create();

        $this->delete(route('recipes.delete', ['recipe' => $recipe]))
            ->assertRedirect('recipes');

        $this->assertDatabaseMissing('recipes', [
            'id' => $recipe->id,
            'title' => $recipe->title
        ]);
    }
}
