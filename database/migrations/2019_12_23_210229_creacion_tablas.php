<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreacionTablas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('users', function (Blueprint $t) {
            $t->increments('id');
            $t->string('role', 255);
            $t->string('name', 255);
            $t->string('surname', 200);
            $t->string('nick', 100);
            $t->string('email', 255);
            $t->string('password', 255);
            $t->string('image', 255);
            $t->rememberToken();
            $t->timestamps();
            $t->charset = 'utf8';
            $t->collation = 'utf8_general_ci';
            $t->engine = 'InnoDB';
        });


        Schema::create('images', function (Blueprint $t) {
            $t->increments('id');
            $t->integer('user_id')->unsigned();
            $t->foreign('user_id')->references('id')->on('users');
            $t->string('image_path', 255);
            $t->text('description');
            $t->timestamps();
            $t->charset = 'utf8';
            $t->collation = 'utf8_general_ci';
            $t->engine = 'InnoDB';
        });


        Schema::create('comments', function (Blueprint $t) {
            $t->increments('id');
            $t->integer('user_id')->unsigned();
            $t->foreign('user_id')->references('id')->on('users');
            $t->integer('image_id')->unsigned();
            $t->foreign('image_id')->references('id')->on('images');
            $t->text('content');
            $t->timestamps();
            $t->charset = 'utf8';
            $t->collation = 'utf8_general_ci';
            $t->engine = 'InnoDB';
        });


        Schema::create('likes', function (Blueprint $t) {
            $t->increments('id');
            $t->integer('user_id')->unsigned();
            $t->foreign('user_id')->references('id')->on('users');
            $t->integer('image_id')->unsigned();
            $t->foreign('image_id')->references('id')->on('images');
            $t->timestamps();
            $t->charset = 'utf8';
            $t->collation = 'utf8_general_ci';
            $t->engine = 'InnoDB';
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('images');
        Schema::dropIfExists('users');
    }
}
