<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];

    // Perform the database update here
    // Use prepared statements to prevent SQL injection

    // Example using PDO:
    require_once('db.php');
    $db = new Database();
    $conn = $db->getConnection();

    $stmt = $conn->prepare("UPDATE warga SET nama = :nama, email = :email WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nama', $nama);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        echo "Data berhasil diubah.";
    } else {
        echo "Gagal mengubah data.";
    }
}
?>
