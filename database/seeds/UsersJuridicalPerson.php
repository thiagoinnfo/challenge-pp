<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersJuridicalPerson extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_juridical_pearson')->insert([
            'user_id' => 2,
            'company_name' => 'Richard Burguers Ltda',
            'trading_name' => 'Burguers fest',
            'cnpj' => '11111111000101'
        ]);
    }
}
