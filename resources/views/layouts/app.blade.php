<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Tuntun Sholat, aplikasi belajar tata cara sholat sesuai HPT Muhammadiyah dengan gambar, bacaan, dan audio MP3.">
    <title>@yield('title', 'Tuntun Sholat')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;600;700&family=Inter:wght@400;500;600;700;800&family=Nunito:wght@500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="min-h-screen bg-[#f7f4ec] text-slate-800 antialiased {{ ($activeModeSlug ?? 'dewasa') === 'anak-anak' ? 'mode-child' : 'mode-adult' }}">
    <a href="#main-content" class="skip-link">Lewati ke konten utama</a>
    <x-navbar />
    <x-identity-header />
    <x-alert />

    <main id="main-content">
        @yield('content')
    </main>

    <x-footer />
    @stack('scripts')
</body>
</html>
