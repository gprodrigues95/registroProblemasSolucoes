<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoriaIdToRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registros', function (Blueprint $table) {
            //$table->foreignId('categoria_id')->constrained();
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categoria');
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
            /* $table->foreignId('categoria_id')
            ->constrained()
            ->onDelete('cascade'); */
            $table->foreign('categoria_id')
            ->references('id')->on('categoria')
            ->onDelete('cascade');
        });
    }
}
