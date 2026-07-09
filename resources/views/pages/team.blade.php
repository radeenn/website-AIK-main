@extends('layouts.app')
@section('title', 'Identitas Kelompok | Tuntun Sholat')
@section('content')
<section class="container-shell section-space">
    <div class="page-header">
        <div>
            <span class="eyebrow"><i data-lucide="users-round" class="h-4 w-4"></i> Identitas Proyek</span>
            <h1>Kelompok dan Pembagian Peran</h1>
            <p>Identitas ditampilkan sederhana sesuai modul: nama kelompok, anggota, NIM, peran, program studi, mata kuliah, dan dosen.</p>
        </div>
        <img src="{{ asset('images/logo-universitas.png') }}" alt="Logo Universitas Muhammadiyah Pontianak" class="team-logo">
    </div>

    <div class="mt-8 grid gap-6 lg:grid-cols-[1fr_320px]">
        <article class="team-table-panel">
            <div class="team-panel-header">
                <div>
                    <span class="eyebrow">Anggota</span>
                    <h2>{{ $siteIdentity?->nama_kelompok ?? 'Kelompok Kami' }}</h2>
                </div>
            </div>

            <div class="team-table-wrap">
                <table class="team-public-table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Peran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($members as $member)
                            <tr>
                                <td>{{ $member->nama }}</td>
                                <td>{{ $member->nim ?: '-' }}</td>
                                <td>{{ $member->peran }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-slate-500">Data anggota belum diisi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </article>

        <aside class="team-info-panel">
            <div class="grid place-items-center rounded-2xl bg-white p-5">
                <img src="{{ asset('images/logo-universitas.png') }}" alt="Logo Universitas Muhammadiyah Pontianak" class="h-32 w-32 object-contain">
            </div>
            <div class="mt-5 grid gap-4 text-sm">
                <div><small>Program Studi</small><strong>{{ $siteIdentity?->prodi ?? 'Sistem Informasi' }}</strong></div>
                <div><small>Mata Kuliah</small><strong>{{ $siteIdentity?->mata_kuliah ?? 'Pengembangan Aplikasi Web' }}</strong></div>
                <div><small>Dosen</small><strong>{{ $siteIdentity?->dosen ?? 'Belum diisi' }}</strong></div>
            </div>
        </aside>
    </div>
</section>
@endsection
