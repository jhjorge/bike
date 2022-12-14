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
            $table->json('descricao')->nullable();
            $table->json('content')->nullable();
            $table->string('thumb');
            $table->json('gallery')->nullable();
            $table->string('quadro')->nullable();
            $table->string('garfo')->nullable();
            $table->string('movimentoDirecao')->nullable();
            $table->string('guidao')->nullable();
            $table->string('manopla')->nullable();
            $table->string('freio')->nullable();
            $table->string('aro')->nullable();
            $table->string('cubo')->nullable();
            $table->string('pneu')->nullable();
            $table->string('pedivela')->nullable();
            $table->string('corrente')->nullable();
            $table->string('movimentoCentral')->nullable();
            $table->string('rodaLivre')->nullable();
            $table->string('cambioDianteiro')->nullable();
            $table->string('cambioTraseiro')->nullable();
            $table->string('manete')->nullable();
            $table->string('selim')->nullable();
            $table->string('canote')->nullable();
            $table->string('abracadeira')->nullable();
            $table->string('pedal')->nullable();
            $table->string('peso')->nullable();
            $table->json('observacao')->nullable();
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
