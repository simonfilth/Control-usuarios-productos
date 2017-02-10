<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     * @table productos
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('nombre');
            $table->string('codigo');
            $table->string('imagen');
            $table->string('descripcion');
            $table->decimal('precio');
            $table->integer('cantidad');
            $table->unsignedInteger('categoria_id');

            $table->unique(["codigo"], 'unique_productos');
            $table->timestamps();


            $table->foreign('categoria_id', 'categorias_tipousuarioid_foreign_idx')
                ->references('id')->on('categorias')
                ->onDelete('restrict')
                ->onUpdate('restrict');
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
