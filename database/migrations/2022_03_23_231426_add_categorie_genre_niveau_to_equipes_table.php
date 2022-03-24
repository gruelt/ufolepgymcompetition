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
        Schema::table('equipes', function (Blueprint $table) {
            $table->bigInteger('categorie_genre_niveau_id')->unsigned()->nullable();

            $table->foreign('categorie_genre_niveau_id','e_cgn_fk')->references('id')->on('categorie_genre_niveau');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipes', function (Blueprint $table) {
            $table->dropColumn('categorie_genre_niveau_id');
        });
    }
};
