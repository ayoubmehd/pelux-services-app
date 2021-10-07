<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->text('description', 65535)->nullable();
            $table->string('excerpt', 255)->nullable();
            $table->float('lat', 10, 0);
            $table->float('long', 10, 0);
            $table->bigInteger('city_id')->unsigned();
            $table->bigInteger('provider_id')->unsigned();
            $table->boolean('is_publised')->nullable();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('provider_id')->references('id')->on('users');
            $table->foreignId('category_id')->constrained();
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
        Schema::drop('services');
    }
}