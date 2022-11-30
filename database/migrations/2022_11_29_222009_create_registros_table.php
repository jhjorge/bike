<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email');
            $table->string('telefone');
            $table->string('documento');
            $table->string('rua');
            $table->string('bairro');
            $table->string('numero');
            $table->string('cidade');
            $table->string('estado');
            $table->string('cep');
            $table->string('nascimento');
            $table->string('modelo_bike');
            $table->string('numero_serie');
            $table->string('nota_fiscal');
            $table->string('nome_revenda');
            $table->string('data_compra');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registros');
    }
};