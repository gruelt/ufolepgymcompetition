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
        Schema::create('agres_competition_categorie_genre_niveau', function (Blueprint $table) {
            $table->id();
            $table->integer('nb_juges')->default(2);
            $table->foreignId('agres_id')->constrained();

            //$table->foreignId('categorie_genre_niveau_id')->constrained();
            $table->bigInteger('categorie_genre_niveau_id')->unsigned();

            //$table->foreignId('competititon_id')->constrained();
            $table->bigInteger('competition_id')->unsigned();

            $table->timestamps();


            $table->foreign('categorie_genre_niveau_id','acgn_ac_fk')->references('id')->on('categorie_genre_niveau');
            $table->foreign('competition_id','acgn_c_fk')->references('id')->on('competitions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agres_competition_categorie_genre_niveaux');
    }
};
