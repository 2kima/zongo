<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CommandesPoissons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes_poissons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("commande_id");
            $table->foreign('commande_id')->references('id')->on('commandes');
            $table->unsignedBigInteger("poisson_id");
            $table->foreign('poisson_id')->references('id')->on('poissons');
            $table->integer('quantity'); 
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
        Schema::dropIfExists('commandes_poissons');
    }
}
