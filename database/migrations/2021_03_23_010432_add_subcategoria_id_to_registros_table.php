<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubcategoriaIdToRegistrosTable extends Migration
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
            $table->integer('subcategoria_id')->unsigned();
            $table->foreign('subcategoria_id')->references('id')->on('subcategoria');
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
            $table->foreign('subcategoria_id')
            ->references('id')->on('subcategoria')
            ->onDelete('cascade');
        });
    }
}
