<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('usuario', 50)->unique();
            $table->string('password', 100);
            $table->string('nombre', 50);
            $table->string('foto', 100)->nullable();
            $table->string('email', 100)->unique();
            $table->unsignedBigInteger('sede_id');      
            $table->foreign('sede_id', 'sede_id_fk')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_persona');
            $table->foreign('id_persona', 'fk_id_persona')->references('id')->on('personas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_medico')->nullable();      
            $table->foreign('id_medico', 'id_medicofk')->references('id')->on('medicos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('usuario');
    }
}
