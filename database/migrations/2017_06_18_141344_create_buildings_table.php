<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buildings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('type');
            $table->string('address');
            $table->integer('status');
            $table->double('price');
            $table->longText('description');
            $table->double('home_size');
            $table->double('lot_size');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('garages');
            $table->date('year');
            $table->double('hoa_fees');
            $table->boolean('rental');
            $table->boolean('favorite')->default(false);
            $table->boolean('active')->default(true);
            $table->integer('user_id');
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
        Schema::dropIfExists('buildings');
    }
}
