# Tuntun Sholat

Aplikasi Laravel untuk belajar tata cara sholat secara berurutan. Versi ini dibuat lebih bersih dan profesional: hanya ada halaman publik yang dibutuhkan, tanpa dashboard admin, tanpa fitur tambahan yang tidak diminta, dan audio bacaan sudah memakai file MP3 lokal di `public/audios`.

## Fokus fitur

- Beranda ringkas.
- Daftar 13 gerakan sholat dari berdiri hingga salam.
- Detail gerakan berisi gambar, deskripsi, bacaan Arab, transliterasi latin, terjemahan, dan audio.
- Mode Dewasa dan Anak-anak.
- Navigasi Next/Previous antar-gerakan.
- Autoplay berurutan dari satu gerakan ke gerakan berikutnya.
- Identitas kelompok tampil di header dan halaman Identitas.
- Data konten tetap berasal dari database melalui migration dan seeder.

## Struktur audio

File audio berada di:

```text
public/audios/
├── 001_Al-Fatihah.mp3
├── 112AlIkhlas.mp3
├── bacaan-tasyawud-awal.mp3
├── bacaan-tasyawud_akhir.mp3
├── doa_iftitah.mp3
├── duduk_antara_dua_sujud.mp3
├── itidal.mp3
├── rukuk.mp3
├── salam.mp3
├── sujud.mp3
├── takbir_allahu_akbar.mp3
└── thumaninah.mp3
```

Path audio diisi melalui `database/seeders/KategoriGerakanSeeder.php` ke kolom `audio_url`.

## Instalasi lokal

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run build
php artisan serve
```

Buka aplikasi melalui URL yang muncul dari `php artisan serve`.

## Halaman publik

| URL | Fungsi |
|---|---|
| `/` | Beranda |
| `/gerakan` | Daftar gerakan |
| `/gerakan/{slug}` | Detail gerakan dan audio |
| `/identitas` | Identitas kelompok |
| `/mode/{kategori}` | Mengganti mode Dewasa/Anak-anak |

## Catatan modul

Aplikasi mengikuti kebutuhan modul PjBL: responsif, data konten dari database, dua mode pengguna, gambar gerakan, teks Arab-Latin-terjemahan, audio MP3, navigasi Next/Previous, autoplay, dan identitas kelompok di halaman utama.
