<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('alunos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('orientador');
            $table->integer('cpf')->unique();
            $table->integer('matricula')->unique();
            $table->string('email')->unique();
            $table->string('bolsa')->nullable();
            $table->integer('semestre_entrada');
            $table->integer('duracao_bolsa')->nullable();
            $table->decimal('nota', 5, 2);
            $table->decimal('notap', 5, 2)->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('alunos');
    }
}
