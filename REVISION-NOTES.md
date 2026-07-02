# Catatan Revisi

Perubahan yang sudah diterapkan:

1. Gambar gerakan diganti dengan gambar yang dikirim pengguna.
   - Mode Dewasa: `public/images/gerakan/dewasa/`.
   - Mode Anak-anak: `public/images/gerakan/anak-anak/`.
2. Semua gambar gerakan dikonversi ke WebP dan disamakan canvas 4:3 agar tidak terlalu kecil atau terlalu besar.
3. Seeder gerakan diperbarui agar memakai path gambar baru dari folder `public/images`.
4. Bacaan sudah diisi teks Arab, transliterasi latin, terjemahan, dan arti singkat.
5. Audio sementara menggunakan Google Text-to-Speech melalui URL pada kolom `audio_url`.
6. Tampilan publik dibersihkan:
   - Video gerakan tidak ditampilkan.
   - Favorit tidak ditampilkan.
   - Progress belajar tidak ditampilkan.
   - Autoplay audio tidak ditampilkan.
7. Halaman beranda, daftar gerakan, detail gerakan, tentang, dan panduan sudah disesuaikan dengan konten baru.
8. Model `Gerakan` diperbarui agar bisa membaca gambar langsung dari folder `public/images` tanpa wajib `php artisan storage:link` untuk gambar bawaan.

Setelah mengganti file lama dengan versi ini, jalankan ulang:

```bash
php artisan migrate:fresh --seed
npm install
npm run dev
php artisan serve
```

Jika database lama tidak ingin dihapus, jalankan:

```bash
php artisan db:seed --class=KategoriGerakanSeeder
```
