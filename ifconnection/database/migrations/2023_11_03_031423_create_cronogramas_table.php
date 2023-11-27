<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCronogramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('cronogramas', function (Blueprint $table) {
        $table->id();
        $table->string('tarefa');
        $table->unsignedBigInteger('orientacao_id');
        $table->foreign('orientacao_id')->references('id')->on('orientacoes')->onDelete('cascade');
        $table->date('data');
        $table->softDeletes();
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
        Schema::dropIfExists('cronogramas');
    }
}
