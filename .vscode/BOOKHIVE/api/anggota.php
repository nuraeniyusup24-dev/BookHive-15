<?php
require 'config.php';
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $result = $conn->query("SELECT * FROM anggota ORDER BY id");
    echo json_encode($result->fetch_all(MYSQLI_ASSOC));

} elseif ($method === 'POST') {
    $d = json_decode(file_get_contents("php://input"), true);
    $tgl = date('Y-m-d');
    $stmt = $conn->prepare("INSERT INTO anggota (nama,email,telp,alamat,tgl_daftar) VALUES (?,?,?,?,?)");
    $stmt->bind_param("sssss", $d['nama'],$d['email'],$d['telp'],$d['alamat'],$tgl);
    $stmt->execute();
    echo json_encode(["id" => $conn->insert_id, "message" => "Anggota ditambahkan"]);

} elseif ($method === 'DELETE') {
    $id = intval($_GET['id']);
    $cek = $conn->query("SELECT id FROM pinjam WHERE anggota_id=$id AND status='aktif'");
    if ($cek->num_rows > 0) {
        http_response_code(400);
        echo json_encode(["error" => "Anggota masih meminjam buku"]);
    } else {
        $conn->query("DELETE FROM anggota WHERE id=$id");
        echo json_encode(["message" => "Anggota dihapus"]);
    }
}
?>