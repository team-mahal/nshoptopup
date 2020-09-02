<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->text('map_id');
            $table->date('start_at');
            $table->string('start_time');
            $table->string('match_name');
            $table->integer('perkill')->nullable();
            $table->integer('entry_fee')->nullable();
            $table->string('type');
            $table->enum('status',['upcoming','ongoing','result','cancel']);
            $table->integer('max_join')->nullable();
            $table->integer('min_join')->nullable();
            $table->string('room_id')->nullable();
            $table->string('password')->nullable();
            $table->text('total_prize');
            $table->text('platform');
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
        Schema::dropIfExists('matches');
    }
}
