@extends('layouts.app')

@section('title', 'Tuntun Sholat - Panduan Sholat dengan Audio')

@section('content')
<section class="container-shell home-hero-section">
    <div class="hero-panel">
        <div class="hero-content">
            <span class="eyebrow"><i data-lucide="square" class="h-3.5 w-3.5"></i> Panduan Sholat Terstruktur</span>
            <p class="hero-kicker">Gerakan, bacaan Arab, latin, arti, dan audio</p>
            <h1>Belajar Tata Cara Sholat dengan Tampilan Bersih dan Mudah Diikuti</h1>
            <p class="hero-description">
                Materi disusun berurutan mulai dari berdiri, takbir, rukuk, sujud, tasyahud, sampai salam. Setiap gerakan memakai gambar yang jelas, bacaan Arab, transliterasi latin, arti, dan audio sementara dari Google Text-to-Speech.
            </p>
            <div class="hero-actions">
                @if($popularMovements->first())
                    <a href="{{ route('movements.show', $popularMovements->first()->slug) }}" class="btn-primary">Mulai Belajar <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
                @else
                    <a href="{{ route('movements.index') }}" class="btn-primary">Mulai Belajar <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
                @endif
                <a href="{{ route('movements.index') }}" class="btn-secondary">Lihat Daftar Gerakan</a>
            </div>
        </div>

        <div class="hero-visual" aria-hidden="true">
            <img src="{{ asset('images/hero-sholat.webp') }}" alt="">
        </div>
    </div>
</section>
@endsection
