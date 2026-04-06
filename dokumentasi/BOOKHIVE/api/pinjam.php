<?php
require 'config.php';
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $sql = "SELECT p.*, a.nama as nama_anggota, b.judul as judul_buku, b.icon
            FROM pinjam p
            JOIN anggota a ON p.anggota_id = a.id
            JOIN buku b ON p.buku_id = b.id
            ORDER BY p.id DESC";
    echo json_encode($conn->query($sql)->fetch_all(MYSQLI_ASSOC));

} elseif ($method === 'POST') {
    $d = json_decode(file_get_contents("php://input"), true);
    $aid = intval($d['anggota_id']);
    $bid = intval($d['buku_id']);

    // Cek batas pinjam
    $cekAktif = $conn->query("SELECT COUNT(*) as c FROM pinjam WHERE anggota_id=$aid AND status='aktif'");
    if ($cekAktif->fetch_assoc()['c'] >= 3) {
        http_response_code(400); echo json_encode(["error" => "Maksimum 3 buku"]); exit;
    }

    // Kurangi stok
    $conn->query("UPDATE buku SET stok = stok - 1 WHERE id=$bid AND stok > 0");
    if ($conn->affected_rows === 0) {
        http_response_code(400); echo json_encode(["error" => "Stok habis"]); exit;
    }

    $stmt = $conn->prepare("INSERT INTO pinjam (anggota_id,buku_id,tgl_pinjam,tgl_batas) VALUES (?,?,?,?)");
    $stmt->bind_param("iiss", $aid, $bid, $d['tgl_pinjam'], $d['tgl_batas']);
    $stmt->execute();
    echo json_encode(["id" => $conn->insert_id, "message" => "Peminjaman dicatat"]);
}
?>