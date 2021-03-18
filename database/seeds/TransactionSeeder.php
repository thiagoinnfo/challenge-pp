<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the TransactionSeeder seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transactions')->insert([
            'value' => 100,
            'payer' => 1,
            'payee' => 2
        ]);
    }
}
