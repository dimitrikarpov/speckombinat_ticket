<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryFormTest extends TestCase
{
    use DatabaseMigrations;


    public function setUp()
    {
        parent::setUp();

        $this->actingAs(factory('App\User')->create());
    }

    /**
     * @test
     */
    public function createFormValidateName()
    {
        $category = factory('App\Category')->make(['name' => null]);

        $this->post('/category/store', $category->toArray())
            ->assertSessionHasErrors('name');
    }

    /**
     * @test
     */
    public function createFormValidateDescription()
    {
        $category = factory('App\Category')->make(['description' => null]);

        $this->post('/category/store', $category->toArray())
            ->assertSessionHasErrors('description');
    }

    /**
     * @test
     */
    public function updateFormValidateName()
    {
        $category = factory('App\Category')->create();

        $response = $this->post(
            "/category/{$category->id}/update",
            ['name' => null]
        );

        $response->assertSessionHasErrors('name');
    }

    /**
     * @test
     */
    public function updateFormValidateDescription()
    {
        $category = factory('App\Category')->create();

        $response = $this->post(
            "/category/{$category->id}/update",
            ['description' => null]
        );

        $response->assertSessionHasErrors('description');
    }
}
