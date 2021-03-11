<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersNaturalPearsonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_natural_person')->insert([
            'user_id' => 1,
            'cpf' => '11111111111'
        ]);
    }
}
