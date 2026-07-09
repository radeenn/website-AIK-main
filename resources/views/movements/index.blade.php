@extends('layouts.app')

@section('title', 'Daftar Gerakan Sholat | Tuntun Sholat')

@section('content')
@php($isChildMode = ($activeModeSlug ?? 'dewasa') === 'anak-anak')
<section class="container-shell section-space">
    <div class="page-header">
        <div>
            <span class="eyebrow"><i data-lucide="{{ $isChildMode ? 'map' : 'list-checks' }}" class="h-4 w-4"></i> {{ $isChildMode ? 'Peta belajar' : 'Belajar berurutan' }}</span>
            <h1>{{ $isChildMode ? 'Petualangan Gerakan Sholat' : 'Daftar Gerakan Sholat' }}</h1>
            <p>{{ $isChildMode ? 'Pilih langkahnya satu per satu. Setiap halaman punya gambar, arti singkat, dan tombol audio agar belajar terasa ringan.' : 'Pilih gerakan untuk membuka gambar, bacaan Arab, transliterasi latin, terjemahan, dan audio MP3.' }}</p>
            @if($isChildMode)
                <div class="kid-guide" aria-label="Panduan belajar anak">
                    <span>1. Lihat gambar</span>
                    <span>2. Dengar audio</span>
                    <span>3. Ikuti pelan-pelan</span>
                </div>
            @endif
        </div>
        <div class="flex flex-col items-start gap-3 sm:flex-row sm:items-center">
            <x-mode-switcher />
            @if($movements->first())
                <a href="{{ route('movements.show', ['slug' => $movements->first()->slug, 'autoplay' => 1]) }}" class="btn-primary" onclick="sessionStorage.setItem('sholat.autoplay','1')">
                    <i data-lucide="play" class="h-4 w-4"></i> {{ $isChildMode ? 'Putar Dari Awal' : 'Putar Berurutan' }}
                </a>
            @endif
        </div>
    </div>

    <div class="movement-path mt-9">
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
