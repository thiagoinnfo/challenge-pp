<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletsSeeder extends Seeder
{
    /**
     * Run the WalletsSeeder seeds.
     *
     * @return void
     */
    public function run()
    {
        $wallets = [
            ['amount' => '500.00', 'user_id' => 1],
            ['amount' => '22000.00', 'user_id' => 2]
        ];

        DB::table('wallets')->insert($wallets);
    }
}
