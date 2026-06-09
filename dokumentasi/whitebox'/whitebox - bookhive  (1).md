**DOKUMEN PENGUJIAN PERANGKAT LUNAK**

**WHITE BOX TESTING**

**APLIKASI SISTEM PERPUSTAKAAN**

**BOOKHIVE**

**Disusun Oleh:**

| **20231310050** | **Nuraeni Yusup** |
| --- | --- |
| **20231310043** | **Chelsea Aaliyah Yasmin** |
| --- | --- |
| **20231310053** | **Risa Andriani** |
| --- | --- |

**TEKNIK INFORMATIKA**

**FAKULTAS TEKNIK KOMPUTER DAN SISTEM INFORMASI**

**UNIVERSITAS KEBANGSAAN REPUBLIK INDONESIA**

_Jln. Terusan Halimun No. 37 (Pelajar Pejuang 45) Lingkar Selatan Kec. Lengkong_

_kota Bandung Jawa Barat 40263_

# **BAB I**

**PENDAHULUAN**

## **1.1 Latar Belakang**

Perkembangan teknologi informasi saat ini telah mendorong banyak institusi, termasuk perpustakaan, untuk menggunakan sistem berbasis digital. Aplikasi BookHive merupakan sistem perpustakaan berbasis web yang digunakan untuk mengelola data buku, anggota, peminjaman, serta pengembalian secara terintegrasi.

Dalam proses pengembangan perangkat lunak, sering terjadi kesalahan logika yang tidak terlihat dari sisi pengguna. Kesalahan tersebut dapat terjadi pada struktur kode, percabangan kondisi, maupun alur eksekusi program. Oleh karena itu diperlukan metode pengujian yang mampu mengevaluasi struktur internal program.

Salah satu metode yang digunakan adalah White Box Testing, yaitu metode pengujian yang berfokus pada struktur internal program dengan menganalisis source code, flowgraph, serta jalur eksekusi program.

## **1.2 Rumusan Masalah**

1.  Bagaimana menguji struktur internal aplikasi BookHive menggunakan White Box Testing?
2.  Bagaimana menentukan jalur eksekusi (independent path) pada setiap modul?
3.  Berapa tingkat kompleksitas logika (Cyclomatic Complexity) pada sistem BookHive?
4.  Apakah seluruh modul berjalan sesuai dengan alur logika yang dirancang?

## **1.3 Tujuan Pengujian**

1.  Menguji struktur logika internal program BookHive.
2.  Mengidentifikasi semua jalur independen dalam program.
3.  Mengukur kompleksitas program menggunakan Cyclomatic Complexity.
4.  Memastikan setiap percabangan (if-else) berjalan sesuai logika.
5.  Menjamin tidak adanya error pada alur eksekusi program.

## **1.4 Batasan Masalah**

Pengujian ini dibatasi pada modul:

- Manajemen Buku
- Manajemen Anggota
- Peminjaman Buku
- Pengembalian Buku
- Hapus Anggota
- Hitung Denda

## **1.5 Sistematika Penulisan**

- BAB I: Pendahuluan
- BAB II: Landasan Teori
- BAB III: Analisis Sistem
- BAB IV: Hasil dan Pembahasan
- BAB V: Penutup

# **BAB II**

**LANDASAN TEORI**

## **2.1 Pengujian Perangkat Lunak**

Pengujian perangkat lunak adalah proses evaluasi sistem untuk memastikan bahwa perangkat lunak berjalan sesuai dengan kebutuhan dan bebas dari kesalahan.

## **2.2 White Box Testing**

White Box Testing adalah metode pengujian yang dilakukan dengan melihat struktur internal program. Pengujian ini berfokus pada:

- Logika program
- Percabangan (if-else)
- Perulangan (loop)
- Jalur eksekusi (path)

## **2.3 Flowgraph**

Flowgraph adalah representasi grafis dari alur program yang menunjukkan hubungan antara node (proses) dan edge (alur).

## **2.4 Cyclomatic Complexity**

Cyclomatic Complexity adalah metrik untuk mengukur kompleksitas program berdasarkan jumlah jalur independen.

Rumus:

V(G) = E - N + 2

Keterangan:

E = jumlah edge

N = jumlah node

## **2.5 Independent Path**

Independent Path adalah jalur unik dalam program yang harus diuji minimal satu kali untuk memastikan seluruh logika berjalan.

# **BAB III**

**ANALISIS SISTEM**

## **3.1 Deskripsi Aplikasi BookHive**

BookHive adalah aplikasi perpustakaan berbasis web yang digunakan untuk mengelola:

- Data buku
- Data anggota
- Peminjaman buku
- Pengembalian buku
- Perhitungan denda

## **3.2 Struktur Sistem**

Sistem BookHive terdiri dari beberapa modul utama:

- Modul Login (akses sistem)
- Modul Manajemen Buku
- Modul Manajemen Anggota
- Modul Peminjaman Buku
- Modul Pengembalian Buku
- Modul Dashboard
- Modul Pencarian Data

## **3.3 Alur Sistem**

Alur sistem BookHive:

1.  User melakukan login
2.  User masuk ke dashboard
3.  User memilih modul (buku/anggota/peminjaman)
4.  Sistem memproses input
5.  Data disimpan atau ditampilkan sesuai permintaan

## **3.4 Teknologi yang Digunakan**

- HTML, CSS, JavaScript
- Backend API (PHP / Node.js)
- Database MySQL / Firebase

# **BAB IV**

**PELAKSANAAN WHITE BOX TESTING**

## **4.1 Tujuan Pengujian**

Pengujian White Box pada BookHive dilakukan untuk menganalisis struktur internal program, memastikan seluruh jalur logika, percabangan, dan kondisi berjalan dengan benar, serta tidak terdapat error dalam proses eksekusi.

## **4.2 Modul yang Diuji**

Modul yang diuji dalam aplikasi BookHive:

1.  Tambah Buku
2.  Tambah Anggota
3.  Peminjaman Buku
4.  Pengembalian Buku
5.  Hapus Anggota
6.  Hitung Denda

## **4.3 Modul Tambah Buku**

### **4.3.1 Deskripsi**

Modul ini digunakan untuk menambahkan data buku ke dalam sistem.

### **4.3.2 Alur Logika**

Input data → Validasi →

- Valid → Simpan data
- Tidak valid → Error

### **4.3.3 Flow Logic**

Start → Input Buku → Validasi → Decision:

- TRUE → Save Data → End
- FALSE → Error Message → End

### **4.3.4 Cyclomatic Complexity**

Terdapat 1 percabangan:

CC = 2

### **4.3.5 Independent Path**

1.  Data valid → tersimpan
2.  Data tidak valid → error

## **4.4 Modul Tambah Anggota**

### **CC = 2****Independent Path:**

1.  Valid → simpan
2.  Tidak valid → error

## **4.5 Modul Peminjaman Buku**

### **Alur Logika**

Input peminjaman → cek input → cek ketersediaan → proses

### **Cyclomatic Complexity**

Terdapat 2 percabangan:

CC = 3

### **Independent Path**

1.  Input kosong → gagal
2.  Sistem error → gagal
3.  Sukses → peminjaman berhasil

## **4.6 Modul Pengembalian Buku**

### **Alur Logika**

Input pengembalian → cek data → hitung keterlambatan → update status

### **Cyclomatic Complexity**

CC = 3

### **Independent Path**

1.  Data kosong → error
2.  Tepat waktu → sukses
3.  Terlambat → denda

## **4.7 Modul Hapus Anggota**

### **Alur Logika**

Pilih anggota → cek status pinjaman → konfirmasi → hapus

### **Cyclomatic Complexity**

CC = 3

### **Independent Path**

1.  Masih pinjam → gagal
2.  Cancel → batal
3.  Tidak pinjam → berhasil

## **4.8 Modul Hitung Denda**

### **Alur Logika**

Ambil tanggal → hitung selisih → cek keterlambatan → hitung denda

### **Cyclomatic Complexity**

CC = 3

### **Independent Path**

1.  Data kosong → error
2.  Tepat waktu → 0
3.  Terlambat → dihitung

## **4.9 Rekapitulasi Hasil PengujianTotal:**

| **Modul** | **CC** | **Independent Path** |
| --- | --- | --- |
| Tambah Buku | 2   | 2   |
| --- | --- | --- |
| Tambah Anggota | 2   | 2   |
| --- | --- | --- |
| Peminjaman Buku | 3   | 3   |
| --- | --- | --- |
| Pengembalian Buku | 3   | 3   |
| --- | --- | --- |
| Hapus Anggota | 3   | 3   |
| --- | --- | --- |
| Hitung Denda | 3   | 3   |
| --- | --- | --- |

- Cyclomatic Complexity = **16**
- Independent Path = **16**

# **BAB V**

**PENUTUP**

## **5.1 Kesimpulan**

Berdasarkan hasil pengujian White Box Testing pada aplikasi BookHive, dapat disimpulkan bahwa seluruh modul telah berjalan sesuai dengan struktur logika yang dirancang. Semua jalur independen berhasil diuji dan tidak ditemukan kesalahan logika yang signifikan.

## **5.2 Saran**

1.  Menambahkan validasi input yang lebih kompleks.
2.  Melakukan pengujian tambahan seperti Black Box Testing.
3.  Meningkatkan keamanan sistem.
4.  Mengoptimalkan performa database.
5.  Menambahkan logging untuk mempermudah debugging.