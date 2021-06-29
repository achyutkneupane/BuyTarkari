<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id()->from(10000);
            $table->string('session_id')->nullable();
            $table->unsignedBigInteger('shipping_address')->nullable();
            $table->unsignedBigInteger('billing_address')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('promocode_id')->nullable();
            $table->enum('status',array('cancelled','inactive','cart','unpaid','paid','delivering','delivered'))->default('cart');
            $table->dateTime('paid_at')->nullable();
            $table->unsignedBigInteger('paymentmethod_id')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->timestamps();
            $table->foreign('promocode_id')->references('id')->on('promo_codes');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('shipping_address')->references('id')->on('addresses');
            $table->foreign('billing_address')->references('id')->on('addresses');
            $table->foreign('paymentmethod_id')->references('id')->on('paymentmethods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
