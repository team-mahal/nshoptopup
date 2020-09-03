<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallet_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('paymentMethod');
            $table->string('paymentNumber');
            $table->string('transactionid');
            $table->string('amount');
            $table->enum('status', array('pandding', 'complete', 'cancel'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wallet_infos');
    }
}
