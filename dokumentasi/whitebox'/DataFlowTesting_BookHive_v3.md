# DOKUMEN PENGUJIAN PERANGKAT LUNAK
## APLIKASI SISTEM PERPUSTAKAAN BOOKHIVE
### WHITE BOX TESTING
*Data Flow Testing (DFT)*

---

**Disusun Oleh:**

| NIM | Nama |
|---|---|
| 20231310050 | Nuraeni Yusup |
| 20231310043 | Chelsea Aaliyah Yasmin |
| 20231310053 | Risa Andriani |

**TEKNIK INFORMATIKA**  
**FAKULTAS TEKNIK KOMPUTER DAN SISTEM INFORMASI**  
**UNIVERSITAS KEBANGSAAN REPUBLIK INDONESIA**

*Jln. Terusan Halimun No. 37 (Pelajar Pejuang 45) Lingkar Selatan Kec. Lengkong, Kota Bandung, Jawa Barat 40263*

---

## 1. Identitas Dokumen

| Atribut | Keterangan |
|---|---|
| **Nama Sistem** | BookHive - Sistem Perpustakaan |
| **Jenis Pengujian** | Whitebox Testing |
| **Metode** | Data Flow Testing (DFT) |
| **Objek Uji** | BookHive.html dan endpoint `api/*.php` |
| **Versi Dokumen** | 2.0 |
| **Tanggal** | 2025 |
| **Dibuat Oleh** | Tim QA BookHive |
| **Diperiksa Oleh** | Lead Engineer / Reviewer |
| **Status Dokumen** | Final |
| **Lingkup** | Buku, anggota, peminjaman, pengembalian, laporan |

---

## 2. Tujuan Pengujian

Pengujian whitebox dengan metode Data Flow Testing (DFT) dilakukan untuk melacak dan memverifikasi aliran data antar komponen sistem BookHive secara menyeluruh. Metode ini memastikan setiap variabel penting dalam sistem didefinisikan dengan benar (DEF), digunakan dengan tepat (USE), dan tidak mengandung anomali seperti penggunaan sebelum definisi, definisi tanpa penggunaan, atau penggunaan nilai tidak valid.

DFT melengkapi pendekatan Formal Inspection yang telah dilakukan sebelumnya dengan memberikan peta aliran data yang lebih terstruktur dari sisi klien (BookHive.html) hingga ke lapisan server (`api/*.php`). Versi dokumen ini diperluas dengan klasifikasi tipe USE (c-use / p-use), pemetaan jalur aliran data, matriks cakupan pengujian, serta referensi silang antara anomali dan kasus uji.

---

## 3. Kriteria Masuk dan Keluar

Tabel berikut mendefinisikan tiga kategori kriteria: **Masuk** (syarat sebelum pengujian dimulai), **Keluar** (syarat pengujian dinyatakan selesai), dan **Suspensi** (kondisi yang menyebabkan pengujian dihentikan sementara).

| No | Jenis | Kategori | Kriteria | Indikator Pemenuhan | PJ |
|---|---|---|---|---|---|
| KM-01 | Masuk | Artefak Kode | Kode sumber seluruh modul tersedia: `api/config.php`, `api/buku.php`, `api/anggota.php`, `api/pinjam.php`, `api/kembali.php`, dan `BookHive.html` | Semua 6 file dapat dibuka dan dibaca tanpa error encoding | Penguji |
| KM-02 | Masuk | Artefak Database | Skema basis data `library_db.sql` tersedia dan dapat diimpor ke XAMPP/MySQL | Tabel buku, anggota, pinjaman, pengembalian berhasil dibuat dengan relasi yang benar | Penguji |
| KM-03 | Masuk | Dokumen Referensi | Dokumen Formal Inspection sebelumnya tersedia sebagai referensi temuan awal | Temuan WB-01 s.d. WB-08 terdokumentasi dan dapat diakses | Lead QA |
| KM-04 | Masuk | Lingkungan Uji | Environment pengujian siap: XAMPP aktif, Apache dan MySQL berjalan normal | Dashboard XAMPP menunjukkan status hijau; BookHive.html dapat diakses di browser (localhost) | Penguji |
| KM-05 | Masuk | Lingkungan Uji | Seluruh menu UI BookHive dapat diakses: Dashboard, Koleksi Buku, Anggota, Peminjaman, Pengembalian, Laporan | Navigasi sidebar berfungsi; kartu statistik tampil tanpa error | Penguji |
| KM-06 | Masuk | Lingkungan Uji | Data awal (seed) tersedia di database: minimal 3 buku, 3 anggota, 1 peminjaman aktif | Dashboard menampilkan nilai > 0 pada kartu Total Koleksi Buku dan Anggota Aktif | Penguji |
| KM-07 | Masuk | Tools | Tools pengujian API tersedia (Postman atau browser DevTools Network tab) | Request GET ke `api/buku.php` mengembalikan JSON array buku dengan status 200 | Penguji |
| KM-08 | Masuk | Kompetensi | Penguji memahami alur bisnis sistem perpustakaan: peminjaman, batas 3 buku aktif, perhitungan denda | Penguji dapat menjelaskan alur pinjam-kembali dan aturan denda tanpa membaca dokumen | Lead QA |
| KK-01 | Keluar | Pemetaan DU-Chain | Seluruh rantai DEF-USE untuk variabel kritis telah dipetakan dengan klasifikasi c-use dan p-use | Minimal 12 DU-Chain terdokumentasi; setiap rantai memiliki titik DEF, USE, dan tipe USE yang jelas | Lead QA |
| KK-02 | Keluar | Jalur Aliran Data | Jalur aliran data per skenario kritis telah terdokumentasi, termasuk jalur anomali | Minimal 8 Data Flow Path terdokumentasi mencakup skenario normal dan kondisi error | Lead QA |
| KK-03 | Keluar | Kasus Uji | Seluruh kasus uji berdasarkan DU-Chain telah dirancang mencakup kondisi normal dan kondisi tepi/negatif | Minimal 20 kasus uji; setiap DU-Chain tercakup oleh minimal 1 kasus uji (All-USE Coverage 100%) | Penguji |
| KK-04 | Keluar | Coverage Matrix | Matriks cakupan DU-Chain × kasus uji telah dibuat dan diverifikasi | Tidak ada DU-Chain yang memiliki 0 kasus uji | Lead QA |
| KK-05 | Keluar | Anomali | Seluruh anomali aliran data terdokumentasi dengan jenis, tingkat risiko, referensi jalur, dan rekomendasi | Setiap anomali memiliki kolom: ID, Fungsi, Variabel, Jenis, Deskripsi, Risiko, Path, TC Terkait, Rekomendasi | Lead QA |
| KK-06 | Keluar | Evaluasi | Tabel evaluasi keseluruhan dan statistik ringkasan telah diisi dengan data aktual hasil pengujian | Semua metrik terisi: total DU-Chain, total TC, persentase coverage, jumlah anomali per tingkat risiko | Lead QA |
| KK-07 | Keluar | Persetujuan | Dokumen telah ditinjau dan ditandatangani oleh Reviewer Teknis, Lead QA, dan Manajer Proyek | Tabel persetujuan (Bagian 15) terisi lengkap dengan tanda tangan dan tanggal | Manajer Proyek |
| KS-01 | Suspensi | Perubahan Kode | Pengujian dihentikan jika terjadi perubahan signifikan pada kode sumber di tengah proses inspeksi | Notifikasi perubahan kode diterima oleh tim QA; dokumen DFT harus diperbarui sebelum dilanjutkan | Lead QA |
| KS-02 | Suspensi | Environment | Pengujian dihentikan jika XAMPP/MySQL tidak stabil: sering crash, query timeout, atau koneksi terputus berulang | Lebih dari 3 kegagalan koneksi dalam 1 sesi pengujian | Penguji |
| KS-03 | Suspensi | Data Uji | Pengujian dihentikan jika data seed tidak konsisten atau terhapus tidak sengaja | Kartu Dashboard menunjukkan 0 pada Total Koleksi atau Anggota Aktif tanpa sengaja | Penguji |

---

## 4. Dasar Metode Data Flow Testing

Data Flow Testing adalah teknik whitebox testing yang berfokus pada bagaimana variabel sistem dikarakterisasi dan digunakan. Teknik ini mengidentifikasi pasangan DEF-USE (rantai aliran data) untuk memastikan program menangani data dengan benar.

### 4.1 Konsep Utama DFT

- **DEF (Definition):** titik di mana variabel pertama kali diberi nilai — dari input pengguna, respons API, atau hasil komputasi.
- **USE (Use):** titik di mana nilai variabel dibaca atau dipakai dalam komputasi maupun keputusan logika.
- **c-use (Computational Use):** variabel dipakai dalam ekspresi komputasi, assignment, atau sebagai argumen fungsi.
- **p-use (Predicate Use):** variabel dipakai sebagai kondisi percabangan (if/while/switch), menentukan jalur eksekusi.
- **DU-Chain:** pasangan antara satu titik DEF dan satu titik USE dari variabel yang sama; menjadi dasar perancangan kasus uji.
- **Data Flow Path:** urutan lengkap aliran variabel dari titik DEF melewati pengolahan hingga ke titik USE terakhir dalam satu skenario eksekusi.

### 4.2 Jenis Anomali yang Diperiksa

- **Undefined Use** — variabel digunakan sebelum memiliki nilai yang valid atau sebelum keberadaannya diverifikasi.
- **Missing DEF Check** — variabel dipakai tanpa pemeriksaan validitas nilai sebelumnya.
- **Stale Use** — variabel digunakan padahal nilainya sudah kadaluarsa atau berasal dari sumber yang gagal.
- **Race Condition** — dua operasi yang bergantung variabel sama dijalankan tanpa sinkronisasi/transaksi atomik.
- **Inconsistent DEF** — variabel didefinisikan dengan format berbeda di berbagai titik, menyebabkan konsumsi tidak konsisten.

### 4.3 Strategi Pengujian DFT

- **All-DEF Coverage:** setiap titik definisi variabel harus tercakup oleh minimal satu kasus uji.
- **All-USE Coverage:** setiap pasangan DEF-USE (baik c-use maupun p-use) harus tercakup oleh minimal satu kasus uji.
- **All-DU-Path Coverage (sebagian):** jalur aliran data kritis dipetakan dan diuji terutama pada fungsi dengan risiko tinggi (`addPinjam`, `addKembali`).

---

## 5. Model Data Flow Testing — Komponen Utama

| Komponen | Definisi (Variabel/Input) | Penggunaan (Fungsi/Output) | Deskripsi |
|---|---|---|---|
| **Input Pengguna** | Judul Buku, Penulis, Kata Kunci Pencarian, ID Anggota, Tanggal Pinjam/Kembali | addBook, removeBook, searchBooks, addAnggota, addPinjam, addKembali | Pengguna memasukkan data melalui form antarmuka BookHive. Input ini menjadi titik awal aliran data ke fungsi pengolah dan API server. |
| **Fungsi addBook** | Judul Buku, Penulis, Stok (integer), `books[]` | Menambahkan objek buku baru ke array; POST ke `api/buku.php` | Memvalidasi input pengguna di sisi klien, lalu mengirim ke server. |
| **Fungsi removeBook** | ID Buku, `books[]`, `status_pinjam` (dari DB) | Menghapus objek buku dari array; DELETE ke `api/buku.php` | Mencari dan menghapus buku berdasarkan ID. Dicegah jika buku masih dipinjam. |
| **Fungsi searchBooks** | Kata Kunci, `books[]` | Menampilkan daftar buku yang sesuai kata kunci | Melakukan pencarian pada data lokal berdasarkan judul atau penulis. |
| **Fungsi addAnggota** | Nama Anggota, Email Anggota, `anggota[]` | Menambahkan anggota baru ke array; POST ke `api/anggota.php` | Memvalidasi format input, mencegah duplikasi email, lalu menyimpan data. |
| **Fungsi addPinjam** | ID Anggota, ID Buku, `stok_buku`, `pinjaman_aktif` | Mengurangi stok; menambah record peminjaman; POST ke `api/pinjam.php` | Memverifikasi stok > 0 dan pinjaman aktif < 3, kemudian mencatat transaksi. |
| **Fungsi addKembali** | `pinjam_id`, `tgl_kembali`, `tgl_batas`, `stok_buku` | Menghitung denda; UPDATE status pinjaman; POST ke `api/kembali.php` | Memproses pengembalian, menghitung denda keterlambatan, memperbarui status dan stok. |
| **Dashboard / Rak Buku** | `books[]`, `anggota[]`, `pinjaman[]`, `kembali[]` | Menampilkan daftar buku, anggota, pinjaman, statistik | Merender data dari objek DB ke antarmuka pengguna setelah setiap operasi CRUD. |

---

## 6. Pemetaan Rantai Aliran Data (DU-Chain)

| ID | Variabel | Titik Definisi (DEF) | Titik Penggunaan (USE) | Tipe USE | Catatan Aliran |
|---|---|---|---|---|---|
| DU-01 | `judul_buku` | `addBook()` — form input klien | `api/buku.php` (POST body), render daftar buku | c-use | Nilai langsung dipakai sebagai data yang disimpan |
| DU-02 | `stok_buku` | `api/buku.php` (GET response) | `addPinjam()` — `if stok > 0` | p-use | Digunakan sebagai kondisi percabangan; dikurangi 1 jika lolos |
| DU-03 | `anggota_id` | `addAnggota()` / form input | `addPinjam()` — `WHERE anggota_id` | c-use | Dipakai sebagai kunci pencarian pada query peminjaman |
| DU-04 | `pinjaman_aktif` | `api/pinjam.php` (GET, filter status=aktif) | `addPinjam()` — `if pinjaman_aktif < 3` | p-use | Digunakan sebagai kondisi percabangan batas maksimal |
| DU-05 | `tgl_kembali` | Form input pengembalian | `addKembali()` — hitung selisih hari vs `tgl_batas` | c-use | Dikalkulasi untuk menentukan nilai denda |
| DU-06 | `denda` | `addKembali()` — hasil perhitungan | Tampilan detail pengembalian, laporan | c-use | `denda = max(0, selisih_hari × tarif)` |
| DU-07 | `status_pinjam` | `api/pinjam.php` (POST response) | `addKembali()`, `removeBook()`, `removeAnggota()` | p-use | Dicek sebelum hapus; diubah jadi 'kembali' pada pengembalian |
| DU-08 | `kata_kunci` | `searchBooks()` — form input | Filter `books[]` — `judul.includes()` \|\| `penulis.includes()` | c-use | Dibandingkan dengan judul dan penulis di array lokal |
| DU-09 | `pinjam_id` | `api/pinjam.php` (POST response / form) | `api/kembali.php` — `WHERE pinjam_id` | c-use | Kunci utama untuk mengambil data pinjaman; risiko undefined use |
| DU-10 | `tgl_batas` | `api/pinjam.php` (POST: `tgl_pinjam + 7`) | `addKembali()` — komparasi dengan `tgl_kembali` | c-use | Menjadi referensi batas waktu untuk perhitungan denda |
| DU-11 | `email_anggota` | Form input `addAnggota()` | `api/anggota.php` — INSERT (UNIQUE constraint) | c-use | Disimpan langsung; validasi format hanya di klien |
| DU-12 | `buku_id` | Form input `addPinjam()` | `api/pinjam.php` — INSERT, `api/buku.php` — UPDATE stok | c-use | Dipakai untuk identifikasi buku di dua query berbeda |

> **Keterangan:** c-use = variabel digunakan dalam ekspresi komputasi atau assignment. p-use = variabel digunakan sebagai kondisi percabangan.

---

## 7. Jalur Aliran Data per Skenario (Data Flow Path)

| ID | Nama Jalur | Urutan Aliran Data | Kondisi | DU-Chain Terkait |
|---|---|---|---|---|
| PATH-01 | addPinjam() — Normal | `anggota_id` → `pinjaman_aktif` → [p-use: if < 3] → `stok_buku` → [p-use: if > 0] → INSERT pinjaman → UPDATE stok → render | Semua kondisi terpenuhi | DU-02, DU-03, DU-04, DU-12 |
| PATH-02 | addPinjam() — Ditolak (stok habis) | `anggota_id` → `pinjaman_aktif` → [lolos] → `stok_buku` → [p-use: stok = 0] → return error 'Stok habis' | Stok = 0 | DU-02, DU-04 |
| PATH-03 | addPinjam() — Ditolak (maks pinjaman) | `anggota_id` → `pinjaman_aktif` → [p-use: = 3] → return error 'Maks 3 buku' | Pinjaman aktif = 3 | DU-03, DU-04 |
| PATH-04 | addKembali() — Tepat Waktu | `pinjam_id` → data pinjaman → `tgl_kembali` → `tgl_batas` → [selisih ≤ 0] → denda = 0 → UPDATE status → UPDATE stok → render | Dikembalikan tepat/lebih awal | DU-05, DU-06, DU-07, DU-09, DU-10 |
| PATH-05 | addKembali() — Terlambat | `pinjam_id` → data pinjaman → `tgl_kembali` → `tgl_batas` → [selisih > 0] → denda = selisih × tarif → UPDATE status → UPDATE stok → render | Dikembalikan setelah batas | DU-05, DU-06, DU-07, DU-09, DU-10 |
| PATH-06 | addKembali() — pinjam_id Invalid | `pinjam_id` (tidak valid) → query → [hasil kosong] → ⚠ ANOMALI: proses lanjut tanpa data valid | `pinjam_id` tidak ada di DB | DU-09 (Anomali AN-02) |
| PATH-07 | searchBooks() — Ditemukan | `kata_kunci` (form) → filter `books[]` → [c-use: includes()] → tampilkan hasil | Kata kunci ada di data | DU-08 |
| PATH-08 | searchBooks() — Tidak Ditemukan | `kata_kunci` (form) → filter `books[]` → [hasil kosong] → tampilkan pesan 'Tidak ditemukan' | Kata kunci tidak cocok | DU-08 |

---

## 8. Kasus Uji Data Flow Testing

Total 20 kasus uji mencakup 10 kondisi normal dan 10 kondisi negatif/tepi.

| ID | Fungsi | DU-Chain | Kondisi Uji | Hasil yang Diharapkan | Status |
|---|---|---|---|---|---|
| DFT-TC-01 | addBook() | DU-01 | Data lengkap dan valid dimasukkan | Buku tersimpan di server dan muncul di tampilan | ✅ LAYAK |
| DFT-TC-02 | addBook() | DU-01 | Input judul kosong dikirimkan | Validasi ditolak, data tidak masuk ke server | ✅ LAYAK |
| DFT-TC-03 | addBook() | DU-01 | Stok buku bernilai negatif | Validasi server menolak nilai tidak valid | ✅ LAYAK |
| DFT-TC-04 | removeBook() | DU-07 | Hapus buku yang tidak dipinjam | Buku berhasil dihapus dari DB dan tampilan | ✅ LAYAK |
| DFT-TC-05 | removeBook() | DU-07 | Hapus buku yang masih dipinjam aktif | Request ditolak, pesan error ditampilkan | ✅ LAYAK |
| DFT-TC-06 | searchBooks() | DU-08 | Kata kunci cocok dengan 1 buku | Satu hasil ditampilkan dengan benar | ✅ LAYAK |
| DFT-TC-07 | searchBooks() | DU-08 | Kata kunci tidak cocok sama sekali | Tampilan kosong / pesan tidak ditemukan | ✅ LAYAK |
| DFT-TC-08 | addAnggota() | DU-11 | Email valid dan unik | Anggota baru tersimpan | ✅ LAYAK |
| DFT-TC-09 | addAnggota() | DU-11 | Email duplikat dikirim | Pesan error duplikasi ditampilkan (eksplisit) | ✅ LAYAK |
| DFT-TC-10 | addAnggota() | DU-11 | Format email tidak valid (tanpa @) | Validasi menolak, pesan format error tampil | ✅ LAYAK |
| DFT-TC-11 | addPinjam() | DU-02, DU-04 | Stok > 0 dan pinjaman aktif < 3 | Peminjaman tercatat, stok berkurang 1 | ✅ LAYAK |
| DFT-TC-12 | addPinjam() | DU-04 | Pinjaman aktif anggota = 3 | Request ditolak, pesan maks 3 buku aktif | ✅ LAYAK |
| DFT-TC-13 | addPinjam() | DU-02 | Stok buku = 0 | Request ditolak, pesan stok habis | ✅ LAYAK |
| DFT-TC-14 | addPinjam() | DU-12 | ID buku tidak ada di database | Request ditolak dengan pesan data tidak valid | ✅ LAYAK |
| DFT-TC-15 | addKembali() | DU-05, DU-06, DU-10 | Pengembalian tepat waktu | Status = kembali, denda = 0, stok +1 | ✅ LAYAK |
| DFT-TC-16 | addKembali() | DU-05, DU-06, DU-10 | Pengembalian terlambat 5 hari | Denda = 5 × tarif, status diperbarui | ✅ LAYAK |
| DFT-TC-17 | addKembali() | DU-09 | `pinjam_id` tidak ditemukan di DB | Proses dihentikan, pesan error muncul (AN-02) | ✅ LAYAK |
| DFT-TC-18 | addKembali() | DU-09, DU-07 | Proses kembali gagal di tengah jalan | Rollback: status dan stok tidak berubah | ✅ LAYAK |
| DFT-TC-19 | Dashboard / Render | DU-01..12 | API gagal diakses saat load awal | Toast error muncul, UI tidak crash | ✅ LAYAK |
| DFT-TC-20 | Dashboard / Render | DU-01..12 | `books[]` kosong setelah load | Tampilan menampilkan pesan 'Belum ada data' | ✅ LAYAK |

---

## 9. Matriks Cakupan Pengujian (DU-Chain Coverage Matrix)

| ID DU-Chain | Variabel | Kasus Uji yang Mencakup | Jumlah TC | Tipe USE | Status Coverage |
|---|---|---|---|---|---|
| DU-01 | `judul_buku` | TC-01, TC-02, TC-03 | 3 | c-use | ✅ Terpenuhi |
| DU-02 | `stok_buku` | TC-11, TC-13 | 2 | p-use | ✅ Terpenuhi |
| DU-03 | `anggota_id` | TC-11 | 1 | c-use | ✅ Terpenuhi |
| DU-04 | `pinjaman_aktif` | TC-11, TC-12 | 2 | p-use | ✅ Terpenuhi |
| DU-05 | `tgl_kembali` | TC-15, TC-16 | 2 | c-use | ✅ Terpenuhi |
| DU-06 | `denda` | TC-15, TC-16 | 2 | c-use | ✅ Terpenuhi |
| DU-07 | `status_pinjam` | TC-04, TC-05, TC-15, TC-18 | 4 | p-use | ✅ Terpenuhi |
| DU-08 | `kata_kunci` | TC-06, TC-07 | 2 | c-use | ✅ Terpenuhi |
| DU-09 | `pinjam_id` | TC-17, TC-18 | 2 | c-use | ✅ Terpenuhi |
| DU-10 | `tgl_batas` | TC-15, TC-16 | 2 | c-use | ✅ Terpenuhi |
| DU-11 | `email_anggota` | TC-08, TC-09, TC-10 | 3 | c-use | ✅ Terpenuhi |
| DU-12 | `buku_id` | TC-11, TC-14 | 2 | c-use | ✅ Terpenuhi |

> Seluruh 12 DU-Chain (8 c-use + 4 p-use) telah tercakup oleh minimal satu kasus uji. **All-USE Coverage: 100%.**

---

## 10. Temuan Anomali Aliran Data

Ditemukan 7 anomali. Ringkasan tingkat risiko: **3 Tinggi** (AN-01, AN-02, AN-06), **3 Sedang** (AN-03, AN-04, AN-05), **1 Rendah** (AN-07).

| ID | Fungsi | Variabel | Jenis | Deskripsi | Risiko | Path | TC Terkait | Rekomendasi |
|---|---|---|---|---|---|---|---|---|
| AN-01 | addPinjam() | `stok_buku`, `status_pinjam` | Race Condition | Stok dikurangi terpisah dari INSERT pinjaman tanpa transaksi atomik — inkonsistensi mungkin jika salah satu gagal | 🔴 Tinggi | PATH-01 | TC-11, TC-18 | Gunakan `BEGIN/COMMIT/ROLLBACK` di `api/pinjam.php` |
| AN-02 | addKembali() | `pinjam_id`, `stok_buku` | Undefined Use | `pinjam_id` tidak divalidasi sebelum dipakai untuk UPDATE — jika tidak ada, proses berlanjut dengan data kosong | 🔴 Tinggi | PATH-06 | TC-17 | Periksa hasil query sebelum lanjut proses |
| AN-03 | addBook() | `judul_buku`, `stok_buku` | Missing DEF Check | Input POST tidak divalidasi di server — nilai kosong atau tipe tidak valid bisa tersimpan | 🟡 Sedang | — | TC-02, TC-03 | Tambah validasi server: required, type, range |
| AN-04 | addAnggota() | `email_anggota` | Inconsistent DEF | Duplikasi email hanya ditangkap constraint DB tanpa pesan error eksplisit ke pengguna | 🟡 Sedang | — | TC-09 | Tangkap kode error MySQL duplikat, kirim pesan jelas |
| AN-05 | Render / Load | `books[]`, `anggota[]`, `pinjaman[]` | Stale Use | Jika API gagal, render function membaca array kosong tanpa fallback state — potensi tampilan rusak | 🟡 Sedang | — | TC-19, TC-20 | Tambah pengecekan null/empty sebelum render |
| AN-06 | addKembali() | `stok_buku`, `status_pinjam` | Race Condition | Pengembalian tidak dibungkus transaksi — stok dan status bisa tidak sinkron | 🔴 Tinggi | PATH-04, PATH-05 | TC-18 | Gunakan `BEGIN/COMMIT/ROLLBACK` di `api/kembali.php` |
| AN-07 | Semua endpoint | semua output | Inconsistent DEF | Format respons error berbeda-beda antar endpoint menyulitkan parsing dan debugging di sisi klien | 🟢 Rendah | — | TC-19 | Standarisasi: `{ status, message, data }` di semua endpoint |

---

## 11. Evaluasi Keseluruhan

| Aspek Evaluasi | Temuan | Status |
|---|---|---|
| Kelengkapan Pemetaan DU-Chain | 12 rantai DEF-USE dipetakan mencakup c-use dan p-use | ✅ Baik |
| Klasifikasi c-use vs p-use | 8 c-use dan 4 p-use berhasil dibedakan sesuai standar DFT | ✅ Baik |
| Kelengkapan Jalur Aliran Data | 8 jalur kritis terdokumentasi termasuk jalur anomali | ✅ Baik |
| Coverage Kasus Uji | 100% DU-Chain tercakup oleh minimal 1 kasus uji (20 TC total) | ✅ Baik |
| Validasi Definisi Variabel (DEF) | DEF teridentifikasi; validasi server belum lengkap di semua endpoint | ⚠️ Cukup |
| Konsistensi Penggunaan (USE) | Undefined Use teridentifikasi pada `pinjam_id` (AN-02) | ❌ Perlu Perbaikan |
| Atomisitas Transaksi | Proses pinjam dan kembali belum menggunakan transaksi DB (AN-01, AN-06) | ❌ Perlu Perbaikan |
| Penanganan Error | Format error belum seragam; beberapa kasus belum eksplisit (AN-07) | ❌ Perlu Perbaikan |
| Keamanan Aliran Data | Validasi sisi server belum cukup kuat (AN-03, AN-04) | ❌ Perlu Perbaikan |

---

## 12. Ringkasan Statistik Pengujian

| Metrik Pengujian | Nilai | Keterangan |
|---|---|---|
| **Total Komponen Diinspeksi** | 8 | Input, 6 fungsi, 1 modul render |
| **Total Variabel Kritis Teridentifikasi** | 12 | DU-01 s.d. DU-12 |
| **Rantai DEF-USE (DU-Chain)** | 12 | 8 c-use, 4 p-use |
| **Jalur Aliran Data (Data Flow Path)** | 8 | PATH-01 s.d. PATH-08 |
| **Total Kasus Uji Dirancang** | 20 | DFT-TC-01 s.d. DFT-TC-20 |
| **Kasus Uji Kondisi Normal** | 10 | Happy path per fungsi utama |
| **Kasus Uji Kondisi Tepi/Negatif** | 10 | Validasi, batas, kegagalan API |
| **Anomali Ditemukan** | 7 | 3 Tinggi, 3 Sedang, 1 Rendah |
| **DU-Chain dengan Coverage Penuh** | 12 / 12 | 100% DU-Chain tercakup minimal 1 TC |
| **Cakupan p-use (Predicate USE)** | 4 / 4 | 100% kondisi percabangan kritis tercakup |

---

## 13. Rekomendasi Perbaikan

### 13.1 Prioritas Tinggi

- Tambahkan transaksi database (`BEGIN / COMMIT / ROLLBACK`) pada `api/pinjam.php` untuk mengatasi **AN-01**: mengikat pengurangan stok dan INSERT pinjaman dalam satu unit atomik.
- Tambahkan transaksi database pada `api/kembali.php` untuk mengatasi **AN-06**: mengikat UPDATE status, UPDATE stok, dan INSERT kembali dalam satu unit atomik.
- Validasi keberadaan `pinjam_id` sebelum digunakan pada `api/kembali.php` untuk mengatasi **AN-02**: periksa hasil query — jika kosong, hentikan proses dan kembalikan error.

### 13.2 Prioritas Sedang

- Perkuat validasi server di semua endpoint (**AN-03**): periksa field wajib, tipe data, dan rentang nilai sebelum melanjutkan proses INSERT/UPDATE.
- Tangkap error duplikasi email secara eksplisit pada `api/anggota.php` (**AN-04**): deteksi kode error MySQL 1062 dan kembalikan pesan yang informatif ke klien.
- Tambahkan pemeriksaan null/empty pada semua render function di `BookHive.html` (**AN-05**): pastikan UI menampilkan state kosong dengan baik saat API gagal atau data tidak ada.

### 13.3 Prioritas Rendah

- Standarisasi format respons JSON di seluruh endpoint API (**AN-07**): gunakan struktur seragam `{ status, message, data }` untuk memudahkan parsing di sisi klien.
- Tambahkan unit test atau integration test untuk alur pinjam-kembali guna mendeteksi regresi pada aliran data kritis di masa mendatang.
- Pertimbangkan penggunaan prepared statement yang lebih ketat dan sanitasi input pada semua endpoint untuk memperkuat keamanan aliran data.

---

## 14. Kesimpulan

Pengujian whitebox dengan metode Data Flow Testing terhadap sistem BookHive versi ini menghasilkan pemetaan 12 rantai DEF-USE (8 c-use, 4 p-use), 8 jalur aliran data, dan 20 kasus uji yang mencakup seluruh fungsi inti maupun kondisi tepi. Tingkat cakupan All-USE mencapai **100%** dari DU-Chain yang teridentifikasi.

Dari analisis ditemukan **7 anomali aliran data**: 3 bertingkat Tinggi, 3 Sedang, dan 1 Rendah. Dua anomali prioritas tertinggi — race condition pada transaksi pinjam/kembali dan undefined use pada `pinjam_id` — berpotensi menyebabkan inkonsistensi data yang serius dan harus segera ditangani. Penguatan validasi server, standarisasi format error, dan penambahan transaksi database akan meningkatkan keandalan, konsistensi, dan keamanan sistem BookHive secara signifikan.

---

## 15. Persetujuan Dokumen

| Peran | Nama | Tanda Tangan | Tanggal |
|---|---|---|---|
| **Penyusun Dokumen** | | | |
| **Reviewer Teknis** | | | |
| **Lead QA** | | | |
| **Manajer Proyek** | | | |

---

*Dokumen Pengujian Whitebox — Data Flow Testing v2.0 | Sistem BookHive | Rahasia Internal*
