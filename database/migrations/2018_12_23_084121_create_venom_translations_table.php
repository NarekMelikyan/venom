<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenomTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venom_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('venom_id')->unsigned();
            $table->string('name');
            $table->string('common_names');
            $table->string('origin');
            $table->string('form');
            $table->string('class');
            $table->string('order');
            $table->string('suborder');
            $table->string('family');
            $table->string('subfamily');
            $table->string('genus');
            $table->string('lang');
            $table->timestamps();

//            $table->foreign('lang')->references('lang')->on('languages')->onDelete('cascade');
            $table->foreign('venom_id')->references('id')->on('venom')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venom_translations');
    }
}
