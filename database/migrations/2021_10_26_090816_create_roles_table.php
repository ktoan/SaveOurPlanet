<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role', 30)->unique();
            $table->integer('searchInfo')->default(0);
            $table->integer('viewMess')->default(0);
            $table->integer('sendMail')->default(0);
            $table->integer('addSlider')->default(0);
            $table->integer('manageSlider')->default(0);
            $table->integer('browseSlider')->default(0);
            $table->integer('addImage')->default(0);
            $table->integer('manageImage')->default(0);
            $table->integer('browseImage')->default(0);
            $table->integer('addEvent')->default(0);
            $table->integer('manageEvent')->default(0);
            $table->integer('browseEvent')->default(0);
            $table->integer('addBlog')->default(0);
            $table->integer('manageBlog')->default(0);
            $table->integer('browseBlog')->default(0);
            $table->integer('addProject')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
