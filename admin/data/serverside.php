<?php
require_once 'Database.php';

$db = new Database();
$conn = $db->getConnection();

// Define DataTables columns
$columns = array(
    0 => 'id',
    1 => 'nama',
    2 => 'nik',
    // Add more columns as needed
);

// Define your table
$table = 'warga';

// Define primary key column
$primaryKey = 'id';

// Start building the SQL query
$sql = "SELECT * FROM $table";

// Implement WHERE conditions, searching, etc., if needed
if (!empty($_POST['search']['value'])) {
    $sql .= " WHERE (nama LIKE '%" . $_POST['search']['value'] . "%' OR nik LIKE '%" . $_POST['search']['value'] . "%')";
}

// Execute the SQL query
$query = $conn->prepare($sql);
$query->execute();
$totalData = $query->rowCount();
$totalFiltered = $totalData;

// Add sorting and paging to the query
if (!empty($_POST['order'])) {
    $sql .= " ORDER BY " . $columns[$_POST['order'][0]['column']] . " " . $_POST['order'][0]['dir'];
}

$start = $_POST['start'];
$length = $_POST['length'];
$sql .= " LIMIT " . $start . "," . $length;

$query = $conn->prepare($sql);
$query->execute();

// Fetch data and format as JSON
$data = array();
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $nestedData = array();
    $nestedData[] = $row['id'];
    $nestedData[] = "<a href='edit.php?id=" . $row['id'] . "'>" . $row['nama'] . "</a>";
    $nestedData[] = "<a href='profile-2.php?id=" . $row['id'] . "'>" . $row['nik'] . "</a>";
    $nestedData[] = "<a href='kk.php?kk=" . $row['kk'] . "'>" . $row['kk'] . "</a>";
    $nestedData[] = $row['alamat'];
    $nestedData[] = $row['tempat_lahir'];
    $nestedData[] = $row['tanggal_lahir'];
    // Tambahkan kolom lain jika diperlukan

    $data[] = $nestedData;
}


// Prepare JSON response
$json_data = array(
    "draw"            => intval($_POST['draw']),
    "recordsTotal"    => intval($totalData),
    "recordsFiltered" => intval($totalFiltered),
    "data"            => $data
);

echo json_encode($json_data);
?>
