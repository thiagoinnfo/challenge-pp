<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'John David',
                'email' => 'johndavid@example.com',
                'user_type_account_id' => 1
            ],
            
            [
                'name' => 'James Robert',
                'email' => 'jamesrobert@example.com',
                'user_type_account_id' => 2
            ]
        ];

        DB::table('users')->insert($users);
    }
}
