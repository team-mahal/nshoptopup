<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchusers', function (Blueprint $table) {
            $table->id();
            $table->integer('match_id');
            $table->integer('user_id');
            $table->integer('total_kill')->default(0);
            $table->integer('lavel_earn')->default(0);
            $table->integer('total_earn')->default(0);
            $table->text('gamename');
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
        Schema::dropIfExists('matchusers');
    }
}
