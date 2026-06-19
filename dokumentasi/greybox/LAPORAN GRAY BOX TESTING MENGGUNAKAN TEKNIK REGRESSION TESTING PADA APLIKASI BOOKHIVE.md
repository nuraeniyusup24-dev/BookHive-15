**LAPORAN GRAY BOX TESTING MENGGUNAKAN TEKNIK REGRESSION TESTING PADA APLIKASI BOOKHIVE**

**Disusun Oleh :** 

20231310043 - Chelsea Aaliyah Yasmin

&nbsp;     20231310050 - Nuraeni Yusup 

&nbsp;     20231310053 - Risa Andriani

**TEKNIK INFORMATIKA**

**FAKULTAS TEKNIK KOMPUTER DAN SISTEM INFORMASI**

**UNIVERSITAS KEBANGSAAN REPUBLIK INDONESIA**

_Jln. Terusan Halimun No. 37, Lingkar Selatan, Lengkong, Bandung, JawaBarat_

_40263_

**ABSTRAK**

Pengujian perangkat lunak merupakan proses penting untuk memastikan bahwa sistem berjalan sesuai dengan kebutuhan pengguna. BookHive merupakan aplikasi perpustakaan digital berbasis web yang digunakan untuk mengelola data buku, data anggota, transaksi peminjaman, dan pengembalian buku. Penelitian ini menggunakan metode Gray Box Testing dengan teknik Regression Testing untuk memastikan bahwa perubahan atau perbaikan sistem tidak mempengaruhi fungsi yang telah berjalan sebelumnya. Pengujian dilakukan pada modul data anggota, data buku, peminjaman buku, pengembalian buku, dan integrasi sistem. Hasil pengujian menunjukkan bahwa seluruh fungsi sistem berjalan sesuai dengan kebutuhan dengan tingkat keberhasilan sebesar 100%. Berdasarkan hasil tersebut, aplikasi BookHive dinyatakan stabil dan layak digunakan.

**BAB I**

**PENDAHULUAN**

**1.1 Latar Belakang**

Perkembangan teknologi informasi telah mendorong berbagai organisasi untuk memanfaatkan sistem informasi dalam mendukung aktivitas operasionalnya. Salah satu implementasi teknologi informasi adalah sistem perpustakaan digital yang memungkinkan pengelolaan data buku dan transaksi perpustakaan dilakukan secara terkomputerisasi.

BookHive merupakan aplikasi perpustakaan digital berbasis web yang menyediakan layanan pengelolaan buku, pengelolaan anggota, peminjaman buku, dan pengembalian buku. Sistem ini dirancang untuk meningkatkan efisiensi pengelolaan perpustakaan dibandingkan dengan metode manual.

Dalam pengembangan perangkat lunak, perubahan sistem sering dilakukan untuk memperbaiki kesalahan, menambah fitur baru, atau meningkatkan performa aplikasi. Namun perubahan tersebut dapat menyebabkan fungsi yang sebelumnya berjalan dengan baik menjadi mengalami gangguan. Oleh karena itu diperlukan Regression Testing untuk memastikan bahwa seluruh fungsi lama tetap berjalan setelah dilakukan perubahan pada sistem.

Regression Testing dipilih karena mampu mengevaluasi kembali fungsi-fungsi utama sistem sehingga kualitas aplikasi dapat dipertahankan. Melalui pengujian ini diharapkan aplikasi BookHive tetap stabil dan memenuhi kebutuhan pengguna.

**1.2 Identifikasi Masalah**

1.  Belum diketahui apakah perubahan sistem mempengaruhi fungsi yang sudah ada.
2.  Belum diketahui apakah modul yang saling terhubung tetap berjalan dengan baik setelah perubahan.
3.  Diperlukan metode pengujian untuk memastikan stabilitas aplikasi.

**1.3 Rumusan Masalah**

1.  Bagaimana penerapan Regression Testing pada aplikasi BookHive?
2.  Apakah seluruh modul tetap berjalan setelah dilakukan perubahan sistem?
3.  Bagaimana tingkat keberhasilan aplikasi berdasarkan hasil Regression Testing?

**1.4 Tujuan Penelitian**

1.  Mengimplementasikan Regression Testing pada aplikasi BookHive.
2.  Menguji fungsi utama sistem setelah dilakukan perubahan.
3.  Mengetahui tingkat keberhasilan aplikasi.

**1.5 Manfaat Penelitian**

**Manfaat Teoritis**

Menambah referensi mengenai penerapan Regression Testing pada aplikasi berbasis web.

**Manfaat Praktis**

1.  Membantu pengembang menjaga stabilitas sistem.
2.  Memastikan fungsi lama tetap berjalan.
3.  Menjadi dasar evaluasi pengembangan aplikasi.

**1.6 Batasan Masalah**

1.  Pengujian dilakukan pada aplikasi BookHive.
2.  Metode yang digunakan adalah Gray Box Testing.
3.  Teknik yang digunakan adalah Regression Testing.
4.  Modul yang diuji meliputi data anggota, data buku, peminjaman, pengembalian, dan integrasi sistem.

**BAB II**

**LANDASAN TEORI**

**2.1 Pengujian Perangkat Lunak**

Pengujian perangkat lunak adalah proses untuk mengevaluasi kualitas sistem dan memastikan bahwa sistem berfungsi sesuai kebutuhan pengguna.

**2.2 Gray Box Testing**

Gray Box Testing merupakan metode pengujian yang menggabungkan pendekatan Black Box Testing dan White Box Testing. Penguji mengetahui sebagian struktur internal sistem seperti database dan alur proses, tetapi pengujian dilakukan dari sisi pengguna.

**Kelebihan Gray Box Testing**

1.  Menguji fungsi dan struktur sistem secara bersamaan.
2.  Efektif menemukan kesalahan integrasi.
3.  Cocok untuk aplikasi berbasis web.

**Kekurangan Gray Box Testing**

1.  Membutuhkan pemahaman terhadap sistem.
2.  Tidak menguji seluruh kode program.

**2.3 Regression Testing**

Regression Testing adalah teknik pengujian yang dilakukan setelah adanya perubahan sistem untuk memastikan bahwa fungsi yang telah ada sebelumnya tetap berjalan dengan baik.

**Tujuan Regression Testing**

1.  Menjaga stabilitas sistem.
2.  Mengidentifikasi bug akibat perubahan sistem.
3.  Memastikan integrasi antar modul tetap berjalan.

**Jenis Regression Testing**

1.  Corrective Regression Testing
2.  Progressive Regression Testing
3.  Selective Regression Testing
4.  Complete Regression Testing

**2.4 Website**

Website merupakan kumpulan halaman yang dapat diakses menggunakan browser melalui jaringan internet.

**2.5 Database MySQL**

MySQL adalah sistem manajemen basis data relasional yang digunakan untuk menyimpan data aplikasi BookHive.

**BAB III**

**ANALISIS SISTEM**

**3.1 Deskripsi Sistem**

BookHive merupakan aplikasi perpustakaan digital yang digunakan untuk membantu proses administrasi perpustakaan secara terkomputerisasi.

**3.2 Fitur Sistem**

1.  Manajemen Data Anggota
2.  Manajemen Data Buku
3.  Transaksi Peminjaman Buku
4.  Transaksi Pengembalian Buku
5.  Manajemen Stok Buku

**3.3 Modul Yang Diuji**

|     |     |
| --- | --- |
| No  | Modul |
| 1   | Data Anggota |
| 2   | Data Buku |
| 3   | Peminjaman Buku |
| 4   | Pengembalian Buku |
| 5   | Integrasi Sistem |

**3.4 Perubahan Sistem Yang Diuji**

1.  Penambahan validasi stok buku.
2.  Perbaikan proses peminjaman.
3.  Perbaikan proses pengembalian.
4.  Optimalisasi penyimpanan data anggota.

**BAB IV**

**IMPLEMENTASI DAN HASIL REGRESSION TESTING**

**4.1 Pengujian Modul Data Anggota**

|     |     |     |     |
| --- | --- | --- | --- |
| ID  | Skenario | Hasil Diharapkan | Status |
| RA-01 | Tambah anggota | Data tersimpan | PASS |
| RA-02 | Edit anggota | Data berubah | PASS |
| RA-03 | Hapus anggota | Data terhapus | PASS |

**4.2 Pengujian Modul Data Buku**

|     |     |     |     |
| --- | --- | --- | --- |
| ID  | Skenario | Hasil Diharapkan | Status |
| RB-01 | Tambah buku | Data tersimpan | PASS |
| RB-02 | Edit buku | Data berubah | PASS |
| RB-03 | Hapus buku | Data terhapus | PASS |

**4.3 Pengujian Modul Peminjaman**

|     |     |     |     |
| --- | --- | --- | --- |
| ID  | Skenario | Hasil Diharapkan | Status |
| RP-01 | Pinjam buku stok tersedia | Berhasil | PASS |
| RP-02 | Pinjam buku stok habis | Ditolak | PASS |
| RP-03 | Pinjam > 3 buku | Ditolak | PASS |
| RP-04 | Pinjam tepat 3 buku | Berhasil | PASS |

**4.4 Pengujian Modul Pengembalian**

|     |     |     |     |
| --- | --- | --- | --- |
| ID  | Skenario | Hasil Diharapkan | Status |
| RK-01 | Pengembalian buku | Berhasil | PASS |
| RK-02 | Update stok buku | Berhasil | PASS |
| RK-03 | Simpan riwayat pengembalian | Berhasil | PASS |

**4.5 Pengujian Integrasi Sistem**

|     |     |     |
| --- | --- | --- |
| Modul Asal | Modul Tujuan | Status |
| Anggota | Peminjaman | PASS |
| Buku | Peminjaman | PASS |
| Peminjaman | Pengembalian | PASS |
| Pengembalian | Stok Buku | PASS |

**4.6 Rekapitulasi Hasil Pengujian**

|     |     |     |     |
| --- | --- | --- | --- |
| Modul | Test Case | Pass | Fail |
| Data Anggota | 3   | 3   | 0   |
| Data Buku | 3   | 3   | 0   |
| Peminjaman | 4   | 4   | 0   |
| Pengembalian | 3   | 3   | 0   |
| Integrasi Sistem | 4   | 4   | 0   |
| Total | 17  | 17  | 0   |

Persentase Keberhasilan:

(17/17) × 100% = 100%

**4.7 Analisis Hasil Pengujian**

Berdasarkan hasil pengujian, seluruh modul yang diuji menunjukkan hasil sesuai dengan kebutuhan sistem. Perubahan yang dilakukan tidak menyebabkan kerusakan pada fungsi yang sebelumnya telah berjalan. Modul peminjaman dan pengembalian mampu menjalankan validasi stok buku dengan baik, sedangkan integrasi antar modul tetap berjalan sesuai alur sistem.

**BAB V**

**KESIMPULAN DAN SARAN**

**5.1 Kesimpulan**

Berdasarkan hasil Gray Box Testing menggunakan teknik Regression Testing pada aplikasi BookHive, seluruh fungsi utama sistem berhasil berjalan sesuai dengan kebutuhan pengguna. Dari 17 test case yang dilakukan, seluruhnya memperoleh status PASS dengan tingkat keberhasilan sebesar 100%.

Hasil tersebut menunjukkan bahwa perubahan yang dilakukan pada sistem tidak menyebabkan kerusakan pada fungsi yang telah ada sebelumnya. Dengan demikian, aplikasi BookHive dinyatakan stabil dan layak digunakan sebagai sistem perpustakaan digital.

**5.2 Saran**

1.  Menambahkan fitur backup database otomatis.
2.  Menambahkan audit log aktivitas pengguna.
3.  Melakukan pengujian keamanan secara berkala.
4.  Mengimplementasikan automated regression testing pada pengembangan berikutnya.

**DAFTAR PUSTAKA**

Pressman, R. S. (2019). Software Engineering: A Practitioner's Approach. New York: McGraw-Hill.

Sommerville, I. (2016). Software Engineering (10th Edition). Pearson Education.

Jorgensen, P. C. (2014). Software Testing: A Craftsman's Approach. CRC Press.

Rothermel, G., & Harrold, M. J. (2018). Regression Test Selection Techniques. ACM Computing Surveys.

IEEE. (2021). IEEE Standard for Software and System Test Documentation.