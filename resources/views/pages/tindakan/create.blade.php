@extends('layouts.master')
@section('tindakan', 'active')

@section('content')
<div class="container">
<h3>Tambah Tindakan Forensik</h3>

<form action="{{ route('tindakan.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Kasus</label>
        <select name="id_kasus" class="form-control" required>
            <option value="">-- Pilih Kasus --</option>
            @foreach($kasus as $k)
                <option value="{{ $k->id }}">{{ $k->jenis_kasus }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tindakan Dilakukan</label>
        <input type="text" name="tindakan_dilakuakan" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Waktu Tindakan</label>
        <input type="text" name="waktu_tindakan" class="form-control" required>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('tindakan.index') }}" class="btn btn-secondary">Kembali</a>

</form>
</div>
@endsection
