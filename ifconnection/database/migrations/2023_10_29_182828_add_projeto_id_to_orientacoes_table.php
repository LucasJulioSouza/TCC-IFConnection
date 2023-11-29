<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProjetoIdToOrientacoesTable extends Migration
{
    public function up()
    {
        Schema::table('orientacoes', function (Blueprint $table) {
            $table->unsignedBigInteger('projeto_id')->nullable();
            $table->foreign('projeto_id')->references('id')->on('projetos');
        });
    }

    public function down()
    {
        Schema::table('orientacoes', function (Blueprint $table) {
            $table->dropForeign(['projeto_id']);
            $table->dropColumn('projeto_id');
        });
    }
}

