<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaClasificacionPersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clasificacion_persona', function (Blueprint $table) {
       // $table->bigIncrements('id');    
        $table->unsignedBigInteger('id_clasificacion');
        $table->foreign('id_clasificacion', 'fk_idclasificacion_persona')->references('id')->on('clasificacion')->onDelete('restrict')->onUpdate('restrict');
        $table->unsignedBigInteger('id_persona');
        $table->foreign('id_persona', 'fk_idpersona_clasificacion')->references('id')->on('personas')->onDelete('restrict')->onUpdate('restrict');
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
        
Schema::dropIfExists('clasificacion_persona');

    }
}
