<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdraw_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('paymentMethod');
            $table->string('receiverNumber');
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
        Schema::dropIfExists('withdraw_infos');
    }
}
