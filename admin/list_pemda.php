<?php
// Connection ke database menggunakan PDO
$host = 'localhost';
$dbname = 'nama_database';
$username = 'username';
$password = 'password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle request AJAX
if(isset($_GET['q'])) {
    $term = $_GET['q'];

    // Query data dari database atau sumber data lainnya
    $query = "SELECT id, nama_pemda FROM pemda WHERE nama_pemda LIKE :term";
    $stmt = $pdo->prepare($query);
    $searchTerm = "%" . $term . "%";
    $stmt->bindParam(':term', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();

    // Format hasil sebagai JSON
    $data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = array(
            'id' => $row['id'],
            'text' => $row['nama_pemda']
        );
    }

    // Mengirimkan hasil dalam format JSON
    echo json_encode($data);
}
?>
