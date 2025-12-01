@extends('layouts.master')

@section('title', 'Tambah Kasus')
@section('kasus', 'active')

@section('content')
<div class="container">
    <h2>Tambah Kasus</h2>
 
    <form action="{{ route('kasus.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Korban</label>
            <select name="id_korban" class="form-control" required>
                <option value="">-- Pilih Korban --</option>
                @foreach ($korban as $k)
                    <option value="{{ $k->id }}">{{ $k->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jenis Kasus</label>
            <input type="text" name="jenis_kasus" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Ringkasan Kasus</label>
            <textarea name="ringkasan_kasus" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label>Status Kasus</label>
            <select name="status_kasus" class="form-control">
                <option value="Pending">Pending</option>
                <option value="Proses">Proses</option>
                <option value="Selesai">Selesai</option>
            </select>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
