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
        Schema::create('ecommerce_products', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->foreignId('category_id')->nullable()->references('id')->on('product_categories')->cascadeOnUpdate()->nullOnDelete();
            $table->json('content');
            $table->json('specifications');
            $table->text('cover_image')->nullable();
            $table->json('gallery');
            $table->seoSettings();
            $table->integer('sort_order')->default(0);
            $table->metadata();
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
        Schema::dropIfExists('ecommerce_products');
    }
};
