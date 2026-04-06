<?php
$host     = "localhost";
$user     = "root"; // Username default XAMPP
$password = "";     // Password default XAMPP biasanya kosong
$database = "library_db"; // Ubah sesuai nama DB di phpMyAdmin

// Membuat koneksi
$conn = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$conn) {
    die(json_encode(["error" => "Koneksi gagal: " . mysqli_connect_error()]));
}
?>