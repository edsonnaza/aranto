<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('productos', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('producto_nombre', 192);
        $table->string('producto_descripcion', 192);
        $table->unsignedBigInteger('id_prodcategoriapadre');
        $table->foreign('id_prodcategoriapadre', 'id_categoriapadre_fk')->references('id')->on('categoriapadre')->onDelete('restrict')->onUpdate('restrict');
        $table->unsignedBigInteger('id_categoriahijo');
        $table->foreign('id_categoriahijo', 'id_categoriahijo_fk')->references('id')->on('categoriahijos')->onDelete('restrict')->onUpdate('restrict');
        $table->unsignedBigInteger('id_medidasbasicas');
        $table->foreign('id_medidasbasicas', 'id_medidasbasicas_fk')->references('id')->on('medidas')->onDelete('restrict')->onUpdate('restrict');
        $table->unsignedBigInteger('id_iva');
        $table->foreign('id_iva', 'id_iva_fk')->references('id')->on('iva')->onDelete('restrict')->onUpdate('restrict');      
        $table->boolean('activo')->default(true);
        $table->unsignedBigInteger('sede_id');
        $table->foreign('sede_id', 'producto_sedeid_fk')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('productos');

    }
}
