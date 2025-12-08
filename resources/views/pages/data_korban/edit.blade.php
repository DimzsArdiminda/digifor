@extends('layouts.master')

@section('title', 'Edit Data Korban')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Edit Data Korban</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('data-korban.update', $korban->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Korban</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="{{ old('nama_lengkap', $korban->nama_lengkap) }}" required>
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">Kontak Korban</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" value="{{ old('no_hp', $korban->no_hp) }}" required>
            <input type="hidden" name="id_korban" id="id_korban" class="form-control" value="{{ $korban->id }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi_kejadian" class="form-label">Deskripsi Kejadian</label>
            <textarea name="deskripsi_kejadian" id="deskripsi_kejadian" rows="4" class="form-control" required>{{ old('deskripsi_kejadian', $korban->deskripsi_kejadian) }}</textarea>
        </div>

        <a href="{{ route('data-korban.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
