<?php
// Koneksi ke database
$host = 'localhost';
$dbname = 'test';
$username = 'root';
$password = '';

try {
    $koneksi = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query untuk mengambil data laki-laki dan perempuan per bulan
    $query = "SELECT DATE_FORMAT(tanggal_lahir, '%m') AS periode,
              SUM(CASE WHEN jk = 'L' THEN 1 ELSE 0 END) AS jumlah_laki,
              SUM(CASE WHEN jk = 'P' THEN 1 ELSE 0 END) AS jumlah_perempuan
              FROM warga
              GROUP BY periode
              ORDER BY periode";
    $result = $koneksi->query($query);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($data);
} catch (PDOException $e) {
    echo "Koneksi database gagal: " . $e->getMessage();
}
?>
