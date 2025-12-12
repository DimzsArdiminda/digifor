<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DataKorban;
use App\Models\Kasus;
use Illuminate\Support\Str;

class DigiforSeeder extends Seeder
{

    public function run(): void
    {
        $idUuid1 = Str::uuid()->toString();
        $idUuid2 = Str::uuid()->toString();
        $idUuid3 = Str::uuid()->toString();

        DataKorban::create([
            'id' => $idUuid1,
            'nama_lengkap' => 'John Doe',
            'no_hp' => '081234567890',
            'deskripsi_kejadian' => 'Korban mengalami pencurian data pribadi melalui email phishing.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DataKorban::create([
            'id' => $idUuid2,
            'nama_lengkap' => 'Fulan',
            'no_hp' => '081234567890',
            'deskripsi_kejadian' => 'Korban mengalami pencurian mobil melalui peretasan sistem keamanan.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DataKorban::create([
            'id' => $idUuid3,
            'nama_lengkap' => 'Fulan',
            'no_hp' => '081234567890',
            'deskripsi_kejadian' => 'Korban mengalami penipuan online melalui situs palsu.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Kasus::create([
            'id' => Str::uuid()->toString(),
            'id_korban' => $idUuid1,
            'jenis_kasus' => 'Pencurian Data',
            'ringkasan_kasus' => 'Korban mengalami pencurian data pribadi melalui email phishing.',
            'status_kasus' => 'Pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Kasus::create([
            'id' => Str::uuid()->toString(),
            'id_korban' => $idUuid2,
            'jenis_kasus' => 'Pencurian Kendaraan', 
            'ringkasan_kasus' => 'Korban mengalami pencurian mobil melalui peretasan sistem keamanan.',
            'status_kasus' => 'In Progress',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Kasus::create([
            'id' => Str::uuid()->toString(),
            'id_korban' => $idUuid3,
            'jenis_kasus' => 'Penipuan Online',
            'ringkasan_kasus' => 'Korban mengalami penipuan online melalui situs palsu.',
            'status_kasus' => 'Completed',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}
