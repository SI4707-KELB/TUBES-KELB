@extends('layouts.app')

@section('page-title', 'Pengaturan - Preferensi')

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

    .preference-section {
        margin-bottom: 30px;
        padding-bottom: 25px;
        border-bottom: 1px solid #e1e8ed;
    }

    .preference-section:last-child {
        border-bottom: none;
        margin-bottom: 0;
        padding-bottom: 0;
    }

    .preference-section h3 {
        font-size: 15px;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .theme-selector {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 15px;
        margin-bottom: 20px;
    }

    .theme-option {
        position: relative;
    }

    .theme-option input {
        display: none;
    }

    .theme-option label {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 20px;
        border: 2px solid #e1e8ed;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .theme-option input:checked + label {
        border-color: #0066ff;
        background: #f0f4ff;
    }

    .theme-option label i {
        font-size: 32px;
        margin-bottom: 10px;
    }

    .theme-option label span {
        font-size: 12px;
        font-weight: 500;
    }

    .language-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 10px;
        margin-bottom: 20px;
    }

    .language-option {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 12px;
        border: 1px solid #e1e8ed;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .language-option:hover {
        border-color: #0066ff;
        background: #f0f4ff;
    }

    .location-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px;
        background: #f8f9fa;
        border-radius: 6px;
        margin-bottom: 10px;
    }

    .location-item-content {
        flex: 1;
    }

    .location-item-content h4 {
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .location-item-content p {
        font-size: 11px;
        color: #636e72;
    }

    .location-auto-option {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        background: #f8f9fa;
        border-radius: 6px;
        margin-bottom: 15px;
    }

    .location-auto-option-content {
        flex: 1;
    }

    .location-auto-option-content h4 {
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 2px;
    }

    .location-auto-option-content p {
        font-size: 11px;
        color: #636e72;
    }

    .radius-slider {
        margin-top: 15px;
        margin-bottom: 15px;
    }

    .radius-slider input[type="range"] {
        width: 100%;
        height: 6px;
        border-radius: 3px;
        background: #e1e8ed;
        outline: none;
        -webkit-appearance: none;
    }

    .radius-slider input[type="range"]::-webkit-slider-thumb {
        -webkit-appearance: none;
        appearance: none;
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #0066ff;
        cursor: pointer;
    }

    .radius-slider input[type="range"]::-moz-range-thumb {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background: #0066ff;
        cursor: pointer;
        border: none;
    }

    .radius-value {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
        padding: 10px;
        background: #f0f4ff;
        border-radius: 6px;
    }

    .radius-value span {
        font-weight: 600;
        color: #0066ff;
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

        .theme-selector {
            grid-template-columns: repeat(2, 1fr);
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
            <!-- Preferences Laporan -->
            <div class="preference-section">
                <h3><i class="fas fa-file"></i> Preferensi Laporan</h3>
                
                <div class="form-group">
                    <label for="kategori_default">Kategori Default</label>
                    <select id="kategori_default" name="kategori_default">
                        <option value="">Pilih Kategori</option>
                        <option value="infrastructure">Infrastruktur</option>
                        <option value="service">Layanan Publik</option>
                        <option value="security">Keamanan</option>
                        <option value="other">Lainnya</option>
                    </select>
                </div>

                <p style="color: #636e72; font-size: 12px; margin-bottom: 15px;">
                    Kategori yang dipilih akan menjadi kategori awal saat membuat laporan baru
                </p>
            </div>

            <!-- Tampilan & Bahasa -->
            <div class="preference-section">
                <h3><i class="fas fa-palette"></i> Tampilan & Bahasa</h3>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; margin-bottom: 12px; font-size: 13px; font-weight: 600;">Tema Aplikasi</label>
                    <div class="theme-selector">
                        <div class="theme-option">
                            <input type="radio" id="theme_light" name="theme" value="light" checked>
                            <label for="theme_light">
                                <i class="fas fa-sun" style="color: #f39c12;"></i>
                                <span>Terang</span>
                            </label>
                        </div>
                        <div class="theme-option">
                            <input type="radio" id="theme_dark" name="theme" value="dark">
                            <label for="theme_dark">
                                <i class="fas fa-moon" style="color: #34495e;"></i>
                                <span>Gelap</span>
                            </label>
                        </div>
                        <div class="theme-option">
                            <input type="radio" id="theme_system" name="theme" value="system">
                            <label for="theme_system">
                                <i class="fas fa-desktop" style="color: #3498db;"></i>
                                <span>Sistem</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div>
                    <label style="display: block; margin-bottom: 12px; font-size: 13px; font-weight: 600;">Bahasa Interface</label>
                    <div class="language-grid">
                        <div class="language-option">
                            <input type="radio" name="language" value="id" checked>
                            <span>🇮🇩 Bahasa Indonesia</span>
                        </div>
                        <div class="language-option">
                            <input type="radio" name="language" value="en">
                            <span>🇬🇧 English</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lokasi & Jangkauan -->
            <div class="preference-section">
                <h3><i class="fas fa-map-marker-alt"></i> Lokasi & Jangkauan</h3>

                <div class="location-auto-option">
                    <i class="fas fa-location-arrow" style="color: #0066ff; font-size: 18px;"></i>
                    <div class="location-auto-option-content">
                        <h4>Gunakan lokasi otomatis</h4>
                        <p>Isi lokasi secara otomatis menggunakan GPS saat membuat laporan</p>
                    </div>
                    <label class="toggle-switch">
                        <input type="checkbox" checked>
                        <span class="toggle-slider"></span>
                    </label>
                </div>

                <div>
                    <label style="display: block; margin-bottom: 12px; font-size: 13px; font-weight: 600;">Wajibkan foto</label>
                    <div style="margin-bottom: 15px;">
                        <p style="color: #636e72; font-size: 12px; margin-bottom: 10px;">
                            Harus unggah foto sebagai bukti fisik saat membuat laporan
                        </p>
                        <label class="toggle-switch">
                            <input type="checkbox">
                            <span class="toggle-slider"></span>
                        </label>
                    </div>
                </div>

                <div>
                    <label style="display: block; margin-bottom: 12px; font-size: 13px; font-weight: 600;">Radius Laporan Terdekat</label>
                    <p style="color: #636e72; font-size: 12px; margin-bottom: 15px;">
                        Highlight laporan akan ditampilkan di seluruh lokasi Anda
                    </p>
                    <div class="radius-slider">
                        <input type="range" id="radiusInput" min="1" max="50" value="25" step="1">
                    </div>
                    <div class="radius-value">
                        <span id="radiusValue">25 km</span>
                        <span style="font-size: 11px; color: #636e72;">1 km — 50 km</span>
                    </div>
                </div>
            </div>

            <div class="btn-group">
                <button type="button" class="btn btn-secondary">Reset ke Default</button>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('radiusInput').addEventListener('input', function(e) {
        document.getElementById('radiusValue').textContent = e.target.value + ' km';
    });
</script>
@endsection
