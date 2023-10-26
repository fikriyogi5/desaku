<?php
// Sambungkan ke database
try {
    $db = new PDO('mysql:host=localhost;dbname=desaku', 'root', '');
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// Ambil data dari tabel "data_pending"
$stmtPending = $db->query("SELECT * FROM warga_update WHERE nik=".$_GET['nik']."");
$dataPending = $stmtPending->fetchAll(PDO::FETCH_ASSOC);

// Ambil data dari tabel "data_approved"
$stmtApproved = $db->query("SELECT * FROM warga WHERE nik=".$_GET['nik']."");
$dataApproved = $stmtApproved->fetchAll(PDO::FETCH_ASSOC);

// Bandingkan data dari kedua tabel
$commonData = [];
$uniqueDataPending = [];
$uniqueDataApproved = [];

// Loop melalui data_pending dan cari yang cocok di data_approved
foreach ($dataPending as $pending) {
    $found = false;
    foreach ($dataApproved as $approved) {
        if ($pending['nama'] === $approved['nama']) {
            $commonData[] = $pending;
            $found = true;
            break;
        }
    }
    if (!$found) {
        $uniqueDataPending[] = $pending;
    }
}

// Loop melalui data_approved dan cari yang tidak ada di data_pending
foreach ($dataApproved as $approved) {
    $found = false;
    foreach ($dataPending as $pending) {
        if ($approved['nama'] === $pending['nama']) {
            $found = true;
            break;
        }
    }
    if (!$found) {
        $uniqueDataApproved[] = $approved;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perbandingan Data</title>
</head>
<body>
    <h1>Perbandingan Data</h1>

    <h2>Data yang Sama antara data_pending dan data_approved:</h2>
    <ul>
        <?php foreach ($commonData as $data): ?>
            <li><?= $data['nama'] ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Data yang Ada di data_pending tetapi Tidak di data_approved:</h2>
    <ul>
        <?php foreach ($uniqueDataPending as $data): ?>
            <li><?= $data['nama'] ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Data yang Ada di data_approved tetapi Tidak di data_pending:</h2>
    <ul>
        <?php foreach ($uniqueDataApproved as $data): ?>
            <li><?= $data['nama'] ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
