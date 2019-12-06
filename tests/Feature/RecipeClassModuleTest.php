<?php

namespace Tests\Feature;

use App\RecipeClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RecipeClassModuleTest extends TestCase
{
    /** @test */
    function list_recipe_classes()
    {
        $this->withoutExceptionHandling();

        $this->get('/recipe-classes')
            ->assertStatus(200)
            ->assertSee('Main course')
            ->assertSee('Vegetable');
    }

    /** @test */
    function it_show_recipe_class_details() {
        $this->withoutExceptionHandling();
        
        $this->get('/recipe-classes/2')
            ->assertStatus(200)
            ->assertSee('Detail Recipe Class #2')
            ->assertSee('Main course');
    }
}
