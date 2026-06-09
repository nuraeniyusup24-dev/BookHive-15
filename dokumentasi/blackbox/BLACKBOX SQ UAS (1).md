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

**3.7 Pengujian Performance**

Pengujian performance dilakukan untuk memastikan sistem dapat beroperasi dengan respons yang cepat dan stabil dalam berbagai kondisi beban kerja. Pengujian ini mencakup pengukuran waktu respons, penggunaan memori, dan kemampuan sistem menangani beban pengguna.

**3.7.1 Pengujian Waktu Respons (Response Time)**

Pengujian waktu respons mengukur kecepatan sistem dalam merespons setiap permintaan pengguna.

| **No** | **Skenario Pengujian** | **Kondisi** | **Waktu Respons Maksimal** | **Hasil yang Diharapkan** | **Status** |
| --- | --- | --- | --- | --- | --- |
| 1   | Load halaman login | Pertama kali diakses | 2 detik | Halaman muncul dalam waktu ≤ 2 detik | Lulus |
| --- | --- | --- | --- | --- | --- |
| 2   | Load halaman dashboard | Setelah login berhasil | 2 detik | Halaman muncul dalam waktu ≤ 2 detik | Lulus |
| --- | --- | --- | --- | --- | --- |
| 3   | Load daftar buku | Menampilkan semua buku | 3 detik | Halaman muncul dalam waktu ≤ 3 detik | Lulus |
| --- | --- | --- | --- | --- | --- |
| 4   | Penyimpanan data buku | Proses input dan save | 1.5 detik | Data tersimpan dalam waktu ≤ 1.5 detik | Lulus |
| --- | --- | --- | --- | --- | --- |
| 5   | Pencarian data | Query dengan 1000+ record | 2 detik | Hasil pencarian muncul dalam waktu ≤ 2 detik | Lulus |
| --- | --- | --- | --- | --- | --- |
| 6   | Load laporan peminjaman | Generate report 500+ transaksi | 5 detik | Laporan ditampilkan dalam waktu ≤ 5 detik | Lulus |
| --- | --- | --- | --- | --- | --- |

**Analisis :**

Sistem menunjukkan performa yang baik dalam merespons permintaan pengguna. Semua fitur utama dapat diakses dengan waktu respons yang memenuhi standar yang ditetapkan (di bawah threshold yang ditentukan).

**3.7.2 Pengujian Load Testing (Pengujian Beban)**

Pengujian beban dilakukan untuk memastikan sistem dapat menangani beberapa pengguna yang mengakses sistem secara bersamaan tanpa mengalami penurunan performa yang signifikan.

| **No** | **Skenario Pengujian** | **Jumlah Pengguna** | **Durasi** | **Hasil yang Diharapkan** | **Status** |
| --- | --- | --- | --- | --- | --- |
| 1   | Normal load | 5 pengguna | 10 menit | Sistem responsif, tidak ada error | Lulus |
| --- | --- | --- | --- | --- | --- |
| 2   | Medium load | 15 pengguna | 15 menit | Sistem stabil, response time masih baik | Lulus |
| --- | --- | --- | --- | --- | --- |
| 3   | High load | 30 pengguna | 20 menit | Sistem tetap responsif, beberapa delay kecil | Lulus |
| --- | --- | --- | --- | --- | --- |
| 4   | Peak load | 50 pengguna | 10 menit | Sistem masih dapat melayani, ada delay | Lulus |
| --- | --- | --- | --- | --- | --- |

**Analisis :**

Sistem menunjukkan stabilitas yang baik dalam menangani beban pengguna multiple. Walaupun pada peak load terjadi peningkatan response time, sistem tetap responsif dan tidak mengalami crash atau error yang signifikan.

**3.7.3 Pengujian Query Database Performance**

Pengujian ini mengukur performa database dalam menjalankan query terhadap berbagai volume data.

| **No** | **Skenario Pengujian** | **Volume Data** | **Query** | **Waktu Eksekusi Maksimal** | **Hasil yang Diharapkan** | **Status** |
| --- | --- | --- | --- | --- | --- | --- |
| 1   | Query SELECT sederhana | 1000 record | SELECT * FROM buku | 500 ms | Query selesai dalam waktu ≤ 500 ms | Lulus |
| --- | --- | --- | --- | --- | --- | --- |
| 2   | Query SELECT dengan JOIN | 5000 record | SELECT * FROM pinjam JOIN buku | 800 ms | Query selesai dalam waktu ≤ 800 ms | Lulus |
| --- | --- | --- | --- | --- | --- | --- |
| 3   | Query dengan filter WHERE | 10000 record | SELECT * FROM anggota WHERE status='aktif' | 600 ms | Query selesai dalam waktu ≤ 600 ms | Lulus |
| --- | --- | --- | --- | --- | --- | --- |
| 4   | Query agregasi | 5000 record | SELECT COUNT(*) FROM pinjam | 400 ms | Query selesai dalam waktu ≤ 400 ms | Lulus |
| --- | --- | --- | --- | --- | --- | --- |
| 5   | Query INSERT bulk | 100 records | INSERT INTO buku VALUES (...) | 1000 ms | Data tersimpan dalam waktu ≤ 1 detik | Lulus |
| --- | --- | --- | --- | --- | --- | --- |

**Analisis :**

Database menunjukkan performa yang optimal dalam menjalankan berbagai jenis query. Waktu eksekusi semua query berada di bawah threshold yang ditetapkan, menunjukkan indeks database berfungsi dengan baik.

**3.7.4 Pengujian Concurrent User (Pengguna Bersamaan)**

Pengujian ini memastikan sistem dapat menangani beberapa pengguna yang melakukan operasi yang sama secara bersamaan tanpa terjadi konflik data.

| **No** | **Skenario Pengujian** | **Jumlah Pengguna** | **Operasi** | **Hasil yang Diharapkan** | **Status** |
| --- | --- | --- | --- | --- | --- |
| 1   | Login bersamaan | 10 pengguna | Login ke sistem | Semua pengguna berhasil login | Lulus |
| --- | --- | --- | --- | --- | --- |
| 2   | Pencarian data bersamaan | 10 pengguna | Mencari buku yang sama | Hasil pencarian akurat dan konsisten | Lulus |
| --- | --- | --- | --- | --- | --- |
| 3   | Input data bersamaan | 5 pengguna | Menambah buku berbeda | Semua data tersimpan dengan baik | Lulus |
| --- | --- | --- | --- | --- | --- |
| 4   | Peminjaman bersamaan | 5 pengguna | Meminjam buku yang sama | Stok berkurang sesuai jumlah transaksi | Lulus |
| --- | --- | --- | --- | --- | --- |
| 5   | Update status bersamaan | 3 pengguna | Update status pengembalian buku | Data konsisten, tidak ada duplikasi | Lulus |
| --- | --- | --- | --- | --- | --- |

**Analisis :**

Sistem menunjukkan kemampuan yang baik dalam menangani concurrent users. Mekanisme locking database dan transactional integrity berfungsi dengan baik, tidak ada data yang hilang atau duplikat dalam kondisi operasi bersamaan.

**3.7.5 Pengujian Penggunaan Memori (Memory Usage)**

Pengujian ini mengukur penggunaan memori sistem selama operasi normal dan dalam kondisi beban tinggi.

| **No** | **Skenario Pengujian** | **Kondisi** | **Batas Maksimal** | **Hasil yang Diharapkan** | **Status** |
| --- | --- | --- | --- | --- | --- |
| 1   | Idle state | Aplikasi berjalan tanpa aktivitas | 150 MB | Penggunaan memori ≤ 150 MB | Lulus |
| --- | --- | --- | --- | --- | --- |
| 2   | Normal operation | User melakukan operasi normal | 250 MB | Penggunaan memori ≤ 250 MB | Lulus |
| --- | --- | --- | --- | --- | --- |
| 3   | Generate report | Membuat laporan 1000+ record | 400 MB | Penggunaan memori ≤ 400 MB | Lulus |
| --- | --- | --- | --- | --- | --- |
| 4   | Multiple concurrent sessions | 20 pengguna aktif | 500 MB | Penggunaan memori ≤ 500 MB | Lulus |
| --- | --- | --- | --- | --- | --- |
| 5   | Memory leak test | Operasi berulang selama 1 jam | Stabil | Tidak terjadi peningkatan memori yang signifikan | Lulus |
| --- | --- | --- | --- | --- | --- |

**Analisis :**

Sistem menunjukkan manajemen memori yang efisien. Tidak terdeteksi memory leak dalam pengujian jangka panjang, dan penggunaan memori tetap dalam batas yang dapat diterima bahkan dengan beban pengguna yang tinggi.

**3.7.6 Pengujian Page Load Time (Waktu Muat Halaman)**

Pengujian ini mengukur waktu yang dibutuhkan untuk memuat halaman web secara lengkap termasuk semua resource (CSS, JavaScript, gambar).

| **No** | **Halaman** | **Ukuran Total** | **Target Load Time** | **Waktu Aktual** | **Status** |
| --- | --- | --- | --- | --- | --- |
| 1   | Login | 150 KB | 1 detik | 0.8 detik | Lulus |
| --- | --- | --- | --- | --- | --- |
| 2   | Dashboard | 300 KB | 2 detik | 1.5 detik | Lulus |
| --- | --- | --- | --- | --- | --- |
| 3   | Daftar Buku | 500 KB | 3 detik | 2.3 detik | Lulus |
| --- | --- | --- | --- | --- | --- |
| 4   | Daftar Anggota | 400 KB | 3 detik | 2.1 detik | Lulus |
| --- | --- | --- | --- | --- | --- |
| 5   | Form Peminjaman | 250 KB | 2 detik | 1.7 detik | Lulus |
| --- | --- | --- | --- | --- | --- |
| 6   | Laporan Transaksi | 800 KB | 5 detik | 3.8 detik | Lulus |
| --- | --- | --- | --- | --- | --- |

**Analisis :**

Seluruh halaman dapat dimuat dengan cepat dan memenuhi target waktu yang ditetapkan. Optimasi resource seperti minifikasi CSS/JavaScript dan kompresi gambar berkontribusi terhadap performa loading yang baik.

**3.7.7 Ringkasan Hasil Performance Testing**

| **Aspek Performance** | **Status** | **Catatan** |
| --- | --- | --- |
| Response Time | ✓ Lulus | Semua operasi merespons dalam waktu yang diterima |
| Load Testing | ✓ Lulus | Sistem stabil hingga 50 concurrent users |
| Database Query | ✓ Lulus | Performa query optimal dengan index yang tepat |
| Concurrent Users | ✓ Lulus | Tidak ada konflik data dalam operasi bersamaan |
| Memory Usage | ✓ Lulus | Manajemen memori efisien tanpa memory leak |
| Page Load Time | ✓ Lulus | Semua halaman dimuat dalam waktu yang baik |

**BAB V**

**PENUTUP**

**5.1 Kesimpulan**

Berdasarkan hasil Black Box Testing yang telah dilakukan terhadap aplikasi perpustakaan BookHive, dapat disimpulkan bahwa seluruh fitur utama sistem telah berjalan sesuai dengan kebutuhan fungsional yang telah ditentukan. Fitur pengelolaan buku, pengelolaan anggota, peminjaman buku, pengembalian buku, pencarian data, serta pelaporan transaksi berhasil dijalankan tanpa ditemukan kesalahan yang signifikan.

Selain itu, sistem mampu melakukan validasi terhadap data masukan sehingga dapat mencegah terjadinya penyimpanan data yang tidak valid. Mekanisme pengurangan stok buku, penghitungan denda keterlambatan, serta pengelolaan transaksi perpustakaan juga telah berfungsi dengan baik sesuai dengan aturan bisnis yang diterapkan.

Dari hasil pengujian performance, sistem menunjukkan performa yang optimal dalam berbagai aspek:

- **Response Time**: Semua fitur merespons dengan cepat (≤ 2-5 detik tergantung kompleksitas operasi)
- **Load Testing**: Sistem dapat menangani hingga 50 pengguna bersamaan dengan tetap responsif
- **Database Performance**: Query database dieksekusi dengan efisien tanpa bottleneck yang signifikan
- **Concurrent Operations**: Sistem berhasil menangani operasi bersamaan tanpa konflik data
- **Memory Management**: Penggunaan memori efisien tanpa ditemukan memory leak
- **Page Load Time**: Seluruh halaman dimuat dalam waktu optimal (0.8-3.8 detik)

Kesimpulannya, aplikasi BookHive telah memenuhi standar kualitas yang ditetapkan baik dari sisi fungsionalitas maupun performa, siap digunakan dalam lingkungan produksi.