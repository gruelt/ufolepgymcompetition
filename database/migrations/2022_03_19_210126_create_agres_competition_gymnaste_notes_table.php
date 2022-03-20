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
            $table->foreignId('agres_competition_gymnaste_id');
            $table->float('penalite');
            $table->string('status');
            $table->timestamps();
        });

        Schema::table('agres_competition_gymnaste',function (Blueprint $table){
           $table->float('note_depart')->nullable();
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
