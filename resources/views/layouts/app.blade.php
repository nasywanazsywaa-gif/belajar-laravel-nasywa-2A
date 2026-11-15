<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Aplikasi Web')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar Styling */
        .sidebar {
            width: 260px;
            background-color: #ffffff;
            border-right: 1px solid #e2e8f0;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 50;
        }

        .sidebar-brand {
            padding: 24px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #f1f5f9;
        }

        .sidebar-logo {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-weight: 700;
            font-size: 18px;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.25);
        }

        .sidebar-title {
            font-size: 17px;
            font-weight: 700;
            color: #0f172a;
            letter-spacing: -0.3px;
        }

        .sidebar-subtitle {
            font-size: 11px;
            color: #64748b;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .sidebar-menu {
            padding: 20px 14px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex-grow: 1;
        }

        .menu-label {
            font-size: 11px;
            font-weight: 600;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            padding: 8px 12px 6px;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 10px;
            color: #475569;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .nav-item:hover {
            background-color: #f1f5f9;
            color: #0f172a;
        }

        .nav-item.active {
            background-color: #eff6ff;
            color: #2563eb;
            font-weight: 600;
        }

        .nav-item.active svg {
            color: #2563eb;
        }

        .nav-item svg {
            width: 20px;
            height: 20px;
            color: #64748b;
            transition: color 0.2s ease;
            flex-shrink: 0;
        }

        /* Main Content Layout */
        .main-wrapper {
            margin-left: 260px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #f8fafc;
        }

        .top-navbar {
            height: 64px;
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
        }

        .page-badge {
            font-size: 13px;
            font-weight: 600;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .content-area {
            padding: 32px;
            flex-grow: 1;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 72px;
            }
            .sidebar-title, .sidebar-subtitle, .menu-label, .nav-item span {
                display: none;
            }
            .main-wrapper {
                margin-left: 72px;
            }
            .content-area {
                padding: 16px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-brand">
            <div class="sidebar-logo">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"></path>
                    <path d="M6 6h10"></path>
                    <path d="M6 10h10"></path>
                </svg>
            </div>
            <div>
                <div class="sidebar-title">Portal Kampus</div>
                <div class="sidebar-subtitle">Aplikasi Akademik</div>
            </div>
        </div>

        <nav class="sidebar-menu">
            <div class="menu-label">Menu Navigasi</div>

            <a href="{{ route('mahasiswa.daftar') }}" class="nav-item {{ request()->routeIs('mahasiswa.daftar') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
                <span>Daftar Mahasiswa</span>
            </a>

            <a href="{{ route('kalkulator.segitiga') }}" class="nav-item {{ request()->routeIs('kalkulator.segitiga') ? 'active' : '' }}">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="16" height="20" x="4" y="2" rx="2"></rect>
                    <line x1="8" x2="16" y1="6" y2="6"></line>
                    <line x1="16" x2="16" y1="14" y2="18"></line>
                    <path d="M16 10h.01"></path>
                    <path d="M12 10h.01"></path>
                    <path d="M8 10h.01"></path>
                    <path d="M12 14h.01"></path>
                    <path d="M8 14h.01"></path>
                    <path d="M12 18h.01"></path>
                    <path d="M8 18h.01"></path>
                </svg>
                <span>Kalkulator Segitiga</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="main-wrapper">
        <header class="top-navbar">
            <div class="page-badge">
                <span>Sistem Akademik</span>
                <span style="color: #cbd5e1;">/</span>
                <span style="color: #0f172a; font-weight: 600;">@yield('page_title', 'Halaman')</span>
            </div>
            <div>
                <span style="font-size: 13px; color: #64748b;">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</span>
            </div>
        </header>

        <main class="content-area">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>

