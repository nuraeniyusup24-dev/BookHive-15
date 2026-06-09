Nama : Chelsea Aaliyah Yasmin NPM : 20231310043 Prodi : Teknik Informatika A2 Mata Kuliah : Data Warehouse dan Data Mining Dosen : Iim Abdurrohim, S.T.,M.T. 

## 1. Perbedaan Data Warehouse dan Data Operasional? 

## Data Warehouse : 

Menurut Poniah ( 2001 ), Data Warehouse bukan suatu produk tetapi lingkungan dimana user dapat menemukan informasi strategik, Data warehouse adalah kumpulan data – data logik yang terpisah dengan database operasional dan merupakan suatu ringkasan. Menurut Ferdiana, ( 2008) Data warehouse adalah suatu konsep dan kombinasi teknologi yang mempfasilitasi organisasi untuk mengelola dan memelihara data historis data di peroleh dari sistem atau aplikasi operasional. 

Data warehouse juga bisa diartikan sebagai database relasional yang didesain lebih kepada query dan analisa dari pada proses transaksi, biasanya mengandung history data dari proses transaksi dan bisa juga data dari sumber lainnya. 

Data warehouse memisahkan beban kerja analisis dari beban kerja transaksi dan memungkinkan organisasi menggabung/konsolidasi data dari berbagai macam sumber. Jadi, data warehouse merupakan metode dalam perancangan database, yang menunjang DSS (Decission Support System) dan EIS (Executive Information System). Secara fisik data warehouse adalah database, tapi perancangan data warehouse dan database sangat berbeda. 

Data warehouse adalah tempat penyimpanan berdasakan subyek bukan berdasakan aplikasi. Subyek merupakan bagian dari suatu perusahaan. 

## Data O erasional : p 

|Data Operasional :|||
|---|---|---|
||Data Operasional|Data Warehouse|
|Isi Data|Bernilai sekarang atau<br>up-to-date|Arsip, history, rangkuman|
|Struktur Data|Dioptimasi untuk<br>transaksi, normalisasi|Dioptimasikan untuk query<br>yang kompleks, unnormalisasi|
|Frekuensi akses|Tinggi|Sedang–rendah|
|Tipe akses|Read, update, delete|Read|
|Penggunaan|Update secara terus<br>menerus|Update secara periodik|
|Users|Banyak|Lebih sedikit|



Data dalam database operasional akan secara berkala atau periodik dipindahkan kedalam data warehouse, sesuai dengan jadwal yangsudah ditentukan, Misal perhari, perminggu, perbulan dan lain sebagainya. Sekali masuk ke dalam warehouse, data adalah read-only. Pada Gambar II.2 bisa dilihat bahwa database OLTP bisa dibaca, diupdate, dan dihapus. Tetapi pada database data warehouse hanya bisa dibaca. 

Referensi : https://media.neliti.com/media/publications/282576-implementasi-datawarehouse-pada-perpust-acca1da7.pdf 

2. Contoh penerapan BI di bidang : 

- Pendidikan 

- Perbankan 

- E-commerce 

Jawaban No. 2 

- Penerapan Bussiness Intelligence  ( BI ) di bidang pendidikan : 

Monitoring kinerja Mahasiswa : Dalam jurnal dijelaskan bahwa BI digunakan untuk menganalisis performa secara real – time. Dashboard akademik memungkinkan dosen dan pimpinan terlihat tren nilai, IPK, dan tingkat kelulusan. 

Prediksi Drop Out Mahasiswa 

Penelitian menunjukkan bahwa kombinasi data histori nilai, presensi, dan aktivitas Learning Management System ( LMS ) dapat digunakan untuk membuat model prediksi drop out, BI mengintegrasikan data tersebut sehingga kampus dapat melukan interversi dini seperti bimbingan akademik. 

Dashboard pengambilan keputusan pemimpin 

Jurnal menjelaskan bahwa pimpinan Universitas menggunakan BI untuk melihat jumlah mahasiswa aktif, rasio dosen – mahasiswa, efektivitas program studi, serta tren penerimaan mahasiswa baru. Informasi ini mendukung perencanan strategis. 

Referensi : Ifenthaler, D., & Widanapathirana, C. (2014). Development and Validation of a Learning Analytics 

Daniel, B. (2015). Big Data and Learning Analytics in Higher Education: Current Theory and 

## - Penerapan Bussiness Intelligence di perbankan : 

Penerapan Bussiness Intelligence pada industri perbankan merupakan kunci sukses dalam mengefisiensikan dan mengefektifkan kegiatan bisnis utama dengan kemampuan dalam mendapatkan, mengelola dan menganalisa data nasabah, produk, layanan, kegiatan operasi, pemasok dan rekan  kerja dalam jumlah yang sangat besar. 

Contoh penerapan Bussiness Intelligence pada industri perbankan adalah customer relationship management, customer segmention, ( Hair, 2007 ), ( Dan, 2008 ), Peranan Bussiness Intelligence dalam kegiatan bisnis dapat menyediakan layanan yang lebih personal kepada pelanggan dan secara radikal meningkatkan kualitas servis dari bank tersebut. Pengelola produk perbankan bersaing dalam mendesain produk dan layanan yang dapat menjawab setiap kebutuhan suatu segemen tertentu. Salah satu penerapan customer kredit analysis adalah penerapan model penilaian kredit nasabah ( Ince & Aktan, 2009, ). Penilain kredit nasabah merupakan kegiatan paling penting untuk mengevaluasi aplikasi peminjaman memodelkakn potensi risiko dari aplikasi peminjaman, dimana system tersebut memiliki keuntungan karena dapat menangani aplikasi peminjaman dalam jumlah besar dengan cepat tanpa membutuhkan sumber daya yang banyak sehingga dapat menurunkan biaya operasional dan efektif dalam mengurangi penalaran dalam pengambilan keputusan. Dengan persaingan dan pertumbuhan pasar kredit konsumen, para pemain di industri perbankan saling berlomba untuk mengembangkan strategi yang lebih baik berkat bantuan penerapan model penilaian kredit. 

Dengan penerapan Business Intelligence dalam proses segmentasi nasabah menjadi lebih mudah karena pihak manajemen perlu mengidentifikasi atribut – atribut yang diperlukan seperti umur, pekerjaan, penghasilan dan jenis kelamin dengan mudah dan pada umumnya dapat diukur dengan RFV ( Recency, Frequency, dan Value dari perilaku transaksi mereka ) ( Sun, 2009 ), ( Lin, Zhu, Yin, & Dong, 2008 ). 

Referensi : https://sis.binus.ac.id/2013/05/27/penerapan-business-intelligencepada-industri-perbankan-retail-dan-pendidikan/ 

- Penerapan Business Intelligence dengan Artifical Intelligence pada E – Commerce : 

Pada era industri saat ini peningkatan teknologi dan akses internet banyak mengubah pandangan bisnis secara luas dan menciptakan perubahan yang signifikan dalam berbagai aspek, perkembangan teknologi dimanfaatkan untuk memberikan kemudahan dalam memenuhi kebutuhan manusia dan mempermudah pekerjaan sehari – hari, Kemajuan teknologi yang berkelanjutan yaitu dengan munculnya kecerdasan buatan ( AI ) dalam konteks bisniss saat ini telah terjadi digitalisasi industri e – commerce, hal ini menjadi kekuatan utama yang mendorong pertumbuhan ekonomi digital. Teknologi AI dapat memberikan pengelaman yang lebih terarah kepada pelanggan, namun juga dapat menimbulkan dampak negatif jika tidak digunakan dengan baik. 

Penelitian ini menggunakan metode kualitatif dengan literatur review jurnal, yaitu dengan cara mengumpulkan data dan informasi yang bersumber dari jurnal – jurnal nasional dan internasional yang terbit 5 taun terakhir. Penelitian ini bertujuan untuk mennjawab pertanyaan seputar pengambilan keputusan yang dilakukan BI dan AI, peran AI, Data Warehouse dan OLAP dalam menentukan strategi bisnis, pentingnya pengguna Artifical Intelligence, dan hubungan BI dengan strategi pemasaran di e – commerce. Penerapan Business Intelligence dengan Artifical Intelligence pada E – Commerce dapat membentu e – commerce dalam menganalisis data yang lebih cepat dan akurat serta BI juga dapat membantu dalam pengembangan strategi bisnis dengan memprediksi tren pasar yang sedang terjadi pada industri e – commerce. 

Referensi : 

https://ejournal.nusantaraglobal.ac.id/index.php/sentri/article/view/2904 

