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
        Schema::create('content_blog', function (Blueprint $table) {
            $table->id();
            $table->json('title');
            $table->json('teaser');
            $table->json('content');
            $table->text('cover_image')->nullable();
            $table->json('inner_cover_image');
            $table->foreignId('category_id')->nullable()->constrained('tags')->cascadeOnUpdate()->nullOnDelete();
            $table->seoSettings();
            $table->metadata();
            $table->boolean('is_published')->default(false);
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
        Schema::dropIfExists('content_blog');
    }
};
