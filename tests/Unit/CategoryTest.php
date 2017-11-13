<?php

namespace Tests\Unit;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Assume that Category may have many tickets
     *
     * @test
     */
    public function hasManyTickets()
    {
        $category = factory('App\Category')->create();
        $tickets = factory('App\Ticket', 5)->create(['category_id' => $category->id]);

        $this->assertInstanceOf('App\Ticket', $category->tickets->first());
    }

    /**
     * Testing Model Scope that filter not archived categories
     *
     * @test
     */
    public function scopeNotArchived()
    {
        $categories = factory('App\Category', 5)->create(['archived' => false]);
        $actual = Category::notArchived();

        $this->assertEquals($categories->count(), $actual->count());
    }
}
