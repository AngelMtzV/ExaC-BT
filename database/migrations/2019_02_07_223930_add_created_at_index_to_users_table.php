<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCreatedAtIndexToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('edad');
            $table->string('domicilio');
            /*Modifica y agrega la llave id_tipoUsuario foranea a la tabla asignatura_cuatrimestre*/
            $table->integer('id_tipoUsuario')->unsigned()->nullable();
            $table->foreign('id_tipoUsuario')->references('id')->on('tipousuarios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('edad');
            $table->dropColumn('domicilio');
            /*hace un drop a la llave foranea id_tipoUsuario si es que ya existe*/
            $table->dropForeign('id_tipoUsuario');
            $table->dropColumn('id_tipoUsuario');
        });
    }
}
