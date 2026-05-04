<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - RODOKAN</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
            color: #2c3e50;
        }

        .app-container {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: white;
            border-right: 1px solid #e1e8ed;
            padding: 30px 20px;
            overflow-y: auto;
            position: fixed;
            height: 100vh;
            left: 0;
            top: 0;
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 40px;
            font-size: 20px;
            font-weight: bold;
            color: #0066ff;
        }

        .sidebar-logo i {
            font-size: 28px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: #636e72;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            background-color: #f0f4ff;
            color: #0066ff;
        }

        .sidebar-menu i {
            width: 20px;
            text-align: center;
            font-size: 16px;
        }

        .sidebar-user {
            position: fixed;
            bottom: 20px;
            left: 20px;
            right: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-top: 1px solid #e1e8ed;
            background: white;
            width: calc(250px - 40px);
        }

        .sidebar-user img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
        }

        .sidebar-user-info {
            flex: 1;
            min-width: 0;
        }

        .sidebar-user-info .name {
            font-weight: 600;
            font-size: 13px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .sidebar-user-info .email {
            font-size: 11px;
            color: #95a5a6;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .main-content {
            margin-left: 250px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .top-bar {
            background: white;
            padding: 20px 30px;
            border-bottom: 1px solid #e1e8ed;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .top-bar-title {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
        }

        .top-bar-right {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification-icon {
            font-size: 20px;
            color: #636e72;
            cursor: pointer;
            position: relative;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff6b6b;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: bold;
        }

        .content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #2c3e50;
            font-size: 14px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #e1e8ed;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #0066ff;
            box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.1);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background: #0066ff;
            color: white;
        }

        .btn-primary:hover {
            background: #0052cc;
        }

        .btn-secondary {
            background: #f0f4ff;
            color: #0066ff;
        }

        .btn-secondary:hover {
            background: #e8ecff;
        }

        .btn-danger {
            background: #ff4757;
            color: white;
        }

        .btn-danger:hover {
            background: #ff3838;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
        }

        .toggle-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 24px;
        }

        .toggle-slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }

        input:checked + .toggle-slider {
            background-color: #0066ff;
        }

        input:checked + .toggle-slider:before {
            transform: translateX(26px);
        }

        .alert {
            padding: 15px 20px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-warning {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }

        .settings-nav {
            display: flex;
            gap: 0;
            margin-bottom: 25px;
            border-bottom: 1px solid #e1e8ed;
            flex-wrap: wrap;
        }

        .settings-nav a {
            padding: 12px 20px;
            color: #636e72;
            text-decoration: none;
            border-bottom: 3px solid transparent;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .settings-nav a:hover,
        .settings-nav a.active {
            color: #0066ff;
            border-bottom-color: #0066ff;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .info-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 12px;
            display: flex;
            align-items: flex-start;
            gap: 15px;
        }

        .info-box.blue {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .info-box.purple {
            background: linear-gradient(135deg, #b993d6 0%, #764ba2 100%);
        }

        .info-box.green {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
        }

        .info-box.orange {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }

        .info-box i {
            font-size: 28px;
            opacity: 0.8;
        }

        .info-box-content h3 {
            font-size: 12px;
            opacity: 0.9;
            margin-bottom: 5px;
        }

        .info-box-content .value {
            font-size: 24px;
            font-weight: bold;
        }

        .danger-zone {
            background: #fff5f5;
            border: 1px solid #fed7d7;
            border-radius: 12px;
            padding: 20px;
            margin-top: 30px;
        }

        .danger-zone h3 {
            color: #c53030;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .danger-zone-item {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #fed7d7;
        }

        .danger-zone-item:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .danger-zone-item h4 {
            color: #2c3e50;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .danger-zone-item p {
            color: #636e72;
            font-size: 13px;
            margin-bottom: 10px;
        }

        .profile-header {
            display: flex;
            gap: 20px;
            align-items: flex-start;
            margin-bottom: 30px;
        }

        .profile-avatar {
            position: relative;
        }

        .profile-avatar img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-avatar .upload-btn {
            position: absolute;
            bottom: 0;
            right: 0;
            background: #0066ff;
            color: white;
            border: none;
            border-radius: 50%;
            width: 35px;
            height: 35px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .profile-info h2 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .profile-info p {
            color: #636e72;
            font-size: 14px;
        }

        .notification-settings {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 0;
            border-bottom: 1px solid #e1e8ed;
        }

        .notification-settings:last-child {
            border-bottom: none;
        }

        .notification-settings-item {
            flex: 1;
        }

        .notification-settings-item h4 {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 3px;
        }

        .notification-settings-item p {
            font-size: 12px;
            color: #636e72;
        }

        .settings-section {
            margin-bottom: 30px;
        }

        .settings-section h3 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .map-container {
            margin-top: 20px;
            border-radius: 12px;
            overflow: hidden;
            height: 300px;
            background: #f0f4ff;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #636e72;
        }

        .danger-warning {
            display: flex;
            gap: 10px;
            background: #fff5f5;
            border: 1px solid #fcc2d7;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            align-items: flex-start;
        }

        .danger-warning i {
            color: #c53030;
            margin-top: 3px;
        }

        .danger-warning-text {
            font-size: 13px;
            color: #742a2a;
        }

        .danger-warning-list {
            list-style: none;
            margin-top: 10px;
            padding-left: 0;
        }

        .danger-warning-list li {
            font-size: 12px;
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

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }

            .main-content {
                margin-left: 200px;
            }

            .sidebar-user {
                width: calc(200px - 40px);
            }

            .top-bar {
                flex-direction: column;
                gap: 15px;
            }

            .content {
                padding: 20px;
            }

            .card {
                padding: 15px;
            }

            .profile-header {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="app-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-logo">
                <i class="fas fa-triangle"></i>
                <span>RODOKAN</span>
            </div>

            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('dashboard') }}" class="@if(request()->routeIs('dashboard')) active @endif">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('laporan.create') }}" class="@if(request()->routeIs('laporan.create')) active @endif">
                        <i class="fas fa-plus-circle"></i>
                        <span>Buat Laporan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('laporan.index') }}" class="@if(request()->routeIs('laporan.index')) active @endif">
                        <i class="fas fa-list"></i>
                        <span>Laporan Saya</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('laporan.public') }}" class="@if(request()->routeIs('laporan.public')) active @endif">
                        <i class="fas fa-globe"></i>
                        <span>Laporan Publik</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('statistik') }}" class="@if(request()->routeIs('statistik')) active @endif">
                        <i class="fas fa-chart-bar"></i>
                        <span>Statistik</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('notifikasi') }}" class="@if(request()->routeIs('notifikasi')) active @endif">
                        <i class="fas fa-bell"></i>
                        <span>Notifikasi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('pengaturan.profile') }}" class="@if(request()->routeIs('pengaturan.*')) active @endif">
                        <i class="fas fa-cog"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
            </ul>

            <div class="sidebar-user">
                <img src="https://via.placeholder.com/40" alt="User Avatar">
                <div class="sidebar-user-info">
                    <div class="name">{{ auth()->user()->name }}</div>
                    <div class="email">{{ auth()->user()->email }}</div>
                </div>
                <div style="position: relative;">
                    <button onclick="toggleUserMenu()" style="background: none; border: none; cursor: pointer; font-size: 18px; color: #636e72;">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                    <div id="userMenu" style="display: none; position: absolute; bottom: 100%; right: 0; background: white; border: 1px solid #e1e8ed; border-radius: 6px; box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); min-width: 150px; z-index: 1000;">
                        <form action="{{ route('logout') }}" method="POST" style="width: 100%;">
                            @csrf
                            <button type="submit" style="width: 100%; padding: 12px 16px; text-align: left; background: none; border: none; cursor: pointer; color: #636e72; font-size: 14px; transition: all 0.3s ease;">
                                <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="top-bar">
                <div class="top-bar-title">@yield('page-title', 'Dashboard')</div>
                <div class="top-bar-right">
                    <div class="notification-icon">
                        <i class="fas fa-bell"></i>
                        <span class="notification-badge">1</span>
                    </div>
                </div>
            </div>

            <div class="content">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Ada kesalahan:</strong>
                        <ul style="margin-top: 10px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script>
        function toggleUserMenu() {
            const menu = document.getElementById('userMenu');
            if (menu.style.display === 'none' || menu.style.display === '') {
                menu.style.display = 'block';
            } else {
                menu.style.display = 'none';
            }
        }

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.getElementById('userMenu');
            const userDiv = document.querySelector('.sidebar-user');
            if (!userDiv.contains(event.target)) {
                userMenu.style.display = 'none';
            }
        });
    </script>
</body>
</html>
