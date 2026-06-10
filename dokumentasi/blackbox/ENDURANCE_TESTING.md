# Pengujian Blackbox — Endurance Testing

## Tujuan
Dokumen ini menjelaskan metode pengujian blackbox Endurance Testing untuk aplikasi BookHive. Tujuan utama: memastikan aplikasi dapat berjalan stabil di bawah beban konstan selama periode lama tanpa degradasi kinerja atau kebocoran sumber daya.

## Ruang Lingkup
- Fitur yang diuji:
  - Pencarian buku
  - Peminjaman buku
  - Pengembalian buku
  - Tambah anggota
  - Tambah buku
- Fokus pada stabilitas jangka panjang, konsistensi waktu respons, dan penggunaan sumber daya.

## Definisi Endurance Testing
Endurance Testing adalah pengujian kinerja di mana sistem dijalankan pada beban yang realistis atau sedang untuk waktu yang lama (jam hingga hari), dengan tujuan menemukan masalah yang muncul perlahan seperti:
- memory leak
- peningkatan penggunaan CPU secara bertahap
- slow degradation
- pertumbuhan database/cache

## Lingkungan Uji
- Server aplikasi dan database yang mencerminkan kondisi produksi atau setidaknya lingkungan staging.
- Dataset representatif: ribuan data buku, anggota, dan transaksi.
- Monitoring server: CPU, memory, disk I/O, network, serta metrics aplikasi.
- Versi aplikasi BookHive: `Frontend/index.html`, `Frontend/BookHive.html`, backend PHP (`anggota.php`, `buku.php`, `pinjam.php`, `kembali.php`, `config.php`).

## Metrik Utama
- Response time rata-rata dan persentil (p50, p90, p95, p99)
- Throughput (request per detik)
- Error rate
- Penggunaan CPU dan memory selama durasi panjang
- Pertumbuhan penggunaan database atau cache
- Jumlah thread/connection yang tidak turun

## Skenario Endurance Testing
1. Beban Stabil Realistis
   - Konfigurasi: 50 concurrent users selama 8 jam.
   - Aktivitas: kombinasi pencarian buku, peminjaman, pengembalian, dan pembuatan data baru.
   - Tujuan: memastikan performa konsisten, tidak ada lonjakan error.

2. Beban Sedang dengan Variasi Transaksi
   - Konfigurasi: 30 concurrent users selama 12 jam.
   - Aktivitas: 70% pencarian, 15% peminjaman, 10% pengembalian, 5% tambah data.
   - Tujuan: memeriksa kestabilan aplikasi saat penggunaan campuran.

3. Endurance Plus Stress ringan
   - Konfigurasi: 40 concurrent users dengan spike kecil setiap 2 jam selama 10 jam.
   - Aktivitas: beban stabil + lonjakan traffic sementara.
   - Tujuan: pastikan sistem tetap stabil saat terpapar lonjakan berkala.

## Data Tes
- Siapkan data test representatif:
  - minimal 5.000 buku
  - minimal 1.000 anggota
  - minimal 1.000 transaksi peminjaman/pengembalian historis
- Gunakan data valid dan variasi input realistic.
- Reset atau simpan snapshot lingkungan sebelum dan sesudah pengujian.

## Langkah Eksekusi
1. Siapkan lingkungan aplikasi BookHive, database, dan monitoring.
2. Verifikasi script test pada beban kecil (smoke run) untuk memastikan alur kerja benar.
3. Jalankan skenario endurance sesuai durasi yang direncanakan.
4. Pantau metrik secara real-time.
5. Catat setiap error, kenaikan latensi, atau penggunaan resource yang abnormal.
6. Setelah selesai, kumpulkan laporan metrik lengkap dan log aplikasi.

## Contoh Template Laporan
- Skenario: Endurance 8 jam, 50 users
- Durasi: 8 jam
- Throughput rata-rata: ... req/s
- Response time p95: ... ms
- Error rate: ...%
- CPU rata-rata: ...%
- Memory awal: ... MB, Memory akhir: ... MB
- Temuan: ...
- Rekomendasi: ...

## Faktor yang Diperiksa
- Apakah response time tetap stabil sepanjang durasi?
- Apakah error rate meningkat seiring waktu?
- Apakah penggunaan memory terus meningkat tanpa turun?
- Apakah jumlah koneksi atau thread tetap wajar?
- Apakah ada degradasi fungsi setelah jangka panjang?

## Analisis dan Tindak Lanjut
- Jika memory terus naik: lakukan profiling memory, cek leak pada backend PHP, proses cleaning cache.
- Jika response time meningkat perlahan: periksa query database, indeks, dan caching.
- Jika error rate naik: teliti jenis error, log exception, dan jalankan ulang skenario setelah perbaikan.

## Catatan
- Endurance testing adalah bagian kritis untuk pengujian blackbox kinerja jangka panjang.
- Gunakan hasil test untuk meningkatkan stabilitas, bukan hanya kapasitas puncak.
- Simpan semua data hasil test untuk perbandingan di pengujian berikutnya.