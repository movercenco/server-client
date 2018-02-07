<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\City;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('region');
            $table->string('currency')->default('USD');
            $table->double('balance')->default(0);
            $table->string('timezone')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        City::create([
            'name' => 'Buenos Aires',
            'region' => 'Americas',
            'timezone' => 'America/Buenos_Aires'
        ]);
        City::create([
            'name' => 'Lima',
            'region' => 'Americas',
            'timezone' => 'America/Lima'
        ]);
        City::create([
            'name' => 'Montreal',
            'region' => 'Americas',
            'timezone' => 'America/Montreal'
        ]);
        City::create([
            'name' => 'New York',
            'region' => 'Americas',
            'timezone' => 'America/New_York'
        ]);
        City::create([
            'name' => 'Toronto',
            'region' => 'Americas',
            'timezone' => 'America/Toronto'
        ]);

        City::create([
            'name' => 'Saigon',
            'region' => 'Asia',
            'timezone' => 'Asia/Saigon'
        ]);
        City::create([
            'name' => 'Chiang Mai',
            'region' => 'Asia',
            'timezone' => 'Asia/Bangkok'
        ]);

        City::create([
            'name' => 'Barcelona',
            'region' => 'Europe',
            'timezone' => 'Europe/Madrid'
        ]);
        City::create([
            'name' => 'Cologne',
            'region' => 'Europe',
            'timezone' => 'Europe/Berlin'
        ]);
        City::create([
            'name' => 'Copenhagen',
            'region' => 'Europe',
            'timezone' => 'Europe/Copenhagen'
        ]);
        City::create([
            'name' => 'Geneva',
            'region' => 'Europe',
            'timezone' => 'Europe/Berlin'
        ]);
        City::create([
            'name' => 'London',
            'region' => 'Europe',
            'timezone' => 'Europe/London'
        ]);
        City::create([
            'name' => 'Paris',
            'region' => 'Europe',
            'timezone' => 'Europe/Paris'
        ]);
        City::create([
            'name' => 'Oslo',
            'region' => 'Europe',
            'timezone' => 'Europe/Oslo'
        ]);

        City::create([
            'name' => 'Melbourne',
            'region' => 'Oceania',
            'timezone' => 'Australia/Melbourne'
        ]);
        City::create([
            'name' => 'Wellington',
            'region' => 'Oceania',
            'timezone' => 'Pacific/Auckland'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
