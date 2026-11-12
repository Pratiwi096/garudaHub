@extends('layouts.app')

@section('title', 'Daftar Proyek - GarudaHub')

@section('header')
    <h1>Daftar Proyek</h1>
    <p>Pilih proyek pekerjaan yang sesuai dengan keahlian Anda.</p>
@endsection

@section('content')
    {{-- Form GET tidak butuh @csrf --}}
    <form method="GET" action="{{ route('projects.index') }}" class="search-bar">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Cari judul atau deskripsi...">
        <input type="text" name="category" value="{{ request('category') }}" placeholder="Kategori (mis. Web)">
        <button type="submit" class="btn" style="width:auto; padding:0.6rem 1.25rem;">Cari</button>
    </form>

    @if ($projects->count())
        <div class="grid-container">
            @foreach ($projects as $project)
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

                        <a href="{{ route('projects.show', $project) }}" class="btn-detail">Lihat Detail</a>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($projects->hasPages())
            <div class="pagination-wrap" style="display:flex; gap:1rem; align-items:center;">
                @if ($projects->previousPageUrl())
                    <a href="{{ $projects->previousPageUrl() }}" class="btn" style="width:auto; padding:0.5rem 1rem;">&laquo; Sebelumnya</a>
                @endif

                <span>Halaman {{ $projects->currentPage() }} dari {{ $projects->lastPage() }}</span>

                @if ($projects->nextPageUrl())
                    <a href="{{ $projects->nextPageUrl() }}" class="btn" style="width:auto; padding:0.5rem 1rem;">Berikutnya &raquo;</a>
                @endif
            </div>
        @endif
    @else
        <p class="empty">Belum ada proyek yang cocok.</p>
    @endif
@endsection
