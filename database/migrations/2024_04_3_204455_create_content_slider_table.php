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
        Schema::create('content_slider', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('teaser');
            $table->json('cta_button');
            $table->json('images');
            $table->metadata();
            $table->seoSettings();
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
        Schema::dropIfExists('content_slider');
    }
};
