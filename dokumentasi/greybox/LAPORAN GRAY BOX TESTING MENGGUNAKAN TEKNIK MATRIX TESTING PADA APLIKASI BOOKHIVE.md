**LAPORAN GRAY BOX TESTING MENGGUNAKAN TEKNIK MATRIX TESTING PADA APLIKASI BOOKHIVE**

**Disusun Oleh :** 

20231310043 - Chelsea Aaliyah Yasmin

&nbsp;     20231310050 - Nuraeni Yusup 

&nbsp;     20231310053 - Risa Andriani

**TEKNIK INFORMATIKA**

**FAKULTAS TEKNIK KOMPUTER DAN SISTEM INFORMASI**

**UNIVERSITAS KEBANGSAAN REPUBLIK INDONESIA**

_Jln. Terusan Halimun No. 37, Lingkar Selatan, Lengkong, Bandung, Jawa Barat 40263_

**BAB I**

**PENDAHULUAN**

**1.1 Latar Belakang**

Perangkat lunak merupakan komponen penting dalam pengelolaan informasi pada era digital. Salah satu implementasi teknologi informasi adalah sistem perpustakaan digital yang digunakan untuk membantu pengelolaan data buku, anggota, peminjaman, dan pengembalian buku secara terkomputerisasi.

BookHive merupakan aplikasi perpustakaan digital berbasis web yang dibangun menggunakan HTML, PHP, dan MySQL. Sistem ini menyediakan fitur manajemen buku, manajemen anggota, pencatatan peminjaman, pengembalian buku, serta pengelolaan stok buku secara otomatis. Dengan adanya sistem tersebut, proses administrasi perpustakaan menjadi lebih efektif dibandingkan pencatatan manual.

Untuk memastikan seluruh fungsi berjalan sesuai kebutuhan, diperlukan proses pengujian perangkat lunak. Salah satu metode yang dapat digunakan adalah Gray Box Testing. Pada metode ini penguji memiliki sebagian informasi mengenai struktur internal sistem, seperti database dan alur proses, namun pengujian tetap dilakukan dari sudut pandang pengguna.

Teknik Matrix Testing digunakan karena mampu mengidentifikasi hubungan antara input, proses, database, dan output. Melalui teknik ini dapat diketahui apakah setiap kombinasi data menghasilkan keluaran yang sesuai dengan spesifikasi sistem.

**1.2 Rumusan Masalah**

1.  Bagaimana penerapan Gray Box Testing menggunakan teknik Matrix Testing pada aplikasi BookHive?
2.  Apakah hubungan antara data anggota, data buku, peminjaman, dan pengembalian telah berjalan dengan baik?
3.  Apakah seluruh fungsi sistem menghasilkan output yang sesuai dengan kebutuhan?

**1.3 Tujuan Pengujian**

1.  Menguji fungsi utama aplikasi BookHive.
2.  Menguji hubungan antar modul sistem.
3.  Memastikan data tersimpan dengan benar pada database.
4.  Mengetahui tingkat keberhasilan aplikasi berdasarkan Matrix Testing.

**1.4 Manfaat Pengujian**

Bagi Pengembang

- Menemukan kesalahan sistem.
- Menjadi dasar evaluasi aplikasi.

Bagi Pengguna

- Meningkatkan kepercayaan terhadap sistem.
- Menjamin data tersimpan dengan benar.

Bagi Akademik

- Menjadi referensi penerapan Gray Box Testing.

**1.5 Ruang Lingkup**

Pengujian dilakukan pada modul:

1.  Data Anggota
2.  Data Buku
3.  Peminjaman Buku
4.  Pengembalian Buku
5.  Stok Buku

**BAB II**

**LANDASAN TEORI**

**2.1 Pengujian Perangkat Lunak**

Pengujian perangkat lunak adalah proses untuk mengevaluasi sistem guna menemukan kesalahan dan memastikan sistem bekerja sesuai kebutuhan pengguna.

**2.2 Gray Box Testing**

Gray Box Testing merupakan metode pengujian yang menggabungkan konsep Black Box Testing dan White Box Testing. Penguji mengetahui sebagian struktur internal sistem seperti database dan logika program.

**2.3 Matrix Testing**

Matrix Testing adalah teknik Gray Box Testing yang digunakan untuk menganalisis hubungan antar variabel sistem sehingga dapat diketahui pengaruh suatu input terhadap proses dan output yang dihasilkan.

**2.4 Website**

Website adalah kumpulan halaman yang dapat diakses melalui internet menggunakan browser.

**2.5 Database MySQL**

MySQL merupakan sistem manajemen basis data relasional yang digunakan untuk menyimpan dan mengelola data aplikasi BookHive.

**BAB III**

**ANALISIS SISTEM**

**3.1 Deskripsi Sistem**

BookHive merupakan sistem perpustakaan digital yang digunakan untuk mengelola:

- Data Anggota
- Data Buku
- Data Peminjaman
- Data Pengembalian
- Stok Buku

**3.2 Struktur Modul**

|     |     |
| --- | --- |
| No  | Modul |
| 1   | Anggota |
| 2   | Buku |
| 3   | Peminjaman |
| 4   | Pengembalian |
| 5   | Stok Buku |

**3.3 Hubungan Antar Modul**

Anggota → Peminjaman → Buku → Pengembalian → Update Stok

**3.4 Struktur Database**

**Tabel Anggota**

- id
- nama
- alamat
- telepon

**Tabel Buku**

- id
- judul
- pengarang
- isbn
- kategori
- stok

**Tabel Pinjam**

- id
- anggota_id
- buku_id
- tgl_pinjam
- tgl_batas
- status

**BAB IV**

**IMPLEMENTASI MATRIX TESTING**

**4.1 Matriks Hubungan Modul**

|     |     |     |     |     |
| --- | --- | --- | --- | --- |
| Modul | Anggota | Buku | Pinjam | Kembali |
| Anggota | ✔   | \-  | ✔   | ✔   |
| Buku | \-  | ✔   | ✔   | ✔   |
| Pinjam | ✔   | ✔   | ✔   | ✔   |
| Kembali | ✔   | ✔   | ✔   | ✔   |

**4.2 Matrix Testing Data Buku**

|     |     |     |     |     |
| --- | --- | --- | --- | --- |
| Input | Proses | Database | Output | Status |
| Tambah Buku | Insert Data | Tersimpan | Buku tampil | Pass |
| Hapus Buku Tidak Dipinjam | Delete Data | Terhapus | Data hilang | Pass |
| Hapus Buku Dipinjam | Validasi | Ditolak | Error tampil | Pass |

**4.3 Matrix Testing Data Anggota**

|     |     |     |     |     |
| --- | --- | --- | --- | --- |
| Input | Proses | Database | Output | Status |
| Tambah Anggota | Insert | Tersimpan | Data tampil | Pass |
| Edit Anggota | Update | Berubah | Data baru tampil | Pass |

**4.4 Matrix Testing Peminjaman**

Berdasarkan kode pinjam.php ditemukan aturan:

- Maksimal 3 buku per anggota
- Stok harus tersedia

|     |     |     |
| --- | --- | --- |
| Kondisi | Hasil Diharapkan | Status |
| Stok tersedia | Peminjaman berhasil | Pass |
| Stok habis | Ditolak | Pass |
| Pinjam < 3 buku | Berhasil | Pass |
| Pinjam > 3 buku | Ditolak | Pass |

**4.5 Matrix Testing Pengembalian**

|     |     |     |
| --- | --- | --- |
| Kondisi | Hasil Diharapkan | Status |
| Buku dikembalikan | Status berubah | Pass |
| Buku dikembalikan | Stok bertambah | Pass |
| Data pengembalian | Tersimpan | Pass |

**4.6 Matrix Hubungan Input dan Output**

|     |     |
| --- | --- |
| Input | Output |
| Tambah Buku | Data Buku Bertambah |
| Hapus Buku | Data Buku Berkurang |
| Pinjam Buku | Stok Berkurang |
| Kembalikan Buku | Stok Bertambah |
| Tambah Anggota | Data Anggota Bertambah |

**4.7 Hasil Pengujian**

|     |     |     |     |
| --- | --- | --- | --- |
| Modul | Test Case | Pass | Fail |
| Anggota | 2   | 2   | 0   |
| Buku | 3   | 3   | 0   |
| Peminjaman | 4   | 4   | 0   |
| Pengembalian | 3   | 3   | 0   |
| Total | 12  | 12  | 0   |

**Persentase Keberhasilan:**

100%

**BAB V**

**KESIMPULAN DAN SARAN**

**5.1 Kesimpulan**

Berdasarkan hasil Gray Box Testing menggunakan teknik Matrix Testing pada aplikasi BookHive, seluruh hubungan antara input, proses, database, dan output berjalan dengan baik. Sistem berhasil melakukan pengelolaan data anggota, data buku, peminjaman, dan pengembalian sesuai dengan kebutuhan yang telah ditentukan.

Pengujian menunjukkan bahwa validasi stok buku dan batas maksimal peminjaman berhasil diterapkan. Seluruh skenario pengujian memperoleh hasil Pass dengan tingkat keberhasilan sebesar 100%.

**5.2 Saran**

1.  Menambahkan fitur autentikasi pengguna.
2.  Menambahkan enkripsi data sensitif.
3.  Menambahkan log aktivitas pengguna.
4.  Menambahkan notifikasi otomatis keterlambatan pengembalian.
5.  Melakukan pengujian lanjutan menggunakan Regression Testing dan Security Testing.