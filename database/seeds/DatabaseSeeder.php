<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTypeAccountSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(UsersNaturalPearsonSeeder::class);
        $this->call(UsersJuridicalPersonSeeder::class);
        $this->call(TransactionSeeder::class);
        $this->call(WalletsSeeder::class);
    }
}
