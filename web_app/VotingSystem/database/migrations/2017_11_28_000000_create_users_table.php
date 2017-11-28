<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('whovote')->unsigned();
            $table->string('name');
            $table->string('surname');
            $table->integer('born');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('passport');
            $table->boolean('voted');
            $table->foreign('whovote')->references('id')->on('candidates');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
