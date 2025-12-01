<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DataKorban;
use Illuminate\Http\Request;

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
            'nama_korban'        => 'required|string|max:255',
            'kontak_korban'      => 'required|string|max:255',
            'alamat_korban'      => 'required|string|max:255',
            'deskripsi_kejadian' => 'required|string',
        ]);

        DataKorban::create($request->only([
            'nama_korban',
            'kontak_korban',
            'alamat_korban',
            'deskripsi_kejadian',
        ]));

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

        // view: resources/views/pages/data_korban/edit.blade.php
        return view('pages.data_korban.edit', compact('korban'));
    }

    public function update(Request $request, string $id_korban)
    {
        $request->validate([
            'nama_korban'        => 'required|string|max:255',
            'kontak_korban'      => 'required|string|max:255',
            'alamat_korban'      => 'required|string|max:255',
            'deskripsi_kejadian' => 'required|string',
        ]);

        $korban = DataKorban::findOrFail($id_korban);

        $korban->update($request->only([
            'nama_korban',
            'kontak_korban',
            'alamat_korban',
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
