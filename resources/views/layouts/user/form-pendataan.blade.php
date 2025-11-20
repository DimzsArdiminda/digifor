@extends('layouts.master')

@section('content')
<div class="container py-5">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $data['title'] }}</li>
                </ol>
            </nav>
            <h2 class="fw-bold">
                <i class="bi bi-people text-primary me-2"></i>{{ $data['title'] }}
            </h2>
            <p class="text-muted">Database lengkap alumni dari semua angkatan</p>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-people-fill text-primary fs-1 mb-3"></i>
                    <h3 class="fw-bold text-primary mb-1">{{ number_format($data['totalAlumni']) }}</h3>
                    <p class="text-muted mb-0">Total Alumni</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-person-check-fill text-success fs-1 mb-3"></i>
                    <h3 class="fw-bold text-success mb-1">{{ number_format($data['registered']) }}</h3>
                    <p class="text-muted mb-0">Terdaftar</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center">
                    <i class="bi bi-patch-check-fill text-info fs-1 mb-3"></i>
                    <h3 class="fw-bold text-info mb-1">{{ number_format($data['verified']) }}</h3>
                    <p class="text-muted mb-0">Verified</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h5 class="card-title mb-3">Filter Data</h5>
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Program Studi</label>
                    <select class="form-select">
                        <option selected>Semua Program Studi</option>
                        <option>Teknik Informatika</option>
                        <option>Sistem Informasi</option>
                        <option>Pendidikan Teknik Informatika</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Tahun Lulus</label>
                    <select class="form-select">
                        <option selected>Semua Tahun</option>
                        <option>2024</option>
                        <option>2023</option>
                        <option>2022</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Status</label>
                    <select class="form-select">
                        <option selected>Semua Status</option>
                        <option>Verified</option>
                        <option>Pending</option>
                    </select>
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary">
                    <i class="bi bi-search me-2"></i>Filter
                </button>
                <button class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-clockwise me-2"></i>Reset
                </button>
            </div>
        </div>
    </div>

    <!-- Alumni Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="card-title mb-0">Daftar Alumni</h5>
                <button class="btn btn-success btn-sm">
                    <i class="bi bi-download me-2"></i>Export Excel
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Tahun Lulus</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>200535601234</td>
                            <td>Ahmad Hidayat</td>
                            <td>Teknik Informatika</td>
                            <td>2024</td>
                            <td><span class="badge bg-success">Verified</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>200535601235</td>
                            <td>Siti Nurhaliza</td>
                            <td>Sistem Informasi</td>
                            <td>2024</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td>
                                <button class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Add more dummy data as needed -->
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <nav class="mt-3">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection