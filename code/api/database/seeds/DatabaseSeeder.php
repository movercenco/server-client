<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::forceCreate([
            'email' => 'lingo@example.com',
            'password' => '123456',
            'first_name' => 'I\'m',
            'last_name' => 'Lingo',
            'role_type' => 1,
            'avatar' => 'https://randomuser.me/api/portraits/men/1.jpg',
        ]);

        User::forceCreate([
            'email' => 'cm@example.com',
            'password' => '123456',
            'first_name' => 'I\'m',
            'last_name' => 'City Manager',
            'role_type' => 2,
            'avatar' => 'https://randomuser.me/api/portraits/men/2.jpg',
        ]);

        User::forceCreate([
            'email' => 'supplier@example.com',
            'password' => '123456',
            'first_name' => 'I\'m',
            'last_name' => 'Supplier',
            'role_type' => 3,
            'avatar' => 'https://randomuser.me/api/portraits/men/3.jpg',
            'supplier_flag_weight' => 14,
            'supplier_currency' => 'SGD'
        ]);

        User::forceCreate([
            'email' => 'admin@example.com',
            'password' => '123456',
            'first_name' => 'I\'m',
            'last_name' => 'Admin',
            'role_type' => 4,
            'avatar' => 'https://randomuser.me/api/portraits/men/4.jpg',
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
