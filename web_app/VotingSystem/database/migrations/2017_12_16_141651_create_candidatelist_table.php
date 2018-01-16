<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatelistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('candidatelist', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numbervote')->unsigned();
            $table->foreign('numbervote')->references('id')->on('votings');
            $table->string('name');
            $table->string('surname');
            $table->date('born');
            $table->string('school');
            $table->string('fraction');
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
        Schema::dropIfExists('candidatelist');
    }
}
