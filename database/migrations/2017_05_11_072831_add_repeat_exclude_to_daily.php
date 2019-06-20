<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRepeatExcludeToDaily extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dailyChores', function (Blueprint $table) {
            $table->boolean('exclusive')->default(0);
            $table->boolean('repeatable')->default(0);
            $table->integer('chore_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dailyChores', function (Blueprint $table) {
            $table->dropColumn(['exclusive', 'repeatable', 'chore_id']);
        });
    }
}
