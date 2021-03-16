<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReprocessNotification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reprocess_notification', function (Blueprint $table) {
            $table->increments('id', true);
            $table->integer('transaction_id')->unsigned();
            $table->integer('status');
            $table->timestamps();
        });

        Schema::table('reprocess_notification', function($table) {
            $table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reprocess_notification');
    }
}
