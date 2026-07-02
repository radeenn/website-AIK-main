# Tuntun Sholat

Aplikasi Laravel untuk belajar tata cara sholat secara berurutan. Versi ini sudah disesuaikan dengan permintaan revisi: gambar gerakan diganti memakai gambar yang dikirim, ukuran gambar dibuat proporsional, bacaan Arab dan latin sudah diisi, audio sementara memakai Google Text-to-Speech, dan fitur publik yang tidak diperlukan seperti video, favorit, progress, dan autoplay sudah dibersihkan dari tampilan utama.

## Fitur Utama

- Mode Dewasa dan Anak-anak.
- 13 gerakan sholat berurutan.
- Gambar gerakan format WebP agar lebih ringan.
- Bacaan Arab, transliterasi latin, terjemahan, dan arti singkat.
- Pemutar audio dengan tombol play, pause, durasi, dan volume.
- Pencarian gerakan.
- Panel admin untuk mengelola kategori, gerakan, dan bacaan.

## Cara Menjalankan di Laragon

1. Ekstrak project ke folder Laragon, misalnya:

```bash
C:\laragon\www\website-AIK
```

2. Masuk ke folder project:

```bash
cd C:\laragon\www\website-AIK
```

3. Install dependency PHP:

```bash
composer install
```

4. Salin file environment:

```bash
copy .env.example .env
```

5. Buat key aplikasi:

```bash
php artisan key:generate
```

6. Atur database di `.env`. Contoh SQLite:

```env
DB_CONNECTION=sqlite
```

Lalu buat file database:

```bash
type nul > database\database.sqlite
```

Contoh MySQL:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=website_aik
DB_USERNAME=root
DB_PASSWORD=
```

7. Jalankan migrasi dan seeder:

```bash
php artisan migrate:fresh --seed
```

8. Install dependency frontend dan jalankan Vite:

```bash
npm install
npm run dev
```

9. Jalankan Laravel:

```bash
php artisan serve
```

Buka alamat yang muncul di terminal, biasanya:

```bash
http://127.0.0.1:8000
```

## Akun Admin Bawaan

```text
Email: admin@tuntun-sholat.test
Password: password
```

## Catatan Audio

Audio saat ini memakai URL Google Text-to-Speech sebagai audio sementara. Jika ingin audio bacaan yang lebih rapi, unggah file MP3 sendiri melalui admin pada menu Bacaan.

## Catatan Konten

Bacaan Arab dan latin sudah diisi agar website tidak kosong. Jika guru meminta redaksi HPT Muhammadiyah tertentu, sesuaikan kembali teks pada seeder atau melalui panel admin.
