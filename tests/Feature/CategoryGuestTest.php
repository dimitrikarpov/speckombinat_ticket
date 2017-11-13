<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryGuestTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     * Route::get('categories', 'CategoryController@index')
     */
    public function canNotListCategories()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/categories')->assertStatus(200);
    }

    /**
     * @test
     * Route::get('category/create', 'CategoryController@create')
     */
    public function canNotViewAddForm()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/category/create');
    }

    /**
     * @test
     * Route::post('category/store', 'CategoryController@store')
     */
    public function canNotAddCategories()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('/category/store');
    }

    /**
     * @test
     * Route::get('category/{category}/edit', 'CategoryController@edit')
     */
    public function canNotViewEditForm()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/category/1/edit');
    }

    /**
     * @test
     * Route::post('category/{category}/update', 'CategoryController@update')
     */
    public function canNotUpdate()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('/category/1/update');
    }

    /**
     * @test
     * Route::get('category/{category}/destroy', 'CategoryController@destroy')
     */
    public function canNotDelete()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/category/1/destroy');
    }
}
