@extends('layouts.master')

@section('title', 'Data Korban')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3">Data Korban</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('data-korban.create') }}" class="btn btn-primary">Tambah Korban</a>
        
        <div class="d-flex align-items-center gap-2">
            <label for="searchInput" class="mb-0">Cari:</label>
            <input type="text" id="searchInput" class="form-control" placeholder="Cari data korban..." style="width: 250px;">
        </div>
    </div>

    <table class="table table-bordered table-striped align-middle" id="korbanTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Korban</th>
                <th>Kontak</th>
                <th>Deskripsi Kejadian</th>
                <th style="width: 160px;">Aksi</th>
            </tr>
        </thead>
        <tbody id="korbanTableBody">
            @forelse($dataKorban as $index => $korban)
                <tr>
                    <td class="row-number">{{ $index + 1 }}</td>
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
                <tr id="noDataRow">
                    <td colspan="5" class="text-center">Belum ada data korban.</td>
                </tr>
            @endforelse
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

@push('scripts')
<script>
    let currentPage = 1;
    let itemsPerPage = 10;
    let allRows = [];
    let filteredRows = [];

    function initTable() {
        const tbody = document.getElementById('korbanTableBody');
        const noDataRow = document.getElementById('noDataRow');
        
        // Get all data rows (exclude empty state row)
        allRows = Array.from(tbody.querySelectorAll('tr')).filter(row => row.id !== 'noDataRow');
        
        // If we have data, remove the no data row
        if (allRows.length > 0 && noDataRow) {
            noDataRow.remove();
        }
        
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
        const tbody = document.getElementById('korbanTableBody');
        const start = (currentPage - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const paginatedRows = filteredRows.slice(start, end);

        // Hide all rows
        allRows.forEach(row => row.style.display = 'none');

        // Show paginated rows and update row numbers
        paginatedRows.forEach((row, index) => {
            row.style.display = '';
            const rowNumberCell = row.querySelector('.row-number');
            if (rowNumberCell) {
                rowNumberCell.textContent = start + index + 1;
            }
        });

        // Show no results message if needed
        if (filteredRows.length === 0) {
            let noResultRow = document.getElementById('noResultRow');
            if (!noResultRow) {
                noResultRow = document.createElement('tr');
                noResultRow.id = 'noResultRow';
                noResultRow.innerHTML = '<td colspan="5" class="text-center">Tidak ada data yang ditemukan</td>';
                tbody.appendChild(noResultRow);
            }
            noResultRow.style.display = '';
        } else {
            const noResultRow = document.getElementById('noResultRow');
            if (noResultRow) {
                noResultRow.style.display = 'none';
            }
        }

        // Update showing info
        const showingInfo = document.getElementById('showingInfo');
        const totalItems = filteredRows.length;
        if (totalItems === 0) {
            showingInfo.textContent = '';
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

@endsection
