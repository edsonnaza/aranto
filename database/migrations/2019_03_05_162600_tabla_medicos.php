<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaMedicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('medico_nombre', 192);
            $table->string('registro_profesional', 192);          
            $table->unsignedBigInteger('id_persona');
            $table->foreign('id_persona', 'id_personamedico_fk')->references('id')->on('personas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_especialidad');
            $table->foreign('id_especialidad', 'idespecialidad_fk')->references('id')->on('especialidad')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('sede_id');
            $table->foreign('sede_id', 'id_sede_fk')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
}
