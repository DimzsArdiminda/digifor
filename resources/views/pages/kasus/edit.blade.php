@extends('layouts.master')

@section('title', 'Edit Kasus')
@section('kasus', 'active')

@section('content')
<div class="container">
    <h2>Edit Kasus</h2>
 
    <form action="{{ route('kasus.update', $kasus->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Korban</label>
            <select name="id_korban" class="form-control" required>
                @foreach ($korban as $k)
                    <option value="{{ $k->id }}" 
                        {{ $kasus->id_korban == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_lengkap }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jenis Kasus</label>
            <input type="text" name="jenis_kasus" class="form-control"
                   value="{{ $kasus->jenis_kasus }}" required>
        </div>

        <div class="mb-3">
            <label>Ringkasan Kasus</label>
            <textarea name="ringkasan_kasus" class="form-control" required>{{ $kasus->ringkasan_kasus }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status Kasus</label>
            <select name="status_kasus" class="form-control">
                <option value="Pending"  {{ $kasus->status_kasus == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Proses"   {{ $kasus->status_kasus == 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Selesai"  {{ $kasus->status_kasus == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
