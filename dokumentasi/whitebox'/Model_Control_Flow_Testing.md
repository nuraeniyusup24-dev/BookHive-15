# DOKUMEN PENGUJIAN PERANGKAT LUNAK
## APLIKASI SISTEM PERPUSTAKAAN BOOKHIVE
### WHITE BOX TESTING
*Model Control Flow Testing (CFT)*

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

Control Flow Testing merupakan salah satu metode White Box Testing yang berfokus pada pengujian alur kontrol (control flow) dalam program. Pengujian ini bertujuan untuk memastikan bahwa setiap jalur eksekusi yang tersedia dalam sistem dapat berjalan sesuai logika yang telah dirancang, serta memastikan tidak terdapat jalur yang menyebabkan kesalahan proses maupun loop yang tidak diinginkan.

Pada aplikasi BookHive, pengujian dilakukan pada proses utama yang memiliki percabangan logika, seperti penambahan data buku, penghapusan data, peminjaman buku, pengembalian buku, dan validasi anggota.

### 2. Tujuan

Tujuan Control Flow Testing pada aplikasi BookHive adalah:

- Memastikan setiap percabangan program berjalan sesuai logika.
- Memverifikasi jalur sukses dan jalur gagal pada setiap proses.
- Menguji kondisi benar (true) dan salah (false) pada setiap keputusan (decision node).
- Memastikan sistem memberikan respons yang sesuai pada setiap kondisi.
- Mengurangi risiko kesalahan logika pada proses bisnis perpustakaan.

### 3. Objek Pengujian

Modul yang diuji menggunakan Control Flow Testing:

- Modul Buku (`api/buku.php`)
- Modul Anggota (`api/anggota.php`)
- Modul Peminjaman (`api/pinjam.php`)
- Modul Pengembalian (`api/kembali.php`)

---

## Skenario Pengujian

### CF-01 — Validasi Stok Buku Saat Peminjaman

| Kondisi | Hasil Yang Diharapkan | Hasil | Status |
|---|---|---|---|
| Stok > 0 | Pinjaman berhasil | Sistem berhasil menyimpan data peminjaman | ✅ Passed |
| Stok = 0 | Sistem menolak peminjaman | Muncul pesan "stok buku habis" | ✅ Passed |

### CF-02 — Validasi Maksimal Peminjaman

| Kondisi | Hasil Yang Diharapkan | Hasil | Status |
|---|---|---|---|
| Jumlah peminjaman < 3 | Peminjaman diproses | Data berhasil disimpan | ✅ Passed |
| Jumlah peminjaman >= 3 | Peminjaman ditolak | Muncul pesan maksimal 3 buku | ✅ Passed |

### CF-03 — Penghapusan Buku

| Kondisi | Hasil Yang Diharapkan | Hasil | Status |
|---|---|---|---|
| Buku tidak sedang dipinjam | Data buku dihapus | Data berhasil dihapus | ✅ Passed |
| Buku sedang dipinjam | Penghapusan ditolak | Muncul pesan error | ✅ Passed |

### CF-04 — Penghapusan Anggota

| Kondisi | Hasil Yang Diharapkan | Hasil | Status |
|---|---|---|---|
| Anggota tidak memiliki pinjaman aktif | Data anggota dihapus | Data berhasil dihapus | ✅ Passed |
| Anggota masih memiliki pinjaman aktif | Penghapusan ditolak | Muncul pesan error | ✅ Passed |

### CF-05 — Validasi Email Anggota

| Kondisi | Hasil Yang Diharapkan | Hasil | Status |
|---|---|---|---|
| Email belum terdaftar | Data anggota disimpan | Data berhasil disimpan | ✅ Passed |
| Email sudah terdaftar | Sistem menolak penyimpanan | Muncul pesan email sudah digunakan | ✅ Passed |

### CF-06 — Pengembalian Buku Tepat Waktu

| Kondisi | Hasil Yang Diharapkan | Hasil | Status |
|---|---|---|---|
| Tanggal kembali ≤ tanggal batas | Denda = Rp0 | Sistem menampilkan denda Rp0 | ✅ Passed |

### CF-07 — Pengembalian Buku Terlambat

| Kondisi | Hasil Yang Diharapkan | Hasil | Status |
|---|---|---|---|
| Tanggal kembali > tanggal batas | Denda dihitung sesuai keterlambatan | Sistem menampilkan jumlah denda | ✅ Passed |

### CF-08 — Validasi Data Peminjaman Tidak Ditemukan

| Kondisi | Hasil Yang Diharapkan | Hasil | Status |
|---|---|---|---|
| ID peminjaman tidak ditemukan | Sistem menolak proses pengembalian | Muncul pesan data tidak ditemukan | ✅ Passed |

---

## BAB II — ANALISIS HASIL PENGUJIAN

Berdasarkan hasil Control Flow Testing yang dilakukan pada aplikasi BookHive, seluruh jalur kontrol utama berhasil dieksekusi sesuai dengan logika program yang telah dirancang. Setiap percabangan yang terdapat pada modul buku, anggota, peminjaman, dan pengembalian telah diuji menggunakan kondisi true dan false untuk memastikan seluruh kemungkinan jalur program dapat berjalan dengan baik.

Pada modul peminjaman ditemukan bahwa sistem telah berhasil melakukan validasi stok buku dan pembatasan maksimal tiga buku aktif untuk setiap anggota. Pengujian menunjukkan bahwa sistem mampu menolak proses peminjaman ketika stok buku habis maupun ketika jumlah pinjaman anggota telah mencapai batas maksimum.

Pada modul penghapusan buku dan anggota, sistem berhasil mencegah penghapusan data yang masih memiliki relasi aktif sehingga integritas data tetap terjaga. Pengujian juga menunjukkan bahwa proses pengembalian mampu menghitung denda keterlambatan sesuai aturan yang diterapkan.

Meskipun seluruh jalur utama berhasil dijalankan, hasil inspeksi kode menunjukkan beberapa potensi risiko, antara lain:

- Belum diterapkannya transaksi database pada proses peminjaman dan pengembalian.
- Validasi server-side yang masih terbatas.
- Penanganan error yang belum seragam pada seluruh endpoint API.

---

## BAB V — KESIMPULAN DAN SARAN

### 4.1 Kesimpulan

Berdasarkan hasil pengujian White Box Testing menggunakan metode Control Flow Testing pada aplikasi BookHive, dapat disimpulkan bahwa seluruh jalur kontrol utama sistem telah berjalan sesuai dengan kebutuhan fungsional yang dirancang. Pengujian berhasil memverifikasi kondisi sukses maupun gagal pada setiap percabangan program sehingga logika sistem dapat dinyatakan berjalan dengan baik.

Seluruh skenario pengujian memperoleh status **Passed** yang menunjukkan bahwa fungsi validasi stok buku, pembatasan jumlah peminjaman, penghapusan data, validasi anggota, dan pengembalian buku telah berjalan sesuai harapan.

### 4.2 Saran

Berdasarkan hasil pengujian yang telah dilakukan, beberapa saran pengembangan sistem adalah:

- Menambahkan transaksi database (`BEGIN`, `COMMIT`, dan `ROLLBACK`) pada proses peminjaman dan pengembalian.
- Memperkuat validasi input pada sisi server untuk seluruh endpoint API.
- Menambahkan pengecekan data sebelum proses pengembalian dilakukan.
- Menyeragamkan format pesan error pada seluruh modul sistem.
- Menambahkan pengujian Basis Path Testing dan Unit Testing untuk meningkatkan kualitas perangkat lunak.
