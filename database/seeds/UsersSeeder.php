<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the UsersSeeder seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'John David',
                'email' => 'johndavid@example.com',
                'password' => Hash::make('123mudar'),
                'user_type_account_id' => 1,
                'status' => 1
            ],

            [
                'name' => 'James Robert',
                'email' => 'jamesrobert@example.com',
                'password' => Hash::make('123mudar'),
                'user_type_account_id' => 2,
                'status' => 1
            ]
        ];

        DB::table('users')->insert($users);
    }
}
