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
        Schema::create('equipes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->boolean('individuel')->default(false);
            $table->string('finalite')->nullable();
            $table->foreignId('genre_id')->constrained();
            $table->foreignId('niveau_id')->constrained();
            $table->foreignId('categorie_id');
            $table->foreignId('club_id')->constrained();
            $table->foreignId('competition_id')->constrained();

            $table->integer('old_numEquipe')->nullable();

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
        Schema::dropIfExists('equipes');
    }
};
