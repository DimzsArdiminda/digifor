@extends('layouts.master')
@section('tindakan', 'active')


@section('content')


<div class="container">
<h3 class="mb-3">Data Tindakan Forensik</h3>

<div class="d-flex justify-content-between align-items-center mb-3">
    <a href="{{ route('tindakan.create') }}" class="btn btn-primary">Tambah Tindakan</a>
    
    <div class="d-flex align-items-center gap-2">
        <label for="searchInput" class="mb-0">Cari:</label>
        <input type="text" id="searchInput" class="form-control" placeholder="Cari tindakan..." style="width: 250px;">
    </div>
</div>

<table class="table table-bordered" id="tindakanTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Kasus</th>
            <th>Tindakan</th>
            <th>Waktu</th>
            <th width="180px">Aksi</th>
        </tr>
    </thead>

    <tbody id="tindakanTableBody">
        @foreach($data as $d)
        <tr>
            <td class="row-number">{{ $loop->iteration }}</td>
            <td>{{ $d->kasus->ringkasan_kasus }}</td>
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
    let itemsPerPage = 5;
    let allRows = [];
    let filteredRows = [];

    function initTable() {
        const tbody = document.getElementById('tindakanTableBody');
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
        const tbody = document.getElementById('tindakanTableBody');
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
