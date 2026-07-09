<footer class="site-footer">
    <div class="container-shell grid gap-8 py-10 md:grid-cols-[1.4fr_1fr]">
        <div>
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo-universitas.png') }}" alt="" class="h-11 w-11 object-contain">
                <span class="text-xl font-extrabold">Tuntun Sholat</span>
            </div>
            <p class="mt-4 max-w-2xl text-sm leading-7 text-emerald-50/80">Aplikasi pembelajaran tata cara sholat dengan gerakan berurutan, bacaan Arab, latin, terjemahan, dan audio MP3. Materi dirancang untuk mode Dewasa dan Anak-anak.</p>
        </div>
        <div>
            <h2 class="font-bold">Menu</h2>
            <div class="mt-3 grid gap-2 text-sm text-emerald-50/80">
                <a href="{{ route('movements.index') }}">Daftar Gerakan</a>
                <a href="{{ route('team') }}">Identitas Kelompok</a>
            </div>
            <p class="mt-5 text-xs leading-6 text-emerald-50/70">Sumber konten: Himpunan Putusan Tarjih Muhammadiyah, Kitab Shalat.</p>
        </div>
    </div>
    <div class="border-t border-white/10 py-4 text-center text-xs text-emerald-50/70">&copy; {{ date('Y') }} {{ $siteIdentity?->nama_kelompok ?? 'Kelompok Tuntun Sholat' }}. Dibuat untuk pembelajaran.</div>
</footer>
