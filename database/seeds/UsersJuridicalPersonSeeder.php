<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersJuridicalPersonSeeder extends Seeder
{
    /**
     * Run the UsersJuridicalPersonSeeder seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_juridical_person')->insert([
            'user_id' => 2,
            'company_name' => 'Richard Burguers Ltda',
            'trading_name' => 'Burguers fest',
            'cnpj' => '11111111000101'
        ]);
    }
}
