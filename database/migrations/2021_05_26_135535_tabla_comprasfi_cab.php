<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaComprasfiCab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
           Schema::create('comprasfi_cab', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_unidad_origen');
            $table->foreign('id_unidad_origen', 'id_unidadfiorigenfi_fk')->references('id')->on('unidad')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_unidad_destino');
            $table->foreign('id_unidad_destino', 'id_unidaddestinofi_fk')->references('id')->on('unidad')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_proveedor');
            $table->foreign('id_proveedor', 'id_proveedorfi_fk')->references('id')->on('personas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_tipodocumento');
            $table->foreign('id_tipodocumento', 'id_tipodocumentoficab_fk')->references('id')->on('tipo_documento')->onDelete('restrict')->onUpdate('restrict');
            $table->string('numero_documento',192)->nullable();
            $table->string('descripcion_documento', 192)->nullable();
            $table->double('importe_totalcompra', 15,4)->nullable();
            $table->double('descuento_total', 15, 4)->nullable();
            $table->date('fecha_documento')->nullable();
           
            $table->integer('id_usuariorecibio')->nullable();
            $table->string('usuario_recibio', 192)->nullable();
            $table->integer('id_usuariocreado')->nullable();
            $table->string('usuario_creado', 192)->nullable();
            $table->integer('id_usuariotermino')->nullable();
            $table->string('usuario_termino', 192)->nullable();
            $table->string('pendiente_entrega',2)->default('NO');
            $table->string('terminado',2)->default('NO');
           
            $table->string('clave_verificado',195)->nullable();
            $table->datetime('fecha_terminado')->nullable();
            $table->string('eliminado')->default('NO');
            $table->integer('id_usuarioelimino')->nullable();
            $table->string('usuario_elimino', 192)->nullable();
            $table->integer('id_usuarioactualizo')->nullable();
            $table->string('usuario_actualizo', 192)->nullable();
            $table->unsignedBigInteger('sede_id');
            $table->foreign('sede_id', 'comprasficabsedeid_fk')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('comprasfi_cab');

    }
}
