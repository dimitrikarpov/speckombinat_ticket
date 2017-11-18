<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory('App\User')->create();
        $this->be($this->user);
    }

    /**
     * @test
     * Route::get('users', 'UserController@index')
     */
    public function canViewList()
    {
        $this->get('/users')->assertStatus(200);
    }

    /**
     * @test
     * Route::get('user/create', 'UserController@create')
     */
    public function canViewCreateForm()
    {
        $this->get('/user/create')->assertStatus(200);
    }

    /**
     * @test
     * Route::post('user/store', 'UserController@store')
     */
    public function canStore()
    {
        $userData = factory('App\User')->make()->toArray();
        $userData['password'] = 'secret';
        $this->post('/user/store', $userData);

        unset($userData['password']);
        $this->assertDatabaseHas('users', $userData);
    }

    /**
     * @test
     * Route::get('user/{user}/edit', 'UserController@edit')
     */
    public function canViewEditForm()
    {
        $this->get('/user/' . $this->user->id . '/edit')
            ->assertSee($this->user->email);
    }

    /**
     * @test
     * Route::post('user/{user}/update', 'UserController@update')
     */
    public function canUpdate()
    {
        $this->post(
            '/user/' . $this->user->id . '/update',
            [
                'name' => 'newname',
                'email' => $this->user->email,
                'password' => 'secret'
            ]
        );

        $this->assertDatabaseHas(
            'users',
            ['id' => $this->user->id, 'name' => 'newname']
        );
    }

    /**
     * @test
     * Route::get('user/{user}/destroy', 'UserController@destroy')
     */
    public function canDestroy()
    {
        $this->get('/user/' . $this->user->id . '/destroy');

        $this->assertDatabaseMissing(
            'users',
            ['id' => $this->user->id, 'name' => $this->user->name]
        );
    }

    /**
     * @test
     */
    public function guestMayNotParticipateUsers()
    {
        auth()->logout();
        $this->get('/users')->assertRedirect('/login');
        $this->get('/user/create')->assertRedirect('/login');
        $this->post('/user/store')->assertRedirect('/login');
        $this->get('/user/1/edit')->assertRedirect('/login');
        $this->post('/user/1/update')->assertRedirect('/login');
        $this->get('/user/1/destroy')->assertRedirect('/login');
    }
}
