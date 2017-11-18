<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TicketFormTest extends TestCase
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
    public function validateAddFormAsGuest()
    {
        auth()->logout();

        $this->createTicket(['raised' => null])->assertSessionHasErrors('raised');
        $this->createTicket(['phone' => null])->assertSessionHasErrors('phone');
        $this->createTicket(['description' => null])->assertSessionHasErrors('description');
        $this->createTicket(['category_id' => 999])->assertSessionHasErrors('category_id');
    }

    /**
     * @test
     */
    public function validateAddFormAsUser()
    {
        $this->createTicket(['raised' => null])->assertSessionHasErrors('raised');
        $this->createTicket(['phone' => null])->assertSessionHasErrors('phone');
        $this->createTicket(['description' => null])->assertSessionHasErrors('description');
        $this->createTicket(['category_id' => 999])->assertSessionHasErrors('category_id');
        $this->createTicket(['status' => 'foo'])->assertSessionHasErrors('status');
        $this->createTicket(['priority' => 'foo'])->assertSessionHasErrors('priority');
        $this->createTicket(['user_id' => 999])->assertSessionHasErrors('user_id');
        $this->createTicket(['notes' => 10])->assertSessionHasErrors('notes');
    }

    /**
     * @test
     */
    public function validateUpdateFormAsUser()
    {
        $this->updateTicket(['raised' => null])->assertSessionHasErrors('raised');
        $this->updateTicket(['phone' => null])->assertSessionHasErrors('phone');
        $this->updateTicket(['description' => null])->assertSessionHasErrors('description');
        $this->updateTicket(['category_id' => 999])->assertSessionHasErrors('category_id');
        $this->updateTicket(['status' => null])->assertSessionHasErrors('status');
        $this->updateTicket(['status' => 'foo'])->assertSessionHasErrors('status');
        $this->updateTicket(['priority' => null])->assertSessionHasErrors('priority');
        $this->updateTicket(['priority' => 'foo'])->assertSessionHasErrors('priority');
        $this->updateTicket(['user_id' => 999])->assertSessionHasErrors('user_id');
        $this->createTicket(['notes' => 10])->assertSessionHasErrors('notes');
    }

    public function createTicket($overrides = [])
    {
        $ticket = factory('App\Ticket')->make($overrides);

        $response = $this->post('/ticket/store', $ticket->toArray());

        return $response;
    }

    public function updateTicket($overrides = [])
    {
        $ticket = factory('App\Ticket')->create();

        $response = $this->post("/ticket/{$ticket->id}/update", $overrides);

        return $response;
    }
}
