<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionalAreaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesional_area', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('profesional_id')->unsigned();
            $table->integer('area_id')->unsigned();
            $table->foreign('profesional_id')->references('id')->on('profesional')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('area')->onDelete('cascade');
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
        Schema::dropIfExists('profesional_area');
    }
}
