@extends('layouts.master')

@section('title', 'Data Kasus')
@section('kasus', 'active')

@section('content')

<div class="container">
    <h2>Data Kasus</h2>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('kasus.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-square"></i> Tambah Kasus
        </a>
        
        <div class="d-flex align-items-center gap-2">
            <label for="searchInput" class="mb-0">Cari:</label>
            <input type="text" id="searchInput" class="form-control" placeholder="Cari kasus..." style="width: 250px;">
        </div>
    </div>

    <table class="table table-bordered" id="kasusTable">
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

        <tbody id="kasusTableBody">
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

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div>
            <span id="showingInfo"></span>
        </div>
        <nav>
            <ul class="pagination mb-0" id="pagination"></ul>
        </nav>
    </div>
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

    // Search and Pagination
    let currentPage = 1;
    let itemsPerPage = 10;
    let allRows = [];
    let filteredRows = [];

    function initTable() {
        const tbody = document.getElementById('kasusTableBody');
        allRows = Array.from(tbody.querySelectorAll('tr'));
        filteredRows = [...allRows];
        renderTable();
    }

    function filterTable() {
        const searchInput = document.getElementById('searchInput').value.toLowerCase();
        
        filteredRows = allRows.filter(row => {
            const text = row.textContent.toLowerCase();
            return text.includes(searchInput);
        });
        
        currentPage = 1;
        renderTable();
    }

    function renderTable() {
        const tbody = document.getElementById('kasusTableBody');
        const start = (currentPage - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const paginatedRows = filteredRows.slice(start, end);

        // Hide all rows
        allRows.forEach(row => row.style.display = 'none');

        // Show paginated rows
        paginatedRows.forEach(row => row.style.display = '');

        // Update showing info
        const showingInfo = document.getElementById('showingInfo');
        const totalItems = filteredRows.length;
        if (totalItems === 0) {
            showingInfo.textContent = 'Tidak ada data yang ditemukan';
        } else {
            const showingStart = start + 1;
            const showingEnd = Math.min(end, totalItems);
            showingInfo.textContent = `Menampilkan ${showingStart} - ${showingEnd} dari ${totalItems} data`;
        }

        renderPagination();
    }

    function renderPagination() {
        const pagination = document.getElementById('pagination');
        const totalPages = Math.ceil(filteredRows.length / itemsPerPage);
        
        pagination.innerHTML = '';

        if (totalPages <= 1) return;

        // Previous button
        const prevLi = document.createElement('li');
        prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
        prevLi.innerHTML = `<a class="page-link" href="#">Sebelumnya</a>`;
        prevLi.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentPage > 1) {
                currentPage--;
                renderTable();
            }
        });
        pagination.appendChild(prevLi);

        // Page numbers
        let startPage = Math.max(1, currentPage - 2);
        let endPage = Math.min(totalPages, currentPage + 2);

        if (startPage > 1) {
            const firstLi = document.createElement('li');
            firstLi.className = 'page-item';
            firstLi.innerHTML = `<a class="page-link" href="#">1</a>`;
            firstLi.addEventListener('click', (e) => {
                e.preventDefault();
                currentPage = 1;
                renderTable();
            });
            pagination.appendChild(firstLi);

            if (startPage > 2) {
                const dotsLi = document.createElement('li');
                dotsLi.className = 'page-item disabled';
                dotsLi.innerHTML = `<a class="page-link" href="#">...</a>`;
                pagination.appendChild(dotsLi);
            }
        }

        for (let i = startPage; i <= endPage; i++) {
            const li = document.createElement('li');
            li.className = `page-item ${i === currentPage ? 'active' : ''}`;
            li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
            li.addEventListener('click', (e) => {
                e.preventDefault();
                currentPage = i;
                renderTable();
            });
            pagination.appendChild(li);
        }

        if (endPage < totalPages) {
            if (endPage < totalPages - 1) {
                const dotsLi = document.createElement('li');
                dotsLi.className = 'page-item disabled';
                dotsLi.innerHTML = `<a class="page-link" href="#">...</a>`;
                pagination.appendChild(dotsLi);
            }

            const lastLi = document.createElement('li');
            lastLi.className = 'page-item';
            lastLi.innerHTML = `<a class="page-link" href="#">${totalPages}</a>`;
            lastLi.addEventListener('click', (e) => {
                e.preventDefault();
                currentPage = totalPages;
                renderTable();
            });
            pagination.appendChild(lastLi);
        }

        // Next button
        const nextLi = document.createElement('li');
        nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
        nextLi.innerHTML = `<a class="page-link" href="#">Selanjutnya</a>`;
        nextLi.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentPage < totalPages) {
                currentPage++;
                renderTable();
            }
        });
        pagination.appendChild(nextLi);
    }

    // Event listener for search
    document.getElementById('searchInput').addEventListener('input', filterTable);

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', initTable);
</script>
@endpush
