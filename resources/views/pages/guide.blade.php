@extends('layouts.app')

@section('title', 'Panduan Penggunaan | Tuntun Sholat')
@section('content')
<section class="container-shell section-space">
    <div class="page-header reveal-section"><div><span class="eyebrow">Panduan</span><h1>Cara menggunakan aplikasi</h1><p>Ikuti langkah sederhana berikut agar proses belajar lebih rapi dan berurutan.</p></div></div>
    <div class="mt-8 grid gap-4">
        @foreach([
            ['Pilih mode', 'Gunakan mode Dewasa jika ingin foto realistis, atau mode Anak-anak jika ingin ilustrasi yang lebih sederhana.', 'toggle-right'],
            ['Buka daftar gerakan', 'Masuk ke halaman Daftar Gerakan, lalu pilih tahapan yang ingin dipelajari.', 'list-checks'],
            ['Perhatikan gambar', 'Lihat posisi tubuh pada gambar. Ukuran gambar sudah dibuat proporsional agar tidak terlalu kecil atau terlalu besar.', 'image'],
            ['Baca Arab dan latin', 'Baca teks Arab, transliterasi latin, dan arti pada panel bacaan.', 'languages'],
            ['Putar audio', 'Tekan tombol play pada pemutar audio untuk mendengar contoh bacaan sementara.', 'volume-2'],
        ] as $index => [$title, $desc, $icon])
            <article class="guide-item reveal-section"><span>{{ $index + 1 }}</span><i data-lucide="{{ $icon }}" class="h-7 w-7"></i><div><h2>{{ $title }}</h2><p>{{ $desc }}</p></div></article>
        @endforeach
    </div>
</section>
@endsection
