<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('type');
            $table->string('address');
            $table->integer('status_id');
            $table->double('price');
            $table->longText('description');
            $table->double('home_size');
            $table->double('lot_size');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('garages');
            $table->date('year');
            $table->double('hoa_fees');
            $table->boolean('rental')->default(false);
            $table->boolean('favorite')->default(false);
            $table->boolean('active')->default(true);
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
        Schema::dropIfExists('properties');
    }
}
