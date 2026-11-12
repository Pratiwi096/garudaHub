@extends('layouts.app')

@section('title', $project->title . ' - GarudaHub')

@section('header')
    <h1>{{ $project->title }}</h1>
    <p>Oleh {{ $project->client->name }} &middot; Kategori: {{ $project->category }}</p>
@endsection

@section('content')
    @php $user = auth()->user(); @endphp

    {{-- Detail proyek --}}
    <div class="card" style="margin-bottom:1.5rem;">
        <div>
            <span class="category-tag">{{ $project->category }}</span>

            {{-- e() meng-escape dulu, baru nl2br: baris baru tampil, script tetap aman --}}
            <p style="line-height:1.7; margin-bottom:1.25rem;">{!! nl2br(e($project->description)) !!}</p>
        </div>

        <div class="card-footer">
            <div class="meta-info" style="margin-bottom:0;">
                <div class="budget-group">
                    <span class="budget-label">Anggaran</span>
                    <span class="budget-val">Rp {{ number_format($project->budget, 0, ',', '.') }}</span>
                </div>
                <div class="budget-group" style="text-align:right;">
                    <span class="budget-label">Batas penawaran</span>
                    <span class="client-name">{{ $project->bid_deadline->format('d M Y, H:i') }}</span>
                </div>
                <div class="budget-group" style="text-align:right;">
                    <span class="budget-label">Status</span>
                    <span class="client-name">{{ $project->status }}</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Tombol edit dan hapus: hanya pemilik proyek dan admin --}}
    @auth
        @if ($user->isAdmin() || $project->client_id === $user->id)
            <div style="display:flex; gap:0.75rem; margin-bottom:1.5rem;">
                <a href="{{ route('projects.edit', $project) }}" class="btn" style="width:auto; padding:0.5rem 1.25rem;">Edit</a>

                <form method="POST" action="{{ route('projects.destroy', $project) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn" style="width:auto; padding:0.5rem 1.25rem; background:#b91c1c;">Hapus</button>
                </form>
            </div>
        @endif
    @endauth

    {{-- Form penawaran: hanya developer, hanya kalau lelang masih buka --}}
    @auth
        @if ($user->isDeveloper() && $project->isOpen())
            <div class="form-card" style="max-width:none; margin-bottom:1.5rem;">
                <h1>Ajukan Penawaran</h1>

                <form method="POST" action="{{ route('bids.store', $project) }}">
                    @csrf

                    <div class="form-group">
                        <label for="price">Harga (Rp)</label>
                        <input id="price" type="number" name="price" value="{{ old('price') }}" min="1" required>
                        @error('price') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="duration_days">Durasi (hari)</label>
                        <input id="duration_days" type="number" name="duration_days" value="{{ old('duration_days') }}" min="1" required>
                        @error('duration_days') <p class="field-error">{{ $message }}</p> @enderror
                    </div>

                    <div class="form-group">
                        <label for="proposal">Proposal</label>
                        <textarea id="proposal" name="proposal" rows="4" style="width:100%; padding:0.65rem 0.8rem; border:1px solid var(--border-color);
