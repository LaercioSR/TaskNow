<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_tipo');
            $table->string('titulo');
            $table->boolean('privacidade');
            $table->string('descricao', 450)->nullable();
            $table->boolean('status');
            $table->dateTime('data_conclusao')->nullable();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_tipo')->references('id')->on('tipo_tarefas');
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
        Schema::dropIfExists('tarefas');
    }
}
