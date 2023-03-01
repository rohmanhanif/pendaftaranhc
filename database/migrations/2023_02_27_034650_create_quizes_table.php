<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->timestamps();
            $table->integer('group_id')->nullable();
            $table->text('quiz')->nullable();
            $table->text('opsi1')->nullable();
            $table->text('opsi2')->nullable();
            $table->text('opsi3')->nullable();
            $table->text('opsi4')->nullable();
            $table->integer('answer')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quizes');
    }
}
