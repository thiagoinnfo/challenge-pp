<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTypeAccountSeeder extends Seeder
{
    /**
     * Run the UsersTypeAccountSeeder seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersTypeAccount = [
            ['name' => 'Pessoa Fisica', 'alias' => 'PF'],
            ['name' => 'Pessoa Juridica', 'alias' => 'PJ']
        ];

        DB::table('users_type_account')->insert($usersTypeAccount);
    }
}
