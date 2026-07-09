@props(['movement'])
@php($isChildMode = ($activeModeSlug ?? 'dewasa') === 'anak-anak')
<article class="movement-card group">
    <span class="kid-star" aria-hidden="true">⭐</span>
    <a href="{{ route('movements.show', $movement->slug) }}" class="movement-card-image focus-ring" aria-label="Pelajari {{ $movement->nama }}">
        <img loading="lazy" src="{{ $movement->gambar_src }}" alt="Gerakan {{ $movement->nama }}" class="h-full w-full object-contain transition duration-500 group-hover:scale-105">
        <span class="step-number">{{ str_pad($movement->urutan, 2, '0', STR_PAD_LEFT) }}</span>
    </a>
    <div class="flex flex-1 flex-col p-4">
        <h3 class="line-clamp-2 text-base font-extrabold text-slate-900">{{ $movement->nama }}</h3>
        <p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-600">{{ $isChildMode ? $movement->deskripsi_sederhana : $movement->deskripsi }}</p>
        <a href="{{ route('movements.show', $movement->slug) }}" class="text-link mt-auto pt-4">{{ $isChildMode ? 'Ayo pelajari' : 'Pelajari' }} <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
    </div>
</article>
