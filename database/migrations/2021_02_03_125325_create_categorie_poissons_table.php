<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriePoissonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorie_poissons', function (Blueprint $table) {
            $table->id();
            $table->string('lib_cat');
            $table->unsignedBigInteger("id_poisson");
            $table->foreign('id_poisson')->references('id')->on('poissons');
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
        Schema::dropIfExists('categorie_poissons');
    }
}
