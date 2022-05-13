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
            $table->string('code')->nullable();
            $table->string('url_gmap')->nullable();
            $table->string('url_wiki')->nullable();
            $table->string('url_openstr')->nullable();
            $table->string('link_ody')->nullable();

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
            $table->dropColumn(['code','url_gmap', 'url_wiki', 'url_openstr', 'link_ody']);
        });
    }
};
