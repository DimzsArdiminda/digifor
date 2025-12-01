@extends('layouts.master')

@section('title', 'Data Kasus')
@section('kasus', 'active')

@section('content')

<div class="container">
    <h2>Data Kasus</h2>

    <a href="{{ route('kasus.create') }}" class="btn btn-primary mb-3">
        <i class="bi bi-plus-square"></i> Tambah Kasus
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                {{-- <th>ID</th> --}}
                <th>Korban</th>
                <th>Jenis Kasus</th>
                <th>Ringkasan Kasus</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($kasus as $k)
            <tr>
                {{-- <td>{{ $k->id }}</td> --}}
                <td>{{ $k->korban->nama_lengkap ?? '-' }}</td>
                <td>{{ $k->jenis_kasus }}</td>
                <td>{{ $k->ringkasan_kasus }}</td>
                <td>{{ $k->status_kasus }}</td>
                <td>
                    <a href="{{ route('kasus.edit', $k->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-pencil"></i> Edit
                    </a>

                    <button type="button"
                        class="btn btn-danger btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal"
                        data-url="{{ route('kasus.destroy', $k->id) }}">
                        <i class="bi bi-trash3"></i>
                        Hapus
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Modal KONFIRMASI HAPUS (Letakkan di luar foreach dan luar tabel!) --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Apakah kamu yakin ingin menghapus data ini?
            </div>
 
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Batal
                </button>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    const deleteModal = document.getElementById('deleteModal');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        let button = event.relatedTarget;
        let url = button.getAttribute('data-url');
        document.getElementById('deleteForm').action = url;
    });
</script>
@endpush
