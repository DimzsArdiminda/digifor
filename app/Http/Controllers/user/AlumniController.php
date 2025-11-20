<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display alumni data page
     */
    public function data()
    {
        $data = [
            'title' => 'Data Alumni',
            'totalAlumni' => 1234,
            'registered' => 856,
            'verified' => 723
        ];
        
        return view('layouts.user.form-pendataan', compact('data'));
    }

    /**
     * Display employment status page
     */
    public function employment()
    {
        $data = [
            'title' => 'Status Pekerjaan',
            'bekerja' => 78,
            'wirausaha' => 12,
            'studiLanjut' => 8,
            'mencariKerja' => 2
        ];
        
        return view('layouts.user.form-pendataan', compact('data'));
    }
}
