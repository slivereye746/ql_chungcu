<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerScd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_scd', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cmnd');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->date('birthday');
            $table->unsignedBigInteger('apartment_id')->nullable();
            $table->foreign('apartment_id')->references('id')->on('apartments');
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
        Schema::dropIfExists('customer_scd');
    }
}
