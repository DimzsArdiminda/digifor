@extends('layouts.master')

@section('content')

<div class="container">
<h3>Edit Tindakan Forensik</h3>

<form action="{{ route('tindakan.update', $item->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Kasus</label>
        <select name="id_kasus" class="form-control" required>
            @foreach($kasus as $k)
                <option value="{{ $k->id }}" {{ $item->id_kasus == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kasus }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tindakan Dilakukan</label>
        <input type="text" name="tindakan_dilakuakan" class="form-control" value="{{ $item->tindakan_dilakukan }}" required>
    </div>

    <div class="mb-3">
        <label>Waktu Tindakan</label>
        <input type="text" name="waktu_tindakan" class="form-control" value="{{ $item->waktu_tindakan }}" required>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('tindakan.index') }}" class="btn btn-secondary">Kembali</a>

</form>
</div>
@endsection
