@extends('layouts.master')

@section('title', 'Tambah Data Korban')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Tambah Data Korban</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('data-korban.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_korban" class="form-label">Nama Korban</label>
            <input type="text" name="nama_korban" id="nama_korban" class="form-control" value="{{ old('nama_korban') }}" required>
        </div>

        <div class="mb-3">
            <label for="kontak_korban" class="form-label">Kontak Korban</label>
            <input type="text" name="kontak_korban" id="kontak_korban" class="form-control" value="{{ old('kontak_korban') }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat_korban" class="form-label">Alamat Korban</label>
            <input type="text" name="alamat_korban" id="alamat_korban" class="form-control" value="{{ old('alamat_korban') }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi_kejadian" class="form-label">Deskripsi Kejadian</label>
            <textarea name="deskripsi_kejadian" id="deskripsi_kejadian" rows="4" class="form-control" required>{{ old('deskripsi_kejadian') }}</textarea>
        </div>

        <a href="{{ route('data-korban.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
