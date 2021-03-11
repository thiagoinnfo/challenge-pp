<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersJuridicalPerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_juridical_person', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('company_name');
            $table->string('trading_name');
            $table->string('cnpj', 18);
            $table->timestamps();
        });

        Schema::table('users_juridical_person', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_juridical_person');
    }
}
