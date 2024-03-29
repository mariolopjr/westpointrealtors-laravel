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
            $table->string('slug');
            $table->string('title');
            $table->integer('type_id');
            $table->string('address');
            $table->integer('status_id');
            $table->double('price');
            $table->longText('description');
            $table->double('home_size');
            $table->double('lot_size');
            $table->double('bedrooms');
            $table->double('bathrooms');
            $table->double('garages');
            $table->string('year');
            $table->double('hoa_fees');
            $table->boolean('rental')->default(false);
            $table->boolean('favorite')->default(false);
            $table->boolean('active')->default(true);
            $table->integer('user_id')->unique;
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
