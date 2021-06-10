<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('style')->comment('Tipo de cerveja, exemplo IPA, LAGER, RED');
            $table->string('category')->comment('categoria, exemplo Puro malte, de milho, de arroz, artesal');
            $table->integer('ibu')->comment('Nível de amargor');
            $table->decimal('abv', 10, 2)->comment('Teor acoólico');
            $table->string('glass');
            $table->integer('temperature')->comment('temperatura em graus celsius');
            $table->string('food_pairing');
            $table->string('url_photo');
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
        Schema::dropIfExists('beers');
    }
}
