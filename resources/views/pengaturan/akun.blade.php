@extends('layouts.app')

@section('page-title', 'Pengaturan - Akun')

@section('content')
<style>
    .settings-layout {
        display: grid;
        grid-template-columns: 200px 1fr;
        gap: 30px;
    }

    .settings-sidebar {
        background: white;
        border-radius: 12px;
        padding: 0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        height: fit-content;
        position: sticky;
        top: 20px;
    }

    .settings-sidebar a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 15px 20px;
        color: #636e72;
        text-decoration: none;
        border-left: 3px solid transparent;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .settings-sidebar a:hover,
    .settings-sidebar a.active {
        background: #f0f4ff;
        color: #0066ff;
        border-left-color: #0066ff;
    }

    .settings-sidebar i {
        width: 18px;
        text-align: center;
    }

    .info-box {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        padding: 20px;
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .info-box i {
        font-size: 28px;
        color: #0066ff;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 102, 255, 0.1);
        border-radius: 8px;
        flex-shrink: 0;
    }

    .info-box-content {
        flex: 1;
    }

    .info-box-content h4 {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 3px;
        color: #2c3e50;
    }

    .info-box-content p {
        font-size: 12px;
        color: #636e72;
    }

    .info-item {
        display: grid;
        grid-template-columns: 150px 1fr;
        gap: 20px;
        padding: 12px 0;
        border-bottom: 1px solid #e1e8ed;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-item-label {
        font-size: 12px;
        font-weight: 600;
        color: #636e72;
    }

    .info-item-value {
        font-size: 13px;
        color: #2c3e50;
        word-break: break-all;
    }

    .info-item-value strong {
        display: block;
        margin-bottom: 3px;
    }

    .danger-zone-container {
        background: #fff5f5;
        border: 2px solid #fed7d7;
        border-radius: 12px;
        padding: 20px;
        margin-top: 30px;
    }

    .danger-zone-title {
        color: #c53030;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .danger-zone-description {
        color: #742a2a;
        font-size: 12px;
        margin-bottom: 20px;
    }

    .danger-warning {
        display: flex;
        gap: 10px;
        background: #fcc2d7;
        border: 1px solid #f8b4c8;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        align-items: flex-start;
    }

    .danger-warning i {
        color: #c53030;
        margin-top: 3px;
        flex-shrink: 0;
    }

    .danger-warning-text {
        font-size: 12px;
        color: #742a2a;
    }

    .danger-warning-list {
        list-style: none;
        margin: 10px 0 0 0;
        padding-left: 0;
    }

    .danger-warning-list li {
        font-size: 11px;
        color: #742a2a;
        margin-bottom: 5px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .danger-warning-list li:before {
        content: "✕";
        color: #c53030;
        font-weight: bold;
    }

    .danger-action {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #fed7d7;
    }

    .danger-action p {
        color: #742a2a;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .danger-period {
        background: #fcc2d7;
        border-left: 3px solid #c53030;
        padding: 10px 12px;
        border-radius: 4px;
        margin: 10px 0;
        font-size: 11px;
        color: #742a2a;
    }

    .danger-period strong {
        display: block;
        color: #c53030;
    }

    @media (max-width: 768px) {
        .settings-layout {
            grid-template-columns: 1fr;
        }

        .settings-sidebar {
            position: static;
            display: flex;
            gap: 0;
            background: transparent;
            box-shadow: none;
            padding: 0;
            margin-bottom: 20px;
        }

        .settings-sidebar a {
            flex: 1;
            border-left: none;
            border-bottom: 3px solid transparent;
            padding: 10px;
            text-align: center;
        }

        .settings-sidebar a.active {
            border-left: none;
            border-bottom-color: #0066ff;
        }

        .info-item {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="settings-layout">
    <!-- Settings Sidebar -->
    <div class="settings-sidebar">
        <a href="{{ route('pengaturan.profile') }}" class="@if(request()->routeIs('pengaturan.profile')) active @endif">
            <i class="fas fa-user"></i>
            <span>Profil</span>
        </a>
        <a href="{{ route('pengaturan.notifikasi') }}" class="@if(request()->routeIs('pengaturan.notifikasi')) active @endif">
            <i class="fas fa-bell"></i>
            <span>Notifikasi</span>
        </a>
        <a href="{{ route('pengaturan.keamanan') }}" class="@if(request()->routeIs('pengaturan.keamanan')) active @endif">
            <i class="fas fa-lock"></i>
            <span>Keamanan</span>
        </a>
        <a href="{{ route('pengaturan.preferensi') }}" class="@if(request()->routeIs('pengaturan.preferensi')) active @endif">
            <i class="fas fa-sliders-h"></i>
            <span>Preferensi</span>
        </a>
        <a href="{{ route('pengaturan.akun') }}" class="@if(request()->routeIs('pengaturan.akun')) active @endif">
            <i class="fas fa-cog"></i>
            <span>Akun</span>
        </a>
    </div>

    <!-- Settings Content -->
    <div>
        <!-- Account Information -->
        <div class="card">
            <h2 style="font-size: 18px; margin-bottom: 25px;">Informasi Akun</h2>

            <div class="info-box">
                <i class="fas fa-check-circle"></i>
                <div class="info-box-content">
                    <h4>✓ Akun Terverifikasi</h4>
                    <p>Email dan nomor telepon Anda telah diverifikasi</p>
                </div>
            </div>

            <div style="background: #f8f9fa; border-radius: 8px; padding: 20px;">
                <div class="info-item">
                    <div class="info-item-label">User ID</div>
                    <div class="info-item-value">
                        <strong>USER-2024-8475</strong>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-item-label">Tanggal Bergabung</div>
                    <div class="info-item-value">
                        <strong>15 Januari 2024</strong>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-item-label">Total Laporan</div>
                    <div class="info-item-value">
                        <strong>127 laporan</strong>
                    </div>
                </div>

                <div class="info-item">
                    <div class="info-item-label">Level Member</div>
                    <div class="info-item-value">
                        <strong>Kontributor Aktif</strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Danger Zone -->
        <div class="danger-zone-container">
            <div class="danger-zone-title">
                <i class="fas fa-exclamation-triangle"></i>
                Zona Berbahaya
            </div>
            <div class="danger-zone-description">
                Tindakan di bawah ini bersifat sensitif dan dapat berdampak permanen pada akun Anda. Harap pertimbangkan dengan matang sebelum melanjutkan.
            </div>

            <!-- Non-aktifkan Akun -->
            <div style="background: #fff0f5; border: 1px solid #fcc2d7; border-radius: 8px; padding: 15px; margin-bottom: 15px;">
                <div style="display: flex; align-items: flex-start; gap: 12px; margin-bottom: 12px;">
                    <i class="fas fa-ban" style="color: #c53030; margin-top: 2px;"></i>
                    <div>
                        <h3 style="font-size: 13px; font-weight: 600; color: #2c3e50; margin-bottom: 3px;">Non-aktifkan Akun</h3>
                        <p style="font-size: 11px; color: #636e72;">Akun akan dinon-aktifkan sementara. Anda dapat mengaktifkan kembali dengan login menggunakan kredensial yang sama.</p>
                    </div>
                </div>
                <button class="btn btn-danger" style="width: 100%; margin-top: 10px;">
                    <i class="fas fa-ban"></i> Non-aktifkan Akun
                </button>
            </div>

            <!-- Hapus Akun Permanen -->
            <div style="background: #fff0f5; border: 1px solid #fcc2d7; border-radius: 8px; padding: 15px;">
                <div style="display: flex; align-items: flex-start; gap: 12px; margin-bottom: 12px;">
                    <i class="fas fa-trash-alt" style="color: #c53030; margin-top: 2px;"></i>
                    <div>
                        <h3 style="font-size: 13px; font-weight: 600; color: #2c3e50; margin-bottom: 3px;">Hapus Akun Permanen</h3>
                        <p style="font-size: 11px; color: #636e72;">Tindakan ini tidak dapat dibatalkan. Semua data Anda akan dihapus secara permanen dari sistem kami.</p>
                    </div>
                </div>

                <div class="danger-warning">
                    <i class="fas fa-triangle-exclamation"></i>
                    <div class="danger-warning-text">
                        Yang akan terjadi:
                        <ul class="danger-warning-list">
                            <li>Profil dan informasi pribadi Anda</li>
                            <li>Semua laporan yang pernah dibuat (127 laporan)</li>
                            <li>Riwayat aktivitas dan interaksi</li>
                            <li>Data preferensi dan pengaturan</li>
                            <li>Level member dan pencapaian</li>
                        </ul>
                    </div>
                </div>

                <div class="danger-action">
                    <p>Periode Penunggu: 30 Hari</p>
                    <div class="danger-period">
                        <strong>⏱️ Setelah penghapusan akun</strong>
                        Setelah 30 hari menunggu, akun Anda secara permanen dihapus. Sebelum itu, data akan tetap disimpan sebagai backup.
                    </div>
                    <button class="btn btn-danger" style="width: 100%; margin-top: 10px;">
                        <i class="fas fa-trash-alt"></i> Hapus Akun Saya
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
