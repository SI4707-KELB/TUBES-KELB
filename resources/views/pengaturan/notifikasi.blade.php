@extends('layouts.app')

@section('page-title', 'Pengaturan - Notifikasi')

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

    .notification-method {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .notification-method i {
        font-size: 24px;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
    }

    .notification-method.email i {
        background: #e3f2fd;
        color: #1976d2;
    }

    .notification-method.push i {
        background: #f3e5f5;
        color: #7b1fa2;
    }

    .notification-method.sms i {
        background: #e8f5e9;
        color: #388e3c;
    }

    .notification-method.inapp i {
        background: #fff3e0;
        color: #f57c00;
    }

    .notification-method-content {
        flex: 1;
    }

    .notification-method-content h4 {
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 3px;
    }

    .notification-method-content p {
        font-size: 12px;
        color: #636e72;
    }

    .notification-method-toggle {
        flex-shrink: 0;
    }

    .notification-category {
        margin-bottom: 30px;
    }

    .notification-category h3 {
        font-size: 15px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .notification-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 15px;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .notification-item-content {
        flex: 1;
    }

    .notification-item-content h4 {
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .notification-item-content p {
        font-size: 11px;
        color: #636e72;
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
        <div class="card">
            <h2 style="font-size: 18px; margin-bottom: 25px;">Metode Notifikasi</h2>
            <p style="color: #636e72; font-size: 14px; margin-bottom: 20px;">Pilih cara Anda menerima notifikasi</p>

            <div style="margin-bottom: 30px;">
                <div class="notification-method email">
                    <i class="fas fa-envelope"></i>
                    <div class="notification-method-content">
                        <h4>Email</h4>
                        <p>Terima notifikasi via email</p>
                    </div>
                    <div class="notification-method-toggle">
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>

                <div class="notification-method push">
                    <i class="fas fa-mobile-alt"></i>
                    <div class="notification-method-content">
                        <h4>Push Notification</h4>
                        <p>Notifikasi di browser</p>
                    </div>
                    <div class="notification-method-toggle">
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>

                <div class="notification-method sms">
                    <i class="fas fa-comments"></i>
                    <div class="notification-method-content">
                        <h4>SMS</h4>
                        <p>Pesan teks ke ponsel Anda</p>
                    </div>
                    <div class="notification-method-toggle">
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>

                <div class="notification-method inapp">
                    <i class="fas fa-bell"></i>
                    <div class="notification-method-content">
                        <h4>In-App Notification</h4>
                        <p>Notifikasi dalam aplikasi</p>
                    </div>
                    <div class="notification-method-toggle">
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Laporan & Update -->
            <div class="notification-category">
                <h3><i class="fas fa-file"></i> Laporan & Update</h3>
                <p style="color: #636e72; font-size: 13px; margin-bottom: 15px;">Notifikasi terkait status laporan Anda</p>

                <div class="notification-item">
                    <div class="notification-item-content">
                        <h4>Perubahan Status Laporan</h4>
                        <p>Notifikasi saat status berubah</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="notification-item">
                    <div class="notification-item-content">
                        <h4>Laporan Terverifikasi</h4>
                        <p>Saat laporan diverifikasi admin</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="notification-item">
                    <div class="notification-item-content">
                        <h4>Laporan Selesai</h4>
                        <p>Saat laporan akan diselesaikan</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="notification-item">
                    <div class="notification-item-content">
                        <h4>Laporan Ditolak</h4>
                        <p>Saat laporan tidak memenuhi kriteria</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>

            <!-- Interaksi Sosial -->
            <div class="notification-category">
                <h3><i class="fas fa-comments"></i> Interaksi Sosial</h3>
                <p style="color: #636e72; font-size: 13px; margin-bottom: 15px;">Notifikasi dari interaksi pengguna lain</p>

                <div class="notification-item">
                    <div class="notification-item-content">
                        <h4>Komentar Baru</h4>
                        <p>Ada komentar di laporan Anda</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="notification-item">
                    <div class="notification-item-content">
                        <h4>Balasan Komentar</h4>
                        <p>Seseorang membalas komentar Anda</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="notification-item">
                    <div class="notification-item-content">
                        <h4>Like Baru</h4>
                        <p>Seseorang menyukai laporan</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>

            <!-- Sistem & Akun -->
            <div class="notification-category">
                <h3><i class="fas fa-cog"></i> Sistem & Akun</h3>
                <p style="color: #636e72; font-size: 13px; margin-bottom: 15px;">Notifikasi sistem dan keamanan akun</p>

                <div class="notification-item">
                    <div class="notification-item-content">
                        <h4>Update Sistem</h4>
                        <p>Fitur baru dan perbaikan</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="notification-item">
                    <div class="notification-item-content">
                        <h4>Peringatan Keamanan</h4>
                        <p>Login mencurigakan di aktivitas tidak biasa</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="notification-item">
                    <div class="notification-item-content">
                        <h4>Ringkasan Mingguan</h4>
                        <p>Aktivitas mingguan [Setiap Senin]</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox">
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="notification-item">
                    <div class="notification-item-content">
                        <h4>Laporan Bulanan</h4>
                        <p>Statistik bulan ini [Setiap tanggal 1]</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-secondary">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
@endsection
