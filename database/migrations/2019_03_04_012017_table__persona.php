<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablePersona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //  protected $fillable = ['id', 'persona_nombre', 'persona_apellido', 'full_name_persona','id_tipodni','numero_dni','email','facebook','nro_mobil','nro_telefono' , 'id_tipopersona','id_estadocivil','id_profesional','id_seguro'];

        Schema::create('personas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('persona_nombre', 100);
            $table->string('persona_apellido', 100);
            $table->string('full_name_persona', 200);
            $table->unsignedBigInteger('id_tipodni');
            $table->foreign('id_tipodni', 'fk_id_tipodni')->references('id')->on('tipodni')->onDelete('restrict')->onUpdate('restrict');
            $table->string('numero_dni', 100)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('facebook', 100)->nullable();
            $table->string('nro_mobil', 100)->nullable();
            $table->string('nro_telefono', 100)->nullable();
            $table->string('genero', '1')->nullable();
            $table->string('direccion', '200')->nullable();
            $table->date('fecha_nacimiento')->nullable();
           // $table->unsignedBigInteger('id_clasificacion')->nullable();
           // $table->foreign('id_clasificacion','fk_id_clasificacion')->references('id')->on('clasificacion')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_nacionalidad')->nullable();
            $table->foreign('id_nacionalidad','fk_id_nacionalidad')->references('id')->on('nacionalidad')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_tipopersona')->nullable();
            $table->foreign('id_tipopersona','fk_id_tipopersona')->references('id')->on('tipo_persona')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_estadocivil')->nullable();;
            $table->foreign('id_estadocivil', 'fk_id_estado_civil')->references('id')->on('estadocivil')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_profesion')->nullable();;
            $table->foreign('id_profesion', 'fk_id_profesion')->references('id')->on('profesion')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_seguro')->nullable();;
            $table->foreign('id_seguro', 'fk_id_seguro')->references('id')->on('seguros')->onDelete('restrict')->onUpdate('restrict');    
            $table->string('foto_persona', 100)->nullable();

        
           // $table->string('ruc',20)->nullable();
            $table->timestamps();
            //$table->unsignedBigInteger('sede_id');
            //$table->foreign('sede_id', 'fk_sede_id')->references('id')->on('sedes')->onDelete('restrict')->onUpdate('restrict');    
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
        Schema::dropIfExists('personas');
    }
}
