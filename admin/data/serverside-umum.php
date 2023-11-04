<?php
require_once 'config.php';
function encrypt($data, $key) {
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
    return base64_encode($iv . $encrypted);
}

$key = "vector";


$table = $_GET['table'];

if (!array_key_exists($table, $tables)) {
    die("Table not found.");
}

$tableConfig = $tables[$table];
$primaryKey = $tableConfig['primary_key'];
$columns = $tableConfig['columns'];

// Database connection
try {
    $conn = new PDO("mysql:host={$config['db_host']};dbname={$config['db_name']}", $config['db_user'], $config['db_pass']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Start building the SQL query
$sql = "SELECT " . implode(", ", $columns) . " FROM $table";

// Implement WHERE conditions, searching, etc., if needed
if (!empty($_POST['search']['value'])) {
    $search = $_POST['search']['value'];
    $searchConditions = array();
    foreach ($columns as $column) {
        $searchConditions[] = "$column LIKE '%$search%'";
    }
    $sql .= " WHERE " . implode(" OR ", $searchConditions);
}

// Execute the SQL query
$query = $conn->prepare($sql);
$query->execute();
$totalData = $query->rowCount();
$totalFiltered = $totalData;

// Add sorting and paging to the query
if (!empty($_POST['order'])) {
    $orderByColumn = $columns[$_POST['order'][0]['column']];
    $orderDir = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY $orderByColumn $orderDir";
}

$start = $_POST['start'];
$length = $_POST['length'];
$sql .= " LIMIT $start, $length";

$query = $conn->prepare($sql);
$query->execute();

// Fetch data and format as JSON
$data = array();
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $nestedData = array();
    foreach ($columns as $column) {
        // Check if the current column is 'id' to determine the link destination
        if ($column === 'nama' || $column === 'nik') {
            // Modify the link destination based on the table
            if ($table === 'warga') {
                $nestedData[] = "<a href='profile-2.php?id=" . $encrypted = encrypt($row['id'], $key) . "'>" . $row[$column] . "</a>";
            } elseif ($table === 'laporan_masuk') {
                $nestedData[] = "<a href='detail.php?id=" . $row[$column] . "'>" . $row[$column] . "</a>";
            } elseif ($table === 'desa') {
                $nestedData[] = "<a href='detail.php?id=" . $row[$column] . "'>" . $row[$column] . "</a>";
            } else {
                $nestedData[] = $row[$column];
            }
        } else {
            $nestedData[] = $row[$column];
        }
    }
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
