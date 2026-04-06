<?php
require 'config.php';
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $result = $conn->query("SELECT * FROM buku ORDER BY id");
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));

} elseif ($method === 'POST') {
    $d = json_decode(file_get_contents("php://input"), true);
    $stmt = $conn->prepare("INSERT INTO buku (judul,pengarang,isbn,kategori,tahun,penerbit,stok,stok_awal,icon) VALUES (?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("ssssissss", $d['judul'],$d['pengarang'],$d['isbn'],$d['kategori'],$d['tahun'],$d['penerbit'],$d['stok'],$d['stok'],$d['icon']);
    $stmt->execute();
    echo json_encode(["id" => $conn->insert_id, "message" => "Buku ditambahkan"]);

} elseif ($method === 'DELETE') {
    $id = intval($_GET['id']);
    // Cek apakah sedang dipinjam
    $cek = $conn->query("SELECT id FROM pinjam WHERE buku_id=$id AND status='aktif'");
    if ($cek->num_rows > 0) {
        http_response_code(400);
        echo json_encode(["error" => "Buku sedang dipinjam"]);
    } else {
        $conn->query("DELETE FROM buku WHERE id=$id");
        echo json_encode(["message" => "Buku dihapus"]);
    }
}
?>