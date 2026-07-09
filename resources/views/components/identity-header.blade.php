@if($siteIdentity)
<section class="identity-strip" aria-label="Identitas proyek">
    <div class="container-shell grid gap-3 py-4 md:grid-cols-4">
        <div class="identity-item md:col-span-1"><small>Kelompok</small><strong>{{ $siteIdentity->nama_kelompok }}</strong></div>
        <div class="identity-item"><small>Program Studi</small><strong>{{ $siteIdentity->prodi }}</strong></div>
        <div class="identity-item"><small>Mata Kuliah</small><strong>{{ $siteIdentity->mata_kuliah }}</strong></div>
        <div class="identity-item"><small>Dosen</small><strong>{{ $siteIdentity->dosen }}</strong></div>
    </div>
</section>
@endif
