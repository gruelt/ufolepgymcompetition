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
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->integer('old_numCompet')->nullable();
            $table->string('type')->nullable();
            $table->string('ville');
            $table->string('departement');
            $table->string('old_date');
            $table->date('date_debut')->nullable();
            $table->date('date_fin')->nullable();
            $table->string('niveau_gaf')->nullable();
            $table->string('niveau_gam')->nullable();
            $table->foreignId('saison_id')->constrained();

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
        Schema::dropIfExists('competitions');
    }
};
