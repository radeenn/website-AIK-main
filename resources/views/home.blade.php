@extends('layouts.app')

@section('title', 'Tuntun Sholat - Panduan Sholat Arab Latin dan Audio')

@section('content')
<section class="container-shell pt-6 md:pt-10">
    <div class="hero-panel reveal-section">
        <div class="relative z-10 max-w-2xl">
            <span class="eyebrow"><i data-lucide="book-open-check" class="h-4 w-4"></i> Panduan Sholat Terstruktur</span>
            <p class="mt-4 text-sm font-bold text-emerald-800">Gerakan, bacaan Arab, latin, arti, dan audio</p>
            <h1 class="mt-5 text-4xl font-extrabold leading-tight text-emerald-950 sm:text-5xl lg:text-6xl">Belajar Tata Cara Sholat dengan Tampilan Bersih dan Mudah Diikuti</h1>
            <p class="mt-5 max-w-xl text-base leading-8 text-slate-600 sm:text-lg">Materi disusun berurutan mulai dari berdiri, takbir, rukuk, sujud, tasyahud, sampai salam. Setiap gerakan memakai gambar yang jelas, bacaan Arab, transliterasi latin, arti, dan audio sementara dari Google Text-to-Speech.</p>
            <div class="mt-7 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('movements.index') }}" class="btn-primary justify-center">Mulai Belajar <i data-lucide="arrow-right" class="h-5 w-5"></i></a>
                <a href="{{ route('movements.index') }}#daftar-gerakan" class="btn-secondary justify-center">Lihat Daftar Gerakan</a>
            </div>
        </div>
        <div class="pointer-events-none relative mt-8 min-h-72 lg:absolute lg:inset-y-0 lg:right-0 lg:mt-0 lg:w-[48%]">
            <img src="{{ asset('images/hero-sholat.webp') }}" alt="Panduan gerakan sholat dewasa dan anak" class="absolute inset-0 h-full w-full object-contain object-bottom">
        </div>
    </div>

    <div class="mt-5 grid grid-cols-2 gap-3 lg:grid-cols-4">
        @foreach([
            ['image', 'Gambar gerakan jelas'],
            ['languages', 'Arab, latin, dan arti'],
            ['volume-2', 'Audio bisa diputar'],
            ['users-round', 'Mode dewasa dan anak'],
        ] as [$icon, $label])
            <div class="feature-pill reveal-section"><i data-lucide="{{ $icon }}" class="h-5 w-5"></i><span>{{ $label }}</span></div>
        @endforeach
    </div>
</section>

<section class="container-shell section-space reveal-section">
    <div class="section-heading">
        <div><span class="eyebrow">Pilih mode belajar</span><h2>Dua tampilan sesuai pengguna</h2></div>
        <p>Materi inti tetap sama. Gambar dan gaya penyampaian disesuaikan antara mode dewasa dan anak-anak.</p>
    </div>
    <div class="mt-8 grid gap-5 lg:grid-cols-2">
        @php($adult = $siteCategories->firstWhere('slug', 'dewasa'))
        @php($child = $siteCategories->firstWhere('slug', 'anak-anak'))
        @if($adult)
        <article class="mode-card mode-card-adult">
            <div class="max-w-md"><span class="mode-badge">Mode Dewasa</span><h3>Foto gerakan lebih realistis</h3><p>Cocok untuk belajar dengan contoh posisi orang dewasa yang rapi dan proporsional.</p><a href="{{ route('mode.switch', $adult) }}" class="btn-primary mt-5">Pilih Mode Dewasa <i data-lucide="arrow-right" class="h-4 w-4"></i></a></div>
            <img src="{{ asset('images/mode-adult.webp') }}" alt="Mode dewasa" loading="lazy">
        </article>
        @endif
        @if($child)
        <article class="mode-card mode-card-child">
            <div class="max-w-md"><span class="mode-badge">Mode Anak-anak</span><h3>Ilustrasi lebih sederhana</h3><p>Cocok untuk anak-anak karena tampilan lebih ringan dan penjelasan lebih mudah dipahami.</p><a href="{{ route('mode.switch', $child) }}" class="btn-primary mt-5">Pilih Mode Anak-anak <i data-lucide="arrow-right" class="h-4 w-4"></i></a></div>
            <img src="{{ asset('images/mode-child.webp') }}" alt="Mode anak-anak" loading="lazy">
        </article>
        @endif
    </div>
</section>

<section class="bg-white/70 py-16 reveal-section">
    <div class="container-shell">
        <div class="section-heading"><div><span class="eyebrow">Cara belajar</span><h2>Ikuti urutan gerakan</h2></div></div>
        <div class="mt-8 grid gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach([
                ['1', 'Pilih mode', 'Gunakan mode Dewasa atau Anak-anak.', 'toggle-right'],
                ['2', 'Pilih gerakan', 'Buka daftar gerakan sholat secara berurutan.', 'mouse-pointer-click'],
                ['3', 'Baca materi', 'Perhatikan gambar, Arab, latin, dan arti bacaan.', 'book-open'],
                ['4', 'Putar audio', 'Gunakan tombol audio untuk mendengar contoh bacaan.', 'volume-2'],
            ] as [$number, $title, $description, $icon])
            <article class="step-card"><span>{{ $number }}</span><i data-lucide="{{ $icon }}" class="h-7 w-7"></i><h3>{{ $title }}</h3><p>{{ $description }}</p></article>
            @endforeach
        </div>
    </div>
</section>

@if($popularMovements->isNotEmpty())
<section id="daftar-gerakan" class="container-shell section-space reveal-section">
    <div class="section-heading"><div><span class="eyebrow">Gerakan awal</span><h2>Mulai dari tahapan pertama</h2></div><a href="{{ route('movements.index') }}" class="text-link">Lihat semua <i data-lucide="arrow-right" class="h-4 w-4"></i></a></div>
    <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
        @foreach($popularMovements as $movement)<x-movement-card :movement="$movement" />@endforeach
    </div>
</section>
@endif

<section class="container-shell pb-16 reveal-section">
    <div class="source-panel">
        <div><span class="eyebrow"><i data-lucide="shield-check" class="h-4 w-4"></i> Catatan Materi</span><h2>Bacaan sudah diisi Arab dan latin</h2><p>Audio menggunakan Google Text-to-Speech sebagai audio sementara. Untuk tugas sekolah atau publikasi resmi, redaksi bacaan tetap dapat disesuaikan lagi dengan arahan guru atau sumber HPT Muhammadiyah yang digunakan di kelas.</p></div>
        <div class="source-seal"><i data-lucide="book-marked" class="h-10 w-10"></i><strong>Arab Latin</strong><span>Audio sementara</span></div>
    </div>
</section>
@endsection
