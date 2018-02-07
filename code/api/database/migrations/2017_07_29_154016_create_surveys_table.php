<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->text('tools')->nullable();
            $table->text('offers')->nullable();
            $table->string('city_type_text')->nullable();
            $table->string('city')->nullable();
            $table->string('facebook')->nullable();
            $table->string('skype')->nullable();
            $table->string('role')->nullable();
            $table->string('resume')->nullable();
            $table->text('languages')->nullable();
            $table->text('description')->nullable();
            $table->string('weakness')->nullable();
            $table->string('strength')->nullable();
            $table->string('why_angry')->nullable();
            $table->string('why_laugh')->nullable();
            $table->text('interests')->nullable();
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
        Schema::dropIfExists('surveys');
    }
}
