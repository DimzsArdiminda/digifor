<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_user', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('photo');
            $table->string('email');
            $table->mediumText('google_token')->nullable();
            $table->mediumText('google_refresh_token')->nullable();
            $table->enum('role',['admin', 'user'])->default('user');
            $table->string('no_hp')->nullable();
            $table->string('alamat')->nullable();
             $table->string('reset_token')->nullable();
            $table->timestamp('reset_token_expiry')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_user');
    }
};
