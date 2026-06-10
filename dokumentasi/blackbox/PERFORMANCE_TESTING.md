# Pengujian Blackbox — Performance Testing

## Tujuan
Dokumen ini menjelaskan pendekatan pengujian blackbox untuk Performance Testing pada aplikasi BookHive. Tujuan: memastikan aplikasi memenuhi kebutuhan kinerja di bawah beban yang berbeda.

## Ruang Lingkup
- Pengujian end-to-end pada antarmuka publik (frontend + backend).
- Fokus pada: waktu respons, throughput, kestabilan di beban tinggi, pemulihan setelah spike.

## Definisi
- Load Test: mengukur perilaku di bawah beban normal hingga puncak.
- Stress Test: mendorong sistem melewati kapasitas untuk menemukan titik kegagalan.
- Spike Test: lonjakan beban tiba-tiba.
- Soak/Endurance Test: beban sedang dalam durasi lama untuk deteksi memory leak.

## Lingkungan Uji
- Hardware: sebutkan CPU, RAM, disk pada server aplikasi dan DB.
- Jaringan: bandwidth, latency yang disimulasikan (mis. 100ms, 1% packet loss jika perlu).
- Database: snapshot data produksi atau dataset representatif (jumlah buku, akun, transaksi).
- Versi aplikasi: backend (`anggota.php`, `buku.php`, `pinjam.php`, dll.) dan file frontend (`index.html`, `BookHive.html`).

## Alat yang Direkomendasikan
- Apache JMeter — untuk skenario load/throughput.
- Gatling — alternatif untuk skenario berbasis kode.
- Locust — untuk skenario Python dan pengujian terdistribusi.
- Monitoring: Grafana + Prometheus, atau monitoring server (top, vmstat, iostat).

## Metrik Utama
- Response Time (ms): rata-rata, p95, p99.
- Throughput (req/s).
- Error Rate (%): permintaan yang gagal.
- CPU / Memory / Disk I/O pada server aplikasi dan DB.
- Latency end-to-end.
- Time to First Byte (TTFB).

## Skenario Pengujian (Contoh)
1. Load Test — Beban normal hingga puncak:
   - Konfigurasi: ramp-up 10 menit hingga 200 concurrent users, tahan 30 menit.
   - Tujuan: verifikasi p95 response time < 2s dan error rate < 1%.

2. Stress Test — Cari titik kegagalan:
   - Konfigurasi: mulai 200 concurrent, tambah 50 setiap 5 menit hingga 1000 atau kegagalan.
   - Tujuan: identifikasi bottleneck dan batas kapasitas.

3. Spike Test — Lonjakan tiba-tiba:
   - Konfigurasi: tiba-tiba naik dari 50 ke 500 concurrent dalam 1 menit, tahan 10 menit.
   - Tujuan: cek autoscaling (jika ada) dan kestabilan.

4. Soak/Endurance Test — Stabilitas jangka panjang:
   - Konfigurasi: 100 concurrent users selama 8+ jam.
   - Tujuan: deteksi memory leak, degradasi performa.

## Data dan Pengaturan Test
- Data pengguna: buat akun test yang mewakili pola penggunaan nyata.
- Dataset buku/transaksi: minimal 10k item untuk mendekati kondisi produksi.
- Reset database antara skenario jika perlu atau gunakan snapshot.

## Langkah-langkah Eksekusi
1. Siapkan lingkungan monitoring (Grafana/Prometheus) dan koleksi log.
2. Siapkan skenario di JMeter/Locust dan verifikasi script (sanity run 1-5 users).
3. Pastikan baseline: capture CPU/memory idle.
4. Jalankan skenario sesuai konfigurasi; catat waktu mulai/selesai.
5. Setelah selesai, kumpulkan metrik aplikasi, monitoring, dan log server.
6. Analisis: hitung p50/p95/p99, throughput, error rate, dan korelasikan dengan resource usage.

## Contoh Template Laporan Hasil
- Skenario: Load Test — 200 users
- Durasi: 30 menit
- Throughput: 120 req/s
- Response time p50/p95/p99: 350ms / 1.8s / 3.6s
- Error rate: 0.4%
- CPU peak: 78%
- Memory peak: 2.1 GB
- Catatan: Latency meningkat setelah menit ke-20, korelasi dengan spike I/O DB.

## Checklist Pre-test
- [ ] Snapshot DB siap
- [ ] Monitoring aktif dan dashboards disiapkan
- [ ] Script load tervalidasi dengan data test
- [ ] Jaringan dan environment dikunci (tidak ada deployment saat pengujian)

## Analisis dan Rekomendasi
- Jika p95 > SLA: telusuri query lambat, tambahkan indeks, optimalkan kode.
- Jika CPU/Memory saturasi: pertimbangkan scaling atau profiling memory.
- Untuk error rate tinggi: periksa log aplikasi untuk exception, perbaiki retry/backoff.

## Catatan Tambahan
- Simulasi pengguna nyata (pola berpindah halaman, aksi pencarian, peminjaman buku) penting agar hasil representatif.
- Simpan semua artifacts (JMeter .jmx, raw CSV, grafik) untuk audit.

---
Dokumen dibuat untuk pengujian blackbox Performance Testing. Sesuaikan parameter (jumlah users, durasi) dengan SLA dan kapasitas lingkungan produksi.