<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserFormTest extends TestCase
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
    public function validateName()
    {
        $this->createUser(['name' => null])->assertSessionHasErrors('name');
        $this->updateUser(['name' => null])->assertSessionHasErrors('name');
    }

    /**
     * @test
     */
    public function validateEmail()
    {
        $this->createUser(['email' => null])->assertSessionHasErrors('email');
        $this->updateUser(['email' => null])->assertSessionHasErrors('email');
    }

    /**
     * @test
     */
    public function validatePassword()
    {
        $this->createUser(['password' => null])->assertSessionHasErrors('password');
    }

    public function createUser($overrides = [])
    {
        $user = factory('App\User')->make($overrides);

        $response = $this->post('/user/store', $user->toArray());

        return $response;
    }

    public function updateUser($overrides = [])
    {
        $user = factory('App\User')->create();

        $response = $this->post("/user/{$user->id}/update", $overrides);

        return $response;
    }
}
