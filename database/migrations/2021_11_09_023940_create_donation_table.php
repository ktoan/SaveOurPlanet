<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('useId')->unsigned();
            $table->integer('projectId')->unsigned()->nullable();
            $table->string('typeProduct');
            $table->text('desc');
            $table->string('typeCheckout');
            $table->double('amout');
            $table->date('date');
            $table->time('time');
            $table->foreign('useId')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('projectId')
                ->references('id')->on('projects')
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
        Schema::table('donation', function (Blueprint $table) {
            //
        });
    }
}