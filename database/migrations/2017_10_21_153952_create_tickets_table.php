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
            $table->integer('user_id')->nullable()->default(null)->comment('issue assigned to');
            $table->integer('category_id')->nullable()->default(null)->comment('issue category');
            $table->enum('status', ['new', 'in progress', 'awaiting', 'closed'])->default('new');
            $table->text('notes')->nullable()->default(null);
            $table->timestamps();
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
