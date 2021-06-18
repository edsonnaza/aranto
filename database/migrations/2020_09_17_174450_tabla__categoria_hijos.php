<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaCategoriaHijos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
            Schema::create('categoriahijos', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->unsignedBigInteger('id_categoriapadre')->nullable();
                $table->foreign('id_categoriapadre', 'fk_idcategoriapadre')->references('id')->on('categoriapadre')->onDelete('restrict')->onUpdate('restrict');
                $table->string('nombre_categoriahijo',100);
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
        Schema::dropIfExists('categoriahijos');

    }
}
