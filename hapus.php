<?php
// Sisipkan kelas Database
require_once 'database.php';

$database = new Database($dbConfig);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    // Mengambil data yang akan dihapus
    $mahasiswa = $database->read('mahasiswa', "id=$id");

    if ($mahasiswa) {
        $mhs = $mahasiswa[0];
        ?>
        <h1>Konfirmasi Hapus Data</h1>
        <p>Apakah Anda yakin ingin menghapus data mahasiswa ini?</p>
        <p>ID: <?php echo $mhs['id']; ?></p>
        <p>Nama: <?php echo $mhs['nama']; ?></p>
        <p>Alamat: <?php echo $mhs['alamat']; ?></p>
        <a href="hapus.php?id=<?php echo $id; ?>&confirm=true">Hapus</a> | <a href="index.php">Batal</a>
        <?php
    } else {
        echo 'Data tidak ditemukan.';
    }
}

// Jika pengguna mengkonfirmasi penghapusan
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['confirm']) && $_GET['confirm'] == 'true') {
    $id = $_GET['id'];

    // Menghapus data dari database
    if ($database->delete('mahasiswa', "id=$id")) {
        echo 'Data berhasil dihapus. <a href="index.php">Kembali ke Daftar Mahasiswa</a>';
    } else {
        echo 'Gagal menghapus data.';
    }
}
?>
