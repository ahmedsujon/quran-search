<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteSetupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_setups', function (Blueprint $table) {
            $table->id();
            $table->string('header_logo')->nullable();
            $table->string('fav_icon')->nullable();
            $table->string('footer_logo')->nullable();
            $table->string('site_title')->nullable();
            $table->string('tag_line')->nullable();
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
        Schema::dropIfExists('website_setups');
    }
}
