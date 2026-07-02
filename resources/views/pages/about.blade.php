@extends('layouts.app')

@section('title', 'Tentang Aplikasi | Tuntun Sholat')
@section('content')
<section class="container-shell section-space">
    <div class="page-header reveal-section"><div><span class="eyebrow">Tentang aplikasi</span><h1>Media belajar sholat yang terstruktur</h1><p>Tuntun Sholat dibuat untuk menampilkan urutan gerakan sholat dengan gambar yang jelas, bacaan Arab, transliterasi latin, arti, dan audio yang dapat diputar.</p></div><img src="{{ asset('images/about-illustration.svg') }}" alt="Ilustrasi buku dan masjid" class="hidden h-40 md:block"></div>
    <div class="mt-8 grid gap-5 md:grid-cols-3">
        @foreach([
            ['image', 'Visual jelas', 'Setiap gerakan memakai gambar dengan ukuran proporsional agar mudah diikuti.'],
            ['languages', 'Arab dan latin', 'Bacaan dilengkapi teks Arab, transliterasi latin, serta terjemahan.'],
            ['volume-2', 'Audio bacaan', 'Audio sementara memakai Google Text-to-Speech sehingga tombol play tetap dapat digunakan.'],
        ] as [$icon, $title, $desc])
        <article class="info-card reveal-section"><i data-lucide="{{ $icon }}" class="h-9 w-9"></i><h2>{{ $title }}</h2><p>{{ $desc }}</p></article>
        @endforeach
    </div>
</section>
@endsection
