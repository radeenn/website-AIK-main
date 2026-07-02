@props(['movement'])
<article class="movement-card group">
    <div class="movement-card-image">
        <img loading="lazy" src="{{ $movement->gambar_src }}" alt="Gerakan {{ $movement->nama }}" class="h-full w-full object-contain transition duration-500 group-hover:scale-105">
        <span class="absolute left-3 top-3 flex h-8 min-w-8 items-center justify-center rounded-full bg-emerald-700 px-2 text-sm font-extrabold text-white shadow">{{ $movement->urutan }}</span>
    </div>
    <div class="flex flex-1 flex-col p-4">
        <h3 class="line-clamp-2 text-base font-extrabold text-slate-900">{{ $movement->nama }}</h3>
        <p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-600">{{ ($activeModeSlug ?? 'dewasa') === 'anak-anak' ? $movement->deskripsi_sederhana : $movement->deskripsi }}</p>
        <a href="{{ route('movements.show', $movement->slug) }}" class="btn-primary mt-4 w-full justify-center">Pelajari <i data-lucide="arrow-right" class="h-4 w-4"></i></a>
    </div>
</article>
