<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id', true);
            $table->float('value');
            $table->integer('payer')->unsigned();
            $table->integer('payee')->unsigned();
            $table->timestamps();
        });

        Schema::table('transactions', function($table) {
            $table->foreign('payer')->references('id')->on('users');
            $table->foreign('payee')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
