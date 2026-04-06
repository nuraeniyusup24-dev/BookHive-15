<?php
require 'config.php';
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $sql = "SELECT k.*, a.nama as nama_anggota, b.judul as judul_buku, b.icon
            FROM kembali k
            JOIN anggota a ON k.anggota_id = a.id
            JOIN buku b ON k.buku_id = b.id
            ORDER BY k.id DESC";
    echo json_encode($conn->query($sql)->fetch_all(MYSQLI_ASSOC));

} elseif ($method === 'POST') {
    $d = json_decode(file_get_contents("php://input"), true);
    $pid = intval($d['pinjam_id']);
    $tglKembali = $d['tgl_kembali'];

    $p = $conn->query("SELECT * FROM pinjam WHERE id=$pid")->fetch_assoc();
    $hariTelat = max(0, (strtotime($tglKembali) - strtotime($p['tgl_batas'])) / 86400);
    $denda = $hariTelat * 2000;

    // Update status pinjam
    $conn->query("UPDATE pinjam SET status='kembali', tgl_kembali='$tglKembali' WHERE id=$pid");
    // Tambah stok buku
    $conn->query("UPDATE buku SET stok = stok + 1 WHERE id={$p['buku_id']}");
    // Catat pengembalian
    $stmt = $conn->prepare("INSERT INTO kembali (pinjam_id,anggota_id,buku_id,tgl_kembali,tgl_batas,hari_telat,denda) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("iiissii", $pid, $p['anggota_id'], $p['buku_id'], $tglKembali, $p['tgl_batas'], $hariTelat, $denda);
    $stmt->execute();
    echo json_encode(["message" => "Berhasil", "denda" => $denda]);
}
?>