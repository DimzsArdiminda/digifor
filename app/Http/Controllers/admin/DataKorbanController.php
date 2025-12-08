<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DataKorban;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataKorbanController extends Controller
{
    public function index()
    {
        $dataKorban = DataKorban::orderBy('created_at', 'desc')->get();

        // view: resources/views/pages/data_korban/index.blade.php
        return view('pages.data_korban.index', compact('dataKorban'));
    }

    public function create()
    {
        // view: resources/views/pages/data_korban/create.blade.php
        return view('pages.data_korban.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap'        => 'required|string|max:255',
            'no_hp'      => 'required|max:255',
            'deskripsi_kejadian' => 'required|string',
        ]);
        
        $model = DataKorban::create([
            'id' => Str::uuid(),
            'nama_lengkap'        => $request->input('nama_lengkap'),
            'no_hp'      => $request->input('no_hp'),
            'deskripsi_kejadian' => $request->input('deskripsi_kejadian'),
        ]);

        return redirect()
            ->route('data-korban.index')
            ->with('success', 'Data korban berhasil ditambahkan.');
    }

    public function show(string $id_korban)
    {
        $korban = DataKorban::findOrFail($id_korban);

        // view: resources/views/pages/data_korban/show.blade.php
        return view('pages.data_korban.show', compact('korban'));
    }

    public function edit(string $id_korban)
    {
        $korban = DataKorban::findOrFail($id_korban);

        // ??view: resources/views/pages/data_korban/edit.blade.php
        return view('pages.data_korban.edit', compact('korban'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_lengkap'        => 'required|string|max:255',
            'no_hp'      => 'required|string|max:255',
            // 'alamat_korban'      => 'required|string|max:255',
            'deskripsi_kejadian' => 'required|string',
        ]);
        $id_korban = $request->input('id_korban');
        $korban = DataKorban::findOrFail($id_korban);
        // \dd($korban);

        $korban->update($request->only([
            'nama_lengkap',
            'no_hp',
            // 'alamat_korban',
            'deskripsi_kejadian',
        ]));

        return redirect()
            ->route('data-korban.index')
            ->with('success', 'Data korban berhasil diperbarui.');
    }

    public function destroy(string $id_korban)
    {
        $korban = DataKorban::findOrFail($id_korban);
        $korban->delete();

        return redirect()
            ->route('data-korban.index')
            ->with('success', 'Data korban berhasil dihapus.');
    }
}
