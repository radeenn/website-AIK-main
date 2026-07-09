@extends('layouts.app')

@section('title', 'Tuntun Sholat - Panduan Sholat dengan Audio MP3')

@section('content')
@php($isChildMode = ($activeModeSlug ?? 'dewasa') === 'anak-anak')
<section class="container-shell pt-8 md:pt-12">
    <div class="hero-panel">
        <div class="relative z-10 max-w-3xl">
            <span class="eyebrow"><i data-lucide="{{ $isChildMode ? 'sparkles' : 'book-open-check' }}" class="h-4 w-4"></i> {{ $isChildMode ? 'Yuk belajar sholat' : 'Panduan Sholat Terstruktur' }}</span>
            <h1 class="mt-5 text-4xl font-extrabold leading-tight text-slate-950 sm:text-5xl lg:text-6xl">
                {{ $isChildMode ? 'Belajar sholat pelan-pelan, seru, dan mudah diikuti.' : 'Belajar gerakan dan bacaan sholat secara runtut.' }}
            </h1>
            <p class="mt-5 max-w-2xl text-base leading-8 text-slate-600 sm:text-lg">
                {{ $isChildMode
                    ? 'Mode anak-anak dibuat lebih ceria: gambar besar, kalimat singkat, arti ringkas, dan tombol audio agar anak bisa mendengar bacaan dengan nyaman.'
                    : 'Website ini fokus pada inti modul: daftar gerakan, detail gerakan, bacaan Arab, transliterasi latin, terjemahan, audio MP3, mode Dewasa/Anak-anak, dan navigasi berurutan.' }}
            </p>
            <div class="hero-kid-steps" aria-label="Langkah belajar anak">
                <span class="kid-bubble">👀 Lihat gerakan</span>
                <span class="kid-bubble">🔊 Dengarkan audio</span>
                <span class="kid-bubble">🤲 Ikuti pelan-pelan</span>
            </div>
            <div class="hero-actions mt-7">
                <a href="{{ route('movements.index') }}" class="btn-primary justify-center">{{ $isChildMode ? 'Mulai Petualangan' : 'Mulai dari Daftar Gerakan' }} <i data-lucide="arrow-right" class="h-5 w-5"></i></a>
                @if($popularMovements->first())
                    <a href="{{ route('movements.show', ['slug' => $popularMovements->first()->slug, 'autoplay' => 1]) }}" class="btn-secondary justify-center" onclick="sessionStorage.setItem('sholat.autoplay','1')">{{ $isChildMode ? 'Putar dari Awal' : 'Putar Berurutan' }}</a>
                @endif
            </div>
        </div>
        <div class="hero-visual" aria-hidden="true">
            <img src="{{ asset($isChildMode ? 'images/mode-child.webp' : 'images/hero-sholat.webp') }}" alt="" class="h-full w-full object-contain object-bottom">
        </div>
    </div>

    <div class="mt-5 grid grid-cols-2 gap-3 lg:grid-cols-4">
        @foreach($isChildMode ? [
            ['stars', 'Belajar seperti bermain'],
            ['image', 'Gambar besar dan jelas'],
            ['volume-2', 'Dengar bacaan MP3'],
            ['smile', 'Bahasa ramah anak'],
        ] : [
            ['list-checks', '13 gerakan sesuai urutan'],
            ['languages', 'Arab, latin, dan arti'],
            ['volume-2', 'Audio MP3 lokal'],
            ['users-round', 'Mode dewasa dan anak'],
        ] as [$icon, $label])
            <div class="feature-pill"><i data-lucide="{{ $icon }}" class="h-5 w-5"></i><span>{{ $label }}</span></div>
        @endforeach
    </div>
</section>

<section class="container-shell section-space">
    <div class="section-heading">
        <div>
            <span class="eyebrow">Mode belajar</span>
            <h2>{{ $isChildMode ? 'Pilih gaya belajar yang nyaman.' : 'Pilih penyajian yang paling sesuai.' }}</h2>
        </div>
        <p>Mode Dewasa menggunakan penjelasan lebih lengkap. Mode Anak-anak memakai bahasa lebih sederhana, visual lebih ramah, dan arti yang lebih ringkas tanpa mengubah urutan gerakan.</p>
    </div>
    <div class="mt-7 grid gap-4 md:grid-cols-2">
        @php($adult = $siteCategories->firstWhere('slug', 'dewasa'))
        @php($child = $siteCategories->firstWhere('slug', 'anak-anak'))
        @if($adult)
            <article class="mode-card">
                <div>
                    <span class="mode-badge">Mode Dewasa</span>
                    <h3>Penjelasan lebih lengkap dan formal.</h3>
                    <p>Untuk pengguna yang membutuhkan keterangan gerakan, teks bacaan penuh, audio, dan sumber bacaan dengan tampilan matang.</p>
                    <a href="{{ route('mode.switch', $adult) }}" class="text-link mt-4">Gunakan Mode Dewasa <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
                </div>
                <img src="{{ asset('images/mode-adult.webp') }}" alt="Mode dewasa" loading="lazy">
            </article>
        @endif
        @if($child)
            <article class="mode-card child-card">
                <div>
                    <span class="mode-badge">Mode Anak-anak</span>
                    <h3>Lebih ceria, singkat, dan mudah diikuti anak.</h3>
                    <p>Gambar dibuat lebih dominan, instruksi lebih pendek, dan audio tetap tersedia supaya anak bisa belajar mendengar bacaan.</p>
                    <a href="{{ route('mode.switch', $child) }}" class="text-link mt-4">Gunakan Mode Anak-anak <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
                </div>
                <img src="{{ asset('images/mode-child.webp') }}" alt="Mode anak-anak" loading="lazy">
            </article>
        @endif
    </div>
</section>

@if($popularMovements->isNotEmpty())
<section class="container-shell pb-16">
    <div class="section-heading">
        <div>
            <span class="eyebrow">{{ $isChildMode ? 'Langkah pertama' : 'Gerakan awal' }}</span>
            <h2>{{ $isChildMode ? 'Mulai dari gerakan pertama, ya.' : 'Mulai dari tahapan pertama.' }}</h2>
        </div>
        <a href="{{ route('movements.index') }}" class="text-link">Lihat semua <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
    </div>
    <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        @foreach($popularMovements as $movement)
            <x-movement-card :movement="$movement" />
        @endforeach
    </div>
</section>
@endif
@endsection
