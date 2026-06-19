**LAPORAN GRAY BOX TESTING MENGGUNAKAN TEKNIK ORTHOGONAL ARRAY TESTING PADA APLIKASI BOOKHIVE**

**Disusun Oleh :** 

20231310043 - Chelsea Aaliyah Yasmin

&nbsp;     20231310050 - Nuraeni Yusup 

&nbsp;     20231310053 - Risa Andriani

**TEKNIK INFORMATIKA**

**FAKULTAS TEKNIK KOMPUTER DAN SISTEM INFORMASI**

**UNIVERSITAS KEBANGSAAN REPUBLIK INDONESIA**

_Jln. Terusan Halimun No. 37, Lingkar Selatan, Lengkong, Bandung, Jawa Barat 40263_

**ABSTRAK**

Pengujian perangkat lunak merupakan tahapan penting dalam pengembangan sistem untuk memastikan bahwa seluruh fungsi aplikasi berjalan sesuai dengan kebutuhan pengguna. BookHive merupakan aplikasi perpustakaan digital berbasis web yang digunakan untuk mengelola data buku, anggota, peminjaman, dan pengembalian buku. Penelitian ini bertujuan untuk menguji kualitas fungsional aplikasi BookHive menggunakan metode Gray Box Testing dengan teknik Orthogonal Array Testing (OAT). Teknik OAT dipilih karena mampu mengurangi jumlah kombinasi pengujian tanpa mengurangi cakupan pengujian yang diperlukan. Pengujian dilakukan pada modul peminjaman buku dengan empat faktor utama yaitu status anggota, stok buku, jumlah buku yang dipinjam, dan validitas data buku. Hasil pengujian menunjukkan bahwa seluruh test case menghasilkan status PASS dengan tingkat keberhasilan sebesar 100%. Berdasarkan hasil tersebut, aplikasi BookHive dinyatakan mampu menangani berbagai kombinasi kondisi pengguna sesuai dengan kebutuhan sistem.

**BAB I**

**PENDAHULUAN**

**1.1 Latar Belakang**

Perkembangan teknologi informasi telah membawa perubahan yang signifikan dalam berbagai bidang, termasuk bidang pendidikan dan pengelolaan informasi. Salah satu implementasi teknologi informasi yang berkembang pesat adalah sistem perpustakaan digital. Sistem perpustakaan digital memungkinkan proses pengelolaan data buku, anggota, peminjaman, dan pengembalian dilakukan secara terkomputerisasi sehingga meningkatkan efektivitas dan efisiensi pelayanan.

BookHive merupakan aplikasi perpustakaan digital berbasis web yang dirancang untuk membantu proses administrasi perpustakaan. Sistem ini menyediakan berbagai fitur seperti pengelolaan data anggota, pengelolaan data buku, transaksi peminjaman, transaksi pengembalian, serta pengelolaan stok buku. Dengan adanya sistem tersebut, proses pencatatan yang sebelumnya dilakukan secara manual dapat dilakukan secara otomatis dan terintegrasi dengan database.

Meskipun sistem telah dikembangkan dengan berbagai fitur, kualitas perangkat lunak tetap harus diuji untuk memastikan bahwa seluruh fungsi berjalan sesuai dengan kebutuhan pengguna. Kesalahan pada sistem dapat menyebabkan kehilangan data, ketidaksesuaian transaksi, maupun gangguan terhadap pelayanan perpustakaan.

Gray Box Testing merupakan salah satu metode pengujian perangkat lunak yang menggabungkan pendekatan Black Box Testing dan White Box Testing. Penguji memiliki sebagian informasi mengenai struktur internal sistem seperti database dan alur proses, tetapi pengujian tetap dilakukan dari sudut pandang pengguna.

Dalam penelitian ini digunakan teknik Orthogonal Array Testing yang merupakan salah satu teknik Gray Box Testing. Teknik ini digunakan untuk mengurangi jumlah kombinasi pengujian tanpa mengurangi efektivitas pengujian. Dengan demikian, proses pengujian menjadi lebih efisien namun tetap mampu menemukan potensi kesalahan pada sistem.

Berdasarkan uraian tersebut, dilakukan penelitian mengenai penerapan Gray Box Testing menggunakan teknik Orthogonal Array Testing pada aplikasi BookHive untuk mengevaluasi kualitas fungsional sistem perpustakaan digital berbasis web.

**1.2 Identifikasi Masalah**

1.  Belum diketahui apakah seluruh fitur pada aplikasi BookHive berjalan sesuai kebutuhan.
2.  Belum diketahui apakah hubungan antara data anggota, data buku, dan transaksi peminjaman berjalan dengan baik.
3.  Diperlukan metode pengujian yang mampu menguji berbagai kombinasi kondisi sistem secara efisien.
4.  Belum diketahui tingkat keberhasilan aplikasi berdasarkan pengujian yang sistematis.

**1.3 Rumusan Masalah**

1.  Bagaimana penerapan Gray Box Testing menggunakan teknik Orthogonal Array Testing pada aplikasi BookHive?
2.  Apakah kombinasi variabel pada sistem menghasilkan output yang sesuai?
3.  Bagaimana tingkat keberhasilan aplikasi berdasarkan hasil pengujian?

**1.4 Tujuan Penelitian**

1.  Menerapkan metode Gray Box Testing pada aplikasi BookHive.
2.  Mengimplementasikan teknik Orthogonal Array Testing dalam proses pengujian.
3.  Menguji hubungan antar variabel pada sistem.
4.  Mengetahui tingkat keberhasilan aplikasi berdasarkan hasil pengujian.

**1.5 Manfaat Penelitian**

**Manfaat Teoritis**

Memberikan referensi mengenai penerapan Gray Box Testing menggunakan teknik Orthogonal Array Testing pada aplikasi berbasis web.

**Manfaat Praktis**

1.  Membantu pengembang mengevaluasi kualitas aplikasi.
2.  Memastikan sistem berjalan sesuai kebutuhan pengguna.
3.  Menjadi dasar pengembangan aplikasi pada masa mendatang.

**1.6 Batasan Masalah**

1.  Pengujian dilakukan pada aplikasi BookHive.
2.  Metode yang digunakan adalah Gray Box Testing.
3.  Teknik pengujian yang digunakan adalah Orthogonal Array Testing.
4.  Pengujian difokuskan pada modul data anggota, data buku, peminjaman, dan pengembalian buku.

**BAB II**

**LANDASAN TEORI**

**2.1 Pengujian Perangkat Lunak**

Pengujian perangkat lunak merupakan proses untuk mengevaluasi kualitas perangkat lunak dengan tujuan menemukan kesalahan serta memastikan sistem bekerja sesuai kebutuhan.

**2.2 Gray Box Testing**

Gray Box Testing adalah metode pengujian yang menggabungkan pendekatan White Box Testing dan Black Box Testing. Penguji mengetahui sebagian struktur internal sistem seperti database, tetapi tetap melakukan pengujian dari sisi pengguna.

**Kelebihan Gray Box Testing**

1.  Menguji fungsi dan struktur sistem secara bersamaan.
2.  Efektif menemukan kesalahan integrasi.
3.  Cocok digunakan pada aplikasi web.

**Kekurangan Gray Box Testing**

1.  Membutuhkan pemahaman sistem.
2.  Tidak menguji seluruh kode program.

**2.3 Orthogonal Array Testing**

Orthogonal Array Testing merupakan teknik pengujian yang digunakan untuk memilih kombinasi test case secara sistematis sehingga jumlah pengujian dapat dikurangi tanpa mengurangi cakupan pengujian.

**Keunggulan Orthogonal Array Testing**

1.  Menghemat waktu pengujian.
2.  Mengurangi jumlah test case.
3.  Tetap mencakup kombinasi variabel penting.

**2.4 Website**

Website adalah kumpulan halaman yang saling terhubung dan dapat diakses melalui jaringan internet menggunakan browser.

**2.5 Database MySQL**

MySQL merupakan sistem manajemen basis data yang digunakan untuk menyimpan data anggota, buku, peminjaman, dan pengembalian pada aplikasi BookHive.

**BAB III**

**ANALISIS SISTEM**

**3.1 Deskripsi Sistem**

BookHive merupakan aplikasi perpustakaan digital berbasis web yang digunakan untuk mengelola data perpustakaan secara terintegrasi.

**3.2 Modul Sistem**

1.  Modul Anggota
2.  Modul Buku
3.  Modul Peminjaman
4.  Modul Pengembalian
5.  Modul Stok Buku

**3.3 Faktor Pengujian**

**Faktor A – Status Anggota**

- A1 = Aktif
- A2 = Tidak Aktif

**Faktor B – Stok Buku**

- B1 = Tersedia
- B2 = Habis

**Faktor C – Jumlah Buku Dipinjam**

- C1 = ≤ 3 Buku
- C2 = > 3 Buku

**Faktor D – Validitas Data Buku**

- D1 = Valid
- D2 = Tidak Valid

**BAB IV**

**IMPLEMENTASI DAN HASIL PENGUJIAN**

**4.1 Desain Orthogonal Array L8**

|     |     |     |     |     |
| --- | --- | --- | --- | --- |
| **Test Case** | **A** | **B** | **C** | **D** |
| TC01 | A1  | B1  | C1  | D1  |
| TC02 | A1  | B1  | C2  | D2  |
| TC03 | A1  | B2  | C1  | D2  |
| TC04 | A1  | B2  | C2  | D1  |
| TC05 | A2  | B1  | C1  | D2  |
| TC06 | A2  | B1  | C2  | D1  |
| TC07 | A2  | B2  | C1  | D1  |
| TC08 | A2  | B2  | C2  | D2  |

**4.2 Hasil Pengujian**

|     |     |     |     |
| --- | --- | --- | --- |
| Test Case | Hasil Diharapkan | Hasil Aktual | Status |
| TC01 | Berhasil | Berhasil | PASS |
| TC02 | Ditolak | Ditolak | PASS |
| TC03 | Ditolak | Ditolak | PASS |
| TC04 | Ditolak | Ditolak | PASS |
| TC05 | Ditolak | Ditolak | PASS |
| TC06 | Ditolak | Ditolak | PASS |
| TC07 | Ditolak | Ditolak | PASS |
| TC08 | Ditolak | Ditolak | PASS |

**4.3 Rekapitulasi Hasil**

Total Test Case : 8

PASS : 8

FAIL : 0

Persentase Keberhasilan : 100%

**BAB V**

**KESIMPULAN DAN SARAN**

**5.1 Kesimpulan**

Berdasarkan hasil Gray Box Testing menggunakan teknik Orthogonal Array Testing pada aplikasi BookHive, seluruh test case menghasilkan status PASS dengan tingkat keberhasilan sebesar 100%. Hal ini menunjukkan bahwa sistem mampu menangani berbagai kombinasi kondisi pengguna sesuai dengan aturan bisnis yang diterapkan.

**5.2 Saran**

1.  Menambahkan fitur autentikasi pengguna.
2.  Menambahkan audit log transaksi.
3.  Menambahkan notifikasi keterlambatan pengembalian buku.
4.  Melakukan pengujian lanjutan menggunakan Security Testing dan Regression Testing.