<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('filament_media_library', function (Blueprint $table) {
            $table->dropForeign(['uploaded_by_user_id']);
            $table->json('metadata')->after('uploaded_by_user_id')->nullable();
        });
    }

    public function down()
    {
        Schema::table('filament_media_library', function (Blueprint $table) {
            $table->dropColumn('metadata');
        });
    }
};

