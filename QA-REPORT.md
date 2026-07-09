# QA Report

## Pemeriksaan revisi

- Route publik tersedia: `/`, `/gerakan`, `/gerakan/{slug}`, `/identitas`, dan `/mode/{kategori}`.
- Route dan tampilan dashboard admin sudah dihapus.
- Audio MP3 lokal tersedia pada `public/audios`.
- Seeder mengisi path audio lokal ke tabel `bacaan`.
- Header menampilkan identitas kelompok sesuai kebutuhan modul.
- Tampilan sudah dipangkas agar fokus pada pembelajaran gerakan dan bacaan sholat.

## Yang perlu diuji setelah instalasi dependency

```bash
composer install
npm install
php artisan migrate:fresh --seed
npm run build
php artisan serve
```

Checklist browser:

- Mode Dewasa dan Anak-anak dapat dipilih.
- Semua gerakan tampil sesuai urutan.
- Halaman detail menampilkan gambar dan bacaan.
- Audio dapat diputar.
- Autoplay berpindah ke gerakan berikutnya setelah audio selesai.
- Tampilan responsif pada mobile, tablet, dan desktop.

## QA Revisi Desain Lanjutan

- `npm install` berhasil dijalankan untuk menyiapkan dependency front-end.
- `npm run build` berhasil dan menghasilkan aset produksi di `public/build`.
- Pemeriksaan syntax Blade/PHP untuk file view yang diubah berhasil tanpa error.
- `php artisan test` belum dapat dijalankan di sandbox karena Composer tidak tersedia, sehingga folder `vendor` tidak bisa dibuat di lingkungan ini.
