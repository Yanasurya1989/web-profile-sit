<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('detil_jenjang', function (Blueprint $table) {
            $table->string('link_pendaftaran')->nullable()->after('gambar');
        });
    }

    public function down(): void
    {
        Schema::table('detil_jenjang', function (Blueprint $table) {
            $table->dropColumn('link_pendaftaran');
        });
    }
};
