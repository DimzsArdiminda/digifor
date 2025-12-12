<?php

namespace App\Http\Controllers;

use App\Models\DataKorban;
use App\Models\Kasus;
use App\Models\TindakanForensik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatistikController extends Controller
{
    public function index()
    {
        // Total data
        $totalKorban = DataKorban::count();
        $totalKasus = Kasus::count();
        $totalTindakan = TindakanForensik::count();

        // Kasus berdasarkan status
        $kasusByStatus = Kasus::select('status_kasus', DB::raw('count(*) as total'))
            ->groupBy('status_kasus')
            ->get();

        // Kasus berdasarkan jenis
        $kasusByJenis = Kasus::select('jenis_kasus', DB::raw('count(*) as total'))
            ->groupBy('jenis_kasus')
            ->orderBy('total', 'desc')
            ->get();

        // Tindakan forensik per bulan (6 bulan terakhir)
        $tindakanPerBulan = TindakanForensik::select(
                DB::raw('DATE_FORMAT(waktu_tindakan, "%Y-%m") as bulan'),
                DB::raw('count(*) as total')
            )
            ->where('waktu_tindakan', '>=', now()->subMonths(6))
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        // Kasus per bulan (6 bulan terakhir)
        $kasusPerBulan = Kasus::select(
                DB::raw('DATE_FORMAT(created_at, "%Y-%m") as bulan'),
                DB::raw('count(*) as total')
            )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        return view('pages.statistik.index', compact(
            'totalKorban',
            'totalKasus',
            'totalTindakan',
            'kasusByStatus',
            'kasusByJenis',
            'tindakanPerBulan',
            'kasusPerBulan'
        ));
    }
}
