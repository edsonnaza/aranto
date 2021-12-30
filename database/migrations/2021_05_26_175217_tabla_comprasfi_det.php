<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaComprasfiDet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprasfi_det', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->unsignedBigInteger('id_apertura');
    $table->foreign('id_apertura', 'id_aperturafidet_fk')->references('id')->on('comprasfi_cab')->onDelete('restrict')->onUpdate('restrict');
    $table->unsignedBigInteger('id_producto');
    $table->foreign('id_producto', 'id_productofidet_fk')->references('id')->on('productos')->onDelete('restrict')->onUpdate('restrict');
    //$table->unsignedBigInteger('id_prodcategoriapadre');
    //$table->foreign('id_prodcategoriapadre', 'id_prodcategoriapadredet_fk')->references('id')->on('categoriapadre')->onDelete('restrict')->onUpdate('restrict');
    $table->unsignedBigInteger('id_medidas');
    $table->foreign('id_medidas', 'id_medidasdet_fk')->references('id')->on('medidas')->onDelete('restrict')->onUpdate('restrict');
    $table->double('cantidad', 15, 4);
    $table->double('precio_compra', 15, 4);
    $table->double('precio_venta', 15, 4);
    $table->double('total_precio_compra', 15, 4);
    $table->double('total_precio_venta', 15, 4);   
    $table->integer('id_usuariocreado')->nullable();
    $table->string('usuario_creado', 192)->nullable();
   
    $table->integer('id_usuarioactualizo')->nullable();
    $table->string('usuario_actualizo', 192)->nullable();

    $table->string('eliminado')->default('NO');
    $table->integer('id_usuarioelimino')->nullable();
    $table->string('usuario_elimino', 192)->nullable();

    $table->unsignedBigInteger('sede_id');
    $table->foreign('sede_id', 'comprasfidetsedeid_fk')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('comprasfi_det');

    }
}
