<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('introduction');
            $table->text('content');
            $table->time('time');
            $table->date('date');
            $table->string('location');
            $table->integer('noMembers')->default(0);
            $table->date('dateCreate');
            $table->integer('createrId')->unsigned();
            $table->string('imageSource');
            $table->integer('status')->default(0);
            $table->foreign('createrId')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
