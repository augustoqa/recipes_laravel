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
}
