<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numbervote')->unsigned();
            $table->foreign('numbervote')->references('id')->on('votings');
            $table->string('name');
            $table->string('surname');
            $table->integer('born');
            $table->string('school');
            $table->string('fraction');
            $table->integer('numberonlist');
            $table->integer('votes');
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
        Schema::dropIfExists('candidates');
    }
}
