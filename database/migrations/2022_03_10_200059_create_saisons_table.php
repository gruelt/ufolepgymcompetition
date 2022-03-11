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
        Schema::create('saisons', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->integer('an1');
            $table->integer('an2');
            $table->integer('actuelle')->comment('saison en cours =1');
            $table->integer('inscription')->comment('inscription ouverte =1 , fermé =0');

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
        Schema::dropIfExists('saisons');
    }
};
