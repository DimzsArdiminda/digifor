<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DataKorban;
use App\Models\Kasus;
use App\Models\TindakanForensik;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DigiforSeeder extends Seeder
{

    public function run(): void
    {
        // Data Korban
        $korbanData = [
            ['nama' => 'Ahmad Rizki', 'no_hp' => '081234567890', 'deskripsi' => 'Korban mengalami pencurian data pribadi melalui email phishing yang berisi link berbahaya.'],
            ['nama' => 'Siti Nurhaliza', 'no_hp' => '082345678901', 'deskripsi' => 'Korban mengalami peretasan akun media sosial dan penyebaran informasi pribadi.'],
            ['nama' => 'Budi Santoso', 'no_hp' => '083456789012', 'deskripsi' => 'Korban mengalami pencurian kendaraan melalui peretasan sistem keamanan mobil pintar.'],
            ['nama' => 'Dewi Lestari', 'no_hp' => '084567890123', 'deskripsi' => 'Korban mengalami penipuan online melalui situs e-commerce palsu dengan kerugian Rp 50 juta.'],
            ['nama' => 'Eko Prasetyo', 'no_hp' => '085678901234', 'deskripsi' => 'Korban mengalami ransomware attack pada sistem komputer perusahaan.'],
            ['nama' => 'Fitri Handayani', 'no_hp' => '086789012345', 'deskripsi' => 'Korban mengalami pencurian data kartu kredit melalui skimming ATM.'],
            ['nama' => 'Gunawan Wijaya', 'no_hp' => '087890123456', 'deskripsi' => 'Korban mengalami cyber stalking dan ancaman melalui berbagai platform digital.'],
            ['nama' => 'Hani Kartika', 'no_hp' => '088901234567', 'deskripsi' => 'Korban mengalami pencurian identitas digital untuk melakukan transaksi ilegal.'],
            ['nama' => 'Irfan Maulana', 'no_hp' => '089012345678', 'deskripsi' => 'Korban mengalami peretasan sistem CCTV rumah dan pelanggaran privasi.'],
            ['nama' => 'Joko Widodo', 'no_hp' => '081123456789', 'deskripsi' => 'Korban mengalami penipuan investasi online dengan modus cryptocurrency palsu.'],
            ['nama' => 'Kartini Putri', 'no_hp' => '082234567890', 'deskripsi' => 'Korban mengalami pencurian data pelanggan dari database perusahaan.'],
            ['nama' => 'Lukman Hakim', 'no_hp' => '083345678901', 'deskripsi' => 'Korban mengalami serangan DDoS pada website bisnis online miliknya.'],
            ['nama' => 'Maya Sari', 'no_hp' => '084456789012', 'deskripsi' => 'Korban mengalami pencurian akun mobile banking dan transfer dana ilegal.'],
            ['nama' => 'Nugroho Adi', 'no_hp' => '085567890123', 'deskripsi' => 'Korban mengalami peretasan email perusahaan untuk melakukan BEC (Business Email Compromise).'],
            ['nama' => 'Olivia Tan', 'no_hp' => '086678901234', 'deskripsi' => 'Korban mengalami penyebaran foto dan video pribadi tanpa izin di internet.'],
        ];

        $korbanIds = [];
        foreach ($korbanData as $korban) {
            $id = Str::uuid()->toString();
            $korbanIds[] = $id;
            DataKorban::create([
                'id' => $id,
                'nama_lengkap' => $korban['nama'],
                'no_hp' => $korban['no_hp'],
                'deskripsi_kejadian' => $korban['deskripsi'],
                'created_at' => Carbon::now()->subDays(rand(1, 180)),
                'updated_at' => now(),
            ]);
        }

        // Jenis Kasus dan Status
        $jenisKasus = [
            'Pencurian Data Pribadi',
            'Peretasan Akun',
            'Pencurian Kendaraan',
            'Penipuan Online',
            'Ransomware Attack',
            'Credit Card Fraud',
            'Cyber Stalking',
            'Identity Theft',
            'Privacy Breach',
            'Investment Scam',
            'Data Breach',
            'DDoS Attack',
            'Mobile Banking Fraud',
            'Business Email Compromise',
            'Cyber Bullying',
        ];

        $statusKasus = ['Pending', 'In Progress', 'Completed'];

        $kasusIds = [];
        foreach ($korbanIds as $index => $korbanId) {
            $kasusId = Str::uuid()->toString();
            $kasusIds[] = $kasusId;
            
            $createdAt = Carbon::now()->subDays(rand(1, 180));
            
            Kasus::create([
                'id' => $kasusId,
                'id_korban' => $korbanId,
                'jenis_kasus' => $jenisKasus[$index],
                'ringkasan_kasus' => $korbanData[$index]['deskripsi'],
                'status_kasus' => $statusKasus[array_rand($statusKasus)],
                'created_at' => $createdAt,
                'updated_at' => now(),
            ]);
        }

        // Tindakan Forensik
        $tindakanList = [
            'Melakukan imaging hard drive untuk preservasi bukti digital',
            'Analisis log file sistem untuk mendeteksi aktivitas mencurigakan',
            'Ekstraksi data dari smartphone korban menggunakan tool forensik',
            'Analisis network traffic untuk mengidentifikasi sumber serangan',
            'Recovery data yang terhapus dari media penyimpanan',
            'Analisis malware untuk mengidentifikasi jenis dan metode serangan',
            'Pengumpulan bukti digital dari social media accounts',
            'Analisis metadata dari file digital yang ditemukan',
            'Pemeriksaan RAM untuk mencari bukti volatile',
            'Analisis email headers untuk tracking sumber phishing',
            'Dekripsi file yang dienkripsi oleh ransomware',
            'Analisis database untuk mendeteksi SQL injection',
            'Pemeriksaan browser history dan cache',
            'Analisis CCTV footage untuk korelasi dengan data digital',
            'Dokumentasi chain of custody untuk bukti digital',
            'Analisis mobile app data untuk bukti transaksi',
            'Pemeriksaan cloud storage untuk file yang dicuri',
            'Analisis cryptocurrency wallet untuk tracking transaksi',
            'Verifikasi digital signature dan timestamp',
            'Penyusunan laporan forensik untuk keperluan hukum',
        ];

        // Buat banyak tindakan forensik untuk setiap kasus
        foreach ($kasusIds as $kasusId) {
            $jumlahTindakan = rand(3, 8); // Setiap kasus punya 3-8 tindakan
            
            for ($i = 0; $i < $jumlahTindakan; $i++) {
                $waktuTindakan = Carbon::now()->subDays(rand(1, 150))->subHours(rand(0, 23));
                
                TindakanForensik::create([
                    'id' => Str::uuid()->toString(),
                    'id_kasus' => $kasusId,
                    'tindakan_dilakuakan' => $tindakanList[array_rand($tindakanList)],
                    'waktu_tindakan' => $waktuTindakan,
                    'created_at' => $waktuTindakan,
                    'updated_at' => now(),
                ]);
            }
        }

        // Tambahan: Buat beberapa kasus dengan banyak tindakan untuk demonstrasi
        for ($i = 0; $i < 5; $i++) {
            $kasusId = Str::uuid()->toString();
            $korbanId = $korbanIds[array_rand($korbanIds)];
            
            $createdAt = Carbon::now()->subDays(rand(1, 90));
            
            Kasus::create([
                'id' => $kasusId,
                'id_korban' => $korbanId,
                'jenis_kasus' => $jenisKasus[array_rand($jenisKasus)],
                'ringkasan_kasus' => 'Kasus kompleks yang memerlukan investigasi mendalam dengan berbagai tindakan forensik.',
                'status_kasus' => $statusKasus[array_rand($statusKasus)],
                'created_at' => $createdAt,
                'updated_at' => now(),
            ]);

            // Buat banyak tindakan untuk kasus kompleks ini
            for ($j = 0; $j < rand(10, 15); $j++) {
                $waktuTindakan = Carbon::now()->subDays(rand(1, 90))->subHours(rand(0, 23));
                
                TindakanForensik::create([
                    'id' => Str::uuid()->toString(),
                    'id_kasus' => $kasusId,
                    'tindakan_dilakuakan' => $tindakanList[array_rand($tindakanList)],
                    'waktu_tindakan' => $waktuTindakan,
                    'created_at' => $waktuTindakan,
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info('Seeder berhasil! Total data:');
        $this->command->info('- Korban: ' . DataKorban::count());
        $this->command->info('- Kasus: ' . Kasus::count());
        $this->command->info('- Tindakan Forensik: ' . TindakanForensik::count());
    }
}
