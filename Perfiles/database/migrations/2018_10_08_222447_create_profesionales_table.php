<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesionales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ci_prof');
            $table->string('nombre_prof');
            $table->string('ap_pa_prof');
            $table->string('ap_ma_prof');
            $table->string('correo_prof');
            $table->int('telef_prof');
            $table->string('direc_prof');
            $table->string('perfil_prof');
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

        Schema::drop('profesionales');
    }
}
