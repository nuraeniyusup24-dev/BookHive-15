## **LAPORAN IMPLEMENTASI REST API** 

## **SISTEM ANALISIS DATA INSTAGRAM BRAND MAKE UP** 

## Disusun Oleh : 

Chelsea Aaliyah Y ( 20231310043 ) Nuraeni Yusup       ( 20231310050 ) Risa Andriani     ( 20231310053 ) 

**PROGRAM STUDI TEKNIK INFORMATIKA** 

**FAKULTAS ILMU KOMPUTER DAN SISTEM INFORMASI UNIVERSITAS KEBANGSAAN REPUBLIK INDONESIA 2026** 

## **BAB I PENDAHULUAN** 

## 1.1 Latar Belakang 

Perkembangan media sosial saat ini sangat pesat, pltafrom seperti instagram yang menjadi salah satu media utama dalam promosi produk. Banyak brand make up seperti Skintific, Glad2Glow, Sea Makeup, Somethinc dan Facetology, memanfaatkan instagram untuk meningkatkan penjualan dan popularitas produk mereka. 

Dalam dunia digital marketing, tingkat “ kehype-an” suatu brand dapat dilihat dari interaksi pengguna seperti jumlah like, komentar, dan share pada postingan mereka. Oleh karena itu, dibutuhkan sebuah sistem yang dapat mengelola dan menganalisis data tersebut. Hal tersebut, dibuatlah sebuah sistem database dengan nama “ **LakeData_Instagram** “ menggunakan MYSQL yang terintegrasikan dengan PHP dan diuji menggunakan API melalui Postman. 

## 1.2 Rumusan Masalah 

Ada beberapa rumusan masalah dalam penelitian tersebut yaitu : 

- Bagaimana merancang databse untuk menyimpan data postingan instagram brand makeup? 

- Bagaimana mengimplementasikan metode CRUD menggunakan PHP? 

- Bagaimana menganalisis tingkat hype berdasarkan data engagement? 

## 1.3 Tujuan 

Adapun tujuan dari pembuatan sistem ini adalah : 

- Membuat databse untuk menyimpan data brand dan postingan instagram? 

- Mengimplementasikan sistem CRUD berbasis PHP 

- Menganalisis tingkat engagement dari setiap brand 

## 1.4 Manfaat 

Adapun manfaat dari penelitian ini adalah : 

- Membantu memahami analisis media sosial 

- Mengetahui brand yang paling diminati remaja 

- Sebagai bahan pembelajaran CRUD dan API 

## **BAB II LANDASAN TEORI** 

## 2.1 Database 

Databse adalah kumpulan data yang disimpan secara terstruktur. Dalam penelitian ini digunakan MYSQL sebagai sistem manajemen database. 

## 2.2 CRUD 

CRUD adalah singkatan dari 

- Create  ( Menambah Data ) 

- Read    ( Menampilkan Data ) 

- Update ( Mengubah Data ) 

- Delete  ( Menghapus Data ) 

Metode ini digunakan dalam pengelolaan database. 

## 2.3 API 

API ( Application Programming Interface ) digunakan sebagai penghubung antara sistem backend dan aplikasi lain. Penguji API dilakukan menggunakan Postman. 

- 2.4 Engagement Media Sosial 

## Engagement adalah interaksi pengguna terhadap konten, seperti : 

- Like 

- Coment 

- Share 

Rumus sederhana untuk menghitung tingkat type : 

## **Score = (Like × 1) + (Comment × 2) + (Share × 3)** 

## **BAB III ANALISIS DAN PERANCANGAN SISTEM** 

## 3.1  Analisis Sistem 

Sistem ini digunakan untuk menyimpan dan menganalisis data postingan 

instagram dari beberapa brand makeup, Data yang digunakan meliputi : 

- Nama brand 

- Postingan 

- Jumlah like, coment, dan share 

## 3.2  Perancangan Databse 

Database yang digunakan bernama : 

dbrest 

Terdapat 3 tabel utama : 

- Tabel Brands = berisi data brand makeup 

di dalam tabel brands yang memiliki 2 klom yaitu id_brand dan nama_brand 

- Tabel Engagement = berisi data interaksi postingan 

Tabel enganggement ada 5  kolom yaitu, id_brand, post_id, like, comment, dan share 

- Tabel Posts = berisi data postingan instagram 

Tabel post memiliki 4 kolom yaitu, id_brand, brand_id, caption, tanggal_post 

## 3.3 Relasi Tabel 

Relasi antar tabel : 

- Satu brand memiliki banyak postingan 

- Satu postingan memiliki satu data engagement 

3.4 Perancangan Sistem ( Flow ) 

## **BAB IV IMPLEMENTASI SISTEM** 

## 4.1 Pembuatan Database 

Database dibuat menggunakan MYSQL dengan nama 

## **LakeData_Instagram** 

## 4.2 Implementasi CRUD dengan PHP 

Bahasa yang digunakan adalah PHP untuk menghubungkan database dengan API. 

Fitur yang dibuat : 

- Tambah Data ( POST ) 

- Tampilkan Data ( GET ) 

- Update Data ( PUT ) 

- Hapus Data ( DELETE ) 

## 4.3 Penguji API 

Pengujian dilakukan menggunakan postsman 

Penguji meliputi : 

- GET data berhasil 

- POST data berhasil 

- UPDATE data berhasil 

- DELETE data berhasil 

## 4.4 Analisis Data Engagement 

Untuk menentukan tingkat hype, digunakan rumus : 

## **Score = (Like x 1) + (Komentar x 2) + (Share x 3)** 

Alasan : 

- Komentar lebih bernilai dari like 

- Share menunjukkan konten sangat menarik 

## **BAB V HASIL DAN PEMBAHASAN** 

## 5.1 Hasil Pengolahan Data 

Berdasarkan data yang telah dimasukan, diperoleh hasil perbandingan antar brand. Contoh : 

- Somethinc memiliki engagement tertinggi 

- Skintific memiliki jumlah like tinggi 

- Brand lain memiliki engagement lebih rendah 

## 5.2 Pembahasan 

Dari hasil analisis, dapat disimpulkan bahwa : 

- Brand dengan komentar dan share tinggi lebih berpengaruh 

- Like saja tidak cukup menentukan popularitas 

- Engagement total lebih akurat dalam menentukan hype 

## **BAB VI PENUTUP** 

## 6.1 Kesimpulan 

Berdasarkan hasil perancangan dan implementasi sistem analisis data postingan instagram pada brand makeup, dapat disimpulkan bahwa pembuatan database menggunakan MYSQL berhasil dilakukan dengan struktur yang teroroganisir melalui tiga tabel utama yaitu brands, posts, dan engagement. 

Selain itu, sistem CRUD yang dibangun menggunakan PHP mampu mengelola data dengan baik, mulai dari proses penambahan, penampilan, perubahan, hingga penghapusan data. Penguji API menggunakan Postsman juga menunjukkan bahwa seluruh fungsi berjalan dengan baik. Pengguna data engagement seperti jumlah like, komentar, dan share dapat digunakan untuk mengukur tingkat populasi atau hype suatu brand dimedia sosial. 

## **LANGKAH  -  LANGKAH IMPLEMENTASI API** 

## Langkah 1 folder dbrest 

Langkah 2 tabel brands 

## Langkah 3 tabel engagement 

## Langkah 4 tabel post 

## Tabel Relasi 

## api_hapus.php 

## api_tampil.php 

## api_ubah.php 

## api_tambah.php 

## api_hapus.php 

