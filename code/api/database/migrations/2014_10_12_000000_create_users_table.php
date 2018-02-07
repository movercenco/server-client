<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 191)->unique();
            $table->string('password');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            // 1 normal user, 2 CM, 3 Supplier, 4 Admin, 5 CM assitant, 6 Photographer, 7 Ambassadors
            $table->integer('role_type')->default(1);
            $table->integer('purpose_role_type_1')->nullable();
            $table->integer('purpose_role_type_2')->nullable();
            $table->string('avatar')->nullable();

            $table->integer('supplier_flag_weight')->nullable();
            $table->string('supplier_currency')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
