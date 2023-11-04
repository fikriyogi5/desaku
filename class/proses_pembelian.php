<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

require 'db_connection.php';

$user_id = $_SESSION['user_id'];
$jenis_pulsa = $_POST['jenis_pulsa'];
$jumlah = $_POST['jumlah'];

// Hitung total harga pulsa
// Misalnya, harga pulsa diambil dari tabel harga_pulsa
$query = $db->prepare("SELECT harga FROM harga_pulsa WHERE jenis_pulsa = ?");
$query->execute([$jenis_pulsa]);
$harga_pulsa = $query->fetch(PDO::FETCH_ASSOC)['harga'];

$total_harga = $harga_pulsa * $jumlah;

// Periksa apakah saldo mencukupi
$query = $db->prepare("SELECT saldo FROM users WHERE id = ?");
$query->execute([$user_id]);
$user_data = $query->fetch(PDO::FETCH_ASSOC);
$saldo = $user_data['saldo'];

if ($saldo >= $total_harga) {
    // Kurangi saldo pengguna
    $query = $db->prepare("UPDATE users SET saldo = saldo - ? WHERE id = ?");
    $query->execute([$total_harga, $user_id]);

    // Catat transaksi dengan status 'pending'
    $query = $db->prepare("INSERT INTO transactions (sender_id, receiver_id, jumlah, deskripsi, status) VALUES (?, ?, ?, ?, 'pending')");
    $query->execute([$user_id, null, $total_harga, "Pembelian pulsa (Jenis: $jenis_pulsa, Jumlah: $jumlah)"]);

    header("Location: transaksi.php");
} else {
    echo "Saldo tidak mencukupi.";
}
?>
