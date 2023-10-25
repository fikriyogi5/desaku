<?php
$host = 'localhost';
$dbname = 'desaku';
$username = 'root';
$password = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}



$columns = array(
    0 => 'id',
    1 => 'nama',
    2 => 'jk',
    3 => 'alamat'
);

// $category = isset($_GET['jk']) ? $_GET['jk'] : '';
$category = $_POST['gender']; // Changed from $_GET to $_POST
$searchValue = isset($_GET['search']['value']) ? $_GET['search']['value'] : '';

$draw = isset($_GET['draw']) ? $_GET['draw'] : 1; // Default to 1 if not set

if (!empty($category)) {
    $sql .= " AND gender = :gender"; // Assuming your column is named 'gender'
}

$sql = "SELECT * FROM warga WHERE 1 = 1";

if (!empty($jk)) {
    $sql .= " AND jk = '$jk'";
}

if (!empty($searchValue)) {
    $sql .= " AND (id LIKE '%" . $searchValue . "%' ";
    $sql .= " OR nama LIKE '%" . $searchValue . "%' ";
    $sql .= " OR jk LIKE '%" . $searchValue . "%' ";
    $sql .= " OR alamat LIKE '%" . $searchValue . "%' )";
}

$query = $db->prepare($sql);
if (!empty($category)) {
    $query->bindParam(':gender', $category, PDO::PARAM_STR);
}
$query->execute();
$totalData = $query->rowCount();
$totalFiltered = $totalData;
$data = array();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

$json_data = array(
    "draw" => intval($draw),
    "recordsTotal" => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data" => $data
);

echo json_encode($json_data);
?>
