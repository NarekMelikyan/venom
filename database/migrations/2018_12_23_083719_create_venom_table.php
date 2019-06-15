<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venom', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->string('purity');
            $table->integer('price');
            $table->string('image')->nullable();

            $table->timestamps();

//            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
//            $table->foreign('subcategory_id')->references('id')->on('subcategory')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venom');
    }
}
