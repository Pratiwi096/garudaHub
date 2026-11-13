@extends('layouts.app')

@section('title', 'Pasang Proyek - GarudaHub')

@section('content')
    <div class="form-card" style="max-width:640px;">
        <h1>Pasang Proyek Baru</h1>

        <form method="POST" action="{{ route('projects.store') }}">
            @csrf
            @include('projects._form')
            <button type="submit" class="btn">Pasang Proyek</button>
        </form>
    </div>
@endsection





