<?php

namespace App\Http\Controllers;

use App\Models\TindakanForensik;
use App\Models\Kasus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TindakanForensikController extends Controller
{
    public function index()
    {
        $data = TindakanForensik::with('kasus')->get();
        return view('pages.tindakan.index', compact('data'));
    }

    public function create()
    {
        $kasus = Kasus::all();
        return view('pages.tindakan.create', compact('kasus'));
    }

    public function store(Request $request)
    {
        // \dd($request->all());
        $request->validate([
            'id_kasus' => 'required',
            'tindakan_dilakuakan' => 'required',
            'waktu_tindakan' => 'required',
        ]);

        TindakanForensik::create([
            'id' => Str::uuid(),  // UUID
            'id_kasus' => $request->id_kasus,
            'tindakan_dilakuakan' => $request->tindakan_dilakuakan,
            'waktu_tindakan' => $request->waktu_tindakan,
        ]);

        return redirect()->route('tindakan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $item = TindakanForensik::findOrFail($id);
        $kasus = Kasus::all();
        return view('pages.tindakan.edit', compact('item', 'kasus'));
    }

    public function update(Request $request, $id)
    {
        $item = TindakanForensik::findOrFail($id);

        $item->update([
            'id_kasus' => $request->id_kasus,
            'tindakan_dilakuakan' => $request->tindakan_dilakukan,
            'waktu_tindakan' => $request->waktu_tindakan,
        ]);

        return redirect()->route('tindakan.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $item = TindakanForensik::findOrFail($id);
        $item->delete();

        return redirect()->route('tindakan.index')->with('success', 'Data berhasil dihapus');
    }
}
