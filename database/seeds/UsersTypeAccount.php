<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTypeAccount extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_type_account')->insert([
            'name' => 'Pessoa Fisica',
            'alias' => 'PF'
        ]);

        DB::table('users_type_account')->insert([
            'name' => 'Pessoa Juridica',
            'alias' => 'PJ'
        ]);
    }
}
