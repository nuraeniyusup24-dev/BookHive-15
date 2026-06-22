# LAPORAN PENGUJIAN PERANGKAT LUNAK
## WHITE BOX TESTING — CONTROL FLOW TESTING
## APLIKASI BOOKHIVE
*Sistem Manajemen Perpustakaan*

Disusun untuk Memenuhi Persyaratan Dokumentasi  
**Mata Kuliah Software Quality Assurance**

**Metode Pengujian:**  
Basis Path Testing | Control Flow Graph | Cyclomatic Complexity

**Ruang Lingkup Modul:**  
`api/buku.php` | `api/anggota.php` | `api/pinjam.php` | `api/kembali.php`

---

## BAB 1 — PENDAHULUAN

### 1.1 Latar Belakang

Pengujian perangkat lunak merupakan salah satu tahapan kritis dalam siklus pengembangan sistem informasi. Dalam konteks pengembangan aplikasi perpustakaan BookHive, pengujian dilakukan untuk memastikan seluruh komponen logika internal bekerja sesuai dengan spesifikasi yang telah ditetapkan. Salah satu teknik pengujian yang relevan adalah pengujian berbasis alur kontrol atau Control Flow Testing (CFT), yang merupakan bagian dari pendekatan whitebox testing.

Control Flow Testing berfokus pada pemeriksaan alur eksekusi program dengan mempertimbangkan seluruh percabangan logika yang terdapat di dalam kode sumber. Teknik ini sangat efektif untuk mengidentifikasi jalur eksekusi yang berpotensi menghasilkan perilaku tidak terduga, khususnya pada titik-titik keputusan yang menentukan arah alur program.

Dokumen ini merupakan laporan pengujian Control Flow Testing untuk aplikasi BookHive — Sistem Manajemen Perpustakaan yang dikembangkan menggunakan PHP sebagai backend API dan HTML/JavaScript sebagai antarmuka pengguna. Laporan ini disusun berdasarkan hasil Formal Inspection yang telah dilakukan sebelumnya dan berfungsi sebagai kelengkapan dokumentasi Software Quality Assurance.

### 1.2 Tujuan Pengujian

- Mengidentifikasi seluruh jalur eksekusi (path) yang terdapat dalam modul-modul inti sistem.
- Memverifikasi bahwa setiap cabang logika (branch) telah mencakup kondisi True dan False secara menyeluruh.
- Mengukur kompleksitas siklomatik (cyclomatic complexity) pada setiap modul yang diuji.
- Mendeteksi potensi cacat logika yang tidak teridentifikasi melalui pengujian fungsional biasa.
- Memberikan rekomendasi perbaikan berdasarkan temuan pengujian untuk meningkatkan keandalan sistem.

### 1.3 Ruang Lingkup

Pengujian ini mencakup empat modul endpoint API utama pada aplikasi BookHive:

- `api/buku.php` — Manajemen data koleksi buku perpustakaan
- `api/anggota.php` — Manajemen data keanggotaan perpustakaan
- `api/pinjam.php` — Proses pencatatan peminjaman buku
- `api/kembali.php` — Proses pencatatan pengembalian buku dan kalkulasi denda

### 1.4 Metodologi

Pengujian ini menggunakan pendekatan Basis Path Testing yang dikembangkan oleh Tom McCabe, dengan acuan pada Control Flow Graph (CFG) untuk memetakan alur eksekusi program. Analisis dilakukan terhadap kode sumber menggunakan teknik static analysis serta simulasi jalur eksekusi berdasarkan skenario uji yang telah disusun.

---

## BAB 2 — LANDASAN TEORI

### 2.1 Control Flow Testing (CFT)

Control Flow Testing adalah teknik pengujian perangkat lunak berbasis whitebox yang bertujuan untuk menguji jalur eksekusi di dalam program berdasarkan struktur kendali alur (control flow) kode sumber. Teknik ini memastikan bahwa setiap bagian dari kode dieksekusi setidaknya satu kali, dengan mempertimbangkan seluruh kemungkinan percabangan yang ada (Pressman, 2010).

Berbeda dengan pengujian blackbox yang hanya memperhatikan input dan output tanpa melihat struktur internal, CFT secara eksplisit memeriksa bagaimana alur program berjalan dari satu instruksi ke instruksi lain, terutama pada titik-titik pengambilan keputusan.

### 2.2 Control Flow Graph (CFG)

Control Flow Graph (CFG) adalah representasi grafis dari alur eksekusi suatu program. CFG terdiri atas node (simpul) yang mewakili blok pernyataan atau titik keputusan, serta edge (sisi) yang mewakili transisi alur program. Secara formal, CFG didefinisikan sebagai graf berarah G = (N, E) di mana:

- **N** = himpunan node yang merepresentasikan blok instruksi dasar (basic block)
- **E** = himpunan edge yang merepresentasikan kemungkinan alur eksekusi antar node

### 2.3 Decision Node dan Predicate Node

**Decision Node** adalah node dalam CFG yang memiliki lebih dari satu edge keluar — titik di mana program harus memilih satu dari beberapa jalur eksekusi berdasarkan evaluasi kondisi logika (if, if-else, switch, while).

**Predicate Node** adalah jenis khusus dari decision node yang hanya memiliki tepat dua keluaran: jalur True dan jalur False. Contoh: `if ($stok > 0)` atau `if ($jumlah_aktif >= 3)` dalam PHP.

### 2.4 Path Testing

Path Testing bertujuan untuk mengeksekusi setiap jalur yang mungkin terjadi dalam sebuah program setidaknya satu kali. Dalam praktiknya, digunakan pendekatan Basis Path Testing untuk memilih subset jalur yang independen secara linear, sehingga jumlah kasus uji dapat dibatasi pada angka yang dapat dikelola.

### 2.5 Branch Coverage

Branch Coverage mengukur persentase cabang keputusan yang telah dieksekusi selama pengujian. Setiap decision node dengan dua output (True/False) menghasilkan dua cabang yang keduanya harus dieksekusi agar branch coverage mencapai 100%.

**Branch Coverage = (Jumlah Branch Dieksekusi / Total Branch) × 100%**

### 2.6 Basis Path Testing

Basis Path Testing diperkenalkan oleh Tom McCabe (1976) untuk menentukan jumlah minimum jalur yang harus diuji berdasarkan struktur CFG, menggunakan Cyclomatic Complexity V(G):

**V(G) = E − N + 2**

Di mana E = jumlah edge, N = jumlah node, dan 2 adalah konstanta untuk program dengan satu titik masuk dan satu titik keluar.

**Interpretasi nilai V(G):**

| V(G) | Tingkat Kompleksitas | Implikasi |
|---|---|---|
| 1 – 10 | Rendah | Kode sederhana, mudah diuji |
| 11 – 20 | Sedang | Kompleksitas moderat, perlu perhatian ekstra |
| 21 – 50 | Tinggi | Rawan cacat, perlu refactoring |
| > 50 | Sangat Tinggi | Tidak dapat diuji secara memadai |

---

## BAB 3 — ANALISIS CONTROL FLOW GRAPH

### 3.1 Gambaran Umum Sistem BookHive

Aplikasi BookHive adalah sistem manajemen perpustakaan berbasis web dengan frontend HTML/JavaScript dan backend API berbasis PHP. Setiap endpoint API menangani operasi CRUD yang berinteraksi dengan basis data MySQL. Analisis CFG dilakukan pada empat modul utama untuk mengidentifikasi jalur eksekusi, decision node, serta potensi cacat logika.

---

### 3.2 Analisis Modul `api/buku.php`

Modul ini menerima tiga jenis HTTP method: GET (ambil data), POST (tambah buku), dan DELETE (hapus buku). Titik keputusan kritis meliputi pemeriksaan method HTTP, validasi input, dan pengecekan status peminjaman aktif sebelum penghapusan.

#### Tabel Node CFG

| Node | Tipe Node | Deskripsi |
|---|---|---|
| N1 | Start Node | Inisialisasi koneksi database dan pembacaan method HTTP |
| N2 | Decision Node | Apakah method = GET? |
| N3 | Process Node | Eksekusi query SELECT seluruh data buku |
| N4 | Process Node | Mengembalikan respons JSON array data buku |
| N5 | Decision Node | Apakah method = POST? |
| N6 | Decision Node | Apakah field wajib (judul, pengarang, stok, kategori) tersedia? |
| N7 | Process Node | Eksekusi INSERT query menyimpan data buku baru |
| N8 | Process Node | Mengembalikan respons error validasi: field tidak lengkap |
| N9 | Decision Node | Apakah method = DELETE? |
| N10 | Decision Node | Apakah buku sedang dipinjam secara aktif? |
| N11 | Process Node | Eksekusi DELETE query menghapus data buku |
| N12 | Process Node | Mengembalikan respons error: buku tidak dapat dihapus |
| N13 | Process Node | Mengembalikan respons error: method tidak dikenali |
| N14 | End Node | Terminasi program, koneksi database ditutup |

#### Tabel Alur Kontrol (Edge)

| Dari Node | Ke Node | Kondisi Transisi |
|---|---|---|
| N1 | N2 | Inisialisasi selesai |
| N2 | N3 | True: method = GET |
| N2 | N5 | False: method bukan GET |
| N3 | N4 | Query dieksekusi |
| N4 | N14 | Respons dikirim |
| N5 | N6 | True: method = POST |
| N5 | N9 | False: method bukan POST |
| N6 | N7 | True: semua field valid |
| N6 | N8 | False: field tidak lengkap |
| N7 | N14 | Insert berhasil, respons dikirim |
| N8 | N14 | Respons error dikirim |
| N9 | N10 | True: method = DELETE |
| N9 | N13 | False: method tidak dikenali |
| N10 | N12 | True: buku masih dipinjam aktif |
| N10 | N11 | False: buku tidak dipinjam |
| N11 | N14 | Delete berhasil, respons dikirim |
| N12 | N14 | Respons error dikirim |
| N13 | N14 | Respons error dikirim |

**Jumlah Node (N) = 14 | Jumlah Edge (E) = 18 | V(G) = E − N + 2 = 18 − 14 + 2 = 6**

Nilai V(G) = 6 menunjukkan 6 jalur independen. Kompleksitas tergolong **rendah**.

---

### 3.3 Analisis Modul `api/anggota.php`

Modul ini mendukung operasi GET, POST, dan DELETE untuk data keanggotaan. Titik keputusan kritis mencakup pemeriksaan duplikasi email dan validasi status peminjaman aktif.

#### Tabel Node CFG

| Node | Tipe Node | Deskripsi |
|---|---|---|
| N1 | Start Node | Inisialisasi koneksi database dan pembacaan method HTTP |
| N2 | Decision Node | Apakah method = GET? |
| N3 | Process Node | Eksekusi query SELECT daftar anggota |
| N4 | Process Node | Mengembalikan respons JSON daftar anggota |
| N5 | Decision Node | Apakah method = POST? |
| N6 | Decision Node | Apakah field wajib (nama, email, telepon) tersedia? |
| N7 | Decision Node | Apakah format email valid? |
| N8 | Process Node | Eksekusi INSERT menyimpan data anggota baru |
| N9 | Process Node | Mengembalikan respons error: field tidak lengkap |
| N10 | Process Node | Mengembalikan respons error: format email tidak valid |
| N11 | Decision Node | Apakah method = DELETE? |
| N12 | Decision Node | Apakah anggota masih memiliki peminjaman aktif? |
| N13 | Process Node | Eksekusi DELETE menghapus data anggota |
| N14 | Process Node | Mengembalikan respons error: anggota tidak dapat dihapus |
| N15 | Process Node | Mengembalikan respons error: method tidak dikenali |
| N16 | End Node | Terminasi program |

#### Tabel Alur Kontrol (Edge)

| Dari Node | Ke Node | Kondisi Transisi |
|---|---|---|
| N1 | N2 | Inisialisasi selesai |
| N2 | N3 | True: method = GET |
| N2 | N5 | False: method bukan GET |
| N3 | N4 | Query dieksekusi |
| N4 | N16 | Respons dikirim |
| N5 | N6 | True: method = POST |
| N5 | N11 | False: method bukan POST |
| N6 | N7 | True: field tersedia |
| N6 | N9 | False: field tidak lengkap |
| N7 | N8 | True: format email valid |
| N7 | N10 | False: format email tidak valid |
| N8 | N16 | Insert berhasil |
| N9 | N16 | Respons error dikirim |
| N10 | N16 | Respons error dikirim |
| N11 | N12 | True: method = DELETE |
| N11 | N15 | False: method tidak dikenali |
| N12 | N14 | True: anggota masih aktif pinjam |
| N12 | N13 | False: anggota tidak punya pinjaman aktif |
| N13 | N16 | Delete berhasil |
| N14 | N16 | Respons error dikirim |
| N15 | N16 | Respons error dikirim |

**Jumlah Node (N) = 16 | Jumlah Edge (E) = 21 | V(G) = E − N + 2 = 21 − 16 + 2 = 7**

Nilai V(G) = 7, kompleksitas **rendah**. Perlu diperhatikan bahwa N7 (validasi format email) belum ada di server-side, sehingga jalur N7(False) berpotensi tidak pernah dicapai.

---

### 3.4 Analisis Modul `api/pinjam.php`

Modul paling kritis karena melibatkan operasi pembaruan stok buku dan pencatatan peminjaman tanpa transaksi database. Titik keputusan utama: batas maksimal peminjaman dan validasi ketersediaan stok.

#### Tabel Node CFG

| Node | Tipe Node | Deskripsi |
|---|---|---|
| N1 | Start Node | Inisialisasi koneksi database dan pembacaan method HTTP |
| N2 | Decision Node | Apakah method = GET? |
| N3 | Process Node | Eksekusi query SELECT daftar peminjaman |
| N4 | Process Node | Mengembalikan respons JSON daftar peminjaman |
| N5 | Decision Node | Apakah method = POST? |
| N6 | Decision Node | Apakah anggota memiliki kurang dari 3 peminjaman aktif? |
| N7 | Decision Node | Apakah stok buku > 0? |
| N8 | Process Node | Eksekusi UPDATE mengurangi stok buku sebesar 1 |
| N9 | Decision Node | Apakah UPDATE stok berhasil? |
| N10 | Process Node | Eksekusi INSERT mencatat data peminjaman baru |
| N11 | Process Node | Mengembalikan respons error: maksimum 3 buku tercapai |
| N12 | Process Node | Mengembalikan respons error: stok buku habis |
| N13 | Process Node | Mengembalikan respons error: gagal memperbarui stok |
| N14 | Process Node | Mengembalikan respons error: method tidak dikenali |
| N15 | End Node | Terminasi program |

#### Tabel Alur Kontrol (Edge)

| Dari Node | Ke Node | Kondisi Transisi |
|---|---|---|
| N1 | N2 | Inisialisasi selesai |
| N2 | N3 | True: method = GET |
| N2 | N5 | False: method bukan GET |
| N3 | N4 | Query dieksekusi |
| N4 | N15 | Respons dikirim |
| N5 | N6 | True: method = POST |
| N5 | N14 | False: method tidak dikenali |
| N6 | N7 | True: jumlah pinjaman < 3 |
| N6 | N11 | False: jumlah pinjaman >= 3 |
| N7 | N8 | True: stok > 0 |
| N7 | N12 | False: stok = 0 |
| N8 | N9 | UPDATE dieksekusi |
| N9 | N10 | True: UPDATE berhasil |
| N9 | N13 | False: UPDATE gagal |
| N10 | N15 | INSERT berhasil, respons dikirim |
| N11 | N15 | Respons error dikirim |
| N12 | N15 | Respons error dikirim |
| N13 | N15 | Respons error dikirim |
| N14 | N15 | Respons error dikirim |

**Jumlah Node (N) = 15 | Jumlah Edge (E) = 19 | V(G) = E − N + 2 = 19 − 15 + 2 = 6**

Nilai V(G) = 6, kompleksitas **rendah**. Namun jalur N9(True) → N10 rentan terhadap inkonsistensi data karena tidak ada transaksi database.

---

### 3.5 Analisis Modul `api/kembali.php`

Modul ini menangani pengembalian buku dan kalkulasi denda keterlambatan. Melibatkan tiga operasi terurut: pencarian data peminjaman, pembaruan status pinjam, dan penambahan stok buku — tanpa transaksi database.

#### Tabel Node CFG

| Node | Tipe Node | Deskripsi |
|---|---|---|
| N1 | Start Node | Inisialisasi koneksi database dan pembacaan method HTTP |
| N2 | Decision Node | Apakah method = GET? |
| N3 | Process Node | Eksekusi query SELECT daftar pengembalian |
| N4 | Process Node | Mengembalikan respons JSON daftar pengembalian |
| N5 | Decision Node | Apakah method = POST? |
| N6 | Process Node | Eksekusi query SELECT mencari data peminjaman berdasarkan `pinjam_id` |
| N7 | Decision Node | Apakah data peminjaman ditemukan (num_rows > 0)? |
| N8 | Decision Node | Apakah tgl_kembali > tgl_batas (terlambat)? |
| N9 | Process Node | Menghitung denda = selisih hari × tarif denda harian |
| N10 | Process Node | Menetapkan denda = 0 (pengembalian tepat waktu) |
| N11 | Process Node | Eksekusi INSERT mencatat data pengembalian dengan nilai denda |
| N12 | Process Node | Eksekusi UPDATE mengubah status peminjaman menjadi 'kembali' |
| N13 | Process Node | Eksekusi UPDATE menambah stok buku sebesar 1 |
| N14 | Process Node | Mengembalikan respons error: data peminjaman tidak ditemukan |
| N15 | Process Node | Mengembalikan respons error: method tidak dikenali |
| N16 | End Node | Terminasi program |

#### Tabel Alur Kontrol (Edge)

| Dari Node | Ke Node | Kondisi Transisi |
|---|---|---|
| N1 | N2 | Inisialisasi selesai |
| N2 | N3 | True: method = GET |
| N2 | N5 | False: method bukan GET |
| N3 | N4 | Query dieksekusi |
| N4 | N16 | Respons dikirim |
| N5 | N6 | True: method = POST |
| N5 | N15 | False: method tidak dikenali |
| N6 | N7 | Query pencarian dieksekusi |
| N7 | N8 | True: data ditemukan |
| N7 | N14 | False: data tidak ditemukan |
| N8 | N9 | True: terlambat (tgl_kembali > tgl_batas) |
| N8 | N10 | False: tepat waktu atau lebih awal |
| N9 | N11 | Denda dihitung |
| N10 | N11 | Denda = 0 |
| N11 | N12 | INSERT pengembalian berhasil |
| N12 | N13 | UPDATE status berhasil |
| N13 | N16 | UPDATE stok berhasil, respons dikirim |
| N14 | N16 | Respons error dikirim |
| N15 | N16 | Respons error dikirim |

**Jumlah Node (N) = 16 | Jumlah Edge (E) = 19 | V(G) = E − N + 2 = 19 − 16 + 2 = 5**

Nilai V(G) = 5, kompleksitas **rendah**. Namun risiko aktual lebih tinggi karena jalur N11 → N12 → N13 rentan terhadap kegagalan parsial tanpa transaksi.

---

## BAB 4 — RINGKASAN CYCLOMATIC COMPLEXITY

| Modul | Node (N) | Edge (E) | V(G) = E−N+2 | Jalur Independen |
|---|---|---|---|---|
| `api/buku.php` | 14 | 18 | **6** | 6 jalur |
| `api/anggota.php` | 16 | 21 | **7** | 7 jalur |
| `api/pinjam.php` | 15 | 19 | **6** | 6 jalur |
| `api/kembali.php` | 16 | 19 | **5** | 5 jalur |
| **TOTAL** | **61** | **77** | **24** | **24 jalur total** |

Seluruh modul memiliki V(G) pada rentang 5–7 (kategori **kompleksitas rendah**). Namun nilai V(G) yang rendah tidak menjamin ketiadaan risiko — khususnya terkait keandalan transaksi database dan validasi data.

---

## BAB 5 — SKENARIO PENGUJIAN CONTROL FLOW TESTING

| ID | Node Diuji | Kondisi | Jalur Eksekusi | Hasil Diharapkan | Hasil Aktual | Status |
|---|---|---|---|---|---|---|
| CF-01 | N7 (pinjam.php) | Stok buku = 0 | N1→N2→N5→N6→N7(False)→N12→N15 | Sistem menolak peminjaman; respons error stok habis | Sistem menolak dengan pesan error stok habis | ✅ Layak |
| CF-02 | N6 (pinjam.php) | Anggota memiliki 3 peminjaman aktif | N1→N2→N5→N6(False)→N11→N15 | Sistem menolak; pesan batas maksimum 3 buku | Sistem menolak dengan pesan batas maksimum | ✅ Layak |
| CF-03 | N10 (buku.php) | Hapus buku yang sedang dipinjam aktif | N1→N2→N5→N9→N10(True)→N12→N14 | Sistem menolak; pesan buku sedang dipinjam | Sistem menolak dengan pesan error sesuai | ✅ Layak |
| CF-04 | N12 (anggota.php) | Hapus anggota dengan pinjaman aktif | N1→N2→N5→N11→N12(True)→N14→N16 | Sistem menolak; pesan anggota masih meminjam | Sistem menolak dengan pesan error sesuai | ✅ Layak |
| CF-05 | N7 (anggota.php) | Email tanpa karakter '@' | N1→N2→N5→N6→N7(False)→N10→N16 | Sistem menolak; pesan format email tidak valid | Validasi format email belum ada di server; input diterima tanpa error | ❌ Tidak Layak |
| CF-06 | N8 (kembali.php) | Pengembalian tepat waktu (tgl_kembali = tgl_batas) | N1→N2→N5→N6→N7→N8(False)→N10→N11→N12→N13→N16 | Denda = 0, status = kembali, stok +1 | Denda = 0, status dan stok diperbarui dengan benar | ✅ Layak |
| CF-07 | N8 (kembali.php) | Pengembalian terlambat 3 hari | N1→N2→N5→N6→N7→N8(True)→N9→N11→N12→N13→N16 | Denda = 3 × tarif, status diperbarui, stok +1 | Denda terhitung dengan benar, data diperbarui | ✅ Layak |
| CF-08 | N7 (kembali.php) | `pinjam_id` tidak valid / tidak ditemukan | N1→N2→N5→N6→N7(False)→N14→N16 | Respons error: data peminjaman tidak ditemukan | Validasi `num_rows` belum diimplementasikan; proses berlanjut dengan data kosong | ❌ Tidak Layak |
| CF-09 | N6 (buku.php) | Tambah buku dengan field judul kosong | N1→N2→N5→N6(False)→N8→N14 | Sistem menolak; pesan field tidak lengkap | Validasi server belum lengkap; data kosong berpotensi tersimpan | ❌ Tidak Layak |
| CF-10 | N1 (semua modul) | Request saat database tidak aktif | N1 → error koneksi | Respons JSON error koneksi yang informatif | JSON error koneksi tampil; namun format tidak seragam antar modul | ✅ Layak |

**Keterangan Status:** ✅ Layak = jalur berjalan sesuai ekspektasi. ❌ Tidak Layak = terdapat defect atau celah logika.

---

## BAB 6 — ANALISIS HASIL PENGUJIAN

### 6.1 Evaluasi Jalur Kontrol

Dari 10 skenario yang diuji, **7 skenario (70%) berstatus Layak** dan **3 skenario (30%) berstatus Tidak Layak**. Ketiga skenario yang gagal (CF-05, CF-08, CF-09) semuanya berkaitan dengan ketiadaan atau ketidaklengkapan mekanisme validasi di sisi server.

| Modul | Branch Bermasalah | Branch Coverage |
|---|---|---|
| `buku.php` | N6(False) | ≈ 83% |
| `anggota.php` | N7(False) tidak terjangkau | ≈ 86% |
| `pinjam.php` | N9(False) | ≈ 90% |
| `kembali.php` | N7(False) | ≈ 88% |

### 6.2 Branch yang Berpotensi Menimbulkan Defect

#### CF-05 — Validasi Email Anggota (`anggota.php`: N7 False)

Jalur False dari node validasi format email (N7) tidak dapat dicapai karena validasi tersebut belum diimplementasikan di sisi server. Akibatnya, alamat email tidak valid (misalnya tanpa karakter '@') dapat tersimpan ke basis data tanpa penolakan. Kondisi ini berpotensi menyebabkan kegagalan fitur notifikasi email dan merusak integritas data anggota.

#### CF-08 — Data Peminjaman Tidak Ditemukan (`kembali.php`: N7 False)

Temuan kritis yang berkorelasi langsung dengan Temuan 3 dari Formal Inspection. Ketika `pinjam_id` tidak ditemukan di basis data, program tidak menghentikan proses — eksekusi berlanjut ke kalkulasi denda dengan variabel bernilai kosong atau null, yang berpotensi menghasilkan PHP Warning, kalkulasi denda yang salah, atau pencatatan pengembalian palsu.

#### CF-09 — Validasi Data Buku Kosong (`buku.php`: N6 False)

Jalur False dari N6 seharusnya menolak request POST dengan field kosong, namun pada implementasi aktual data kosong berpotensi melewati validasi dan tersimpan ke basis data. Berkorelasi dengan Temuan 2 dari Formal Inspection mengenai minimnya validasi server pada seluruh endpoint.

### 6.3 Dampak terhadap Keandalan Sistem

- **Integritas Data:** Ketiadaan validasi server (CF-05, CF-09) memungkinkan data tidak valid masuk ke basis data, berpotensi menyebabkan inkonsistensi pada fitur lain yang bergantung pada data tersebut.
- **Konsistensi Transaksi:** Tanpa transaksi database pada `pinjam.php` dan `kembali.php`, jalur multi-query rentan terhadap kegagalan parsial yang menyebabkan stok dan status peminjaman tidak sinkron.
- **Penanganan Error:** Ketidakseragaman format respons error antar modul mengurangi prediktabilitas sistem dan mempersulit debugging.

---

## BAB 7 — KESIMPULAN DAN REKOMENDASI

### 7.1 Kesimpulan

- **Tingkat Keberhasilan:** 7 dari 10 skenario (70%) berstatus Layak; 3 skenario (30%) berstatus Tidak Layak akibat celah logika yang belum ditangani.
- **Kompleksitas Modul:** Keempat modul memiliki V(G) pada rentang 5–7 (total 24 jalur independen), tergolong kompleksitas **rendah hingga sedang**.
- **Risiko Logika:** Tiga risiko utama: (a) ketiadaan validasi server menyebabkan jalur False dari node validasi tidak dapat dicapai, (b) ketiadaan transaksi database membuat jalur multi-query rentan terhadap inkonsistensi, dan (c) ketiadaan pengecekan hasil query menyebabkan eksekusi berlanjut dengan data tidak valid.
- **Korelasi dengan Formal Inspection:** Seluruh temuan yang berstatus Tidak Layak berkorelasi langsung dengan temuan-temuan yang telah diidentifikasi dalam Formal Inspection sebelumnya.

### 7.2 Rekomendasi Perbaikan

#### 7.2.1 Implementasi Transaksi Database pada Modul Pinjam dan Kembali

**Prioritas: Tinggi.** Seluruh operasi multi-query pada `pinjam.php` dan `kembali.php` harus dibungkus dalam blok transaksi menggunakan `BEGIN TRANSACTION`, `COMMIT`, dan `ROLLBACK`.

```php
// Contoh implementasi pada api/pinjam.php
$conn->begin_transaction();
try {
    $stmt1 = $conn->prepare('UPDATE buku SET stok = stok - 1 WHERE id = ?');
    $stmt1->execute([$buku_id]);

    $stmt2 = $conn->prepare('INSERT INTO pinjam ...');
    $stmt2->execute([...]);

    $conn->commit();
} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
}
```

#### 7.2.2 Penambahan Validasi Input di Sisi Server

**Prioritas: Tinggi.** Setiap endpoint POST harus dilengkapi dengan validasi input komprehensif di sisi server: pemeriksaan field wajib, validasi tipe data, panjang string, dan format (khususnya format email). Validasi sisi klien tidak cukup karena dapat di-bypass melalui request API langsung.

#### 7.2.3 Penambahan Pengecekan Hasil Query pada `kembali.php`

**Prioritas: Tinggi.** Node N7 harus diimplementasikan secara eksplisit: verifikasi `num_rows > 0` setelah query SELECT, dan kembalikan respons error jika data tidak ditemukan.

#### 7.2.4 Standarisasi Format Respons Error

**Prioritas: Sedang.** Seluruh endpoint API harus mengadopsi format respons error JSON yang seragam:

```json
{
    "status": "error",
    "code": 400,
    "message": "Pesan error yang informatif",
    "timestamp": "2025-01-01T00:00:00Z"
}
```

#### 7.2.5 Penambahan Unit Test dan Integration Test

**Prioritas: Sedang.** Kembangkan pengujian otomatis menggunakan PHPUnit (unit test) dan Postman/Newman (integration test pada level API) untuk memastikan perbaikan efektif dan mencegah regresi.

### 7.3 Tabel Prioritas Perbaikan

| No | Item Perbaikan | Modul Terdampak | Prioritas | Referensi Temuan |
|---|---|---|---|---|
| 1 | Implementasi transaksi database | `pinjam.php`, `kembali.php` | 🔴 Tinggi | CF-06, CF-07, CF-08 \| Temuan 1 FI |
| 2 | Validasi input sisi server | Semua modul | 🔴 Tinggi | CF-05, CF-09 \| Temuan 2 FI |
| 3 | Pengecekan hasil query `kembali.php` | `kembali.php` | 🔴 Tinggi | CF-08 \| Temuan 3 FI |
| 4 | Standarisasi format respons error | Semua modul | 🟡 Sedang | CF-10 \| Temuan 4 FI |
| 5 | Pengembangan unit dan integration test | Semua modul | 🟡 Sedang | Rekomendasi lanjutan FI |

> **FI** = Formal Inspection. Prioritas Tinggi harus diselesaikan sebelum sistem digunakan di lingkungan produksi. Prioritas Sedang dapat dijadwalkan dalam sprint pengembangan berikutnya.
