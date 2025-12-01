<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\DataKorban;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KasusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kasus = Kasus::with('korban')->get();
        return view('pages.kasus.index', compact('kasus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $korban = DataKorban::all();
        return view('pages.kasus.create', compact('korban'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_korban' => 'required',
            'jenis_kasus' => 'required',
            'ringkasan_kasus' => 'required',
            'status_kasus' => 'required'
        ]);

        Kasus::create([
            'id' => Str::uuid(),
            'id_korban' => $request->id_korban,
            'jenis_kasus' => $request->jenis_kasus,
            'ringkasan_kasus' => $request->ringkasan_kasus,
            'status_kasus' => $request->status_kasus
        ]);

        return redirect()->route('kasus.index')->with('success', 'Kasus berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kasus = Kasus::findOrFail($id);
        $korban = DataKorban::all();
        return view('pages.kasus.edit', compact('kasus','korban'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kasus = Kasus::findOrFail($id);
        $kasus->update($request->all());

        return redirect('/kasus')->with('success', 'Kasus berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Kasus::destroy($id);
        return redirect('/kasus')->with('success', 'Kasus berhasil dihapus');
    }
}
