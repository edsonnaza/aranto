<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaPacientes extends Migration
{
    /**
     * Run the migrations.
     *  protected $fillable = ['id_persona', 'sede_id'];
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('paciente_nombre', 192);
            $table->unsignedBigInteger('id_persona');
            $table->foreign('id_persona', 'idpersona_fk')->references('id')->on('personas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('sede_id');
            $table->foreign('sede_id', 'idsede_fk')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('pacientes');
    }
}
