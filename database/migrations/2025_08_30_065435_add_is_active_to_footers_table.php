<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('footers', function (Blueprint $table) {
            $table->boolean('is_active')->default(false)->after('map_embed');
        });
    }

    public function down(): void
    {
        Schema::table('footers', function (Blueprint $table) {
            //
        });
    }
};
