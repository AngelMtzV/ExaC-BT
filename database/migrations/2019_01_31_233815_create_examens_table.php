<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examens', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre');
            $table->integer('no_preguntas');
            $table->date('fecha_inicio');
            $table->integer('tiempo');
            /*Modifica y agrega la llave id_usuario foranea a la tabla asignatura_cuatrimestre*/
            $table->integer('id_usuario')->unsigned()->nullable();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examens');
        /*hace un drop a la llave foranea id_usuario si es que ya existe*/
        $table->dropForeign('id_usuario');
        $table->dropColumn('id_usuario');
    }
}
