<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kasus', function (Blueprint $table) {
            $table->enum('status_kasus', ['Pending', 'In Progress', 'Completed'])
                  ->default('Pending')
                  ->after('ringkasan_kasus');
        });
    }

    public function down(): void
    {
        Schema::table('kasus', function (Blueprint $table) {
            $table->dropColumn('status_kasus');
        });
    }
};
