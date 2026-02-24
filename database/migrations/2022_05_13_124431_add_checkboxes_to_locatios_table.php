<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->string('gray')->nullable();
			$table->string('blue')->nullable();
            $table->string('lightblue')->nullable();
            $table->string('green')->nullable();
            $table->string('yellow')->nullable();
            $table->string('orange')->nullable();
            $table->string('red')->nullable();
            $table->string('south')->nullable();
            $table->string('north')->nullable();
            $table->string('west')->nullable();
            $table->string('east')->nullable();
            $table->string('hills')->nullable();
            $table->string('plato')->nullable();
            $table->string('auto1')->nullable();
            $table->string('auto2')->nullable();
            $table->string('train')->nullable();
            $table->string('bus')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropColumn(['gray', 'blue', 'lightblue', 'green', 'yellow', 'orange', 'red', 'south', 'north', 'west', 'east', 'hills', 'valley', 'plato', 'auto1', 'auto2', 'train', 'bus']);
        });
    }
};
