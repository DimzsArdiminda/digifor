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
            $table->increments('id_korban');

            $table->string('nama_korban');        // VARCHAR - Nama Korban
            $table->string('kontak_korban');      // VARCHAR - Nomor / kontak
            $table->string('alamat_korban');      // VARCHAR - alamat domisili / lokasi kejadian
            $table->text('deskripsi_kejadian');   // TEXT - ringkasan kejadian

            $table->timestamps();                 // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_korban');
    }
};
