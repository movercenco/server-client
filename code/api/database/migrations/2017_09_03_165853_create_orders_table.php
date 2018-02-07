<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users');
			$table->unsignedInteger('supplier_id')->nullable();
			$table->foreign('supplier_id')->references('id')->on('users');
			$table->string('shipping_address_1')->nullable();
			$table->string('shipping_address_2')->nullable();
			$table->string('shipping_address_zip')->nullable();
			$table->string('billing_address_1')->nullable();
			$table->string('billing_address_2')->nullable();
			$table->string('billing_address_zip')->nullable();
			$table->string('bitcoin_address')->nullable();
			$table->string('bitcoin_secret')->nullable();
			$table->string('transaction_hash')->nullable();
			$table->integer('satoshi_amount')->nullable();
			$table->integer('confirmation_times')->nullable();
			$table->double('total_amount')->default(0);
			$table->double('delivery_cost')->default(0);
			// -1 expired, 1 created, 2 pending payment, 3 paid, 4 shipped, 5 received
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
        Schema::dropIfExists('orders');
    }
}
