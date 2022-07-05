<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId')->unsigned();
            $table->integer('blogId')->unsigned();
            $table->text('comment');
            $table->date('date');
            $table->time('time');
            $table->foreign('userID')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreign('blogId')
                ->references('id')->on('blogs')
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
        Schema::dropIfExists('comments');
    }
}
