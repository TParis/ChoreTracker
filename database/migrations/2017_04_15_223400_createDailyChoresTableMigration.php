<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyChoresTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailyChores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kid_id')->unsigned();
            $table->foreign('kid_id')->references('id')->on('kids');
            $table->date('date');
            $table->string('name', 256);
            $table->string('description', 2048);
            $table->string('location', 512);
            $table->integer('points')->default(0);
            $table->boolean('complete')->default(0);
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
        Schema::dropIfExists('dailyChores');
    }
}
