@extends('layouts.master')

@section('content')


<div class="container">
<h3 class="mb-3">Data Tindakan Forensik</h3>

<a href="{{ route('tindakan.create') }}" class="btn btn-primary mb-3">Tambah Tindakan</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Kasus</th>
            <th>Tindakan</th>
            <th>Waktu</th>
            <th width="180px">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $d->id_kasus }}</td>
            <td>{{ $d->tindakan_dilakuakan }}</td>
            <td>{{ $d->waktu_tindakan }}</td>

            <td>
                <a href="{{ route('tindakan.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('tindakan.destroy', $d->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button onclick="return confirm('Yakin menghapus?')" class="btn btn-danger btn-sm">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
