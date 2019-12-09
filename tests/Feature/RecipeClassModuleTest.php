<?php

namespace Tests\Feature;

use App\RecipeClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipeClassModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function list_recipe_classes()
    {
        $this->withoutExceptionHandling();

        factory(RecipeClass::class)->create([
            'description' => 'Main course',
        ]);

        factory(RecipeClass::class)->create([
            'description' => 'Vegetable',
        ]);

        $this->get('/recipe-classes')
            ->assertStatus(200)
            ->assertSee('Main course')
            ->assertSee('Vegetable');
    }

    /** @test */
    function it_show_recipe_class_details() {
        $this->withoutExceptionHandling();

        $class = factory(RecipeClass::class)->create([
            'description' => 'Main course',
        ]);

        $this->get("/recipe-classes/{$class->id}")
            ->assertStatus(200)
            ->assertSee("Detail Recipe Class #{$class->id}")
            ->assertSee('Main course');
    }

    /** @test */
    function it_loads_the_new_recipe_class_page() {
        $this->withoutExceptionHandling();

        $this->get('/recipe-classes/create')
            ->assertStatus(200)
            ->assertSee('Create a new Recipe Class');
    }

    /** @test */
    function it_creates_a_new_recipe_class()
    {
        $this->withoutExceptionHandling();

        $this->post('/recipe-classes', [
            'description' => 'Main course'
        ])->assertRedirect('/recipe-classes');

        $this->assertDatabaseHas('recipe_classes', [
            'description' => 'Main course',
        ]);
    }
}
