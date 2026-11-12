<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GarudaHub - Platform Proyek Freelance')</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sky-50: #f0f9ff; --sky-100: #e0f2fe; --sky-500: #0ea5e9;
            --sky-600: #0284c7; --sky-700: #0369a1;
            --slate-900: #0f172a; --slate-700: #334155;
            --slate-600: #475569; --slate-500: #64748b;
            --border-color: #e2e8f0;
        }
        * { box-sizing: border-box; margin: 0; padding: 0;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif; }
        body { background-color: #f8fafc; color: var(--slate-900); min-height: 100vh; }

        /* Navbar */
        .navbar { background: #fff; border-bottom: 1px solid var(--border-color);
            padding: 0.85rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        .brand { font-weight: 700; font-size: 1.2rem; color: var(--sky-700);
            letter-spacing: -0.3px; text-decoration: none; }
        .nav-links { display: flex; gap: 1.5rem; align-items: center; }
        .nav-link { text-decoration: none; color: var(--slate-600); font-size: 0.9rem;
            font-weight: 500; background: none; border: none; cursor: pointer; }
        .nav-link:hover { color: var(--sky-600); }
        .nav-user { font-size: 0.85rem; color: var(--slate-500); }
        .nav-form { display: inline; }

        /* Header */
        .page-header { background: #fff; border-bottom: 1px solid var(--border-color); padding: 2.5rem 1.5rem; }
        .header-content { max-width: 1080px; margin: 0 auto; }
        .page-header h1 { font-size: 1.75rem; font-weight: 700; margin-bottom: 0.4rem; }
        .page-header p { color: var(--slate-500); font-size: 0.95rem; }

        .container { max-width: 1080px; margin: 2rem auto; padding: 0 1.5rem; }

        /* Alert */
        .alert { padding: 0.75rem 1rem; border-radius: 8px; margin-bottom: 1.25rem; font-size: 0.9rem; }
        .alert-success { background: #ecfdf5; color: #047857; border: 1px solid #a7f3d0; }
        .alert-error { background: #fef2f2; color: #b91c1c; border: 1px solid #fecaca; }

        /* Search */
        .search-bar { display: flex; gap: 0.75rem; margin-bottom: 1.5rem; flex-wrap: wrap; }
        .input, .search-bar input, .search-bar select {
            padding: 0.6rem 0.8rem; border: 1px solid var(--border-color);
            border-radius: 6px; font-size: 0.875rem; background: #fff; }
        .search-bar input[type="text"] { flex: 1; min-width: 200px; }

        /* Grid & Card */
        .grid-container { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 1.25rem; }
        .card { background: #fff; border-radius: 10px; border: 1px solid var(--border-color);
            padding: 1.25rem; display: flex; flex-direction: column; justify-content: space-between;
            transition: border-color 0.2s ease, box-shadow 0.2s ease; }
        .card:hover { border-color: var(--sky-500); box-shadow: 0 4px 12px rgba(0,0,0,0.04); }
        .category-tag { display: inline-block; background: var(--sky-50); color: var(--sky-700);
            font-size: 0.75rem; font-weight: 600; padding: 0.25rem 0.6rem; border-radius: 6px;
            margin-bottom: 0.75rem; width: fit-content; }
        .card-title { font-size: 1.05rem; font-weight: 600; margin-bottom: 0.5rem; line-height: 1.4; }
        .card-description { color: var(--slate-600); font-size: 0.875rem; line-height: 1.5;
            margin-bottom: 1.25rem; display: -webkit-box; -webkit-line-clamp: 3;
            -webkit-box-orient: vertical; overflow: hidden; }
        .card-footer { padding-top: 0.85rem; border-top: 1px solid #f1f5f9; }
        .meta-info { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; }
        .budget-group { display: flex; flex-direction: column; }
        .budget-label { font-size: 0.75rem; color: var(--slate-500); }
        .budget-val { font-size: 1rem; font-weight: 700; color: var(--sky-600); }
        .client-name { font-size: 0.825rem; color: var(--slate-600); font-weight: 500; }

        /* Buttons */
        .btn, .btn-detail { display: block; width: 100%; background: var(--sky-600); color: #fff;
            text-align: center; padding: 0.6rem; border-radius: 6px; text-decoration: none;
            font-weight: 600; font-size: 0.875rem; border: none; cursor: pointer;
            transition: background 0.15s ease; }
        .btn:hover, .btn-detail:hover { background: var(--sky-700); }

        /* Form card (login/register/dll) */
        .form-card { background: #fff; border: 1px solid var(--border-color); border-radius: 10px;
            padding: 2rem; max-width: 420px; margin: 0 auto; }
        .form-card h1 { font-size: 1.4rem; margin-bottom: 1.25rem; }
        .form-group { margin-bottom: 1rem; }
        .form-group label { display: block; font-size: 0.85rem; font-weight: 600;
            margin-bottom: 0.35rem; color: var(--slate-700); }
        .form-group input, .form-group select { width: 100%; padding: 0.65rem 0.8rem;
            border: 1px solid var(--border-color); border-radius: 6px; font-size: 0.9rem; }
        .field-error { color: #b91c1c; font-size: 0.8rem; margin-top: 0.3rem; }

        .empty { text-align: center; color: var(--slate-500); padding: 3rem 0; }
        .pagination-wrap { margin-top: 1.5rem; }
    </style>
</head>
<body>

    <nav class="navbar">
        <a href="{{ route('projects.index') }}" class="brand">GarudaHub</a>

        <div class="nav-links">
            <a href="{{ route('projects.index') }}" class="nav-link">Cari Proyek</a>

            @auth
                @if (auth()->user()->isClient())
                    <a href="{{ route('projects.create') }}" class="nav-link">Pasang Proyek</a>
                @endif

                <span class="nav-user">{{ auth()->user()->name }} ({{ auth()->user()->role }})</span>

                <form method="POST" action="{{ route('logout') }}" class="nav-form">
                    @csrf
                    <button type="submit" class="nav-link">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="nav-link">Masuk</a>
                <a href="{{ route('register') }}" class="nav-link">Daftar</a>
            @endauth
        </div>
    </nav>

    @hasSection('header')
        <header class="page-header">
            <div class="header-content">
                @yield('header')
            </div>
        </header>
    @endif

    <main class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->has('bid'))
            <div class="alert alert-error">{{ $errors->first('bid') }}</div>
        @endif

        @yield('content')
    </main>

</body>
</html>
