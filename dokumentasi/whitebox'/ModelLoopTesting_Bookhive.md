# DOKUMEN PENGUJIAN PERANGKAT LUNAK
## APLIKASI SISTEM PERPUSTAKAAN BOOKHIVE
### WHITE BOX TESTING
*Model Loop Testing (MLT)*

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

## BAB I — PENDAHULUAN

### 1. Pendahuluan

Loop Testing merupakan salah satu teknik White Box Testing yang berfokus pada pengujian struktur perulangan (loop) dalam program. Pengujian ini bertujuan untuk memastikan bahwa setiap perulangan berjalan sesuai logika yang dirancang, mampu menangani kondisi batas (boundary condition), serta tidak menyebabkan kesalahan seperti infinite loop atau kegagalan pemrosesan data.

Pada aplikasi BookHive, beberapa fitur memanfaatkan perulangan untuk menampilkan data buku, anggota, peminjaman, pengembalian, serta melakukan perhitungan statistik pada dashboard. Oleh karena itu, pengujian loop dilakukan untuk memverifikasi bahwa seluruh proses iterasi data dapat berjalan dengan benar pada berbagai kondisi.

### 2. Tujuan

Tujuan pengujian Loop Testing adalah sebagai berikut:

- Memastikan struktur perulangan berjalan sesuai logika program.
- Menguji perilaku sistem ketika jumlah data bernilai 0 (zero iteration).
- Menguji perilaku sistem ketika perulangan dijalankan satu kali (single iteration).
- Menguji perilaku sistem pada kondisi normal (multiple iteration).
- Menguji kemampuan sistem dalam menangani jumlah data yang besar (maximum iteration).
- Memastikan tidak terjadi infinite loop maupun kesalahan logika selama proses iterasi.

### 3. Objek Pengujian

| ID Loop | Modul | Fungsi |
|---|---|---|
| LT-01 | Data Buku | Menampilkan Daftar Buku |
| LT-02 | Data Anggota | Menampilkan Daftar Anggota |
| LT-03 | Data Peminjaman | Menampilkan Transaksi Peminjaman |
| LT-04 | Data Pengembalian | Menampilkan Transaksi Pengembalian |
| LT-05 | Dashboard | Menghitung Statistik dan Rekapitulasi |

---

## BAB II — SKENARIO DAN HASIL PENGUJIAN

### LT-01 — Daftar Buku

| Kondisi Pengujian | Jumlah Data | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|
| Zero Iteration | 0 data | Sistem menampilkan pesan data kosong | Sesuai | ✅ Berhasil |
| Single Iteration | 1 data | Satu data buku ditampilkan | Sesuai | ✅ Berhasil |
| Normal Iteration | 10 data | Semua buku ditampilkan | Sesuai | ✅ Berhasil |
| Maximum Iteration | 100 data | Seluruh data tampil tanpa error | Sesuai | ✅ Berhasil |

### LT-02 — Daftar Anggota

| Kondisi Pengujian | Jumlah Data | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|
| Zero Iteration | 0 data | Tidak ada data yang ditampilkan | Sesuai | ✅ Berhasil |
| Single Iteration | 1 data | Satu anggota ditampilkan | Sesuai | ✅ Berhasil |
| Normal Iteration | 50 data | Seluruh anggota tampil | Sesuai | ✅ Berhasil |
| Maximum Iteration | 500 data | Sistem tetap berjalan normal | Sesuai | ✅ Berhasil |

### LT-03 — Data Peminjaman

| Kondisi Pengujian | Jumlah Data | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|
| Zero Iteration | 0 data | Tidak ada transaksi yang ditampilkan | Sesuai | ✅ Berhasil |
| Single Iteration | 1 data | Satu transaksi ditampilkan | Sesuai | ✅ Berhasil |
| Normal Iteration | 30 data | Seluruh transaksi tampil | Sesuai | ✅ Berhasil |
| Maximum Iteration | 100 data | Sistem tetap stabil | Sesuai | ✅ Berhasil |

### LT-04 — Data Pengembalian

| Kondisi Pengujian | Jumlah Data | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|
| Zero Iteration | 0 data | Tidak ada perhitungan denda | Sesuai | ✅ Berhasil |
| Single Iteration | 1 data | Denda dihitung dengan benar | Sesuai | ✅ Berhasil |
| Normal Iteration | 50 data | Semua denda dihitung | Sesuai | ✅ Berhasil |
| Maximum Iteration | 100 data | Sistem tetap berjalan normal | Sesuai | ✅ Berhasil |

### LT-05 — Dashboard

| Kondisi Pengujian | Jumlah Data | Hasil yang Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|
| Zero Iteration | 0 data | Nilai total = 0 | Sesuai | ✅ Berhasil |
| Single Iteration | 1 data | Total sesuai data | Sesuai | ✅ Berhasil |
| Normal Iteration | 50 data | Total dihitung dengan benar | Sesuai | ✅ Berhasil |
| Maximum Iteration | 100 data | Sistem tetap stabil dan akurat | Sesuai | ✅ Berhasil |

---

## BAB III — RINGKASAN HASIL PENGUJIAN

| ID Loop | Modul | Zero Iteration | Single Iteration | Normal Iteration | Maximum Iteration | Keseluruhan |
|---|---|---|---|---|---|---|
| LT-01 | Data Buku | ✅ | ✅ | ✅ | ✅ | ✅ Berhasil |
| LT-02 | Data Anggota | ✅ | ✅ | ✅ | ✅ | ✅ Berhasil |
| LT-03 | Data Peminjaman | ✅ | ✅ | ✅ | ✅ | ✅ Berhasil |
| LT-04 | Data Pengembalian | ✅ | ✅ | ✅ | ✅ | ✅ Berhasil |
| LT-05 | Dashboard | ✅ | ✅ | ✅ | ✅ | ✅ Berhasil |

Seluruh 5 modul yang diuji dengan 4 kondisi iterasi (total 20 skenario) menghasilkan status **Berhasil**. Tidak ditemukan kegagalan perulangan, infinite loop, maupun kesalahan logika selama proses iterasi pada aplikasi BookHive.
