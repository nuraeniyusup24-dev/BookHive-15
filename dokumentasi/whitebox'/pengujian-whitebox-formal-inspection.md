# Pengujian Whitebox dengan Metode Formal Inspection

## 1. Identitas Dokumen

- **Nama Sistem**: BookHive - Sistem Perpustakaan
- **Jenis Pengujian**: Whitebox Testing
- **Metode**: Formal Inspection
- **Objek Uji**: `BookHive.html` dan endpoint `api/*.php`
- **Lingkup**: Data buku, anggota, peminjaman, pengembalian, dan laporan

## 2. Tujuan Pengujian

Pengujian whitebox dengan metode Formal Inspection dilakukan untuk menilai logika internal program, alur kontrol, validasi input, dan konsistensi akses data pada aplikasi BookHive. Fokus pengujian ini adalah menemukan potensi cacat pada alur program sebelum aplikasi digunakan secara luas.

## 3. Ruang Lingkup Inspeksi

Komponen yang diperiksa:

1. `api/config.php`
2. `api/buku.php`
3. `api/anggota.php`
4. `api/pinjam.php`
5. `api/kembali.php`
6. Logika antarmuka pada `BookHive.html`

## 4. Dasar Metode Formal Inspection

Formal Inspection adalah teknik review terstruktur yang dilakukan secara sistematis untuk menemukan kesalahan pada artefak perangkat lunak. Dalam konteks whitebox testing, inspeksi difokuskan pada logika kode, percabangan, validasi, dan integritas data.

Tahapan inspeksi:

1. **Planning** - menentukan modul yang akan diperiksa.
2. **Overview** - memahami fungsi tiap modul dan relasi antar komponen.
3. **Preparation** - membaca kode dan menandai titik keputusan penting.
4. **Inspection Meeting** - mencatat temuan, risiko, dan anomali logika.
5. **Rework** - menyusun rekomendasi perbaikan.
6. **Follow-up** - memastikan temuan dapat ditindaklanjuti.

## 5. Kriteria Masuk dan Keluar

### Kriteria Masuk

- Struktur proyek tersedia dan dapat dibaca.
- Endpoint API dan halaman utama sudah teridentifikasi.
- Skema basis data tersedia pada `library_db.sql`.

### Kriteria Keluar

- Seluruh modul utama telah diinspeksi.
- Temuan utama terdokumentasi.
- Rekomendasi perbaikan tersedia.

## 6. Ringkasan Alur Logika Sistem

### 6.1 Alur Umum

1. Halaman utama memuat data dari endpoint API.
2. Data buku, anggota, pinjam, dan kembali disimpan ke objek `DB` di sisi klien.
3. Pengguna dapat menambah, melihat, menghapus, meminjam, dan mengembalikan data.
4. Setiap aksi CRUD dikirim ke server melalui request HTTP.

### 6.2 Alur Kontrol yang Kritis

- Pemeriksaan stok buku saat peminjaman.
- Pembatasan maksimal 3 buku aktif per anggota.
- Validasi penghapusan buku atau anggota yang masih berstatus aktif.
- Perhitungan denda saat pengembalian terlambat.

## 7. Checklist Whitebox Inspection

| Aspek yang Diperiksa | Fokus Pemeriksaan | Hasil |
|---|---|---|
| Validasi input | Apakah field wajib diperiksa sebelum request dikirim | Ditemukan validasi sisi klien, tetapi validasi sisi server masih minim |
| Percabangan | Apakah semua kondisi `if/elseif` menangani kasus utama | Cukup, namun ada kasus tepi yang belum aman |
| Integritas data | Apakah update stok, status pinjam, dan pengembalian konsisten | Ada risiko inkonsistensi saat request gagal di tengah proses |
| Error handling | Apakah respon gagal ditangani dengan jelas | Sebagian sudah ditangani, tetapi belum merata |
| Keamanan logika | Apakah data penting divalidasi di server | Belum sepenuhnya kuat |

## 8. Hasil Inspeksi per Modul

### 8.1 `api/config.php`

Fungsi modul ini adalah membuat koneksi ke database `library_db`.

Temuan inspeksi:

- Koneksi menggunakan kredensial default XAMPP.
- Jika koneksi gagal, aplikasi berhenti dengan pesan JSON error.

Penilaian:

- **Kesesuaian**: baik untuk lingkungan lokal.
- **Risiko**: kredensial hardcoded tidak ideal untuk produksi.

### 8.2 `api/buku.php`

Fungsi utama:

- `GET` untuk mengambil seluruh data buku.
- `POST` untuk menambah buku.
- `DELETE` untuk menghapus buku.

Temuan inspeksi:

- Penghapusan buku sudah dicegah jika buku masih dipinjam aktif.
- Input `POST` belum divalidasi secara ketat di server.
- Tidak ada pengecekan kegagalan `prepare()` atau `execute()`.

Penilaian:

- **Kesesuaian**: baik secara fungsional.
- **Risiko**: data kosong atau tipe tidak valid masih bisa masuk.

### 8.3 `api/anggota.php`

Fungsi utama:

- `GET` untuk membaca daftar anggota.
- `POST` untuk menambah anggota.
- `DELETE` untuk menghapus anggota.

Temuan inspeksi:

- Penghapusan anggota aktif yang masih meminjam buku sudah diblokir.
- Email diberi batasan unik di database, tetapi pesan error duplikat belum ditangani secara khusus.
- Validasi server untuk format email belum terlihat.

Penilaian:

- **Kesesuaian**: cukup baik.
- **Risiko**: duplikasi email dan format input belum ditangani secara eksplisit.

### 8.4 `api/pinjam.php`

Fungsi utama:

- `GET` untuk mengambil daftar peminjaman.
- `POST` untuk mencatat peminjaman baru.

Temuan inspeksi:

- Ada batas maksimal 3 buku aktif per anggota.
- Stok buku dikurangi sebelum data peminjaman disimpan.
- Proses belum menggunakan transaksi database, sehingga bila salah satu langkah gagal, data bisa tidak konsisten.
- Pemeriksaan stok dan penyimpanan peminjaman tidak sepenuhnya atomik.

Penilaian:

- **Kesesuaian**: fungsional, tetapi rawan race condition.
- **Risiko**: inkonsistensi stok dan data peminjaman pada kondisi akses bersamaan.

### 8.5 `api/kembali.php`

Fungsi utama:

- `GET` untuk membaca daftar pengembalian.
- `POST` untuk memproses pengembalian buku.

Temuan inspeksi:

- Denda dihitung dari selisih hari keterlambatan.
- Status peminjaman diubah menjadi `kembali` dan stok buku ditambah.
- Tidak ada pengecekan apakah data peminjaman yang dicari benar-benar ditemukan sebelum dipakai.
- Sama seperti peminjaman, proses belum dibungkus transaksi.

Penilaian:

- **Kesesuaian**: sesuai fungsi dasar.
- **Risiko**: akses data tidak valid dapat memicu warning atau kegagalan proses.

### 8.6 Logika pada `BookHive.html`

Fungsi utama sisi klien:

- Memuat data dari API.
- Menampilkan dashboard, koleksi buku, anggota, peminjaman, dan pengembalian.
- Menghitung denda dan status keterlambatan.

Temuan inspeksi:

- Validasi input dilakukan di sisi klien, tetapi belum cukup sebagai satu-satunya lapisan proteksi.
- Ada ketergantungan besar pada keberhasilan request API.
- Jika data API kosong atau gagal dimuat, beberapa render function berpotensi menampilkan state kosong.

Penilaian:

- **Kesesuaian**: baik untuk UI interaktif.
- **Risiko**: perilaku antarmuka sangat bergantung pada respons server.

## 9. Kasus Uji Whitebox Berdasarkan Cabang Logika

| ID | Modul | Kondisi Uji | Data Masukan | Hasil yang Diharapkan | Status |
|---|---|---|---|---|---|
| WB-01 | `api/buku.php` | Tambah buku dengan data lengkap | judul, pengarang, stok, kategori valid | Buku tersimpan dan data baru dikembalikan | Layak |
| WB-02 | `api/buku.php` | Hapus buku yang sedang dipinjam | `id` buku aktif | Request ditolak dengan error | Layak |
| WB-03 | `api/anggota.php` | Hapus anggota yang masih punya pinjaman aktif | `id` anggota aktif | Request ditolak dengan error | Layak |
| WB-04 | `api/pinjam.php` | Anggota memiliki 3 pinjaman aktif | `anggota_id` sama, `buku_id` valid | Request ditolak dengan pesan maksimum 3 buku | Layak |
| WB-05 | `api/pinjam.php` | Stok buku habis | `buku_id` dengan stok 0 | Request ditolak dengan pesan stok habis | Layak |
| WB-06 | `api/kembali.php` | Pengembalian terlambat | `tgl_kembali` melebihi `tgl_batas` | Denda dihitung sesuai selisih hari | Layak |
| WB-07 | `api/kembali.php` | Pengembalian tepat waktu | `tgl_kembali` sama atau sebelum batas | Denda nol | Layak |
| WB-08 | `BookHive.html` | Data gagal dimuat | API tidak aktif | Toast error muncul dan UI tidak crash | Layak |

## 10. Temuan Formal Inspection

### Temuan 1 - Tidak ada transaksi pada proses pinjam dan kembali

- **Lokasi**: `api/pinjam.php`, `api/kembali.php`
- **Dampak**: jika salah satu query gagal, data stok dan status pinjam bisa tidak sinkron.
- **Rekomendasi**: gunakan transaksi database (`BEGIN`, `COMMIT`, `ROLLBACK`).

### Temuan 2 - Validasi server belum lengkap

- **Lokasi**: `api/buku.php`, `api/anggota.php`, `api/pinjam.php`, `api/kembali.php`
- **Dampak**: input kosong, tipe salah, atau referensi tidak valid masih berisiko diproses.
- **Rekomendasi**: tambahkan validasi input dan pemeriksaan keberadaan data di server.

### Temuan 3 - Pengecekan data peminjaman pada pengembalian belum aman

- **Lokasi**: `api/kembali.php`
- **Dampak**: bila `pinjam_id` tidak valid, variabel hasil query dapat bernilai kosong.
- **Rekomendasi**: cek hasil query sebelum menghitung denda atau memperbarui data.

### Temuan 4 - Penanganan error belum seragam

- **Lokasi**: seluruh endpoint API
- **Dampak**: debugging dan pelaporan kesalahan menjadi kurang konsisten.
- **Rekomendasi**: buat format respon error yang seragam di semua endpoint.

## 11. Kesimpulan

Berdasarkan hasil whitebox testing dengan metode Formal Inspection, alur utama aplikasi BookHive sudah berjalan sesuai fungsi dasar. Namun, terdapat beberapa risiko penting pada validasi server, konsistensi transaksi, dan penanganan data tidak valid. Perbaikan pada area tersebut disarankan agar sistem lebih aman, stabil, dan konsisten.

## 12. Rekomendasi Lanjutan

1. Tambahkan transaksi database pada proses peminjaman dan pengembalian.
2. Perkuat validasi input di sisi server untuk seluruh endpoint.
3. Buat standar respon error JSON yang konsisten.
4. Tambahkan pengujian unit atau integration test untuk alur pinjam-kembali.
