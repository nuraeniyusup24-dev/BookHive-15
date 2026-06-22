# DOKUMEN PENGUJIAN PERANGKAT LUNAK
## APLIKASI SISTEM PERPUSTAKAAN BOOKHIVE
### WHITE BOX TESTING
*Formal Inspection*

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
| **Nama Sistem** | BookHive – Sistem Perpustakaan |
| **Jenis Pengujian** | Whitebox Testing |
| **Metode** | Formal Inspection |
| **Objek Uji** | BookHive.html dan endpoint `api/*.php` |
| **Lingkup** | Data buku, anggota, peminjaman, pengembalian, dan laporan |
| **Tanggal Inspeksi** | Juni 2026 |
| **Versi Dokumen** | 1.0 |

---

## 2. Tujuan Pengujian

Pengujian whitebox dengan metode Formal Inspection dilakukan untuk menilai logika internal program, alur kontrol, validasi input, dan konsistensi akses data pada aplikasi BookHive. Fokus pengujian ini adalah menemukan potensi cacat pada alur program sebelum aplikasi digunakan secara luas.

Tujuan spesifik pengujian ini meliputi:

- Mengevaluasi kelengkapan validasi input pada sisi server dan sisi klien.
- Memeriksa konsistensi alur kontrol pada setiap operasi CRUD.
- Mengidentifikasi risiko inkonsistensi data akibat ketiadaan transaksi database.
- Menilai kualitas penanganan error pada seluruh endpoint API.
- Memastikan logika bisnis kritis (batas pinjam, stok, denda) berjalan benar.

---

## 3. Ruang Lingkup Inspeksi

| No. | Komponen | Deskripsi Fungsi |
|---|---|---|
| 1 | `api/config.php` | Koneksi ke database `library_db` |
| 2 | `api/buku.php` | Operasi CRUD data buku (GET, POST, DELETE) |
| 3 | `api/anggota.php` | Operasi CRUD data anggota (GET, POST, DELETE) |
| 4 | `api/pinjam.php` | Pencatatan dan pembacaan data peminjaman |
| 5 | `api/kembali.php` | Proses pengembalian buku dan perhitungan denda |
| 6 | `BookHive.html` | Logika antarmuka pengguna dan interaksi sisi klien |

---

## 4. Dasar Metode Formal Inspection

Formal Inspection adalah teknik review terstruktur yang dilakukan secara sistematis untuk menemukan kesalahan pada artefak perangkat lunak. Dalam konteks whitebox testing, inspeksi difokuskan pada logika kode, percabangan, validasi, dan integritas data.

### 4.1 Tahapan Formal Inspection

| No. | Tahap | Aktivitas |
|---|---|---|
| 1 | **Planning** | Menentukan modul yang akan diperiksa, menunjuk tim inspektor, dan menyiapkan materi inspeksi. |
| 2 | **Overview** | Memahami fungsi tiap modul dan relasi antar komponen sistem secara menyeluruh. |
| 3 | **Preparation** | Membaca kode secara mandiri dan menandai titik keputusan, percabangan, serta potensi anomali. |
| 4 | **Inspection Meeting** | Mendiskusikan temuan bersama, mencatat cacat, risiko, dan anomali logika secara kolektif. |
| 5 | **Rework** | Menyusun rekomendasi perbaikan dan mendistribusikan ke tim pengembang. |
| 6 | **Follow-up** | Memverifikasi bahwa temuan telah ditindaklanjuti dan cacat sudah diperbaiki. |

---

## 5. Kriteria Masuk dan Keluar

### 5.1 Kriteria Masuk (Entry Criteria)

- Struktur proyek tersedia dan dapat dibaca oleh tim inspektor.
- Endpoint API dan halaman utama sudah teridentifikasi dengan jelas.
- Skema basis data tersedia pada file `library_db.sql`.
- Kode sumber tersedia tanpa error sintaks yang mencegah pembacaan.

### 5.2 Kriteria Keluar (Exit Criteria)

- Seluruh modul utama (6 komponen) telah diinspeksi secara menyeluruh.
- Semua temuan utama terdokumentasi dengan lokasi, dampak, dan rekomendasi.
- Seluruh kasus uji whitebox telah didefinisikan dan status kelayakannya ditentukan.
- Rekomendasi perbaikan tersusun dan siap diserahkan ke tim pengembang.

---

## 6. Ringkasan Alur Logika Sistem

### 6.1 Alur Umum

- Halaman utama (`BookHive.html`) memuat data dari endpoint API saat pertama kali dibuka.
- Data buku, anggota, pinjam, dan kembali disimpan ke objek DB di sisi klien.
- Pengguna dapat menambah, melihat, menghapus, meminjam, dan mengembalikan data.
- Setiap aksi CRUD dikirim ke server melalui request HTTP (fetch/XMLHttpRequest).

### 6.2 Alur Kontrol yang Kritis

| Titik Kontrol | Deskripsi |
|---|---|
| **Pemeriksaan stok buku** | Stok diperiksa sebelum transaksi peminjaman diproses. Jika stok = 0, permintaan ditolak. |
| **Batas maksimal pinjaman** | Setiap anggota dibatasi maksimal 3 buku aktif yang sedang dipinjam dalam waktu bersamaan. |
| **Validasi penghapusan buku/anggota** | Buku yang masih dipinjam aktif tidak dapat dihapus. Anggota yang masih memiliki pinjaman aktif juga tidak dapat dihapus. |
| **Perhitungan denda pengembalian** | Denda dihitung berdasarkan selisih hari antara tanggal kembali aktual dengan tanggal batas pengembalian. |

---

## 7. Checklist Whitebox Inspection

| Aspek yang Diperiksa | Fokus Pemeriksaan | Hasil Inspeksi |
|---|---|---|
| **Validasi Input** | Apakah field wajib diperiksa sebelum request dikirim? | Validasi sisi klien ada, tetapi validasi sisi server masih minim. |
| **Percabangan (Branching)** | Apakah semua kondisi if/elseif menangani kasus utama? | Cukup, namun beberapa edge case belum ditangani secara aman. |
| **Integritas Data** | Apakah update stok, status pinjam, dan pengembalian konsisten? | Ada risiko inkonsistensi saat request gagal di tengah proses multi-langkah. |
| **Error Handling** | Apakah respons gagal ditangani dengan jelas? | Sebagian sudah ditangani, tetapi belum merata di semua endpoint. |
| **Keamanan Logika** | Apakah data penting divalidasi di server? | Belum sepenuhnya kuat; validasi server masih bergantung pada klien. |
| **Atomisitas Proses** | Apakah proses multi-query menggunakan transaksi database? | Belum menggunakan transaksi; operasi pinjam dan kembali rentan inkonsistensi. |

---

## 8. Hasil Inspeksi per Modul

### 8.1 `api/config.php`

Fungsi: Membuat koneksi ke database `library_db` sebagai fondasi seluruh endpoint API.

| Aspek | Detail Temuan |
|---|---|
| **Temuan** | Koneksi menggunakan kredensial default XAMPP (root/kosong). Jika koneksi gagal, aplikasi berhenti dan mengembalikan pesan JSON error. |
| **Kesesuaian** | Baik untuk lingkungan pengembangan lokal. |
| **Risiko** | Kredensial hardcoded tidak ideal untuk lingkungan produksi. Tidak ada mekanisme fallback atau notifikasi administrator. |
| **Rekomendasi** | Pindahkan kredensial ke file `.env` dan gunakan environment variables untuk mengamankan konfigurasi. |

### 8.2 `api/buku.php`

Fungsi: Mengelola operasi GET (ambil daftar buku), POST (tambah buku), dan DELETE (hapus buku).

| Aspek | Detail Temuan |
|---|---|
| **Temuan** | Penghapusan buku sudah dicegah jika buku masih dipinjam aktif. Input POST belum divalidasi secara ketat di sisi server. Tidak ada pengecekan kegagalan `prepare()` atau `execute()` pada query database. |
| **Kesesuaian** | Baik secara fungsional untuk skenario normal. |
| **Risiko** | Data kosong, tipe tidak valid, atau karakter berbahaya masih dapat masuk ke database jika validasi server tidak diperkuat. |
| **Rekomendasi** | Tambahkan validasi server-side: cek field wajib, sanitasi input, dan tangani kegagalan `prepare()`/`execute()` dengan respons error yang informatif. |

### 8.3 `api/anggota.php`

Fungsi: Mengelola operasi GET (daftar anggota), POST (tambah anggota), dan DELETE (hapus anggota).

| Aspek | Detail Temuan |
|---|---|
| **Temuan** | Penghapusan anggota yang masih memiliki pinjaman aktif sudah diblokir. Email memiliki constraint unique di database, namun pesan error duplikasi belum ditangani secara spesifik. Validasi format email belum ada di sisi server. |
| **Kesesuaian** | Cukup baik untuk fungsi dasar. |
| **Risiko** | Duplikasi email menghasilkan pesan error generik database, bukan pesan yang ramah pengguna. Format email tidak valid dapat tersimpan. |
| **Rekomendasi** | Tambahkan validasi format email di server (`filter_var`), dan tangani error duplikat email dengan pesan respons yang jelas dan spesifik. |

### 8.4 `api/pinjam.php`

Fungsi: Mengelola operasi GET (daftar peminjaman) dan POST (catat peminjaman baru).

| Aspek | Detail Temuan |
|---|---|
| **Temuan** | Pembatasan 3 buku aktif per anggota sudah berjalan. Stok buku dikurangi sebelum data peminjaman disimpan. Proses tidak menggunakan transaksi database sehingga bila salah satu query gagal, data bisa tidak konsisten. Pemeriksaan stok dan penyimpanan peminjaman tidak sepenuhnya atomik. |
| **Kesesuaian** | Fungsional, tetapi rawan kondisi balapan (race condition) pada akses bersamaan. |
| **Risiko** | Inkonsistensi antara stok buku dan catatan peminjaman dapat terjadi jika salah satu query gagal di tengah proses. Race condition memungkinkan stok menjadi negatif pada akses bersamaan. |
| **Rekomendasi** | Implementasikan transaksi database (`BEGIN/COMMIT/ROLLBACK`) untuk memastikan atomisitas seluruh proses peminjaman. |

### 8.5 `api/kembali.php`

Fungsi: Mengelola operasi GET (daftar pengembalian) dan POST (proses pengembalian buku beserta denda).

| Aspek | Detail Temuan |
|---|---|
| **Temuan** | Denda dihitung dari selisih hari keterlambatan dengan benar. Status peminjaman diubah menjadi 'kembali' dan stok buku ditambahkan kembali. Tidak ada pengecekan apakah data peminjaman yang dicari benar-benar ditemukan sebelum variabel digunakan. Proses tidak dibungkus transaksi. |
| **Kesesuaian** | Sesuai fungsi dasar pada skenario normal. |
| **Risiko** | Akses data `pinjam_id` yang tidak valid dapat memicu PHP warning atau kegagalan proses tanpa pesan error yang memadai. |
| **Rekomendasi** | Tambahkan pengecekan hasil query sebelum memproses data. Bungkus seluruh proses pengembalian dalam transaksi database. |

### 8.6 Logika Antarmuka `BookHive.html`

Fungsi: Memuat data dari API, menampilkan dashboard dan seluruh modul, serta mengelola interaksi pengguna di sisi klien.

| Aspek | Detail Temuan |
|---|---|
| **Temuan** | Validasi input dilakukan di sisi klien, tetapi belum cukup sebagai satu-satunya lapisan proteksi. Ketergantungan besar pada keberhasilan request API. Beberapa fungsi render berpotensi menampilkan state kosong jika data API gagal dimuat. |
| **Kesesuaian** | Baik untuk antarmuka pengguna yang interaktif. |
| **Risiko** | Perilaku antarmuka sangat bergantung pada respons server. Kegagalan API dapat menyebabkan tampilan kosong atau pesan error yang membingungkan pengguna. |
| **Rekomendasi** | Tambahkan validasi redundan di sisi server sebagai lapisan kedua. Implementasikan empty state yang informatif dan penanganan error yang ramah pengguna. |

---

## 9. Kasus Uji Whitebox Berdasarkan Cabang Logika

| ID | Modul | Kondisi Uji | Data Masukan | Hasil yang Diharapkan | Status |
|---|---|---|---|---|---|
| WB-01 | `api/buku.php` | Tambah buku dengan data lengkap | judul, pengarang, stok, kategori valid | Buku tersimpan dan data baru dikembalikan dalam respons JSON | ✅ Layak |
| WB-02 | `api/buku.php` | Hapus buku yang sedang dipinjam aktif | id buku dengan status pinjam aktif | Request ditolak dengan pesan error yang informatif | ✅ Layak |
| WB-03 | `api/anggota.php` | Hapus anggota yang masih memiliki pinjaman aktif | id anggota dengan pinjaman aktif | Request ditolak dengan pesan error yang informatif | ✅ Layak |
| WB-04 | `api/pinjam.php` | Anggota sudah memiliki 3 pinjaman aktif | `anggota_id` sama, `buku_id` valid, pinjaman ke-4 | Request ditolak dengan pesan batas maksimum 3 buku | ✅ Layak |
| WB-05 | `api/pinjam.php` | Stok buku habis (stok = 0) | `buku_id` dengan stok = 0 | Request ditolak dengan pesan stok habis | ✅ Layak |
| WB-06 | `api/kembali.php` | Pengembalian terlambat | `tgl_kembali` melebihi `tgl_batas` pengembalian | Denda dihitung sesuai selisih hari keterlambatan | ✅ Layak |
| WB-07 | `api/kembali.php` | Pengembalian tepat waktu | `tgl_kembali` sama atau sebelum batas | Denda = 0, status diperbarui menjadi 'kembali' | ✅ Layak |
| WB-08 | `BookHive.html` | Data gagal dimuat karena API tidak aktif | Server API tidak tersedia atau timeout | Toast error muncul dan UI tidak crash atau blank total | ✅ Layak |
| WB-09 | `api/anggota.php` | Tambah anggota dengan email yang sudah terdaftar | email = email yang sudah ada di database | Request ditolak dengan pesan duplikasi email yang jelas | ⚠️ Perlu Perbaikan |
| WB-10 | `api/pinjam.php` | Query pengurangan stok berhasil tetapi penyimpanan peminjaman gagal | Simulasi kegagalan query kedua | Stok dikembalikan ke nilai semula (rollback); tidak ada catatan peminjaman tersimpan | ⚠️ Perlu Perbaikan |
| WB-11 | `api/kembali.php` | Pengembalian dengan `pinjam_id` yang tidak valid | `pinjam_id` = 99999 (tidak ada di database) | Request ditolak dengan pesan error data tidak ditemukan | ⚠️ Perlu Perbaikan |

---

## 10. Temuan Formal Inspection

| No. | Temuan | Lokasi | Dampak & Rekomendasi |
|---|---|---|---|
| T-01 | **Tidak ada transaksi database pada proses pinjam dan kembali** | `api/pinjam.php`, `api/kembali.php` | **Dampak:** Jika salah satu query gagal, data stok dan status pinjam bisa tidak sinkron. **Rekomendasi:** Implementasikan transaksi database (`BEGIN`, `COMMIT`, `ROLLBACK`) untuk menjamin atomisitas. |
| T-02 | **Validasi input sisi server belum lengkap** | `api/buku.php`, `api/anggota.php`, `api/pinjam.php`, `api/kembali.php` | **Dampak:** Input kosong, tipe salah, atau referensi tidak valid masih berisiko diproses. **Rekomendasi:** Tambahkan validasi input dan pemeriksaan keberadaan data di semua endpoint server. |
| T-03 | **Pengecekan data peminjaman pada pengembalian belum aman** | `api/kembali.php` | **Dampak:** Bila `pinjam_id` tidak valid, variabel hasil query dapat bernilai null/kosong dan menyebabkan PHP warning. **Rekomendasi:** Cek hasil query sebelum memproses denda atau memperbarui data. |
| T-04 | **Penanganan error tidak seragam di semua endpoint** | Seluruh endpoint API | **Dampak:** Debugging dan pelaporan kesalahan menjadi tidak konsisten dan sulit ditelusuri. **Rekomendasi:** Buat standar format respons error JSON yang seragam di semua endpoint. |
| T-05 | **Kredensial database hardcoded pada file konfigurasi** | `api/config.php` | **Dampak:** Risiko keamanan jika kode sumber bocor ke publik atau digunakan di lingkungan produksi. **Rekomendasi:** Gunakan environment variables atau file `.env` yang tidak di-commit ke repository. |

---

## 11. Kesimpulan

Berdasarkan hasil whitebox testing dengan metode Formal Inspection, alur utama aplikasi BookHive sudah berjalan sesuai fungsi dasar yang diharapkan. Validasi penghapusan data aktif, pembatasan pinjaman, dan perhitungan denda sudah terimplementasi dengan benar.

Namun, terdapat beberapa risiko penting yang memerlukan perhatian:

- Ketiadaan transaksi database pada proses peminjaman dan pengembalian merupakan **risiko tertinggi** yang dapat menyebabkan inkonsistensi data.
- Validasi server yang masih minim membuka celah untuk data tidak valid masuk ke sistem.
- Penanganan error yang tidak seragam mempersulit pemeliharaan dan debugging.
- Kredensial hardcoded tidak aman untuk lingkungan produksi.

Perbaikan pada keempat area tersebut sangat disarankan sebelum aplikasi digunakan secara luas di lingkungan produksi.

---

## 12. Rekomendasi Lanjutan

### 12.1 Prioritas Tinggi

- Implementasikan transaksi database (`BEGIN/COMMIT/ROLLBACK`) pada seluruh proses peminjaman dan pengembalian untuk menjamin atomisitas dan konsistensi data.
- Perkuat validasi input di sisi server untuk seluruh endpoint: cek field wajib, validasi tipe data, dan sanitasi input sebelum diproses ke database.
- Tambahkan pengecekan hasil query sebelum menggunakannya, terutama pada `api/kembali.php` untuk mencegah error pada `pinjam_id` tidak valid.

### 12.2 Prioritas Menengah

- Buat standar format respons error JSON yang konsisten di semua endpoint, termasuk kode status HTTP yang tepat (400, 404, 409, 500).
- Pindahkan kredensial database ke environment variables atau file `.env` yang tidak di-commit ke sistem version control.

### 12.3 Prioritas Pengembangan

- Tambahkan pengujian unit (unit test) dan integration test untuk alur pinjam-kembali guna mendeteksi regresi secara otomatis.
- Terapkan rate limiting pada endpoint API untuk mencegah penyalahgunaan dan race condition pada akses bersamaan.
- Tambahkan logging aktivitas server untuk memudahkan audit dan penelusuran masalah di masa mendatang.

---

*Dokumen ini disusun berdasarkan hasil Formal Inspection terhadap kode sumber aplikasi BookHive.*  
*Pengujian Whitebox – BookHive Sistem Perpustakaan – Juni 2026*  
*Dokumen Pengujian Perangkat Lunak – Whitebox Testing (Formal Inspection) – Bersifat Internal*
