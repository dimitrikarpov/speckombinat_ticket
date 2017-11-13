<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TicketTest extends TestCase
{
    use DatabaseMigrations;

    protected $user;
    protected $category;
    protected $ticket;

    public function setUp()
    {
        parent::setUp();

        $this->user = factory('App\User')->create();
        $this->be($this->user);

        $this->category = factory('App\Category')->create(['archived' => false]);

        $this->ticket = factory('App\Ticket')->create([
            'user_id' => $this->user->id,
            'category_id' => $this->category->id
        ]);
    }

    /**
     * @test
     * Route::get('home', 'HomeController@index')
     */
    public function canViewList()
    {
        $this->ticket->status = 'new';
        $this->ticket->save();

        $this->get('/home')->assertSee($this->ticket->phone);
    }

    /**
     * @test
     * Route::get('home/todo', 'HomeController@index')
     */
    public function canViewListinTabTodo()
    {
        $this->ticket->status = 'new';
        $this->ticket->save();

        $this->get('/home/todo')->assertSee($this->ticket->phone);
    }

    /**
     * @test
     * Route::get('home/doing', 'HomeController@index')
     */
    public function canViewListinTabDoingStatusInProgress()
    {
        $this->ticket->status = 'in progress';
        $this->ticket->save();

        $this->get('/home/doing')->assertSee($this->ticket->phone);
    }

    /**
     * @test
     * Route::get('home/doing', 'HomeController@index')
     */
    public function canViewListinTabDoingStatusAwaiting()
    {
        $this->ticket->status = 'awaiting';
        $this->ticket->save();

        $this->get('/home/doing')->assertSee($this->ticket->phone);
    }

    /**
     * @test
     * Route::get('home/done', 'HomeController@index')
     */
    public function canViewListinTabDone()
    {
        $this->ticket->status = 'closed';
        $this->ticket->save();

        $this->get('/home/done')->assertSee($this->ticket->phone);
    }

    /**
     * @test
     * Route::get('ticket/create', 'TicketController@create')
     */
    public function canViewCreateForm()
    {
        $this->get('/ticket/create')->assertStatus(200);
    }

    /**
     * @test
     * Route::post('ticket/store', 'TicketController@store');
     */
    public function canStore()
    {
        $ticket = factory('App\Ticket')->make();

        $this->post(
            '/ticket/store',
            [
                'raised' => $ticket->raised,
                'phone' => $ticket->phone,
                'description' => $ticket->description
            ]
        );

        $this->assertDatabaseHas(
            'tickets',
            [
                'raised' => $ticket->raised,
                'phone' => $ticket->phone,
                'description' => $ticket->description
            ]
        );
    }

    /**
     * @test
     * Route::get('ticket/{ticket}', 'TicketController@show')
     */
    public function canViewSingle()
    {
        $this->get('/ticket/1')->assertSee($this->ticket->phone);
    }

    /**
     * @test
     * Route::get('ticket/{ticket}/edit', 'TicketController@edit')
     */
    public function canViewEditForm()
    {
        $this->get('/ticket/1/edit')->assertSee($this->ticket->phone);
    }

    /**
     * @test
     * Route::post('ticket/{ticket}/update', 'TicketController@update')
     */
    public function canUpdate()
    {
        $this->ticket->raised = 'newname';

        $this->post(
            '/ticket/' . $this->ticket->id . '/update',
            $this->ticket->toArray()
        );

        $this->assertDatabaseHas(
            'tickets',
            [
                'id' => $this->ticket->id,
                'raised' => $this->ticket->raised
            ]
        );
    }
}
