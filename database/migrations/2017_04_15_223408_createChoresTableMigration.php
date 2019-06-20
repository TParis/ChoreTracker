<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChoresTableMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kids');;
            $table->string('daysOfWeek');
            $table->string('name', 256);
            $table->string('description', 2048);
            $table->integer('points')->default(0);
            $table->string('location', 512);
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
        Schema::dropIfExists('chores');
    }
}
