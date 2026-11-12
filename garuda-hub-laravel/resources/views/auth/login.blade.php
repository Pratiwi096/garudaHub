@extends('layouts.app')

@section('title', 'Masuk - GarudaHub')

@section('content')
    <div class="form-card">
        <h1>Masuk</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email') <p class="field-error">{{ $message }}</p> @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required>
            </div>

            <button type="submit" class="btn">Masuk</button>
        </form>
    </div>
@endsection
