@extends('layouts.master')

@section('title', 'Statistik Kasus')
@section('statistik', 'active')

@section('content')

<div class="container">
    <h2 class="mb-4">Statistik Digital Forensik</h2>

    <!-- Cards for Total Stats -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card stat-card text-white bg-primary animate-card" style="animation-delay: 0.1s;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Total Korban</h6>
                            <h2 class="mt-2 mb-0 counter text-white" data-target="{{ $totalKorban }}">0</h2>
                        </div>
                        <div class="stat-icon">
                            <i class="bi bi-people-fill" style="font-size: 3rem; opacity: 0.3;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card stat-card text-white bg-success animate-card" style="animation-delay: 0.2s;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Total Kasus</h6>
                            <h2 class="mt-2 mb-0 counter text-white" data-target="{{ $totalKasus }}">0</h2>
                        </div>
                        <div class="stat-icon">
                            <i class="bi bi-folder-fill" style="font-size: 3rem; opacity: 0.3;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card stat-card text-white bg-info animate-card" style="animation-delay: 0.3s;">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title mb-0">Total Tindakan</h6>
                            <h2 class="mt-2 mb-0 counter text-white" data-target="{{ $totalTindakan }}">0</h2>
                        </div>
                        <div class="stat-icon">
                            <i class="bi bi-clipboard-check-fill" style="font-size: 3rem; opacity: 0.3;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row 1 -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card animate-card" style="animation-delay: 0.4s;">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-pie-chart-fill text-primary"></i> Status Kasus</h5>
                </div>
                <div class="card-body">
                    <canvas id="statusChart" height="300"></canvas>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card animate-card" style="animation-delay: 0.5s;">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-bar-chart-fill text-success"></i> Jenis Kasus</h5>
                </div>
                <div class="card-body">
                    <canvas id="jenisChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row 2 -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card animate-card" style="animation-delay: 0.6s;">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="bi bi-graph-up text-info"></i> Trend Kasus & Tindakan (6 Bulan Terakhir)</h5>
                </div>
                <div class="card-body">
                    <canvas id="trendChart" height="350"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
@keyframes slideUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-card {
    animation: slideUp 0.6s ease-out forwards;
    opacity: 0;
}

.stat-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.2);
}

.stat-icon {
    position: relative;
}

.card {
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    border: none;
}
</style>

<script>
    // Counter Animation
    function animateCounter() {
        const counters = document.querySelectorAll('.counter');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const duration = 2000;
            const increment = target / (duration / 16);
            let current = 0;
            
            const updateCounter = () => {
                current += increment;
                if (current < target) {
                    counter.textContent = Math.floor(current);
                    requestAnimationFrame(updateCounter);
                } else {
                    counter.textContent = target;
                }
            };
            
            updateCounter();
        });
    }

    // Status Kasus Chart (Doughnut)
    const statusData = {
        labels: [
            @foreach($kasusByStatus as $status)
                '{{ $status->status_kasus }}',
            @endforeach
        ],
        datasets: [{
            data: [
                @foreach($kasusByStatus as $status)
                    {{ $status->total }},
                @endforeach
            ],
            backgroundColor: [
                '#4e73df',
                '#1cc88a',
                '#36b9cc',
                '#f6c23e',
                '#e74a3b'
            ],
            borderWidth: 2,
            borderColor: '#fff'
        }]
    };

    const statusChart = new Chart(document.getElementById('statusChart'), {
        type: 'doughnut',
        data: statusData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 15,
                        font: {
                            size: 12
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.parsed || 0;
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((value / total) * 100).toFixed(1);
                            return `${label}: ${value} (${percentage}%)`;
                        }
                    }
                }
            },
            animation: {
                animateRotate: true,
                animateScale: true,
                duration: 2000,
                easing: 'easeInOutQuart'
            }
        }
    });

    // Jenis Kasus Chart (Bar)
    const jenisData = {
        labels: [
            @foreach($kasusByJenis as $jenis)
                '{{ Str::limit($jenis->jenis_kasus, 20) }}',
            @endforeach
        ],
        datasets: [{
            label: 'Jumlah Kasus',
            data: [
                @foreach($kasusByJenis as $jenis)
                    {{ $jenis->total }},
                @endforeach
            ],
            backgroundColor: 'rgba(28, 200, 138, 0.8)',
            borderColor: 'rgba(28, 200, 138, 1)',
            borderWidth: 2,
            borderRadius: 5
        }]
    };

    const jenisChart = new Chart(document.getElementById('jenisChart'), {
        type: 'bar',
        data: jenisData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0,0,0,0.8)',
                    padding: 12,
                    titleFont: {
                        size: 14
                    },
                    bodyFont: {
                        size: 13
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            size: 11
                        }
                    },
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                },
                x: {
                    ticks: {
                        font: {
                            size: 11
                        }
                    },
                    grid: {
                        display: false
                    }
                }
            },
            animation: {
                duration: 2000,
                easing: 'easeInOutQuart'
            }
        }
    });

    // Trend Chart (Line)
    const trendData = {
        labels: [
            @foreach($kasusPerBulan as $item)
                '{{ \Carbon\Carbon::parse($item->bulan . "-01")->format("M Y") }}',
            @endforeach
        ],
        datasets: [
            {
                label: 'Kasus',
                data: [
                    @foreach($kasusPerBulan as $item)
                        {{ $item->total }},
                    @endforeach
                ],
                borderColor: 'rgba(78, 115, 223, 1)',
                backgroundColor: 'rgba(78, 115, 223, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointHoverRadius: 7,
                pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                pointBorderColor: '#fff',
                pointBorderWidth: 2
            },
            {
                label: 'Tindakan',
                data: [
                    @foreach($tindakanPerBulan as $item)
                        {{ $item->total }},
                    @endforeach
                ],
                borderColor: 'rgba(28, 200, 138, 1)',
                backgroundColor: 'rgba(28, 200, 138, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointRadius: 5,
                pointHoverRadius: 7,
                pointBackgroundColor: 'rgba(28, 200, 138, 1)',
                pointBorderColor: '#fff',
                pointBorderWidth: 2
            }
        ]
    };

    const trendChart = new Chart(document.getElementById('trendChart'), {
        type: 'line',
        data: trendData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        padding: 15,
                        font: {
                            size: 12,
                            weight: 'bold'
                        },
                        usePointStyle: true
                    }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    backgroundColor: 'rgba(0,0,0,0.8)',
                    padding: 12,
                    titleFont: {
                        size: 14
                    },
                    bodyFont: {
                        size: 13
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        font: {
                            size: 11
                        }
                    },
                    grid: {
                        color: 'rgba(0,0,0,0.05)'
                    }
                },
                x: {
                    ticks: {
                        font: {
                            size: 11
                        }
                    },
                    grid: {
                        display: false
                    }
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            animation: {
                duration: 2000,
                easing: 'easeInOutQuart'
            }
        }
    });

    // Initialize counter animation on page load
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(animateCounter, 300);
    });
</script>
@endpush
