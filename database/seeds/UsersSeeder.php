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
        DB::table('users')->insert([
            'name' => 'John David',
            'email' => 'johndavid@example.com',
            'user_type_account_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'James Robert',
            'email' => 'jamesrobert@example.com',
            'user_type_account_id' => 2
        ]);
    }
}
