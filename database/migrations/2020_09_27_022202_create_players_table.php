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
            $table->string('name', 100);//nome do jogador
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('number');
            $table->string('nationality');//pais de origem 
            $table->string('age');//idade
            $table->string('position');//posição em campo
            $table->text('description');// url da foto do jogador

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
