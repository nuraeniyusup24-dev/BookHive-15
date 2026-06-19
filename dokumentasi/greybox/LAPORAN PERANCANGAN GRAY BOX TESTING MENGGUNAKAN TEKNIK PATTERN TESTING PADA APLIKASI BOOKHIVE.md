**LAPORAN PERANCANGAN GRAY BOX TESTING MENGGUNAKAN TEKNIK PATTERN TESTING PADA APLIKASI BOOKHIVE**

**Disusun Oleh :** 

20231310043 - Chelsea Aaliyah Yasmin

&nbsp;     20231310050 - Nuraeni Yusup 

&nbsp;     20231310053 - Risa Andriani

**TEKNIK INFORMATIKA**

**FAKULTAS TEKNIK KOMPUTER DAN SISTEM INFORMASI**

**UNIVERSITAS KEBANGSAAN REPUBLIK INDONESIA**

_Jln. Terusan Halimun No. 37, Lingkar Selatan, Lengkong, Bandung, Jawa Barat 40263_

**ABSTRAK**

Pengujian perangkat lunak merupakan salah satu tahapan penting dalam pengembangan sistem untuk memastikan bahwa aplikasi dapat berjalan sesuai dengan kebutuhan pengguna. BookHive merupakan aplikasi perpustakaan digital berbasis web yang digunakan untuk mengelola data anggota, data buku, transaksi peminjaman, dan pengembalian buku. Penelitian ini bertujuan untuk merancang pengujian perangkat lunak menggunakan metode Gray Box Testing dengan teknik Pattern Testing pada aplikasi BookHive. Pattern Testing digunakan untuk mengidentifikasi pola-pola kesalahan yang berpotensi muncul pada sistem berdasarkan hubungan antara input, proses, database, dan output. Hasil penelitian berupa rancangan skenario pengujian yang dapat digunakan sebagai acuan dalam pelaksanaan pengujian aktual. Skenario yang dirancang meliputi validasi data anggota, validasi data buku, transaksi peminjaman, dan transaksi pengembalian buku.

**BAB I**

**PENDAHULUAN**

**1.1 Latar Belakang**

Perkembangan teknologi informasi telah memberikan pengaruh yang besar terhadap berbagai bidang kehidupan, termasuk bidang pendidikan dan perpustakaan. Pengelolaan perpustakaan yang sebelumnya dilakukan secara manual kini mulai beralih ke sistem digital untuk meningkatkan efisiensi dan efektivitas layanan. Sistem perpustakaan digital memungkinkan pengelolaan data buku, anggota, peminjaman, dan pengembalian dilakukan secara terkomputerisasi sehingga meminimalkan kesalahan pencatatan dan mempercepat proses pelayanan.

BookHive merupakan salah satu aplikasi perpustakaan digital berbasis web yang dikembangkan untuk membantu pengelolaan data perpustakaan secara terintegrasi. Aplikasi ini memiliki berbagai fitur seperti pengelolaan data anggota, data buku, peminjaman buku, pengembalian buku, serta pengelolaan stok buku. Dengan adanya fitur tersebut, proses administrasi perpustakaan dapat dilakukan dengan lebih mudah dan efisien.

Meskipun sistem telah dikembangkan dengan berbagai fitur, kualitas perangkat lunak tetap harus diuji untuk memastikan bahwa seluruh fungsi sistem berjalan sesuai dengan kebutuhan pengguna. Pengujian perangkat lunak dilakukan untuk menemukan kesalahan, kelemahan, dan potensi kegagalan sistem sebelum digunakan secara luas.

Salah satu metode pengujian yang dapat digunakan adalah Gray Box Testing. Gray Box Testing merupakan metode pengujian yang menggabungkan pendekatan Black Box Testing dan White Box Testing. Pada metode ini, penguji memiliki sebagian informasi mengenai struktur internal sistem seperti database dan alur proses, namun pengujian tetap dilakukan dari sudut pandang pengguna.

Dalam penelitian ini digunakan teknik Pattern Testing. Teknik ini berfokus pada identifikasi pola kesalahan yang sering terjadi pada suatu sistem. Dengan mengetahui pola kesalahan yang mungkin muncul, pengembang dapat menyusun skenario pengujian yang lebih efektif dan terarah.

Berdasarkan uraian tersebut, dilakukan penelitian dengan judul "Perancangan Gray Box Testing Menggunakan Teknik Pattern Testing Pada Aplikasi BookHive Berbasis Web".

**1.2 Identifikasi Masalah**

Berdasarkan latar belakang yang telah dijelaskan, dapat diidentifikasi beberapa permasalahan sebagai berikut:

1.  Belum diketahui pola kesalahan yang berpotensi muncul pada aplikasi BookHive.
2.  Belum tersedia rancangan pengujian yang dapat digunakan untuk menguji pola kesalahan pada sistem.
3.  Diperlukan metode pengujian yang mampu menguji hubungan antara input, proses, database, dan output.
4.  Belum diketahui bagaimana penerapan Pattern Testing pada aplikasi BookHive.

**1.3 Rumusan Masalah**

1.  Bagaimana penerapan Gray Box Testing menggunakan teknik Pattern Testing pada aplikasi BookHive?
2.  Pola kesalahan apa saja yang berpotensi muncul pada sistem?
3.  Bagaimana rancangan skenario pengujian berdasarkan pola kesalahan yang ditemukan?

**1.4 Tujuan Penelitian**

1.  Menerapkan metode Gray Box Testing pada aplikasi BookHive.
2.  Mengidentifikasi pola kesalahan yang berpotensi terjadi pada sistem.
3.  Menyusun skenario pengujian menggunakan Pattern Testing.
4.  Menyediakan rancangan pengujian yang dapat digunakan sebagai acuan pengujian sistem.

**1.5 Manfaat Penelitian**

**1.5.1 Manfaat Teoritis**

Penelitian ini diharapkan dapat menjadi referensi dalam penerapan Gray Box Testing menggunakan teknik Pattern Testing pada aplikasi berbasis web.

**1.5.2 Manfaat Praktis**

**Bagi Pengembang**

1.  Membantu mengidentifikasi potensi kesalahan sistem.
2.  Menjadi dasar pelaksanaan pengujian perangkat lunak.
3.  Membantu meningkatkan kualitas aplikasi.

**Bagi Pengguna**

1.  Memberikan keyakinan bahwa sistem telah dirancang untuk menangani berbagai kesalahan.
2.  Meningkatkan kualitas layanan perpustakaan digital.

**Bagi Peneliti**

1.  Menambah wawasan mengenai pengujian perangkat lunak.
2.  Menjadi sarana penerapan ilmu yang diperoleh selama perkuliahan.

**1.6 Batasan Masalah**

1.  Pengujian dilakukan pada aplikasi BookHive.
2.  Metode yang digunakan adalah Gray Box Testing.
3.  Teknik yang digunakan adalah Pattern Testing.
4.  Modul yang diuji meliputi data anggota, data buku, peminjaman, dan pengembalian buku.
5.  Penelitian berfokus pada perancangan pengujian, bukan hasil pengujian aktual.

**1.7 Metodologi Penelitian**

1.  Studi Literatur
2.  Analisis Sistem
3.  Identifikasi Pola Kesalahan
4.  Penyusunan Skenario Pengujian
5.  Dokumentasi Hasil

**BAB II**

**LANDASAN TEORI**

**2.1 Pengujian Perangkat Lunak**

Pengujian perangkat lunak merupakan proses yang dilakukan untuk mengevaluasi kualitas perangkat lunak serta memastikan bahwa sistem bekerja sesuai dengan kebutuhan pengguna.

**2.2 Gray Box Testing**

Gray Box Testing adalah metode pengujian yang menggabungkan konsep Black Box Testing dan White Box Testing. Penguji mengetahui sebagian struktur internal sistem namun tetap melakukan pengujian dari sudut pandang pengguna.

**Kelebihan Gray Box Testing**

1.  Menguji fungsi dan struktur sistem secara bersamaan.
2.  Efektif menemukan kesalahan integrasi.
3.  Cocok digunakan pada aplikasi berbasis web.

**Kekurangan Gray Box Testing**

1.  Membutuhkan pemahaman sistem.
2.  Tidak menguji seluruh kode program.

**2.3 Pattern Testing**

Pattern Testing merupakan teknik pengujian yang berfokus pada pola kesalahan yang sering terjadi dalam sistem. Teknik ini bertujuan untuk memastikan bahwa sistem mampu menangani kesalahan yang berulang.

**Tujuan Pattern Testing**

1.  Mengidentifikasi pola kesalahan.
2.  Menguji kemampuan sistem menangani kesalahan.
3.  Mengurangi kemungkinan bug yang sama muncul kembali.

**2.4 Website**

Website merupakan kumpulan halaman yang saling terhubung dan dapat diakses melalui browser menggunakan jaringan internet.

**2.5 Database MySQL**

MySQL merupakan sistem manajemen basis data yang digunakan untuk menyimpan dan mengelola data aplikasi BookHive.

**BAB III**

**ANALISIS SISTEM**

**3.1 Deskripsi Sistem**

BookHive merupakan aplikasi perpustakaan digital berbasis web yang digunakan untuk mengelola data perpustakaan secara terkomputerisasi.

**3.2 Fitur Sistem**

1.  Pengelolaan Data Anggota
2.  Pengelolaan Data Buku
3.  Peminjaman Buku
4.  Pengembalian Buku
5.  Pengelolaan Stok Buku

**3.3 Modul Yang Diuji**

|     |     |
| --- | --- |
| No  | Modul |
| 1   | Data Anggota |
| 2   | Data Buku |
| 3   | Peminjaman Buku |
| 4   | Pengembalian Buku |
| 5   | Integrasi Sistem |

**3.4 Identifikasi Pola Kesalahan**

| **Kode** | **Pola Kesalahan** |
| --- | --- |
| P01 | Data anggota kosong |
| P02 | Data buku kosong |
| P03 | Data buku tidak ditemukan |
| P04 | Stok buku habis |
| P05 | Jumlah peminjaman melebihi batas |
| P06 | Pengembalian tidak valid |
| P07 | Data duplikat |
| P08 | Format data tidak sesuai |

**BAB IV**

**PERANCANGAN PATTERN TESTING**

**4.1 Skenario Pengujian**

**PT-01 Data Anggota Kosong**

Tujuan:  
Memastikan sistem melakukan validasi terhadap data anggota yang kosong.

Input:  
Seluruh field anggota dikosongkan.

Hasil Yang Diharapkan:  
Sistem menolak penyimpanan data dan menampilkan pesan validasi.

**PT-02 Data Buku Kosong**

Tujuan:  
Memastikan sistem melakukan validasi terhadap data buku.

Input:  
Seluruh field buku dikosongkan.

Hasil Yang Diharapkan:  
Sistem menolak penyimpanan data.

**PT-03 Data Buku Tidak Ditemukan**

Tujuan:  
Memastikan sistem mampu menangani pencarian data yang tidak tersedia.

Input:  
Judul buku yang tidak terdapat pada database.

Hasil Yang Diharapkan:  
Sistem menampilkan informasi bahwa data tidak ditemukan.

**PT-04 Stok Buku Habis**

Tujuan:  
Memastikan sistem tidak mengizinkan peminjaman buku yang stoknya habis.

Input:  
Buku dengan stok 0.

Hasil Yang Diharapkan:  
Transaksi peminjaman ditolak.

**PT-05 Jumlah Buku Melebihi Batas**

Tujuan:  
Memastikan sistem menerapkan aturan batas maksimal peminjaman.

Input:  
Jumlah buku yang dipinjam lebih dari ketentuan.

Hasil Yang Diharapkan:  
Sistem menolak transaksi.

**PT-06 Pengembalian Tidak Valid**

Tujuan:  
Memastikan sistem melakukan validasi transaksi pengembalian.

Input:  
ID transaksi yang tidak tersedia.

Hasil Yang Diharapkan:  
Sistem menolak proses pengembalian.

**PT-07 Data Duplikat**

Tujuan:  
Memastikan sistem tidak menerima data yang sama.

Input:  
Data anggota atau buku yang sudah pernah disimpan.

Hasil Yang Diharapkan:  
Sistem menolak penyimpanan data.

**PT-08 Format Data Tidak Sesuai**

Tujuan:  
Memastikan sistem melakukan validasi format data.

Input:  
Data yang tidak sesuai format.

Hasil Yang Diharapkan:  
Sistem menampilkan pesan kesalahan.

**4.2 Rekapitulasi Skenario Pengujian**

| **Kode** | **Modul** | **Hasil Yang Diharapkan** |
| --- | --- | --- |
| PT-01 | Anggota | Validasi data kosong |
| PT-02 | Buku | Validasi data kosong |
| PT-03 | Buku | Data tidak ditemukan |
| PT-04 | Peminjaman | Tolak stok habis |
| PT-05 | Peminjaman | Tolak melebihi batas |
| PT-06 | Pengembalian | Tolak transaksi tidak valid |
| PT-07 | Anggota/Buku | Tolak data duplikat |
| PT-08 | Anggota/Buku | Validasi format data |

**4.3 Analisis Pengujian**

Berdasarkan pola kesalahan yang telah diidentifikasi, diperoleh delapan skenario pengujian yang dapat digunakan sebagai acuan dalam pelaksanaan Pattern Testing pada aplikasi BookHive. Setiap skenario dirancang untuk menguji kemampuan sistem dalam menangani kesalahan yang berpotensi terjadi selama penggunaan aplikasi.

**BAB V**

**KESIMPULAN DAN SARAN**

**5.1 Kesimpulan**

Berdasarkan perancangan Gray Box Testing menggunakan teknik Pattern Testing pada aplikasi BookHive, diperoleh delapan skenario pengujian yang mewakili pola kesalahan yang berpotensi muncul selama penggunaan sistem. Skenario tersebut dapat digunakan sebagai pedoman dalam pelaksanaan pengujian aktual untuk mengevaluasi kualitas aplikasi.

Perancangan pengujian yang telah dibuat mencakup validasi data anggota, validasi data buku, transaksi peminjaman, dan transaksi pengembalian. Dengan adanya rancangan ini, proses pengujian dapat dilakukan secara lebih terarah dan sistematis.

**5.2 Saran**

1.  Melaksanakan pengujian aktual berdasarkan skenario yang telah disusun.
2.  Mendokumentasikan hasil pengujian dalam bentuk screenshot dan laporan.
3.  Melakukan perbaikan apabila ditemukan ketidaksesuaian antara hasil aktual dan hasil yang diharapkan.
4.  Mengembangkan penelitian menggunakan teknik Gray Box Testing lainnya seperti Matrix Testing, Regression Testing, dan Orthogonal Array Testing.

**DAFTAR PUSTAKA**

Pressman, R. S. (2019). Software Engineering: A Practitioner's Approach. McGraw-Hill.

Sommerville, I. (2016). Software Engineering (10th Edition). Pearson Education.

Myers, G. J. (2017). The Art of Software Testing. Wiley.

Jorgensen, P. C. (2014). Software Testing: A Craftsman's Approach. CRC Press.

IEEE. (2021). IEEE Standard for Software and System Test Documentation.