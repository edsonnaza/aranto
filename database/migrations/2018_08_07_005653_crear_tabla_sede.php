<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaSede extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_sede', 100)->unique();
            $table->string('direccion', 190);
            $table->string('foto_sede',100)->nullable();       
            $table->string('ruc', 20)->nullable();
            $table->string('telefono', 20)->nullable();
            $table->string('email', 100)->unique();
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
          Schema::dropIfExists('sedes');
    }
}
