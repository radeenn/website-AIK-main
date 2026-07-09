<header x-data="{ open: false }" class="site-nav">
    <nav class="container-shell flex min-h-20 items-center justify-between gap-4" aria-label="Navigasi utama">
        <a href="{{ route('home') }}" class="brand-lockup focus-ring">
            <img src="{{ asset('images/logo-universitas.png') }}" alt="Logo Universitas Muhammadiyah Pontianak" class="h-11 w-11 object-contain">
            <span>
                <strong>Tuntun Sholat</strong>
                <small>HPT Muhammadiyah</small>
            </span>
        </a>

        <div class="hidden items-center gap-1 md:flex">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('movements.index') }}" class="nav-link {{ request()->routeIs('movements.*') ? 'active' : '' }}">Gerakan</a>
            <a href="{{ route('team') }}" class="nav-link {{ request()->routeIs('team') ? 'active' : '' }}">Identitas</a>
        </div>

        <div class="hidden items-center gap-3 md:flex">
            <x-mode-switcher compact />
            <a href="{{ route('movements.index') }}" class="btn-primary">Mulai</a>
        </div>

        <button @click="open = !open" :aria-expanded="open" aria-controls="mobile-menu" class="icon-button md:hidden" type="button">
            <span class="sr-only">Buka menu</span>
            <i x-show="!open" data-lucide="menu" class="h-5 w-5"></i>
            <i x-show="open" x-cloak data-lucide="x" class="h-5 w-5"></i>
        </button>
    </nav>

    <div id="mobile-menu" x-show="open" x-transition x-cloak @click.outside="open = false" class="border-t border-slate-200 bg-white px-4 py-4 md:hidden">
        <div class="mx-auto grid max-w-xl gap-2">
            <a @click="open=false" href="{{ route('home') }}" class="mobile-link">Beranda</a>
            <a @click="open=false" href="{{ route('movements.index') }}" class="mobile-link">Gerakan</a>
            <a @click="open=false" href="{{ route('team') }}" class="mobile-link">Identitas</a>
            <div class="mt-2 border-t border-slate-100 pt-3"><x-mode-switcher /></div>
        </div>
    </div>
</header>
