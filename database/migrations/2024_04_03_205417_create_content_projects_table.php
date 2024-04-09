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
        Schema::create('content_projects', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('teaser');
            $table->json('type');
            $table->json('content_top');
            $table->json('options');
            $table->json('content_bottom');
            $table->text('cover_image')->nullable();
            $table->json('gallery');
            $table->seoSettings();
            $table->metadata();
            $table->timestamp('published_at')->nullable();
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
        Schema::dropIfExists('content_projects');
    }
};
