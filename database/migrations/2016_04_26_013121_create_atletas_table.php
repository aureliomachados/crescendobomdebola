<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateatletasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atletas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->date('datanascimento');
            $table->integer('idade');
            $table->string('colegio');
            $table->string('turno');
            $table->string('serie');
            $table->boolean('apto');
            $table->string('nomeresponsavel');
            $table->date('dataregistro');
            $table->string('bairro');
            $table->string('endereco');
            $table->string('numero');
            $table->string('telefone');
            $table->string('celular');
            $table->string('identidade');
            $table->string('orgaoexpedidor');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('atletas');
    }
}
