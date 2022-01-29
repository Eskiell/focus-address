<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('focus-address.table_names.address'), function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zipcode_id');
            $table->integer('number');
            $table->text('complement');
            $table->unsignedBigInteger('user_id')->index();
            $table->enum('type', ['MAIN', 'CHARGE '])->default('MAIN');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on(config('focus-address.table_names.users'))->onDelete('cascade');
            $table->foreign('zipcode_id')->references('id')->on(config('focus-address.table_names.zipcode'))->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('focus-address.table_names.address'));
    }
}
