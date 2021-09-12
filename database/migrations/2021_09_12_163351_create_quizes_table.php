<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizes', function (Blueprint $table) {
            $table->bigIncrements('quz_id');
            $table->string('title');
            $table->string('description');
            $table->integer('level');
            $table->integer('duration');
            $table->integer('question_num');
            $table->integer('price');
            $table->integer('timer');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('cat_id')->on('categories');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id')->references('ski_id')->on('skills');
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
        Schema::dropIfExists('quizes');
    }
}
