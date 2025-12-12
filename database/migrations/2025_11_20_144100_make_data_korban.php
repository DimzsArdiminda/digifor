<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_korban', function (Blueprint $table) {
            // PK sesuai ERD: id_korban (INT, auto increment)
            $table->uuid('id')->primary();
            $table->string('nama_lengkap');        // VARCHAR - Nama Korban
            $table->string('no_hp');      // VARCHAR - Nomor / kontak
            $table->text('deskripsi_kejadian');   // TEXT - ringkasan kejadian

            $table->timestamps();                 // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_korban');
    }
};
