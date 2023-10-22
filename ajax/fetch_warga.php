<?php
include "../functions.php";
// Database connection (replace with your database connection code)
$pdo = new PDO('mysql:host=localhost;dbname=desaku', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$limit = isset($_POST['limit']) ? intval($_POST['limit']) : 5;
$offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
$search = isset($_POST['search']) ? '%' . $_POST['search'] . '%' : '%';

$query = "SELECT * FROM warga WHERE nama LIKE :search OR alias LIKE :search LIMIT :offset, :limit";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':search', $search);
$stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
$stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo '<div class="list-group list-custom-small warga-item" id="listGroup">
    <a href="#" data-menu="menu-author-details" data-profile-name="' . $row['nama'] .'" data-gambar="' . $row['gambar'] .'" data-profile-umur="' . getUmurWarga($row['tanggal_lahir']) .'" data-profile-id="' . $row['id'] .'" class="show-profile">
        <span>'. $row['nama'] .'</span>
        <i class="fa fa-angle-right"></i>
    </a>'; 
}
?>
