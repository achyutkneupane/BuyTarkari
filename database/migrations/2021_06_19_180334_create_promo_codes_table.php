<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->boolean('status')->default(false);
            $table->integer('discount');
            $table->enum('type',array('flat','percentage'))->default('flat');
            $table->string('minimum')->nullable();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->timestamps();
        });
        Schema::create('promocode_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('promocode_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('promocode_id')->references('id')->on('promo_codes');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promo_codes');
    }
}
