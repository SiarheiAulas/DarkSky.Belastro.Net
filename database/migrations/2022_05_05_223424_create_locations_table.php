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
        Schema::create('locations', function (Blueprint $table) {
			$table->id();
			$table->timestamps();
            $table->string('name')->required();
            $table->double('lat', 20, 9)->required();
            $table->double('long',20, 8)->required();
            $table->string('direction')->required();
            $table->string('lp')->required();
            $table->string('horizon')->required();
            $table->string('hills')->required();
            $table->string('transp')->required();
            $table->text('description')->required();
			$table->string('url')->required();
            $table->string('host')->required();
            $table->integer('distance')->nullable();
            $table->float('sqm')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locations');
    }
};
