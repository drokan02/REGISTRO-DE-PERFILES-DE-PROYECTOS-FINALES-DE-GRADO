<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudianteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombres',30);
            $table->string('email',30)->unique();
            $table->string('user_name',30)->unique();
            $table->string('password',500);
            $table->integer('telefono')->unisgned()->unique();
            $table->integer('carrera_id')->unsigned();
            $table->foreign('carrera_id')->references('id')->on('carrera')->onDelete('cascade');

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
        Schema::dropIfExists('estudiante');
    }
}
