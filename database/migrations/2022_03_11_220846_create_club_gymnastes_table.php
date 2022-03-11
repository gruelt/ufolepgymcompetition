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
        Schema::create('club_gymnaste', function (Blueprint $table) {
            $table->id();
            $table->foreignId('club_id')->constrained();
            $table->foreignId('gymnaste_id')->constrained();
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
        Schema::dropIfExists('club_gymnaste');
    }
};
