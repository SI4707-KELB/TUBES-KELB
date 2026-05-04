@extends('layouts.app')

@section('page-title', 'Pengaturan - Keamanan')

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

    .security-section {
        margin-bottom: 30px;
    }

    .security-section h3 {
        font-size: 15px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .security-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 10px;
    }

    .security-item-content {
        flex: 1;
    }

    .security-item-content h4 {
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 3px;
    }

    .security-item-content p {
        font-size: 11px;
        color: #636e72;
    }

    .security-status {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }

    .security-status.active {
        background: #d4edda;
        color: #155724;
    }

    .security-status.inactive {
        background: #f8d7da;
        color: #721c24;
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
        <!-- Change Password -->
        <div class="card">
            <h2 style="font-size: 18px; margin-bottom: 25px;">Ubah Password</h2>
            <p style="color: #636e72; font-size: 14px; margin-bottom: 20px;">Pastikan password Anda kuat dan unik</p>

            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="old_password">Password Lama</label>
                    <input type="password" id="old_password" name="old_password" placeholder="Masukkan password lama" required>
                </div>

                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password baru" required>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password Baru</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password baru" required>
                </div>

                <p style="font-size: 12px; color: #636e72; margin-bottom: 20px;">
                    Minimal 8 karakter, kombinasi huruf besar, angka, dan simbol
                </p>

                <div class="btn-group">
                    <button type="button" class="btn btn-secondary">Batal</button>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
            </form>
        </div>

        <!-- Security Features -->
        <div class="card" style="margin-top: 20px;">
            <h2 style="font-size: 18px; margin-bottom: 25px;">Fitur Keamanan</h2>

            <!-- Preference & Settings -->
            <div class="security-section">
                <h3><i class="fas fa-sliders-h"></i> Preferensi Keamanan</h3>

                <div class="security-item">
                    <div class="security-item-content">
                        <h4>Notifikasi Login</h4>
                        <p>Dapatkan email saat ada login baru</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="security-item">
                    <div class="security-item-content">
                        <h4>Timeout Sesi</h4>
                        <p>Logout otomatis setelah 30 menit tidak aktif</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div class="security-item">
                    <div class="security-item-content">
                        <h4>Verifikasi Device Baru</h4>
                        <p>Konfirmasi via email untuk device baru</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>
            </div>

            <!-- Active Sessions -->
            <div class="security-section">
                <h3><i class="fas fa-user-circle"></i> Sesi Aktif</h3>
                <p style="color: #636e72; font-size: 12px; margin-bottom: 15px;">Kelola perangkat yang tersambung dengan akun Anda</p>

                <div class="security-item">
                    <div class="security-item-content">
                        <h4>Chrome - Windows</h4>
                        <p>192.168.1.100 • Aktif sekarang</p>
                    </div>
                    <button class="btn btn-secondary" style="padding: 6px 12px; font-size: 12px;">Logout</button>
                </div>

                <div class="security-item">
                    <div class="security-item-content">
                        <h4>Safari - iPhone</h4>
                        <p>192.168.1.105 • 2 jam yang lalu</p>
                    </div>
                    <button class="btn btn-secondary" style="padding: 6px 12px; font-size: 12px;">Logout</button>
                </div>

                <div class="security-item">
                    <div class="security-item-content">
                        <h4>Firefox - Linux</h4>
                        <p>192.168.1.110 • 1 hari yang lalu</p>
                    </div>
                    <button class="btn btn-secondary" style="padding: 6px 12px; font-size: 12px;">Logout</button>
                </div>
            </div>

            <!-- Trusted Devices -->
            <div class="security-section">
                <h3><i class="fas fa-check-circle"></i> Perangkat Terpercaya</h3>
                <p style="color: #636e72; font-size: 12px; margin-bottom: 15px;">Perangkat yang tidak memerlukan verifikasi dua faktor</p>

                <div class="security-item">
                    <div class="security-item-content">
                        <h4>MacBook Pro - Ahmad</h4>
                        <p>Ditambahkan 5 Januari 2024</p>
                    </div>
                    <button class="btn btn-danger" style="padding: 6px 12px; font-size: 12px;">Hapus</button>
                </div>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>
@endsection
