<?php
class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "desaku";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Koneksi database gagal: " . $e->getMessage());
        }
    }

    public function getJoinedData()
    {
        $query = "SELECT w.nama AS nama_warga, p.pekerjaan AS pekerjaan, pp.tahun AS tahun_pemilu, d.jumlah AS donasi, bp.bantuan AS bantuan_pemerintah
                  FROM warga w
                  JOIN bantuan_desa p ON w.nik = p.id_penerima
                  JOIN sos_request pp ON w.id = pp.warga_id
                  JOIN comments d ON w.id = d.warga_id
                  JOIN laporan_warga bp ON w.id = bp.warga_id";

        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Menggunakan kelas Database
$database = new Database();
$joinedData = $database->getJoinedData();

// Menampilkan hasil join
foreach ($joinedData as $data) {
    echo "Nama Warga: " . $data['nama_warga'] . "<br>";
    echo "Pekerjaan: " . $data['pekerjaan'] . "<br>";
    echo "Tahun Pemilu: " . $data['tahun_pemilu'] . "<br>";
    echo "Jumlah Donasi: " . $data['donasi'] . "<br>";
    echo "Bantuan Pemerintah: " . $data['bantuan_pemerintah'] . "<br>";
    echo "<br>";
}

// $query = "SELECT w.nama AS nama_warga, p.pekerjaan AS pekerjaan, pp.tahun AS tahun_pemilu, d.jumlah AS donasi, bp.bantuan AS bantuan_pemerintah
//                   FROM warga w
//                   JOIN pekerjaan p ON w.pekerjaan_id = p.id
//                   JOIN pemilihan_pemilu pp ON w.id = pp.warga_id
//                   JOIN donasi d ON w.id = d.warga_id
//                   JOIN bantuan_pemerintah bp ON w.id = bp.warga_id";
// -- Tabel Warga
// CREATE TABLE warga (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     nama VARCHAR(50),
//     pekerjaan_id INT,
//     -- Kolom lain yang Anda butuhkan
// );

// -- Tabel Pekerjaan
// CREATE TABLE pekerjaan (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     pekerjaan VARCHAR(50)
// );

// -- Tabel Pemilihan Pemilu
// CREATE TABLE pemilihan_pemilu (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     warga_id INT,
//     tahun INT,
//     -- Kolom lain yang Anda butuhkan
// );

// -- Tabel Donasi
// CREATE TABLE donasi (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     warga_id INT,
//     jumlah DECIMAL(10, 2),
//     -- Kolom lain yang Anda butuhkan
// );

// -- Tabel Bantuan Pemerintah
// CREATE TABLE bantuan_pemerintah (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     warga_id INT,
//     bantuan VARCHAR(100),
//     -- Kolom lain yang Anda butuhkan
// );
