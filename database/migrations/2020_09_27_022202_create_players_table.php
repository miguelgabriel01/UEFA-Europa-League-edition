<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);//nome do jogador
            $table->string('nationality',50);//pais de origem 
            $table->string('age',10);//idade
            $table->string('position',50);//posição em campo
            $table->text('photo');// url da foto do jogador

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');//referencia do id do criador na tabela de usuarios(que neste caso serão times de futebol)

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
        Schema::dropIfExists('players');
    }
}
