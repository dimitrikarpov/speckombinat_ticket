<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;
    protected $category;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory('App\User')->create();
        $this->be($this->user);

        $this->category = factory('App\Category')->create();
    }

    /**
     * @test
     * Route::get('categories', 'CategoryController@index')
     */
    public function canViewList()
    {
        $this->get('/categories')->assertSee($this->category->name);
    }

    /**
     * @test
     * Route::get('category/create', 'CategoryController@create')
     */
    public function canViewCreateForm()
    {
        $this->get('/category/create')->assertStatus(200);
    }

    /**
     * @test
     * Route::post('category/store', 'CategoryController@store')
     */
    public function canStore()
    {
        $category = factory('App\Category')->make();

        $this->post('/category/store', $category->toArray());

        $this->assertDatabaseHas('categories', $category->toArray());
    }

    /**
     * @test
     * Route::get('category/{category}/edit', 'CategoryController@edit')
     */
    public function canViewEditForm()
    {
        $this->get('/category/' . $this->category->id . '/edit')
            ->assertSee($this->category->description);
    }

    /**
     * @test
     * Route::post('category/{category}/update', 'CategoryController@update')
     */
    public function canUpdate()
    {
        $this->category->name = 'newname';

        $this->post(
            '/category/' . $this->category->id . '/update',
            $this->category->toArray()
        );

        $this->assertDatabaseHas('categories', $this->category->toArray());
    }

    /**
     * @test
     * Route::get('category/{category}/destroy', 'CategoryController@destroy')
     */
    public function canDestroy()
    {
        $this->get('/category/' . $this->category->id . '/destroy');

        $this->assertDatabaseMissing('categories', $this->category->toArray());
    }
}
