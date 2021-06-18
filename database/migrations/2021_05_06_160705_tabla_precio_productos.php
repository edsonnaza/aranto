<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaPrecioProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('precio_productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_producto');
            $table->foreign('id_producto', 'id_productoprecio_fk')->references('id')->on('productos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_seguro');
            $table->foreign('id_seguro', 'id_seguroproductoprecio_fk')->references('id')->on('seguros')->onDelete('restrict')->onUpdate('restrict');
            $table->double('precio_costo', 15,4);
            $table->double('precio_venta', 15, 4);
            $table->integer('id_usuarioelimino')->nullable();;
            $table->string('usuario_elimino', 192)->nullable();;
            $table->integer('id_usuarioactualizo')->nullable();;
            $table->string('usuario_actualizo', 192)->nullable();;
            $table->unsignedBigInteger('sede_id');
            $table->foreign('sede_id', 'precioproductosedeid_fk')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('precio_productos');

    }
}
