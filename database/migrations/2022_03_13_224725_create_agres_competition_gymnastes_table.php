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
        Schema::create('agres_competition_gymnastes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gymnaste_id')->constrained();
            $table->foreignId('agres_id')->constrained();
            $table->foreignId('competition_id')->constrained();
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
        Schema::dropIfExists('agres_competition_gymnastes');
    }
};
