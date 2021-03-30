<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConcernersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('concerners', function (Blueprint $table) {
            $table->id();
             $table->string('libelle');
            $table->unsignedBigInteger('id_commande');
            $table->foreign('id_commande')->references('id')->on('commandes');
            $table->unsignedBigInteger('id_categorie_pois');
            $table->foreign('id_categorie_pois')->references('id')->on('categorie_poissons');
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
        Schema::dropIfExists('concerners');
    }
}
