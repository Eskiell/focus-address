<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZipcodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('focus-address.table_names.zipcode'), function (Blueprint $table) {
            $table->id();
            $table->string('cod')->index();
            $table->string('street')->nullable();
            $table->string('neighborhood')->nullable();
            $table->unsignedBigInteger('city_id')->unsigned();
            $table->unsignedBigInteger('state_id')->unsigned();
            $table->foreign('city_id')->references('id')->on(config('focus-address.table_names.cities'))->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on(config('focus-address.table_names.states'))->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('focus-address.table_names.zipcode'));
    }
}
