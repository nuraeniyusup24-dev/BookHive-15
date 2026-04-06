CREATE DATABASE IF NOT EXISTS library_db;
USE library_db;

-- Data awal buku
DROP TABLE IF EXISTS kembali;
DROP TABLE IF EXISTS pinjam;
DROP TABLE IF EXISTS anggota;
DROP TABLE IF EXISTS buku;

CREATE TABLE buku (
    id INT AUTO_INCREMENT PRIMARY KEY,
    judul VARCHAR(255) NOT NULL,
    pengarang VARCHAR(255) NOT NULL,
    isbn VARCHAR(50),
    kategori VARCHAR(50),
    tahun INT,
    penerbit VARCHAR(100),
    stok INT DEFAULT 1,
    stok_awal INT DEFAULT 1,
    icon VARCHAR(10) DEFAULT '📗',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE anggota (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    telp VARCHAR(20),
    alamat TEXT,
    tgl_daftar DATE DEFAULT (CURDATE()),
    status ENUM('aktif','nonaktif') DEFAULT 'aktif'
);

CREATE TABLE pinjam (
    id INT AUTO_INCREMENT PRIMARY KEY,
    anggota_id INT NOT NULL,
    buku_id INT NOT NULL,
    tgl_pinjam DATE NOT NULL,
    tgl_batas DATE NOT NULL,
    status ENUM('aktif','kembali') DEFAULT 'aktif',
    tgl_kembali DATE,
    FOREIGN KEY (anggota_id) REFERENCES anggota(id),
    FOREIGN KEY (buku_id) REFERENCES buku(id)
);

CREATE TABLE kembali (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pinjam_id INT NOT NULL,
    anggota_id INT NOT NULL,
    buku_id INT NOT NULL,
    tgl_kembali DATE NOT NULL,
    tgl_batas DATE NOT NULL,
    hari_telat INT DEFAULT 0,
    denda INT DEFAULT 0,
    FOREIGN KEY (pinjam_id) REFERENCES pinjam(id)
);

-- Data awal buku
INSERT INTO buku (judul, pengarang, isbn, kategori, tahun, penerbit, stok, stok_awal, icon) VALUES
('Laskar Pelangi','Andrea Hirata','978-979-1243-68-8','Fiksi',2005,'Bentang',3,3,'📗'),
('Sapiens','Yuval Noah Harari','978-0-06-231609-7','Sejarah',2011,'Harper',2,2,'📘'),
('Clean Code','Robert C. Martin','978-0-13-235088-4','Teknologi',2008,'Prentice Hall',2,2,'📙'),
('Atomic Habits','James Clear','978-0-7352-1129-2','Non-Fiksi',2018,'Avery',1,2,'📕'),
('Bumi Manusia','Pramoedya Ananta Toer','978-979-407-070-4','Fiksi',1980,'Lentera Dipantara',2,2,'📔'),
('A Brief History of Time','Stephen Hawking','978-0-553-38016-3','Sains',1988,'Bantam',1,1,'📒'),
('The Pragmatic Programmer','Hunt & Thomas','978-0-20-161622-4','Teknologi',1999,'Addison-Wesley',2,2,'📓'),
('Pulang','Tere Liye','978-602-03-1342-7','Fiksi',2015,'Republika',3,3,'📗');

-- Data awal anggota
INSERT INTO anggota (nama, email, telp, alamat, tgl_daftar) VALUES
('Rizki Pratama','rizki@email.com','0812-3456-7890','Jl. Merdeka No.12, Bandung','2024-01-15'),
('Siti Nurhaliza','siti@email.com','0856-7890-1234','Jl. Sudirman No.5, Bandung','2024-02-20'),
('Budi Santoso','budi@email.com','0821-4567-8901','Jl. Diponegoro No.8, Bandung','2024-03-10'),
('Dewi Rahayu','dewi@email.com','0877-6543-2109','Jl. Gatot Subroto No.22, Bandung','2024-04-05'),
('Ahmad Fauzi','ahmad@email.com','0851-2345-6789','Jl. Asia Afrika No.17, Bandung','2024-05-12');