<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagTables extends Migration
{
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type')->nullable();
            $table->integer('order_column')->nullable();
            $table->metadata('extra_attributes');
            $table->metadata();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['name', 'type']);
        });

        Schema::create('taggables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->morphs('taggable');
            $table->metadata();
            $table->timestamps();
            $table->unique(['tag_id', 'taggable_id', 'taggable_type']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('taggables');
        Schema::dropIfExists('tags');
    }
}
