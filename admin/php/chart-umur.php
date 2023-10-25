<?php
class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'test';

    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO(
                "mysql:host={$this->host};dbname={$this->database}",
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }
    }
}

$db = new Database();

// Buat query untuk menghitung jumlah umur per bulan untuk laki-laki
$sqlLakiLaki = "SELECT DATE_FORMAT(tanggal_lahir, '%m') AS bulan, COUNT(*) AS jumlah
        FROM warga
        WHERE jk = 'L'
        GROUP BY DATE_FORMAT(tanggal_lahir, '%m')
        ORDER BY DATE_FORMAT(tanggal_lahir, '%m')";

$stmtLakiLaki = $db->conn->prepare($sqlLakiLaki);
$stmtLakiLaki->execute();
$resultsLakiLaki = $stmtLakiLaki->fetchAll(PDO::FETCH_ASSOC);

$labelsLakiLaki = [];
$valuesLakiLaki = [];

foreach ($resultsLakiLaki as $result) {
    $labelsLakiLaki[] = $result['bulan'];
    $valuesLakiLaki[] = $result['jumlah'];
}

// Buat query untuk menghitung jumlah umur per bulan untuk perempuan
$sqlPerempuan = "SELECT DATE_FORMAT(tanggal_lahir, '%m') AS bulan, COUNT(*) AS jumlah
        FROM warga
        WHERE jk = 'P'
        GROUP BY DATE_FORMAT(tanggal_lahir, '%m')
        ORDER BY DATE_FORMAT(tanggal_lahir, '%m')";

$stmtPerempuan = $db->conn->prepare($sqlPerempuan);
$stmtPerempuan->execute();
$resultsPerempuan = $stmtPerempuan->fetchAll(PDO::FETCH_ASSOC);

$labelsPerempuan = [];
$valuesPerempuan = [];

foreach ($resultsPerempuan as $result) {
    $labelsPerempuan[] = $result['bulan'];
    $valuesPerempuan[] = $result['jumlah'];
}

$dataLakiLaki = [
    'labels' => $labelsLakiLaki,
    'values' => $valuesLakiLaki
];

$dataPerempuan = [
    'labels' => $labelsPerempuan,
    'values' => $valuesPerempuan
];

$response = [
    'laki_laki' => $dataLakiLaki,
    'perempuan' => $dataPerempuan
];

header('Content-Type: application/json');
echo json_encode($response);
?>
