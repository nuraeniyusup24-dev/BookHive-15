# Pengujian Black Box — Sample Testing

## Tujuan
Dokumen ini menyajikan pengujian Black Box menggunakan teknik Sample Testing untuk aplikasi perpustakaan BookHive. Tujuan: mengambil sampel kasus pengujian dari setiap kelompok input untuk memastikan fungsi sistem berjalan dengan benar tanpa memeriksa semua kombinasi data.

## Ruang Lingkup
Fitur yang diuji:
- Tambah Buku
- Tambah Anggota
- Peminjaman Buku
- Pengembalian Buku
- Pencarian Data

## Metodologi Sample Testing
Sample Testing memilih satu atau beberapa kasus representatif dari masing-masing kelas input yang relevan. Teknik ini efektif untuk menguji fungsionalitas utama secara cepat dengan cakupan yang masih layak.

## 1. Tambah Buku
Pilih sampel untuk kondisi valid dan tidak valid pada field penting.

| No | Skenario | Data Uji | Hasil yang Diharapkan |
| --- | --- | --- | --- |
| 1 | Tambah buku valid | Judul = "Pemrograman Web", Pengarang = "Aulia", ISBN = "9781234567890", Stok = 10 | Data buku tersimpan |
| 2 | Judul kosong | Judul = "", Pengarang = "Aulia", ISBN = "9781234567890", Stok = 10 | Ditolak, pesan validasi judul wajib diisi |
| 3 | Stok nol | Judul = "Pemrograman Web", Pengarang = "Aulia", ISBN = "9781234567890", Stok = 0 | Ditolak, pesan validasi stok minimal 1 |
| 4 | ISBN tidak valid | Judul = "Pemrograman Web", Pengarang = "Aulia", ISBN = "12345", Stok = 5 | Ditolak, pesan validasi format ISBN |

## 2. Tambah Anggota
Pilih sampel yang mencerminkan input valid dan kondisi field wajib.

| No | Skenario | Data Uji | Hasil yang Diharapkan |
| --- | --- | --- | --- |
| 1 | Tambah anggota valid | Nama = "Rina", Email = "rina@gmail.com" | Data anggota tersimpan |
| 2 | Email kosong | Nama = "Rina", Email = "" | Ditolak, pesan validasi email wajib diisi |
| 3 | Email tidak valid | Nama = "Rina", Email = "rina.gmail.com" | Ditolak, pesan format email invalid |
| 4 | Nama kosong | Nama = "", Email = "rina@gmail.com" | Ditolak, pesan validasi nama wajib diisi |

## 3. Peminjaman Buku
Sampel pengujian memastikan validasi transaksi dan ketersediaan buku.

| No | Skenario | Data Uji | Hasil yang Diharapkan |
| --- | --- | --- | --- |
| 1 | Peminjaman valid | Anggota terpilih, Buku tersedia, Tanggal pinjam = hari ini, Tanggal kembali = +7 hari | Transaksi tersimpan, stok buku berkurang |
| 2 | Buku tidak tersedia | Anggota terpilih, Buku stok 0 | Ditolak, pesan buku tidak tersedia |
| 3 | Anggota tidak dipilih | Anggota kosong, Buku tersedia | Ditolak, pesan pilih anggota terlebih dahulu |
| 4 | Tanggal kembali sebelum pinjam | Tanggal kembali < Tanggal pinjam | Ditolak, pesan tanggal kembali tidak valid |

## 4. Pengembalian Buku
Pilih sampel untuk menguji hitungan denda dan pengembalian tepat waktu.

| No | Skenario | Data Uji | Hasil yang Diharapkan |
| --- | --- | --- | --- |
| 1 | Pengembalian tepat waktu | Tanggal kembali = tanggal jatuh tempo | Denda Rp0, stok buku bertambah |
| 2 | Pengembalian terlambat | Tanggal kembali 3 hari setelah jatuh tempo | Denda dihitung sesuai tarif, stok buku bertambah |
| 3 | Transaksi tidak ditemukan | ID pinjam tidak valid | Ditolak, pesan transaksi tidak ditemukan |

## 5. Pencarian Data
Sampel pengujian memastikan hasil pencarian dan kasus data tidak ditemukan.

| No | Skenario | Data Uji | Hasil yang Diharapkan |
| --- | --- | --- | --- |
| 1 | Pencarian buku ada | Kata kunci = "Pemrograman" | Menampilkan daftar buku yang cocok |
| 2 | Pencarian buku tidak ada | Kata kunci = "XYZ123" | Menampilkan hasil kosong |
| 3 | Pencarian anggota ada | Kata kunci = "Rina" | Menampilkan data anggota yang cocok |
| 4 | Pencarian anggota tidak ada | Kata kunci = "TidakAda" | Menampilkan hasil kosong |

## Eksekusi Pengujian
1. Siapkan lingkungan aplikasi BookHive.
2. Jalankan setiap skenario sampel satu per satu.
3. Catat hasil aktual, status, dan pesan sistem.
4. Bandingkan hasil aktual dengan hasil yang diharapkan.

## Template Laporan Kasus Uji
- ID: ST-01
- Fitur: Tambah Buku
- Skenario: Tambah buku valid
- Langkah: Isi form buku dengan data valid dan klik simpan
- Hasil Aktual: ...
- Hasil yang Diharapkan: Data buku tersimpan
- Status: Lulus / Gagal

## Penutup
Sample Testing memungkinkan pengujian cepat dan efektif dari kasus representatif. Untuk cakupan lebih luas, gabungkan dengan Equivalence Partitioning dan Boundary Value Analysis.
