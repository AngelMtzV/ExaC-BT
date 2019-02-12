<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('pregunta', 500);
            $table->string('opcion1', 500);
            $table->string('opcion2', 500);
            $table->string('opcion3', 500);
            $table->string('opcion4', 500);
            $table->integer('respuesta');
            $table->integer('id_examen')->unsigned()->nullable();
            $table->foreign('id_examen')->references('id')->on('examens')->onDelete('set null'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preguntas');
        /*hace un drop a la llave foranea id_examen si es que ya existe*/
            $table->dropForeign('id_examen');
            $table->dropColumn('id_examen');
    }
}
