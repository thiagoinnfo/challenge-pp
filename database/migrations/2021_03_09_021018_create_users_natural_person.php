<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersNaturalPerson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_natural_person', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('user_id')->unsigned();
            $table->string('cpf', 14)->unique();
            $table->timestamps();
        });

        Schema::table('users_natural_person', function($table) {
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
        Schema::dropIfExists('users_natural_person');
    }
}
