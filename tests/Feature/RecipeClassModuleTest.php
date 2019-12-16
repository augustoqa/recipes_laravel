<?php

namespace Tests\Feature;

use App\RecipeClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function foo\func;

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
    function it_displays_a_404_error_if_the_recipe_class_not_found()
    {
        $this->get('/recipe-classes/9999')
            ->assertStatus(404)
            ->assertSee('Not Found');
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

    /** @test */
    function it_loads_update_recipe_class_page()
    {
        $this->withoutExceptionHandling();

        $class = factory(RecipeClass::class)->create();

        $this->get("/recipe-classes/{$class->id}/edit")
            ->assertStatus(200)
            ->assertViewIs('recipe_classes.edit')
            ->assertSee("Edit Recipe Class #{$class->id}")
            ->assertViewHas('class', function ($viewClass) use ($class) {
                return $viewClass->id === $class->id;
            });
    }

    /** @test */
    function it_updates_a_recipe_class()
    {
        $this->withoutExceptionHandling();

        $class = factory(RecipeClass::class)->create([
            'description' => 'Main course',
        ]);

        $this->put("/recipe-classes/{$class->id}/update", [
            'description' => 'Vegetable'
        ])->assertRedirect('/recipe-classes');

        $this->assertEquals('Vegetable', $class->fresh()->description);
    }

    /** @test */
    function it_delete_a_recipe_class()
    {
        $this->withoutExceptionHandling();

        $class = factory(RecipeClass::class)->create();

        $this->delete("/recipe-classes/{$class->id}/delete")
            ->assertRedirect('/recipe-classes');

        $this->assertDatabaseMissing('recipe_classes', [
            'id' => $class->id,
            'description' => $class->description,
        ]);
    }
}
