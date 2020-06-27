<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('summary')->nullable();
            $table->integer('price')->nullable();
            $table->string('hometype')->nullable();
            $table->string('roomtype')->nullable();
            $table->string('address')->nullable();
            $table->integer('accomodate')->nullable();
            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->boolean('tv')->default(0);
            $table->boolean('kitchen')->default(0);
            $table->boolean('internet')->default(0);
            $table->boolean('heating')->default(0);
            $table->boolean('aircondition')->default(0);
            $table->float('latitude')->nullable();
            $table->float('longitude')->nullable();
            $table->string('city')->nullable();
            $table->boolean('is_published')->default(0);
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
        Schema::dropIfExists('listings');
    }
}
