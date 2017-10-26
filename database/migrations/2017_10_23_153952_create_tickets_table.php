<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('raised')->comment('person which raised this issue ticket');
            $table->string('phone', 15);
            $table->text('description')->comment('issue descritption');
            $table->enum('priority', ['low', 'normal', 'high'])->default('normal');
            $table->integer('user_id')->unsigned()->nullable()->default(null);
            $table->integer('category_id')->unsigned()->nullable()->default(null);
            $table->enum('status', ['new', 'in progress', 'awaiting', 'closed'])->default('new');
            $table->text('notes')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::table('tickets', function($table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
