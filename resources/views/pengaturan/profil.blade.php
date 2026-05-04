@extends('layouts.app')

@section('page-title', 'Pengaturan - Profil')

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
            <div class="profile-header">
                <div class="profile-avatar">
                    <img src="https://via.placeholder.com/100" alt="Profile Picture" id="profileImage">
                    <button class="upload-btn" onclick="document.getElementById('avatarInput').click()" title="Upload Foto">
                        <i class="fas fa-camera"></i>
                    </button>
                    <input type="file" id="avatarInput" accept="image/*" style="display: none;">
                </div>
                <div class="profile-info">
                    <h2>{{ auth()->user()->name }}</h2>
                    <p>{{ auth()->user()->email }}</p>
                </div>
            </div>

            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required>
                </div>

                <div class="form-group">
                    <label for="phone">Nomor Telepon</label>
                    <input type="tel" id="phone" name="phone_number" value="{{ auth()->user()->phone_number ?? '' }}" placeholder="+62">
                </div>

                <div class="form-group">
                    <label for="city">Kota/Kabupaten</label>
                    <input type="text" id="city" name="city" value="{{ auth()->user()->city ?? '' }}" placeholder="Masukkan kota Anda">
                </div>

                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea id="address" name="address" placeholder="Masukkan alamat lengkap Anda"></textarea>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-secondary">Batal</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('avatarInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('profileImage').src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
