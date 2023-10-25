<?php
// Koneksi ke database menggunakan PDO
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';

try {
    $koneksi = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query untuk mengambil data laporan
    $query = "SELECT * FROM laporan_masuk";
    $stmt = $koneksi->query($query);

    // Ambil semua baris data dan kembalikan sebagai JSON
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($data);
} catch (PDOException $e) {
    echo "Koneksi database gagal: " . $e->getMessage();
}
?>
