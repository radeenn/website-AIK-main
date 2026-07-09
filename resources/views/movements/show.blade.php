@extends('layouts.app')

@section('title', $movement->urutan.'. '.$movement->nama.' | Tuntun Sholat')

@section('content')
@php($isChildMode = ($activeModeSlug ?? 'dewasa') === 'anak-anak')
<section class="container-shell section-space" x-data="autoplayController({{ request()->boolean('autoplay') ? 'true' : 'false' }}, {{ $next ? \Illuminate\Support\Js::from(route('movements.show', $next->slug)) : 'null' }})">
    <div class="mb-5 flex flex-wrap items-center justify-between gap-3">
        <a href="{{ route('movements.index') }}" class="text-link"><i data-lucide="arrow-left" class="h-4 w-4"></i> Kembali ke daftar</a>
        <x-mode-switcher :urutan="$movement->urutan" />
    </div>

    <div class="detail-layout">
        <aside class="detail-sidebar">
            <label for="movement-select" class="form-label lg:hidden">Pilih gerakan lain</label>
            <select id="movement-select" class="form-control lg:hidden" onchange="if(this.value) location.href=this.value">
                @foreach($allMovements as $item)
                    <option value="{{ route('movements.show', $item->slug) }}" {{ $item->id === $movement->id ? 'selected' : '' }}>{{ $item->urutan }}. {{ $item->nama }}</option>
                @endforeach
            </select>
            <div class="hidden lg:block">
                <h2>Urutan Gerakan</h2>
                <nav class="mt-4 grid gap-1" aria-label="Daftar gerakan">
                    @foreach($allMovements as $item)
                        <a href="{{ route('movements.show', $item->slug) }}" class="sidebar-movement {{ $item->id === $movement->id ? 'active' : '' }}"><span>{{ $item->urutan }}</span><strong>{{ $item->nama }}</strong></a>
                    @endforeach
                </nav>
            </div>
        </aside>

        <article class="movement-visual-panel">
            <div>
                <span class="eyebrow">{{ $isChildMode ? 'Langkah ' : 'Gerakan ke-' }}{{ $movement->urutan }}</span>
                <h1>{{ $movement->nama }}</h1>
            </div>
            <p class="mt-3 leading-7 text-slate-600">{{ $isChildMode ? $movement->deskripsi_sederhana : $movement->deskripsi }}</p>
            <div class="kid-note"><span aria-hidden="true">💡</span><span>Lihat gambarnya dulu, lalu dengarkan bacaan dan ikuti dengan tenang.</span></div>
            <div class="movement-image-wrap mt-6">
                <img src="{{ $movement->gambar_src }}" alt="Gerakan {{ $movement->nama }}" class="movement-detail-image" loading="eager">
            </div>
            @if($movement->video_src)
                <x-video-modal :src="$movement->video_src" :title="'Video '.$movement->nama" />
            @endif
        </article>

        <div class="reading-panel">
            <div class="flex flex-wrap items-start justify-between gap-3">
                <div>
                    <span class="eyebrow">{{ $isChildMode ? 'Ayo baca' : 'Bacaan' }}</span>
                    <h2>{{ $isChildMode ? 'Dengarkan dan baca pelan-pelan' : 'Arab, Latin, Terjemahan, dan Audio' }}</h2>
                </div>
                <div class="flex gap-2">
                    <button type="button" class="btn-secondary" @click="start" x-show="!active"><i data-lucide="play" class="h-4 w-4"></i> {{ $isChildMode ? 'Mulai Putar' : 'Autoplay' }}</button>
                    <button type="button" class="btn-secondary" @click="stop" x-show="active" x-cloak><i data-lucide="pause" class="h-4 w-4"></i> {{ $isChildMode ? 'Stop Dulu' : 'Berhenti' }}</button>
                </div>
            </div>

            <div class="mt-5 grid gap-4">
                @forelse($movement->bacaan as $reading)
                    <section class="reading-card">
                        <h3>{{ $reading->judul }}</h3>
                        <div class="reading-block"><span>Bacaan Arab</span><p dir="rtl" lang="ar" class="arabic-text">{{ $reading->teks_arab }}</p></div>
                        <div class="reading-block"><span>Transliterasi Latin</span><p class="font-medium italic text-slate-800">{{ $reading->teks_latin }}</p></div>
                        <div class="reading-block"><span>{{ $isChildMode ? 'Arti Singkat' : 'Terjemahan' }}</span><p>{{ $isChildMode ? $reading->terjemahan_ringkas : $reading->terjemahan }}</p></div>
                        @if($reading->audio_src)
                            <x-audio-player :src="$reading->audio_src" :title="$reading->judul" />
                        @endif
                        <p class="source-note"><i data-lucide="book-marked" class="mt-0.5 h-4 w-4"></i><span>{{ $reading->sumber }}</span></p>
                    </section>
                @empty
                    <div class="empty-state">
                        <i data-lucide="minus-circle" class="h-10 w-10"></i>
                        <h3>Tidak ada bacaan khusus</h3>
                        <p>Gerakan ini berisi posisi atau perpindahan tanpa bacaan khusus pada struktur modul.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <x-previous-next :previous="$previous" :next="$next" />
</section>
@endsection
