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
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_contato')->unsigned();
            $table->foreign('id_contato')->references('id')->on('contatos');
            $table->unsignedBigInteger('id_livro')->unsigned();
            $table->foreign('id_livro')->references('id')->on('livros');            
            $table->dateTime('DataHora');
            $table->dateTime('DataDevolucao');
            $table->text('obs');
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
        Schema::dropIfExists('emprestimos');
    }
};
