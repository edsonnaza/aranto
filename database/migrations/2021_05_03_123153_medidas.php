<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Medidas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('medidas', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('nombre_unidad_basica',100);
        $table->string('simbolo',10);
        $table->string('magnitud',100);
        $table->string('descripcion',100);
        $table->boolean('activo')->default(true);
        $table->integer('sede_id');
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
        Schema::dropIfExists('medidas');

    }
}
