@extends('layouts.app')

@section('title', 'Daftar Gerakan Sholat | Tuntun Sholat')

@section('content')
<section class="container-shell movements-page">
    <div class="page-header">
        <div>
            <span class="eyebrow">Belajar Berurutan</span>
            <h1>Daftar Gerakan Sholat</h1>
            <p>Pilih gerakan untuk mempelajari posisi, bacaan Arab, transliterasi latin, arti, dan audio.</p>
        </div>
        <x-mode-switcher />
    </div>

    <form action="{{ route('movements.index') }}" method="GET" class="search-form" role="search">
        <input
            type="search"
            name="q"
            value="{{ $search }}"
            placeholder="Cari gerakkan sholat"
            aria-label="Cari gerakkan sholat"
        >
    </form>

    <div class="movement-grid">
        @forelse($movements as $movement)
            <x-movement-card :movement="$movement" />
        @empty
            <div class="empty-state">
                <i data-lucide="list-x" class="h-12 w-12"></i>
                <h2>Data gerakan belum tersedia</h2>
                <p>Jalankan migration dan seeder agar data dari database tampil.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection
