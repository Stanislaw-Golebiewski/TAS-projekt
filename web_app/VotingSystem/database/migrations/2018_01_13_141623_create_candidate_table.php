<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate', function (Blueprint $table) {
            $table->integer('candidateid')->unsigned();
            $table->foreign('candidateid')->references('id')->on('candidatelist');
            $table->integer('idvote')->unsigned();
            $table->foreign('idvote')->references('id')->on('votings');
            $table->integer('fractionid')->unsigned();
            $table->foreign('fractionid')->references('id')->on('fractions');
            $table->integer('numberonlist');
            $table->integer('votes');
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
         Schema::dropIfExists('candidate');
    }
}
