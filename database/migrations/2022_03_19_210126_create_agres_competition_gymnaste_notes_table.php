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
        Schema::create('agres_competition_gymnaste_notes', function (Blueprint $table) {
            $table->id();
            $table->integer('juge_id')->comment('Numero de juge');
            $table->float('penalite');
            $table->string('status');
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
        Schema::dropIfExists('agres_competition_gymnaste_notes');
    }
};
