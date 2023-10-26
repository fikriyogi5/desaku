
<?php
if (isset($_GET['warga_update'])) {
    // Contoh sederhana: Tampilkan tabel warga
    include '../../database.php';
    require_once '../../auth.php';

    $database = new Database($dbConfig);

    $totalData = $database->countData('warga_update', '', 'nik'); // tabel, kondisi, group
    echo $totalData;
} else {
    // Jika parameter "warga" tidak ada, kembalikan pesan umum
    echo "Konten umum yang diperbarui secara berkala";
}
?>