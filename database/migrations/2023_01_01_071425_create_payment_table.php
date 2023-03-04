<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table){
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name_on_card');
            $table->string('charge_id');
            $table->string('ammount');
            $table->string('ammount_capture');
            $table->string('capture');
            $table->string('currency');
            $table->string('customer_id');
            $table->string('payment_method');
            $table->string('status');
            $table->string('paid');
            $table->string('refund');
            $table->string('refund_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('payment');
    }
};
