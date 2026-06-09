# Pengujian Black Box — Boundary Value Analysis (BVA)

## Tujuan
Dokumen ini menyajikan kasus pengujian Black Box menggunakan teknik Boundary Value Analysis (BVA) untuk aplikasi perpustakaan BookHive. Tujuan: mengidentifikasi kesalahan yang sering muncul pada nilai batas input.

## Ruang Lingkup
Fitur yang diuji:
- Tambah Buku
- Tambah Anggota
- Peminjaman Buku
- Pengembalian Buku
- Pencarian Data

## Metodologi
Boundary Value Analysis menguji nilai pada batas minimum, batas maksimum, serta titik di sekitar batas (batas-1, batas, batas+1). Untuk setiap field yang memiliki batasan, dibuat kasus pengujian sesuai pola tersebut.

---

## 1. Tambah Buku
Asumsi bisnis: `stok` minimal 1, maksimal 1000; `judul` minimal 1 karakter, maksimal 255 karakter; `ISBN` panjang standar 13 karakter.

| No | Field | Batas | Kasus Uji (BVA) | Hasil yang Diharapkan |
| --- | --- | --- | --- | --- |
| 1 | Stok | min=1 | 0 (min-1) | Ditolak, pesan validasi "stok tidak boleh kurang dari 1" |
| 2 | Stok | min=1 | 1 (min) | Diterima, data tersimpan |
| 3 | Stok | min=1 | 2 (min+1) | Diterima, data tersimpan |
| 4 | Stok | max=1000 | 999 (max-1) | Diterima, data tersimpan |
| 5 | Stok | max=1000 | 1000 (max) | Diterima, data tersimpan |
| 6 | Stok | max=1000 | 1001 (max+1) | Ditolak atau batas otomatis, pesan kesalahan |
| 7 | Judul | min=1 | "" (min-1) | Ditolak, pesan validasi "judul wajib diisi" |
| 8 | Judul | min=1 | 1 karakter (min) | Diterima |
| 9 | Judul | max=255 | 254 (max-1) | Diterima |
| 10 | Judul | max=255 | 255 (max) | Diterima |
| 11 | Judul | max=255 | 256 (max+1) | Ditolak atau dipotong sesuai aturan |
| 12 | ISBN | len=13 | 12 (len-1) | Ditolak, format/length invalid |
| 13 | ISBN | len=13 | 13 (len) | Diterima |
| 14 | ISBN | len=13 | 14 (len+1) | Ditolak |

Langkah pengujian: buka form tambah buku → masukkan data sesuai kasus → simpan → verifikasi pesan dan status penyimpanan.

---

## 2. Tambah Anggota
Asumsi: `nama` min=1 max=100 karakter; `email` valid dan panjang max=254.

| No | Field | Batas | Kasus Uji | Hasil yang Diharapkan |
| --- | --- | --- | --- | --- |
| 1 | Nama | min=1 | "" (min-1) | Ditolak, pesan "nama wajib diisi" |
| 2 | Nama | min=1 | 1 karakter (min) | Diterima |
| 3 | Nama | max=100 | 99 (max-1) | Diterima |
| 4 | Nama | max=100 | 100 (max) | Diterima |
| 5 | Nama | max=100 | 101 (max+1) | Ditolak atau dipangkas |
| 6 | Email | format | "user@domain" (missing TLD) | Ditolak, pesan format email invalid |
| 7 | Email | max=254 | 254 karakter | Diterima jika valid |
| 8 | Email | max=254 | 255 karakter | Ditolak |

Langkah: buka form tambah anggota → masukkan nilai sesuai → simpan → verifikasi validasi.

---

## 3. Peminjaman Buku
Asumsi: kolom `tanggal_kembali` harus >= `tanggal_pinjam`; jumlah maksimal peminjaman per anggota misalnya 5 (jika diterapkan).

| No | Field | Batas | Kasus Uji | Hasil yang Diharapkan |
| --- | --- | --- | --- | --- |
| 1 | Tanggal Kembali | min=tanggal_pinjam | tanggal_kembali = tanggal_pinjam - 1 (min-1) | Ditolak, pesan "tanggal kembali tidak valid" |
| 2 | Tanggal Kembali | min=tanggal_pinjam | tanggal_kembali = tanggal_pinjam (min) | Diterima |
| 3 | Tanggal Kembali | min=tanggal_pinjam | tanggal_kembali = tanggal_pinjam + 1 (min+1) | Diterima |
| 4 | Jumlah Pinjam | max=5 | 4 (max-1) | Diterima |
| 5 | Jumlah Pinjam | max=5 | 5 (max) | Diterima |
| 6 | Jumlah Pinjam | max=5 | 6 (max+1) | Ditolak, pesan batas peminjaman terlampaui |
| 7 | Stok Buku | min=1 | stok = 0 saat peminjaman | Ditolak, pesan "buku tidak tersedia" |

Langkah: lakukan transaksi peminjaman dengan skenario di atas → verifikasi perubahan stok dan pesan.

---

## 4. Pengembalian Buku
Asumsi: denda per hari = Rp2.000; terlambat dihitung jika tanggal_kembali > tanggal_jatuh_tempo.

| No | Field | Batas | Kasus Uji | Hasil yang Diharapkan |
| --- | --- | --- | --- | --- |
| 1 | Keterlambatan | min=0 hari | -1 hari (min-1, tidak mungkin) | Ditolak/normalisasi input |
| 2 | Keterlambatan | min=0 hari | 0 hari (min) | Denda Rp0 |
| 3 | Keterlambatan | min=0 hari | 1 hari (min+1) | Denda Rp2.000 |
| 4 | Keterlambatan | nilai besar | 30 hari | Denda = 30 * Rp2.000 |

Langkah: proses pengembalian pada berbagai tanggal → verifikasi perhitungan denda dan update stok.

---

## 5. Pencarian Data
Asumsi: hasil pencarian menampilkan 0..N record; test batas paging/limit.

| No | Kondisi | Batas | Kasus Uji | Hasil yang Diharapkan |
| --- | --- | --- | --- | --- |
| 1 | Hasil per halaman | min=1 | 0 (min-1) | Sistem menampilkan 0 atau menolak parameter |
| 2 | Hasil per halaman | min=1 | 1 (min) | Menampilkan 1 record bila ada |
| 3 | Hasil per halaman | max=100 | 99 (max-1) | Menampilkan 99 |
| 4 | Hasil per halaman | max=100 | 100 (max) | Menampilkan 100 |
| 5 | Hasil per halaman | max=100 | 101 (max+1) | Dipangkas ke batas maksimum atau error |

Langkah: jalankan query pencarian dengan parameter limit/offset sesuai kasus → verifikasi jumlah hasil dan konsistensi.

---

## Eksekusi & Verifikasi
- Tipe pengujian: manual + otomatisasi (opsional). Untuk pengujian otomatis, siapkan skrip yang mengirimkan request HTTP sesuai test case.
- Catat ID tiket/bug bila ditemukan: langkah reproduksi, input yang digunakan, hasil aktual, hasil yang diharapkan.
- Untuk setiap kasus, verifikasi:
  - Pesan validasi tampil sesuai
  - Data tersimpan/ditolak sesuai ekspektasi
  - Tidak ada efek samping (mis. stok tidak berkurang saat transaksi gagal)

## Contoh template laporan kasus uji (gunakan untuk setiap baris tabel di atas)
- ID: BVA-TB-01
- Fitur: Tambah Buku
- Field: Stok
- Kasus: nilai=0 (min-1)
- Langkah: Isi form tambah buku dengan stok=0 → klik Simpan
- Hasil Aktual: [isi hasil di lapangan]
- Hasil yang Diharapkan: Ditolak, pesan validasi "stok tidak boleh kurang dari 1"
- Status: Lulus / Gagal

---

## Penutup
Boundary Value Analysis membantu menemukan bug yang terjadi pada nilai batas input. Jalankan semua kasus di atas secara sistematis dan kombinasikan bila perlu dengan Equivalence Partitioning untuk cakupan yang lebih baik.
