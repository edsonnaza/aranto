<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Iva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iva', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('iva_nombre');
        $table->string('porcentaje');
        $table->string('valor_aritmetico');
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
        Schema::dropIfExists('iva');

    }
}
