<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubcategoriasIdToRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registros', function (Blueprint $table) {
            //$table->foreignId('subcategoria_id')->constrained();
            $table->integer('sub_categorias_id')->unsigned();
            $table->foreign('sub_categorias_id')->references('id')->on('sub_categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registros', function (Blueprint $table) {
           /* $table->foreignId('subcategoria_id')
            ->constrained()
            ->onDelete('cascade'); */
            $table->foreign('sub_categorias_id')
            ->references('id')->on('sub_categorias')
            ->onDelete('cascade');
        });
    }
}
