@extends('layouts.master')

@section('title', 'Data Korban')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Data Korban</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('data-korban.create') }}" class="btn btn-primary mb-3">Tambah Korban</a>

    <table class="table table-bordered table-striped align-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Korban</th>
                <th>Kontak</th>
                <th>Deskripsi Kejadian</th>
                <th style="width: 160px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dataKorban as $index => $korban)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $korban->nama_lengkap }}</td>
                    <td>{{ $korban->no_hp }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($korban->deskripsi_kejadian, 80) }}</td>
                    <td>
                        <a href="{{ route('data-korban.edit', $korban->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                        <form action="{{ route('data-korban.destroy', $korban->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data korban.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
