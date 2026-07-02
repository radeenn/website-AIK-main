@extends('layouts.app')

@section('title', 'Daftar Gerakan Sholat | Tuntun Sholat')

@section('content')
<section class="container-shell section-space">
    <div class="page-header reveal-section">
        <div><span class="eyebrow">Belajar berurutan</span><h1>Daftar Gerakan Sholat</h1><p>Pilih gerakan untuk mempelajari posisi, bacaan Arab, transliterasi latin, arti, dan audio.</p></div>
        <x-mode-switcher />
    </div>

    <form method="GET" action="{{ route('movements.index') }}" class="search-box mt-7">
        <i data-lucide="search" class="h-5 w-5"></i>
        <label class="sr-only" for="movement-search">Cari gerakan</label>
        <input id="movement-search" name="q" value="{{ $search }}" type="search" placeholder="Cari gerakan sholat...">
        @if($search)<a href="{{ route('movements.index') }}" class="icon-button"><span class="sr-only">Hapus pencarian</span><i data-lucide="x" class="h-4 w-4"></i></a>@endif
        <button class="btn-primary" type="submit">Cari</button>
    </form>

    @if($search)<p class="mt-5 text-sm text-slate-600">Hasil pencarian untuk <strong>“{{ $search }}”</strong>: {{ $movements->count() }} gerakan.</p>@endif

    <div id="daftar-gerakan" class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        @forelse($movements as $movement)
            <x-movement-card :movement="$movement" />
        @empty
            <div class="empty-state sm:col-span-2 lg:col-span-4"><i data-lucide="search-x" class="h-12 w-12"></i><h2>Gerakan tidak ditemukan</h2><p>Coba gunakan kata pencarian yang lebih umum.</p><a href="{{ route('movements.index') }}" class="btn-primary">Tampilkan Semua</a></div>
        @endforelse
    </div>
</section>
@endsection
