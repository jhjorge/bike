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
        Schema::create('bikes', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('descricao');
            $table->text('content');
            $table->string('thumb');
            $table->json('gallery');
            $table->string('quadro');
            $table->string('garfo');
            $table->string('movimentoDirecao');
            $table->string('guidao');
            $table->string('manopla');
            $table->string('freio');
            $table->string('aro');
            $table->string('cubo');
            $table->string('pneu');
            $table->string('pedivela');
            $table->string('corrente');
            $table->string('movimentoCentral');
            $table->string('rodaLivre');
            $table->string('cambioDianteiro');
            $table->string('cambioTraseiro');
            $table->string('manete');
            $table->string('selim');
            $table->string('canote');
            $table->string('abracadeira');
            $table->string('pedal');
            $table->string('peso');
            $table->string('observacao');
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
        Schema::dropIfExists('bikes');
    }
};