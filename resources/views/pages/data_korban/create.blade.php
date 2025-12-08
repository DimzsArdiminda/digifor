@extends('layouts.master')

@section('title', 'Tambah Data Korban')
@section('korban', 'active')

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
            <label for="nama_lengkap" class="form-label">Nama Korban</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">Kontak Korban</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp') }}" required>
        </div>
        {{-- <input type="hidden" name="id" id="id" class="form-control" value="{{ Illuminate\Support\Str::uuid() }}" readonly> --}}

        <div class="mb-3">
            <label for="deskripsi_kejadian" class="form-label">Deskripsi Kejadian</label>
            <textarea name="deskripsi_kejadian" id="deskripsi_kejadian" rows="4" class="form-control" required>{{ old('deskripsi_kejadian') }}</textarea>
        </div>

        <a href="{{ route('data-korban.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
