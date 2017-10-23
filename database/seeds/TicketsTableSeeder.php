<?php

use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Ticket', 100)->create();
    }
}
