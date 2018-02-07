<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('image');
            $table->integer('is_language');
            // 1 standard 2 rare
            $table->integer('type');
            $table->timestamps();
        });

        $data = array (
  0 =>
  array (
    'id' => 1,
    'name' => 'Afghanistan',
    'image_name' => 'afghanistan',
    'type' => 1,
    'is_language' => 1,
  ),
  1 =>
  array (
    'id' => 2,
    'name' => 'Albania',
    'image_name' => 'albania',
    'type' => 1,
    'is_language' => 1,
  ),
  2 =>
  array (
    'id' => 3,
    'name' => 'Algeria',
    'image_name' => 'algeria',
    'type' => 1,
    'is_language' => 1,
  ),
  3 =>
  array (
    'id' => 4,
    'name' => 'Ambassador',
    'image_name' => 'ambassador',
    'type' => 1,
    'is_language' => 0,
  ),
  4 =>
  array (
    'id' => 5,
    'name' => 'Andorra',
    'image_name' => 'andorra',
    'type' => 2,
    'is_language' => 1,
  ),
  5 =>
  array (
    'id' => 6,
    'name' => 'Angola',
    'image_name' => 'angola',
    'type' => 2,
    'is_language' => 1,
  ),
  6 =>
  array (
    'id' => 7,
    'name' => 'Antigua and Barbuda',
    'image_name' => 'antigua_barbuda',
    'type' => 2,
    'is_language' => 1,
  ),
  7 =>
  array (
    'id' => 8,
    'name' => 'Aramaic',
    'image_name' => 'aramaic',
    'type' => 2,
    'is_language' => 1,
  ),
  8 =>
  array (
    'id' => 9,
    'name' => 'Argentina',
    'image_name' => 'argentina',
    'type' => 1,
    'is_language' => 1,
  ),
  9 =>
  array (
    'id' => 10,
    'name' => 'Armenia',
    'image_name' => 'armenia',
    'type' => 1,
    'is_language' => 1,
  ),
  10 =>
  array (
    'id' => 11,
    'name' => 'Associate Flag',
    'image_name' => 'associate',
    'type' => 2,
    'is_language' => 0,
  ),
  11 =>
  array (
    'id' => 12,
    'name' => 'Australia',
    'image_name' => 'australia',
    'type' => 1,
    'is_language' => 1,
  ),
  12 =>
  array (
    'id' => 13,
    'name' => 'Austria',
    'image_name' => 'austria',
    'type' => 1,
    'is_language' => 1,
  ),
  13 =>
  array (
    'id' => 14,
    'name' => 'Azerbaijan',
    'image_name' => 'azerbaijan',
    'type' => 2,
    'is_language' => 1,
  ),
  14 =>
  array (
    'id' => 15,
    'name' => 'Bahamas',
    'image_name' => 'bahamas',
    'type' => 2,
    'is_language' => 1,
  ),
  15 =>
  array (
    'id' => 16,
    'name' => 'Bahrain',
    'image_name' => 'bahrain',
    'type' => 2,
    'is_language' => 1,
  ),
  16 =>
  array (
    'id' => 17,
    'name' => 'Bangladesh',
    'image_name' => 'bangladesh',
    'type' => 1,
    'is_language' => 1,
  ),
  17 =>
  array (
    'id' => 18,
    'name' => 'Barbados',
    'image_name' => 'barbados',
    'type' => 2,
    'is_language' => 1,
  ),
  18 =>
  array (
    'id' => 19,
    'name' => 'Basque Country',
    'image_name' => 'basque',
    'type' => 1,
    'is_language' => 1,
  ),
  19 =>
  array (
    'id' => 20,
    'name' => 'Belarus',
    'image_name' => 'belarus',
    'type' => 1,
    'is_language' => 1,
  ),
  20 =>
  array (
    'id' => 21,
    'name' => 'Belgium',
    'image_name' => 'belgium',
    'type' => 1,
    'is_language' => 1,
  ),
  21 =>
  array (
    'id' => 22,
    'name' => 'Belize',
    'image_name' => 'belize',
    'type' => 2,
    'is_language' => 1,
  ),
  22 =>
  array (
    'id' => 23,
    'name' => 'Berber',
    'image_name' => 'berber',
    'type' => 2,
    'is_language' => 1,
  ),
  23 =>
  array (
    'id' => 24,
    'name' => 'Benin',
    'image_name' => 'benin',
    'type' => 2,
    'is_language' => 1,
  ),
  24 =>
  array (
    'id' => 25,
    'name' => 'Bhutan',
    'image_name' => 'bhutan',
    'type' => 2,
    'is_language' => 1,
  ),
  25 =>
  array (
    'id' => 26,
    'name' => 'Birthday Flag',
    'image_name' => 'birthday',
    'type' => 2,
    'is_language' => 0,
  ),
  26 =>
  array (
    'id' => 27,
    'name' => 'Bolivia',
    'image_name' => 'bolivia',
    'type' => 1,
    'is_language' => 1,
  ),
  27 =>
  array (
    'id' => 28,
    'name' => 'Bosnia and Herzegovina',
    'image_name' => 'bosnia',
    'type' => 1,
    'is_language' => 1,
  ),
  28 =>
  array (
    'id' => 29,
    'name' => 'Botswana',
    'image_name' => 'botswana',
    'type' => 1,
    'is_language' => 1,
  ),
  29 =>
  array (
    'id' => 30,
    'name' => 'Brazil',
    'image_name' => 'brazil',
    'type' => 1,
    'is_language' => 1,
  ),
  30 =>
  array (
    'id' => 31,
    'name' => 'Brunei',
    'image_name' => 'brunei',
    'type' => 1,
    'is_language' => 1,
  ),
  31 =>
  array (
    'id' => 32,
    'name' => 'Bulgaria',
    'image_name' => 'bulgaria',
    'type' => 1,
    'is_language' => 1,
  ),
  32 =>
  array (
    'id' => 33,
    'name' => 'Burkina Faso',
    'image_name' => 'burkina_faso',
    'type' => 2,
    'is_language' => 1,
  ),
  33 =>
  array (
    'id' => 34,
    'name' => 'Burundi',
    'image_name' => 'burundi',
    'type' => 2,
    'is_language' => 1,
  ),
  34 =>
  array (
    'id' => 35,
    'name' => 'Cambodia',
    'image_name' => 'cambodia',
    'type' => 1,
    'is_language' => 1,
  ),
  35 =>
  array (
    'id' => 36,
    'name' => 'Cameroon',
    'image_name' => 'cameroon',
    'type' => 1,
    'is_language' => 1,
  ),
  36 =>
  array (
    'id' => 37,
    'name' => 'Canada',
    'image_name' => 'canada',
    'type' => 1,
    'is_language' => 1,
  ),
  37 =>
  array (
    'id' => 38,
    'name' => 'Canary Island',
    'image_name' => 'canary',
    'type' => 2,
    'is_language' => 1,
  ),
  38 =>
  array (
    'id' => 39,
    'name' => 'Cape Verde',
    'image_name' => 'cape_verde',
    'type' => 2,
    'is_language' => 1,
  ),
  39 =>
  array (
    'id' => 40,
    'name' => 'Catalan',
    'image_name' => 'catalan',
    'type' => 1,
    'is_language' => 1,
  ),
  40 =>
  array (
    'id' => 41,
    'name' => 'Central African Republic',
    'image_name' => 'central_africa_republic',
    'type' => 2,
    'is_language' => 1,
  ),
  41 =>
  array (
    'id' => 42,
    'name' => 'Chad',
    'image_name' => 'chad',
    'type' => 2,
    'is_language' => 1,
  ),
  42 =>
  array (
    'id' => 43,
    'name' => 'Chile',
    'image_name' => 'chile',
    'type' => 1,
    'is_language' => 1,
  ),
  43 =>
  array (
    'id' => 44,
    'name' => 'China',
    'image_name' => 'china',
    'type' => 1,
    'is_language' => 1,
  ),
  44 =>
  array (
    'id' => 45,
    'name' => 'Cologne',
    'image_name' => 'cologne',
    'type' => 2,
    'is_language' => 1,
  ),
  45 =>
  array (
    'id' => 46,
    'name' => 'Colombia',
    'image_name' => 'colombia',
    'type' => 1,
    'is_language' => 1,
  ),
  46 =>
  array (
    'id' => 47,
    'name' => 'Comoros',
    'image_name' => 'comoros',
    'type' => 2,
    'is_language' => 1,
  ),
  47 =>
  array (
    'id' => 48,
    'name' => 'Congo',
    'image_name' => 'congo',
    'type' => 2,
    'is_language' => 1,
  ),
  48 =>
  array (
    'id' => 49,
    'name' => 'Cook Island',
    'image_name' => 'cook_island',
    'type' => 2,
    'is_language' => 1,
  ),
  49 =>
  array (
    'id' => 50,
    'name' => 'Costa Rica',
    'image_name' => 'costa_rica',
    'type' => 1,
    'is_language' => 1,
  ),
  50 =>
  array (
    'id' => 51,
    'name' => 'Crimea',
    'image_name' => 'crimea',
    'type' => 2,
    'is_language' => 1,
  ),
  51 =>
  array (
    'id' => 52,
    'name' => 'Croatia',
    'image_name' => 'croatia',
    'type' => 1,
    'is_language' => 1,
  ),
  52 =>
  array (
    'id' => 53,
    'name' => 'Cuba',
    'image_name' => 'cuba',
    'type' => 2,
    'is_language' => 1,
  ),
  53 =>
  array (
    'id' => 54,
    'name' => 'Curacao',
    'image_name' => 'curacao',
    'type' => 2,
    'is_language' => 1,
  ),
  54 =>
  array (
    'id' => 55,
    'name' => 'Cyprus',
    'image_name' => 'cyprus',
    'type' => 1,
    'is_language' => 1,
  ),
  55 =>
  array (
    'id' => 56,
    'name' => 'Czech Republic',
    'image_name' => 'czech',
    'type' => 1,
    'is_language' => 1,
  ),
  56 =>
  array (
    'id' => 57,
    'name' => 'Denmark',
    'image_name' => 'denmark',
    'type' => 1,
    'is_language' => 1,
  ),
  57 =>
  array (
    'id' => 58,
    'name' => 'Djibouti',
    'image_name' => 'djibouti',
    'type' => 2,
    'is_language' => 1,
  ),
  58 =>
  array (
    'id' => 59,
    'name' => 'Dominica',
    'image_name' => 'dominica',
    'type' => 2,
    'is_language' => 1,
  ),
  59 =>
  array (
    'id' => 60,
    'name' => 'Dominican Republic',
    'image_name' => 'dominican_republic',
    'type' => 1,
    'is_language' => 1,
  ),
  60 =>
  array (
    'id' => 61,
    'name' => 'East Timor',
    'image_name' => 'east_timor',
    'type' => 2,
    'is_language' => 1,
  ),
  61 =>
  array (
    'id' => 62,
    'name' => 'Ecuador',
    'image_name' => 'ecuador',
    'type' => 1,
    'is_language' => 1,
  ),
  62 =>
  array (
    'id' => 63,
    'name' => 'Egypt',
    'image_name' => 'egypt',
    'type' => 1,
    'is_language' => 1,
  ),
  63 =>
  array (
    'id' => 64,
    'name' => 'El Salvador',
    'image_name' => 'el_salvador',
    'type' => 1,
    'is_language' => 1,
  ),
  64 =>
  array (
    'id' => 65,
    'name' => 'England',
    'image_name' => 'england',
    'type' => 2,
    'is_language' => 1,
  ),
  65 =>
  array (
    'id' => 66,
    'name' => 'Equatorial Guinea',
    'image_name' => 'equatorial_guinea',
    'type' => 2,
    'is_language' => 1,
  ),
  66 =>
  array (
    'id' => 67,
    'name' => 'Eritrea',
    'image_name' => 'eritrea',
    'type' => 1,
    'is_language' => 1,
  ),
  67 =>
  array (
    'id' => 68,
    'name' => 'Esperanto',
    'image_name' => 'esperanto',
    'type' => 2,
    'is_language' => 1,
  ),
  68 =>
  array (
    'id' => 69,
    'name' => 'Estonia',
    'image_name' => 'estonia',
    'type' => 1,
    'is_language' => 1,
  ),
  69 =>
  array (
    'id' => 70,
    'name' => 'Ethiopia',
    'image_name' => 'ethiopia',
    'type' => 2,
    'is_language' => 1,
  ),
  70 =>
  array (
    'id' => 71,
    'name' => 'Faroe Island',
    'image_name' => 'faroe_island',
    'type' => 2,
    'is_language' => 1,
  ),
  71 =>
  array (
    'id' => 72,
    'name' => 'Fiji',
    'image_name' => 'fiji',
    'type' => 2,
    'is_language' => 1,
  ),
  72 =>
  array (
    'id' => 73,
    'name' => 'Finland',
    'image_name' => 'finland',
    'type' => 1,
    'is_language' => 1,
  ),
  73 =>
  array (
    'id' => 74,
    'name' => 'Flemish Belgian',
    'image_name' => 'flemish',
    'type' => 2,
    'is_language' => 1,
  ),
  74 =>
  array (
    'id' => 75,
    'name' => 'France',
    'image_name' => 'france',
    'type' => 1,
    'is_language' => 1,
  ),
  75 =>
  array (
    'id' => 76,
    'name' => 'French Polynesia',
    'image_name' => 'french_polynesia',
    'type' => 2,
    'is_language' => 1,
  ),
  76 =>
  array (
    'id' => 77,
    'name' => 'Gabon',
    'image_name' => 'gabon',
    'type' => 2,
    'is_language' => 1,
  ),
  77 =>
  array (
    'id' => 78,
    'name' => 'Galicia',
    'image_name' => 'galicia',
    'type' => 2,
    'is_language' => 1,
  ),
  78 =>
  array (
    'id' => 79,
    'name' => 'Gambia',
    'image_name' => 'gambia',
    'type' => 2,
    'is_language' => 1,
  ),
  79 =>
  array (
    'id' => 80,
    'name' => 'Georgia',
    'image_name' => 'georgia',
    'type' => 2,
    'is_language' => 1,
  ),
  80 =>
  array (
    'id' => 81,
    'name' => 'Germany',
    'image_name' => 'germany',
    'type' => 1,
    'is_language' => 1,
  ),
  81 =>
  array (
    'id' => 82,
    'name' => 'Ghana',
    'image_name' => 'ghana',
    'type' => 1,
    'is_language' => 1,
  ),
  82 =>
  array (
    'id' => 83,
    'name' => 'Greece',
    'image_name' => 'greece',
    'type' => 1,
    'is_language' => 1,
  ),
  83 =>
  array (
    'id' => 84,
    'name' => 'Greenland',
    'image_name' => 'greenland',
    'type' => 2,
    'is_language' => 1,
  ),
  84 =>
  array (
    'id' => 85,
    'name' => 'Grenada',
    'image_name' => 'grenada',
    'type' => 2,
    'is_language' => 1,
  ),
  85 =>
  array (
    'id' => 86,
    'name' => 'Guadaloupe',
    'image_name' => 'guadaloupe',
    'type' => 2,
    'is_language' => 1,
  ),
  86 =>
  array (
    'id' => 87,
    'name' => 'Guatemala',
    'image_name' => 'guatemala',
    'type' => 1,
    'is_language' => 1,
  ),
  87 =>
  array (
    'id' => 88,
    'name' => 'Guinea',
    'image_name' => 'guinea',
    'type' => 2,
    'is_language' => 1,
  ),
  88 =>
  array (
    'id' => 89,
    'name' => 'Guinea Bissau',
    'image_name' => 'guinea_bissau',
    'type' => 2,
    'is_language' => 1,
  ),
  89 =>
  array (
    'id' => 90,
    'name' => 'Guyana',
    'image_name' => 'guyana',
    'type' => 2,
    'is_language' => 1,
  ),
  90 =>
  array (
    'id' => 91,
    'name' => 'Haiti',
    'image_name' => 'haiti',
    'type' => 1,
    'is_language' => 1,
  ),
  91 =>
  array (
    'id' => 92,
    'name' => 'Hawaii',
    'image_name' => 'hawaii',
    'type' => 2,
    'is_language' => 1,
  ),
  92 =>
  array (
    'id' => 93,
    'name' => 'Honduras',
    'image_name' => 'honduras',
    'type' => 1,
    'is_language' => 1,
  ),
  93 =>
  array (
    'id' => 94,
    'name' => 'Hongkong',
    'image_name' => 'honk_kong',
    'type' => 1,
    'is_language' => 1,
  ),
  94 =>
  array (
    'id' => 95,
    'name' => 'Hungary',
    'image_name' => 'hungary',
    'type' => 1,
    'is_language' => 1,
  ),
  95 =>
  array (
    'id' => 96,
    'name' => 'Iceland',
    'image_name' => 'iceland',
    'type' => 1,
    'is_language' => 1,
  ),
  96 =>
  array (
    'id' => 97,
    'name' => 'India',
    'image_name' => 'india',
    'type' => 1,
    'is_language' => 1,
  ),
  97 =>
  array (
    'id' => 98,
    'name' => 'Indonesia',
    'image_name' => 'indonesia',
    'type' => 1,
    'is_language' => 1,
  ),
  98 =>
  array (
    'id' => 99,
    'name' => 'Iran',
    'image_name' => 'iran',
    'type' => 1,
    'is_language' => 1,
  ),
  99 =>
  array (
    'id' => 100,
    'name' => 'Iraq',
    'image_name' => 'iraq',
    'type' => 1,
    'is_language' => 1,
  ),
  100 =>
  array (
    'id' => 101,
    'name' => 'Ireland',
    'image_name' => 'ireland',
    'type' => 1,
    'is_language' => 1,
  ),
  101 =>
  array (
    'id' => 102,
    'name' => 'Israel',
    'image_name' => 'israel',
    'type' => 1,
    'is_language' => 1,
  ),
  102 =>
  array (
    'id' => 103,
    'name' => 'Italy',
    'image_name' => 'italy',
    'type' => 1,
    'is_language' => 1,
  ),
  103 =>
  array (
    'id' => 104,
    'name' => 'Ivory Coast',
    'image_name' => 'cote_divoire',
    'type' => 2,
    'is_language' => 1,
  ),
  104 =>
  array (
    'id' => 105,
    'name' => 'Jamaica',
    'image_name' => 'jamaica',
    'type' => 1,
    'is_language' => 1,
  ),
  105 =>
  array (
    'id' => 106,
    'name' => 'Japan',
    'image_name' => 'japan',
    'type' => 1,
    'is_language' => 1,
  ),
  106 =>
  array (
    'id' => 107,
    'name' => 'Jordan',
    'image_name' => 'jordan',
    'type' => 1,
    'is_language' => 1,
  ),
  107 =>
  array (
    'id' => 108,
    'name' => 'Kanak',
    'image_name' => 'kanak',
    'type' => 2,
    'is_language' => 1,
  ),
  108 =>
  array (
    'id' => 109,
    'name' => 'Kazakhstan',
    'image_name' => 'kazakhstan',
    'type' => 1,
    'is_language' => 1,
  ),
  109 =>
  array (
    'id' => 110,
    'name' => 'Kenya',
    'image_name' => 'kenya',
    'type' => 1,
    'is_language' => 1,
  ),
  110 =>
  array (
    'id' => 111,
    'name' => 'Kiribati',
    'image_name' => 'kiribati',
    'type' => 2,
    'is_language' => 1,
  ),
  111 =>
  array (
    'id' => 112,
    'name' => 'Kosovo',
    'image_name' => 'kosovo',
    'type' => 2,
    'is_language' => 1,
  ),
  112 =>
  array (
    'id' => 113,
    'name' => 'Kurdistan',
    'image_name' => 'kurdistan',
    'type' => 2,
    'is_language' => 1,
  ),
  113 =>
  array (
    'id' => 114,
    'name' => 'Kuwait',
    'image_name' => 'kuwait',
    'type' => 1,
    'is_language' => 1,
  ),
  114 =>
  array (
    'id' => 115,
    'name' => 'Kyrgyzstan',
    'image_name' => 'kyrgyzstan',
    'type' => 1,
    'is_language' => 1,
  ),
  115 =>
  array (
    'id' => 116,
    'name' => 'Laos',
    'image_name' => 'laos',
    'type' => 1,
    'is_language' => 1,
  ),
  116 =>
  array (
    'id' => 117,
    'name' => 'Latvia',
    'image_name' => 'latvia',
    'type' => 1,
    'is_language' => 1,
  ),
  117 =>
  array (
    'id' => 118,
    'name' => 'Lebanon',
    'image_name' => 'lebanon',
    'type' => 1,
    'is_language' => 1,
  ),
  118 =>
  array (
    'id' => 119,
    'name' => 'Lesotho',
    'image_name' => 'lesotho',
    'type' => 2,
    'is_language' => 1,
  ),
  119 =>
  array (
    'id' => 120,
    'name' => 'Liberia',
    'image_name' => 'liberia',
    'type' => 1,
    'is_language' => 1,
  ),
  120 =>
  array (
    'id' => 121,
    'name' => 'Libya',
    'image_name' => 'libya',
    'type' => 1,
    'is_language' => 1,
  ),
  121 =>
  array (
    'id' => 122,
    'name' => 'Liechtenstein',
    'image_name' => 'liechtenstein',
    'type' => 2,
    'is_language' => 1,
  ),
  122 =>
  array (
    'id' => 123,
    'name' => 'Lithuania',
    'image_name' => 'lithuania',
    'type' => 1,
    'is_language' => 1,
  ),
  123 =>
  array (
    'id' => 124,
    'name' => 'Luxembourg',
    'image_name' => 'luxembourg',
    'type' => 1,
    'is_language' => 1,
  ),
  124 =>
  array (
    'id' => 125,
    'name' => 'Macao',
    'image_name' => 'macao',
    'type' => 2,
    'is_language' => 1,
  ),
  125 =>
  array (
    'id' => 126,
    'name' => 'Macedonia',
    'image_name' => 'macedonia',
    'type' => 1,
    'is_language' => 1,
  ),
  126 =>
  array (
    'id' => 127,
    'name' => 'Madagascar',
    'image_name' => 'madagascar',
    'type' => 1,
    'is_language' => 1,
  ),
  127 =>
  array (
    'id' => 128,
    'name' => 'Malawi',
    'image_name' => 'malawi',
    'type' => 1,
    'is_language' => 1,
  ),
  128 =>
  array (
    'id' => 129,
    'name' => 'Malaysia',
    'image_name' => 'malaysia',
    'type' => 1,
    'is_language' => 1,
  ),
  129 =>
  array (
    'id' => 130,
    'name' => 'Maldives',
    'image_name' => 'maldives',
    'type' => 2,
    'is_language' => 1,
  ),
  130 =>
  array (
    'id' => 131,
    'name' => 'Mali',
    'image_name' => 'mali',
    'type' => 2,
    'is_language' => 1,
  ),
  131 =>
  array (
    'id' => 132,
    'name' => 'Malta',
    'image_name' => 'malta',
    'type' => 2,
    'is_language' => 1,
  ),
  132 =>
  array (
    'id' => 133,
    'name' => 'Maori',
    'image_name' => 'maori',
    'type' => 2,
    'is_language' => 1,
  ),
  133 =>
  array (
    'id' => 134,
    'name' => 'Marshall-Islands',
    'image_name' => 'marshal_islands',
    'type' => 2,
    'is_language' => 1,
  ),
  134 =>
  array (
    'id' => 135,
    'name' => 'Martinique',
    'image_name' => 'martinique',
    'type' => 2,
    'is_language' => 1,
  ),
  135 =>
  array (
    'id' => 136,
    'name' => 'Mauritania',
    'image_name' => 'mauritania',
    'type' => 2,
    'is_language' => 1,
  ),
  136 =>
  array (
    'id' => 137,
    'name' => 'Mauritius',
    'image_name' => 'mauritius',
    'type' => 2,
    'is_language' => 1,
  ),
  137 =>
  array (
    'id' => 138,
    'name' => 'Mexico',
    'image_name' => 'mexico',
    'type' => 1,
    'is_language' => 1,
  ),
  138 =>
  array (
    'id' => 139,
    'name' => 'Micronesia Federated',
    'image_name' => 'micronesia_federated',
    'type' => 2,
    'is_language' => 1,
  ),
  139 =>
  array (
    'id' => 140,
    'name' => 'Moldova',
    'image_name' => 'moldova',
    'type' => 2,
    'is_language' => 1,
  ),
  140 =>
  array (
    'id' => 141,
    'name' => 'Monaco',
    'image_name' => 'monaco',
    'type' => 2,
    'is_language' => 1,
  ),
  141 =>
  array (
    'id' => 142,
    'name' => 'Mongolia',
    'image_name' => 'mongolia',
    'type' => 1,
    'is_language' => 1,
  ),
  142 =>
  array (
    'id' => 143,
    'name' => 'Montenegro',
    'image_name' => 'montenegro',
    'type' => 2,
    'is_language' => 1,
  ),
  143 =>
  array (
    'id' => 144,
    'name' => 'Morocco',
    'image_name' => 'morocco',
    'type' => 1,
    'is_language' => 1,
  ),
  144 =>
  array (
    'id' => 145,
    'name' => 'Mozambique',
    'image_name' => 'mozambique',
    'type' => 1,
    'is_language' => 1,
  ),
  145 =>
  array (
    'id' => 146,
    'name' => 'Myanmar',
    'image_name' => 'myanmar',
    'type' => 1,
    'is_language' => 1,
  ),
  146 =>
  array (
    'id' => 147,
    'name' => 'Namibia',
    'image_name' => 'namibia',
    'type' => 1,
    'is_language' => 1,
  ),
  147 =>
  array (
    'id' => 148,
    'name' => 'Nauru',
    'image_name' => 'nauru',
    'type' => 2,
    'is_language' => 1,
  ),
  148 =>
  array (
    'id' => 149,
    'name' => 'Nepal',
    'image_name' => 'nepal',
    'type' => 2,
    'is_language' => 1,
  ),
  149 =>
  array (
    'id' => 150,
    'name' => 'Netherlands',
    'image_name' => 'netherlands',
    'type' => 1,
    'is_language' => 1,
  ),
  150 =>
  array (
    'id' => 151,
    'name' => 'New Zealand',
    'image_name' => 'new-zealand',
    'type' => 1,
    'is_language' => 1,
  ),
  151 =>
  array (
    'id' => 152,
    'name' => 'Nicaragua',
    'image_name' => 'nicaragua',
    'type' => 1,
    'is_language' => 1,
  ),
  152 =>
  array (
    'id' => 153,
    'name' => 'Niger',
    'image_name' => 'niger',
    'type' => 2,
    'is_language' => 1,
  ),
  153 =>
  array (
    'id' => 154,
    'name' => 'Nigeria',
    'image_name' => 'nigeria',
    'type' => 2,
    'is_language' => 1,
  ),
  154 =>
  array (
    'id' => 155,
    'name' => 'North Korea',
    'image_name' => 'north_korea',
    'type' => 2,
    'is_language' => 1,
  ),
  155 =>
  array (
    'id' => 156,
    'name' => 'Norway',
    'image_name' => 'norway',
    'type' => 1,
    'is_language' => 1,
  ),
  156 =>
  array (
    'id' => 157,
    'name' => 'Oman',
    'image_name' => 'oman',
    'type' => 2,
    'is_language' => 1,
  ),
  157 =>
  array (
    'id' => 158,
    'name' => 'Pakistan',
    'image_name' => 'pakistan',
    'type' => 1,
    'is_language' => 1,
  ),
  158 =>
  array (
    'id' => 159,
    'name' => 'Palau',
    'image_name' => 'palau',
    'type' => 2,
    'is_language' => 1,
  ),
  159 =>
  array (
    'id' => 160,
    'name' => 'Palestine',
    'image_name' => 'palestine',
    'type' => 2,
    'is_language' => 1,
  ),
  160 =>
  array (
    'id' => 161,
    'name' => 'Panama',
    'image_name' => 'panama',
    'type' => 1,
    'is_language' => 1,
  ),
  161 =>
  array (
    'id' => 162,
    'name' => 'Papua New Guinea',
    'image_name' => 'papua_new_guinea',
    'type' => 2,
    'is_language' => 1,
  ),
  162 =>
  array (
    'id' => 163,
    'name' => 'Paraguay',
    'image_name' => 'paraguay',
    'type' => 1,
    'is_language' => 1,
  ),
  163 =>
  array (
    'id' => 164,
    'name' => 'Peru',
    'image_name' => 'peru',
    'type' => 1,
    'is_language' => 1,
  ),
  164 =>
  array (
    'id' => 165,
    'name' => 'Philippines',
    'image_name' => 'philippines',
    'type' => 1,
    'is_language' => 1,
  ),
  165 =>
  array (
    'id' => 166,
    'name' => 'Poland',
    'image_name' => 'poland',
    'type' => 1,
    'is_language' => 1,
  ),
  166 =>
  array (
    'id' => 167,
    'name' => 'Portugal',
    'image_name' => 'portugal',
    'type' => 1,
    'is_language' => 1,
  ),
  167 =>
  array (
    'id' => 168,
    'name' => 'Puerto Rico',
    'image_name' => 'puerto_rico',
    'type' => 1,
    'is_language' => 1,
  ),
  168 =>
  array (
    'id' => 169,
    'name' => 'Qatar',
    'image_name' => 'qatar',
    'type' => 2,
    'is_language' => 1,
  ),
  169 =>
  array (
    'id' => 170,
    'name' => 'Quebec',
    'image_name' => 'quebec',
    'type' => 2,
    'is_language' => 1,
  ),
  170 =>
  array (
    'id' => 171,
    'name' => 'Romania',
    'image_name' => 'romania',
    'type' => 1,
    'is_language' => 1,
  ),
  171 =>
  array (
    'id' => 172,
    'name' => 'Russia',
    'image_name' => 'russia',
    'type' => 1,
    'is_language' => 1,
  ),
  172 =>
  array (
    'id' => 173,
    'name' => 'Rwanda',
    'image_name' => 'rwanda',
    'type' => 1,
    'is_language' => 1,
  ),
  173 =>
  array (
    'id' => 174,
    'name' => 'Saint Kitts and Nevis',
    'image_name' => 'saint_kitts_nevis',
    'type' => 2,
    'is_language' => 1,
  ),
  174 =>
  array (
    'id' => 175,
    'name' => 'Saint Lucia',
    'image_name' => 'saint_lucia',
    'type' => 2,
    'is_language' => 1,
  ),
  175 =>
  array (
    'id' => 176,
    'name' => 'Saint Vincent and the Grenadines',
    'image_name' => 'st_vincent_grenadines',
    'type' => 2,
    'is_language' => 1,
  ),
  176 =>
  array (
    'id' => 177,
    'name' => 'Samoa',
    'image_name' => 'samoa',
    'type' => 2,
    'is_language' => 1,
  ),
  177 =>
  array (
    'id' => 178,
    'name' => 'San Marino',
    'image_name' => 'san_marino',
    'type' => 2,
    'is_language' => 1,
  ),
  178 =>
  array (
    'id' => 179,
    'name' => 'Sao Tome and Principe',
    'image_name' => 'sao_tome_and_principe',
    'type' => 2,
    'is_language' => 1,
  ),
  179 =>
  array (
    'id' => 180,
    'name' => 'Saudi Arabia',
    'image_name' => 'saudi_arabia',
    'type' => 1,
    'is_language' => 1,
  ),
  180 =>
  array (
    'id' => 181,
    'name' => 'Scotland',
    'image_name' => 'scotland',
    'type' => 1,
    'is_language' => 1,
  ),
  181 =>
  array (
    'id' => 182,
    'name' => 'Senegal',
    'image_name' => 'senegal',
    'type' => 1,
    'is_language' => 1,
  ),
  182 =>
  array (
    'id' => 183,
    'name' => 'Serbia',
    'image_name' => 'serbia',
    'type' => 1,
    'is_language' => 1,
  ),
  183 =>
  array (
    'id' => 184,
    'name' => 'Seychelles',
    'image_name' => 'seychelles',
    'type' => 2,
    'is_language' => 1,
  ),
  184 =>
  array (
    'id' => 185,
    'name' => 'Sierra Leone',
    'image_name' => 'sierra_leone',
    'type' => 1,
    'is_language' => 1,
  ),
  185 =>
  array (
    'id' => 186,
    'name' => 'Sign Language',
    'image_name' => 'sign_language',
    'type' => 2,
    'is_language' => 0,
  ),
  186 =>
  array (
    'id' => 187,
    'name' => 'Singapore',
    'image_name' => 'singapore',
    'type' => 1,
    'is_language' => 1,
  ),
  187 =>
  array (
    'id' => 188,
    'name' => 'Slovakia',
    'image_name' => 'slovakia',
    'type' => 1,
    'is_language' => 1,
  ),
  188 =>
  array (
    'id' => 189,
    'name' => 'Slovenia',
    'image_name' => 'slovenia',
    'type' => 1,
    'is_language' => 1,
  ),
  189 =>
  array (
    'id' => 190,
    'name' => 'Solomon Islands',
    'image_name' => 'solomon_islands',
    'type' => 2,
    'is_language' => 1,
  ),
  190 =>
  array (
    'id' => 191,
    'name' => 'Somalia',
    'image_name' => 'somalia',
    'type' => 2,
    'is_language' => 1,
  ),
  191 =>
  array (
    'id' => 192,
    'name' => 'South Africa',
    'image_name' => 'south_africa',
    'type' => 1,
    'is_language' => 1,
  ),
  192 =>
  array (
    'id' => 193,
    'name' => 'South Korea',
    'image_name' => 'south_korea',
    'type' => 1,
    'is_language' => 1,
  ),
  193 =>
  array (
    'id' => 194,
    'name' => 'South Sudan',
    'image_name' => 'south_sudan',
    'type' => 2,
    'is_language' => 1,
  ),
  194 =>
  array (
    'id' => 195,
    'name' => 'Spain',
    'image_name' => 'spain',
    'type' => 1,
    'is_language' => 1,
  ),
  195 =>
  array (
    'id' => 196,
    'name' => 'Sri Lanka',
    'image_name' => 'sri_lanka',
    'type' => 1,
    'is_language' => 1,
  ),
  196 =>
  array (
    'id' => 197,
    'name' => 'Sudan',
    'image_name' => 'sudan',
    'type' => 2,
    'is_language' => 1,
  ),
  197 =>
  array (
    'id' => 198,
    'name' => 'Suriname',
    'image_name' => 'suriname',
    'type' => 2,
    'is_language' => 1,
  ),
  198 =>
  array (
    'id' => 199,
    'name' => 'Swaziland',
    'image_name' => 'swaziland',
    'type' => 2,
    'is_language' => 1,
  ),
  199 =>
  array (
    'id' => 200,
    'name' => 'Sweden',
    'image_name' => 'sweden',
    'type' => 1,
    'is_language' => 1,
  ),
  200 =>
  array (
    'id' => 201,
    'name' => 'Switzerland',
    'image_name' => 'switzerland',
    'type' => 1,
    'is_language' => 1,
  ),
  201 =>
  array (
    'id' => 202,
    'name' => 'Syria',
    'image_name' => 'syria',
    'type' => 1,
    'is_language' => 1,
  ),
  202 =>
  array (
    'id' => 203,
    'name' => 'Taiwan',
    'image_name' => 'taiwan',
    'type' => 1,
    'is_language' => 1,
  ),
  203 =>
  array (
    'id' => 204,
    'name' => 'Tajikistan',
    'image_name' => 'tajikistan',
    'type' => 2,
    'is_language' => 1,
  ),
  204 =>
  array (
    'id' => 205,
    'name' => 'Tanzania',
    'image_name' => 'tanzania',
    'type' => 2,
    'is_language' => 1,
  ),
  205 =>
  array (
    'id' => 206,
    'name' => 'Thailand',
    'image_name' => 'thailand',
    'type' => 1,
    'is_language' => 1,
  ),
  206 =>
  array (
    'id' => 207,
    'name' => 'Togo',
    'image_name' => 'togo',
    'type' => 2,
    'is_language' => 1,
  ),
  207 =>
  array (
    'id' => 208,
    'name' => 'Tonga',
    'image_name' => 'tonga',
    'type' => 2,
    'is_language' => 1,
  ),
  208 =>
  array (
    'id' => 209,
    'name' => 'Trinidad and Tobago',
    'image_name' => 'trinidad_tobago',
    'type' => 2,
    'is_language' => 1,
  ),
  209 =>
  array (
    'id' => 210,
    'name' => 'Tunisia',
    'image_name' => 'tunisia',
    'type' => 1,
    'is_language' => 1,
  ),
  210 =>
  array (
    'id' => 211,
    'name' => 'Turkey',
    'image_name' => 'turkey',
    'type' => 1,
    'is_language' => 1,
  ),
  211 =>
  array (
    'id' => 212,
    'name' => 'Turkmenistan',
    'image_name' => 'turkmenistan',
    'type' => 2,
    'is_language' => 1,
  ),
  212 =>
  array (
    'id' => 213,
    'name' => 'Tuvalu',
    'image_name' => 'tuvalu',
    'type' => 2,
    'is_language' => 1,
  ),
  213 =>
  array (
    'id' => 214,
    'name' => 'Uganda',
    'image_name' => 'uganda',
    'type' => 1,
    'is_language' => 1,
  ),
  214 =>
  array (
    'id' => 215,
    'name' => 'Ukraine',
    'image_name' => 'ukraine',
    'type' => 1,
    'is_language' => 1,
  ),
  215 =>
  array (
    'id' => 216,
    'name' => 'United Arab Emirates',
    'image_name' => 'united_arab_emirates',
    'type' => 1,
    'is_language' => 1,
  ),
  216 =>
  array (
    'id' => 217,
    'name' => 'United Kingdom',
    'image_name' => 'united_kingdom',
    'type' => 1,
    'is_language' => 1,
  ),
  217 =>
  array (
    'id' => 218,
    'name' => 'United States of America',
    'image_name' => 'united_states_of_america',
    'type' => 1,
    'is_language' => 1,
  ),
  218 =>
  array (
    'id' => 219,
    'name' => 'Uruguay',
    'image_name' => 'uruguay',
    'type' => 2,
    'is_language' => 1,
  ),
  219 =>
  array (
    'id' => 220,
    'name' => 'Uzbekistan',
    'image_name' => 'uzbekistan',
    'type' => 2,
    'is_language' => 1,
  ),
  220 =>
  array (
    'id' => 221,
    'name' => 'Vanuatu',
    'image_name' => 'vanuatu',
    'type' => 2,
    'is_language' => 1,
  ),
  221 =>
  array (
    'id' => 222,
    'name' => 'Vatican City',
    'image_name' => 'vatican_city',
    'type' => 2,
    'is_language' => 1,
  ),
  222 =>
  array (
    'id' => 223,
    'name' => 'Venezuela',
    'image_name' => 'venezuela',
    'type' => 1,
    'is_language' => 1,
  ),
  223 =>
  array (
    'id' => 224,
    'name' => 'Vietnam',
    'image_name' => 'vietnam',
    'type' => 1,
    'is_language' => 1,
  ),
  224 =>
  array (
    'id' => 225,
    'name' => 'Wales',
    'image_name' => 'wales',
    'type' => 2,
    'is_language' => 1,
  ),
  225 =>
  array (
    'id' => 226,
    'name' => 'Western Sahara',
    'image_name' => 'western_sahara',
    'type' => 2,
    'is_language' => 1,
  ),
  226 =>
  array (
    'id' => 227,
    'name' => 'Yemen',
    'image_name' => 'yemen',
    'type' => 2,
    'is_language' => 1,
  ),
  227 =>
  array (
    'id' => 228,
    'name' => 'Yiddish',
    'image_name' => 'yiddish',
    'type' => 2,
    'is_language' => 1,
  ),
  228 =>
  array (
    'id' => 229,
    'name' => 'Zambia',
    'image_name' => 'zambia',
    'type' => 2,
    'is_language' => 1,
  ),
  229 =>
  array (
    'id' => 230,
    'name' => 'Zimbabwe',
    'image_name' => 'zimbabwe',
    'type' => 2,
    'is_language' => 1,
  ),
);

        foreach($data as $flag) {
            \App\Flag::create([
                'name' => $flag['name'],
                'image' => $flag['image_name'],
                'type' => $flag['type'],
                'is_language' => $flag['is_language'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flags');
    }
}
