@props(['movement'])
<article class="movement-card group">
    <a href="{{ route('movements.show', $movement->slug) }}" class="movement-card-image focus-ring" aria-label="Pelajari {{ $movement->nama }}">
        <img loading="lazy" src="{{ $movement->gambar_src }}" alt="Gerakan {{ $movement->nama }}" class="movement-card-img">
    </a>
    <div class="movement-card-body">
        <h3>{{ $movement->nama }}</h3>
        <a href="{{ route('movements.show', $movement->slug) }}" class="movement-card-button">
            Pelajari <i data-lucide="arrow-right" class="h-7 w-7"></i>
        </a>
    </div>
</article>
