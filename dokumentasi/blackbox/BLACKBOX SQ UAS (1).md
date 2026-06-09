**DOKUMEN PENGUJIAN PERANGKAT LUNAK**

**BLACKBOX TESTING APLIKASI SISTEM**

**PERPUSTAKAAN BOOKHIVE**

**Disusun Oleh :**

**20231310043 Chelsea Aaliyah Yasmin**

**20231310050 Nuraeni Yusup**

**20231310053 Risa Andriani**

**TEKNIK INFORMATIKA**

**FAKULTAS TEKNIK KOMPUTER DAN SISTEM INFORMASI**

**UNIVERSITAS KEBANGSAAN REPUBLIK INDONESIA**

_Jln. Terusan Halimun No. 37 (Pelajar Pejuang 45) Lingkar Selatan Kec. Lengkong_

_kota Bandung Jawa Barat 40263_

**BAB I**

**PENDAHULUAN**

**1.1 Latar Belakang**

Pengujian perangkat lunak merupakan salah satu tahapan penting dalam proses pengembangan sistem informasi. Tujuan utama dari pengujian adalah memastikan bahwa sistem yang dikembangkan telah berfungsi sesuai dengan kebutuhan pengguna dan spesifikasi yang telah ditentukan. Salah satu metode pengujian yang banyak digunakan adalah Black Box Testing, yaitu metode pengujian yang berfokus pada fungsi sistem tanpa memperhatikan struktur atau kode program yang digunakan.

BookHive merupakan aplikasi perpustakaan berbasis web yang dirancang untuk membantu pengelolaan data buku, data anggota, transaksi peminjaman, pengembalian buku, perhitungan denda, pencarian data, serta penyajian laporan perpustakaan. Oleh karena itu, diperlukan pengujian untuk memastikan seluruh fitur berjalan dengan baik dan menghasilkan keluaran yang sesuai dengan kebutuhan pengguna.

**1.2 Tujuan Pengujian**

Tujuan dilaksanakannya Black Box Testing pada aplikasi BookHive adalah sebagai berikut:

- Memastikan seluruh fitur aplikasi berfungsi sesuai kebutuhan fungsional sistem.
- Mengidentifikasi kesalahan pada proses input dan output data.
- Memastikan validasi data berjalan dengan baik.
- Menjamin bahwa sistem mampu menangani data valid maupun tidak valid sesuai aturan yang telah ditetapkan.
- Memastikan proses bisnis perpustakaan dapat berjalan secara konsisten dan akurat.

**1.3 Ruang Lingkup Pengujian**

Pengujian dilakukan terhadap beberapa fitur utama aplikasi BookHive, yaitu:

- Fitur Tambah Buku
- Fitur Tambah Anggota
- Fitur Peminjaman Buku
- Fitur Pengembalian Buku
- Fitur Hapus Anggota
- Fitur Pencarian Data
- Fitur Pelaporan Transaksi

**BAB II**

**METODOLOGI PENGUJIAN**

**2.1 Metode Black Box Testing**

Black Box Testing merupakan metode pengujian perangkat lunak yang dilakukan dengan menguji fungsi-fungsi sistem berdasarkan masukan (input) dan keluaran (output) tanpa memperhatikan implementasi kode program di dalamnya. Pengujian difokuskan pada perilaku sistem yang dapat diamati oleh pengguna.

**2.2 Teknik Pengujian**

Dalam penelitian ini digunakan dua teknik pengujian, yaitu:

1.  **Equuivalance Partitioning**

Equivalence Partitioning merupakan teknik pengujian yang membagi data masukan ke dalam beberapa kelompok atau kelas yang dianggap memiliki karakteristik yang sama. Dengan teknik ini, pengujian dapat dilakukan secara lebih efisien karena cukup menggunakan perwakilan dari setiap kelompok data.

1.  **Boundary Value Analiysis**

Boundary Value Analysis merupakan teknik pengujian yang berfokus pada nilai batas suatu input. Teknik ini digunakan karena kesalahan sistem sering terjadi pada nilai minimum, maksimum, atau nilai yang berada di sekitar batas tersebut.

**BAB III**

**HASIL DAN PEMBAHASAN**

**3.1 Pengujian Fitur Tambah Buku**

Fitur tambah buku digunakan untuk menambahkan data koleksi buku baru ke dalam sistem perpustakaan. Berdasarkan implementasi sistem, field Judul dan Pengarang merupakan data wajib yang harus diisi oleh pengguna.

| **No** | **Skeranio Pengujian** | **Data Uji** | **Hasil Yg Diharapkan** | **Status** |
| --- | --- | --- | --- | --- |
| 1   | Semua Data Vaid | Judul, Pengarang, ISBN, dan Stok diisi | Data buku berhasil tersimpan | Lulus |
| --- | --- | --- | --- | --- |
| 2   | Judul Kosong | Judul = "" | Sistem menampilkan pesan validasi | Lulus |
| --- | --- | --- | --- | --- |
| 3   | Pengarang Kosong | Pengarang = "" | Sistem menampilkan pesan validasi | Lulus |
| --- | --- | --- | --- | --- |
| 4   | Stok Mininum | Stok = 1 | Data berhasil tersimpan | Lulus |
| --- | --- | --- | --- | --- |
| 5   | Stok Maksimum | Stok = 1000 | Data berhasil tersimpan | Lulus |
| --- | --- | --- | --- | --- |

**Analisis :**

Berdasarkan hasil pengujian, sistem berhasil melakukan validasi terhadap data wajib dan mampu menyimpan data buku dengan benar ketika seluruh input telah memenuhi persyaratan.  

**3.2 Pengujian Fitur Tambah Anggota**

Fitur tambah anggota digunakan untuk mendaftarkan anggota baru ke dalam sistem perpustakaan. Data yang wajib diisi adalah nama dan alamat email anggota.

| **No** | **Skenario** | **Data Uji** | **Hasil Yg Diharapkan** | **Status** |
| --- | --- | --- | --- | --- |
| 1   | Data valid | Nama dan email terisi | Data anggota tersimpan | Lulus |
| --- | --- | --- | --- | --- |
| 2   | Nama kosong | Nama = "" | Sistem menolak penyimpanan | Lulus |
| --- | --- | --- | --- | --- |
| 3   | Email kosong | Email = "" | Sistem menampilkan validasi | Lulus |
| --- | --- | --- | --- | --- |
| 4   | Data lengkap | Semua field diisi | Data tersimpan dengan baik | Lulus |
| --- | --- | --- | --- | --- |

**Analisis :**

Sistem berhasil melakukan validasi terhadap data anggota dan mencegah penyimpanan data yang tidak memenuhi persyaratan.

**3.3 Pengujian Fitur Peminjaman Buku**

Fitur peminjaman digunakan untuk mencatat transaksi peminjaman buku oleh anggota perpustakaan.

| **No** | **Skenario Pengujian** | **Data Uji** | **Hasil yang Diharapkan** | **Status** |
| --- | --- | --- | --- | --- |
| 1   | Data lengkap | Semua field diisi | Transaksi tersimpan | Lulus |
| --- | --- | --- | --- | --- |
| 2   | Anggota belum dipilih | Data anggota kosong | Sistem menolak transaksi | Lulus |
| --- | --- | --- | --- | --- |
| 3   | Buku belum dipilih | Data buku kosong | Sistem menolak transaksi | Lulus |
| --- | --- | --- | --- | --- |
| 4   | Buku Tersedia | Stok buku > 0 | Transaksi berhasil | Lulus |
| --- | --- | --- | --- | --- |

**Analisis :**

Hasil pengujian menunjukkan bahwa sistem mampu memastikan seluruh data transaksi terisi sebelum proses peminjaman dilakukan.

**3.4 Pengujian Fitur Pengembalian Buku**

Fitur pengembalian digunakan untuk mengelola proses pengembalian buku dan menghitung denda apabila terjadi keterlambatan.

| **No** | **Skenario Pengujian** | **Kondisi** | **Hasil Yg Diharapkan** | **Status** |
| --- | --- | --- | --- | --- |
| 1   | Tepat waktu | Pengembalian sesuai tanggal | Denda Rp0 | Lulus |
| --- | --- | --- | --- | --- |
| 2   | Terlambat 1 hari | Melebihi batas pengembalian | Denda Rp2.000 | Lulus |
| --- | --- | --- | --- | --- |
| 3   | Terlambat 5 hari | Melebihi batas pengembalian | Denda Rp10.000 | Lulus |
| --- | --- | --- | --- | --- |

**Analisis :**

Sistem berhasil menghitung jumlah denda secara otomatis berdasarkan jumlah hari keterlambatan dengan tarif Rp2.000 per hari.

**3.5 Pengujian Fitur Hapus Anggota**

Pengujian dilakukan untuk memastikan integritas data ketika anggota akan dihapus dari sistem.

| **No** | **Skenario Pengujian** | **Hasil yang Diharapkan** | **Status** |     |
| --- | --- | --- | --- | --- |
| 1   | Anggota tanpa transaksi aktif | Data anggota dapat dihapus | Lulus |     |
| --- | --- | --- | --- | --- |
| 2   | Anggota memiliki transaksi aktif | Sistem menolak penghapusan | Lulus |     |
| --- | --- | --- | --- | --- |

**Analisis :**

Sistem berhasil mencegah penghapusan anggota

**3.6 Pengujian Fitur Pencarian Data**

Fitur pencarian digunakan untuk membantu pengguna menemukan data buku maupun anggota secara cepat.

| **No** | **Skenario Pengujian** | **Hasil Yg Diharapkan** | **Status** |
| --- | --- | --- | --- |
| 1   | Data ditemukan | Sistem menampilkan data sesuai kata kunci | Lulus |
| --- | --- | --- | --- |
| 2   | Data tidak ditemukan | Sistem menampilkan hasil kosong | Lulus |
| --- | --- | --- | --- |

**Analisis :**

Fitur pencarian berjalan dengan baik tanpa menghasilkan kesalahan sistem ketika data tidak ditemukan.

**BAB IV**

**ANALISIS TEKNIK PENGUJIAN**

**4.1 Equivalence Partitioning**

Berdasarkan hasil pengujian, data dibagi menjadi dua kelompok utama, yaitu:

- Judul buku terisi.
- Pengarang terisi.
- Nama anggota terisi.
- Email terisi.
- Data transaksi peminjaman lengkap.

Kelas Tidak Vald :

- Judul buku kosong.
- Pengarang kosong.
- Nama anggota kosong.
- Email kosong.
- Buku belum dipilih saat peminjaman.
- Anggota belum dipilih saat peminjaman.

Pengujian menunjukkan bahwa sistem mampu membedakan data valid dan tidak valid dengan baik.

**4.2 Boundary Value Analysis**

Pengujian nilai batas dilakukan pada beberapa kondisi berikut:

| **Objek Uji** | **Nilai Batas** | **Hasil** |
| --- | --- | --- |
| Stok Buku | 1   | Berhasil disimpan |
| --- | --- | --- |
| Stok Buku | 1000 | Berhasil disimpan |
| --- | --- | --- |
| Tanggal Pengembalian | Tepat jatuh tempo | Tidak dikenakan biaya |
| --- | --- | --- |
| Tanggal Pengembalian | 1 hari terlambat | Denda dihitung otomatis |
| --- | --- | --- |

Hasil pengujian menunjukkan bahwa sistem mampu menangani nilai batas sesuai dengan kebutuhan fungsional.

**BAB V**

**PENUTUP**

**5.1 Kesimpulan**

Berdasarkan hasil Black Box Testing yang telah dilakukan terhadap aplikasi perpustakaan BookHive, dapat disimpulkan bahwa seluruh fitur utama sistem telah berjalan sesuai dengan kebutuhan fungsional yang telah ditentukan. Fitur pengelolaan buku, pengelolaan anggota, peminjaman buku, pengembalian buku, pencarian data, serta pelaporan transaksi berhasil dijalankan tanpa ditemukan kesalahan yang signifikan.

Selain itu, sistem mampu melakukan validasi terhadap data masukan sehingga dapat mencegah terjadinya penyimpanan data yang tidak valid. Mekanisme pengurangan stok buku, penghitungan denda keterlambatan, serta pengelolaan transaksi perpustakaan juga telah berfungsi dengan baik sesuai dengan aturan bisnis yang diterapkan.