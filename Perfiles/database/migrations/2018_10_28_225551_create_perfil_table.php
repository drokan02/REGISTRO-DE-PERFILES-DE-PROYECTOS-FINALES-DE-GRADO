<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('modalidad_id')->unsigned();
            $table->integer('docente_id')->unsigned();
            $table->integer('director_id')->unsigned();
            $table->integer('area_id')->unsigned();
            $table->integer('subarea_id')->unsigned()->nullable();
            $table->string('titulo',200);
            $table->string('institucion',200)->nullable();
            $table->string('sec_trabajo',200)->nullable();
            $table->string('objetivo_gen',1024);
            $table->string('objetivo_esp',1024);
            $table->string('descripcion',1024);
            $table->string('trabajo_conjunto',10)->nullable();
            $table->string('cambio_tema',10)->nullable();
            $table->date('fecha_ini');
            $table->date('fecha_fin');
            $table->string('estado',100)->nullable();
            $table->foreign('modalidad_id')->references('id')->on('modalidad')->onDelete('cascade');
            $table->foreign('docente_id')->references('id')->on('docente')->onDelete('cascade');
            $table->foreign('director_id')->references('id')->on('docente')->onDelete('cascade');
            $table->foreign('area_id')->references('id')->on('area')->onDelete('cascade');
            $table->foreign('subarea_id')->references('id')->on('area')->onDelete('cascade');

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
        Schema::dropIfExists('perfil');
    }
}
