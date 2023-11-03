<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReunioesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('reunioes', function (Blueprint $table) {
        $table->id();
        $table->string('tema');
        $table->string('link');
        $table->text('ata')->nullable();
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
        Schema::dropIfExists('reunioes');
    }
}
