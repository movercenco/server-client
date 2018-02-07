<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->unsignedInteger('city_id');
			$table->foreign('city_id')->references('id')->on('cities');
            $table->string('currency')->nullable();
			$table->string('bitcoin_address')->nullable();
			$table->string('bitcoin_secret')->nullable();
			$table->string('transaction_hash')->nullable();
			$table->integer('satoshi_amount')->nullable();
			$table->integer('confirmation_times')->nullable();
			$table->double('total_amount')->default(0);
			// 1 created, 2 confirming, 3 paid
			$table->integer('status')->default(1);
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
        Schema::dropIfExists('payments');
    }
}
