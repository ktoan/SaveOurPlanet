<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creater')->unsigned();
            $table->string('name');
            $table->string('introduction');
            $table->string('description');
            $table->text('content');
            $table->double('goal');
            $table->double('now')->default(0);
            $table->integer('noMembers')->default(0);
            $table->string('imageSource');
            $table->date('dateCreate');
            $table->integer('status')->default(0);
            $table->foreign('creater')
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
        Schema::dropIfExists('projects');
    }
}
