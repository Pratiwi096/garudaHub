@extends('layouts.app')

@section('title', 'Daftar - GarudaHub')

@section('content')
    <div class="form-card">
        <h1>Daftar Akun</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">Nama</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
                @error('name') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required>
                @error('email') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password (min. 8 karakter)</label>
                <input id="password" type="password" name="password" required>
                @error('password') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="password_confirmation">Ulangi Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required>
            </div>

            <div class="form-group">
                <label for="role">Daftar sebagai</label>
                <select id="role" name="role" required>
                    <option value="developer" @selected(old('role') === 'developer')>Developer</option>
                    <option value="client" @selected(old('role') === 'client')>Klien</option>
                </select>
                @error('role') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="btn">Daftar</button>
        </form>
    </div>
@endsection
