<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GarudaHub - Platform Proyek Freelance</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --sky-50: #f0f9ff;
            --sky-100: #e0f2fe;
            --sky-500: #0ea5e9;
            --sky-600: #0284c7;
            --sky-700: #0369a1;
            --slate-900: #0f172a;
            --slate-700: #334155;
            --slate-600: #475569;
            --slate-500: #64748b;
            --border-color: #e2e8f0;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: #f8fafc;
            color: var(--slate-900);
            min-height: 100vh;
        }

        /* Top Navbar */
        .navbar {
            background: #ffffff;
            border-bottom: 1px solid var(--border-color);
            padding: 0.85rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-weight: 700;
            font-size: 1.2rem;
            color: var(--sky-700);
            letter-spacing: -0.3px;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-link {
            text-decoration: none;
            color: var(--slate-600);
            font-size: 0.9rem;
            font-weight: 500;
        }

        .nav-link:hover {
            color: var(--sky-600);
        }

        /* Simple Header Section */
        .page-header {
            background: #ffffff;
            border-bottom: 1px solid var(--border-color);
            padding: 2.5rem 1.5rem;
        }

        .header-content {
            max-width: 1080px;
            margin: 0 auto;
        }

        .page-header h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--slate-900);
            margin-bottom: 0.4rem;
        }

        .page-header p {
            color: var(--slate-500);
            font-size: 0.95rem;
        }

        /* Container Area */
        .container {
            max-width: 1080px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        /* Grid System */
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 1.25rem;
        }

        /* Clean Card Layout */
        .card {
            background: #ffffff;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            padding: 1.25rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            border-color: var(--sky-500);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
        }

        .category-tag {
            display: inline-block;
            background: var(--sky-50);
            color: var(--sky-700);
            font-size: 0.75rem;
            font-weight: 600;
            padding: 0.25rem 0.6rem;
            border-radius: 6px;
            margin-bottom: 0.75rem;
            width: fit-content;
        }

        .card-title {
            font-size: 1.05rem;
            font-weight: 600;
            color: var(--slate-900);
            margin-bottom: 0.5rem;
            line-height: 1.4;
        }

        .card-description {
            color: var(--slate-600);
            font-size: 0.875rem;
            line-height: 1.5;
            margin-bottom: 1.25rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Details & Action */
        .card-footer {
            padding-top: 0.85rem;
            border-top: 1px solid #f1f5f9;
        }

        .meta-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .budget-group {
            display: flex;
            flex-direction: column;
        }

        .budget-label {
            font-size: 0.75rem;
            color: var(--slate-500);
        }

        .budget-val {
            font-size: 1rem;
            font-weight: 700;
            color: var(--sky-600);
        }

        .client-name {
            font-size: 0.825rem;
            color: var(--slate-600);
            font-weight: 500;
        }

        .btn-detail {
            display: block;
            width: 100%;
            background: var(--sky-600);
            color: #ffffff;
            text-align: center;
            padding: 0.6rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            transition: background 0.15s ease;
        }

        .btn-detail:hover {
            background: var(--sky-700);
        }
    </style>
</head>
<body>

    <!-- Header Navigation -->
    <nav class="navbar">
        <div class="brand">
            GarudaHub
        </div>
        <div class="nav-links">
            <a href="#" class="nav-link">Cari Proyek</a>
            <a href="#" class="nav-link">Masuk</a>
        </div>
    </nav>

    <!-- Page Title -->
    <header class="page-header">
        <div class="header-content">
            <h1>Daftar Proyek</h1>
            <p>Pilih proyek pekerjaan yang sesuai dengan keahlian Anda.</p>
        </div>
    </header>

    <!-- Project List -->
    <main class="container">
        <div class="grid-container">
            @foreach($projects as $project)
                <div class="card">
                    <div>
                        <span class="category-tag">{{ $project->category }}</span>
                        <h2 class="card-title">{{ $project->title }}</h2>
                        <p class="card-description">{{ $project->description }}</p>
                    </div>

                    <div class="card-footer">
                        <div class="meta-info">
                            <div class="budget-group">
                                <span class="budget-label">Anggaran</span>
                                <span class="budget-val">Rp {{ number_format($project->budget, 0, ',', '.') }}</span>
                            </div>
                            <span class="client-name">Oleh: {{ $project->client->name }}</span>
                        </div>

                        <a href="#" class="btn-detail">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

</body>
</html>
