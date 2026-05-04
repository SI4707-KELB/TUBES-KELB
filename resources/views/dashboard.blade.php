@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('content')
<style>
    .dashboard-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        text-align: center;
    }

    .stat-card i {
        font-size: 32px;
        color: #0066ff;
        margin-bottom: 10px;
    }

    .stat-card .number {
        font-size: 28px;
        font-weight: bold;
        color: #2c3e50;
    }

    .stat-card .label {
        font-size: 14px;
        color: #636e72;
        margin-top: 5px;
    }

    .dashboard-row {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 20px;
        margin-bottom: 30px;
    }

    @media (max-width: 1024px) {
        .dashboard-row {
            grid-template-columns: 1fr;
        }
    }

    .chart-container {
        background: white;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .chart-title {
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #2c3e50;
    }

    .list-items {
        list-style: none;
    }

    .list-items li {
        padding: 12px 0;
        border-bottom: 1px solid #f0f4ff;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .list-items li:last-child {
        border-bottom: none;
    }

    .status-badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .status-pending {
        background: #fff3cd;
        color: #856404;
    }

    .status-processing {
        background: #d1ecf1;
        color: #0c5460;
    }

    .status-completed {
        background: #d4edda;
        color: #155724;
    }

    .status-emergency {
        background: #f8d7da;
        color: #721c24;
    }
</style>

<!-- Statistics Cards -->
<div class="dashboard-grid">
    <div class="stat-card">
        <i class="fas fa-file-alt"></i>
        <div class="number">{{ $totalLaporanHariIni ?? 0 }}</div>
        <div class="label">Laporan Hari Ini</div>
    </div>
    <div class="stat-card">
        <i class="fas fa-hourglass-half"></i>
        <div class="number">{{ $menungguVerifikasi ?? 0 }}</div>
        <div class="label">Menunggu Verifikasi</div>
    </div>
    <div class="stat-card">
        <i class="fas fa-spinner"></i>
        <div class="number">{{ $sedangDiproses ?? 0 }}</div>
        <div class="label">Sedang Diproses</div>
    </div>
    <div class="stat-card">
        <i class="fas fa-check-circle"></i>
        <div class="number">{{ $selesai ?? 0 }}</div>
        <div class="label">Selesai</div>
    </div>
    <div class="stat-card">
        <i class="fas fa-fire"></i>
        <div class="number">{{ $laporanDarurat ?? 0 }}</div>
        <div class="label">Laporan Darurat</div>
    </div>
</div>

<!-- Main Content Grid -->
<div class="dashboard-row">
    <!-- Map -->
    <div class="chart-container">
        <div class="chart-title">📍 Peta Sebaran Laporan</div>
        <div class="map-container">
            <div style="text-align: center;">
                <i class="fas fa-map" style="font-size: 48px; color: #d0d0d0; margin-bottom: 10px;"></i>
                <p>Peta akan ditampilkan di sini</p>
                <p style="font-size: 12px; color: #a0a0a0;">Total laporan: {{ count($petaSebaran ?? []) }}</p>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="chart-container">
        <div class="chart-title">📊 Status Laporan</div>
        <ul class="list-items">
            <li>
                <span>Menunggu</span>
                <strong>{{ $menungguVerifikasi ?? 0 }}</strong>
            </li>
            <li>
                <span>Diproses</span>
                <strong>{{ $sedangDiproses ?? 0 }}</strong>
            </li>
            <li>
                <span>Ditindaklanjuti</span>
                <strong>{{ $ditindaklanjuti ?? 0 }}</strong>
            </li>
            <li>
                <span>Selesai</span>
                <strong>{{ $selesai ?? 0 }}</strong>
            </li>
            <li>
                <span>Darurat</span>
                <strong>{{ $laporanDarurat ?? 0 }}</strong>
            </li>
        </ul>
    </div>
</div>

<!-- Emergency Reports -->
<div class="card">
    <div class="chart-title" style="margin-bottom: 0;">🚨 Laporan Darurat Terbaru</div>
    @if(count($daftarDarurat ?? []) > 0)
        <ul class="list-items" style="margin-top: 20px;">
            @foreach($daftarDarurat as $laporan)
                <li>
                    <div>
                        <strong style="display: block; margin-bottom: 3px;">{{ $laporan->judul_laporan }}</strong>
                        <small style="color: #95a5a6;">{{ $laporan->created_at->diffForHumans() }}</small>
                    </div>
                    <span class="status-badge status-emergency">{{ $laporan->status }}</span>
                </li>
            @endforeach
        </ul>
    @else
        <div style="text-align: center; padding: 40px 20px; color: #95a5a6;">
            <i class="fas fa-inbox" style="font-size: 32px; margin-bottom: 10px; display: block;"></i>
            <p>Tidak ada laporan darurat</p>
        </div>
    @endif
</div>

<!-- Categories -->
<div class="dashboard-row">
    <div class="card">
        <div class="chart-title">🏷️ Kategori Terbanyak</div>
        @if(count($kategoriTerbanyak ?? []) > 0)
            <ul class="list-items">
                @foreach($kategoriTerbanyak as $kategori)
                    <li>
                        <span>{{ $kategori->kategori }}</span>
                        <strong>{{ $kategori->total }}</strong>
                    </li>
                @endforeach
            </ul>
        @else
            <p style="text-align: center; color: #95a5a6; padding: 20px;">Tidak ada data kategori</p>
        @endif
    </div>

    <div class="card">
        <div class="chart-title">🗺️ Kecamatan Terbanyak</div>
        @if(count($kecamatanTerbanyak ?? []) > 0)
            <ul class="list-items">
                @foreach($kecamatanTerbanyak as $kecamatan)
                    <li>
                        <span>{{ $kecamatan->kecamatan }}</span>
                        <strong>{{ $kecamatan->total }}</strong>
                    </li>
                @endforeach
            </ul>
        @else
            <p style="text-align: center; color: #95a5a6; padding: 20px;">Tidak ada data kecamatan</p>
        @endif
    </div>
</div>
@endsection
