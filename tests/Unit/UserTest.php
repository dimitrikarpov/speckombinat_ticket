<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Assume that User can have many tickets
     *
     * @test
     */
    public function hasManyTickets()
    {
        $user = factory('App\User')->create();

        $tickets = factory('App\Ticket', 5)->create([
            'user_id' => $user->id
        ]);

        $this->assertInstanceOf('App\Ticket', $user->tickets->first());
    }
}
