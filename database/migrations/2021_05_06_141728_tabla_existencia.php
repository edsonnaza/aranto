<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaExistencia extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('existencias', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('id_unidad');
        $table->foreign('id_unidad', 'existenciaid_unidad_fk')->references('id')->on('unidad')->onDelete('restrict')->onUpdate('restrict');
        $table->unsignedBigInteger('id_producto');
        $table->foreign('id_producto', 'existenciaid_productos_fk')->references('id')->on('productos')->onDelete('restrict')->onUpdate('restrict');
       // $table->unsignedBigInteger('id_categoriapadre');
       // $table->foreign('id_categoriapadre', 'id_existenciacategoriapadre_fk')->references('id')->on('categoriapadre')->onDelete('restrict')->onUpdate('restrict');
       // $table->unsignedBigInteger('id_categoriahijo');
       // $table->foreign('id_categoriahijo', 'id_existenciacategoriahijo_fk')->references('id')->on('categoriahijos')->onDelete('restrict')->onUpdate('restrict');
       // $table->unsignedBigInteger('id_medidasbasicas');
       // $table->foreign('id_medidasbasicas', 'id_existenciamedidasbasicas_fk')->references('id')->on('medidas')->onDelete('restrict')->onUpdate('restrict');
       // $table->string('producto_nombre', 192);
       // $table->string('producto_descripcion', 192); 
        $table->double('cantidad_minima',15,4);
       // $table->double('precio_costo', 15, 4);
       // $table->double('precio_venta', 15, 4);
        $table->double('cantidad', 15, 4);
        $table->integer('id_usuarioelimino')->nullable();;
        $table->string('usuario_elimino',192)->nullable();;
        $table->integer('id_usuarioactualizo')->nullable();;
        $table->string('usuario_actualizo', 192)->nullable();;
        $table->boolean('activo')->default(true);
        $table->unsignedBigInteger('sede_id');
        $table->foreign('sede_id', 'existenciaisedeid_fk')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');
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
       Schema::dropIfExists('existencias');

    }
}
