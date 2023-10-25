<?php
require_once 'config.php';

$table = $_GET['table'];
$kategori = @$_GET['kategori'];
$label = @$_GET['label'];

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
if (empty($kategori) || empty($label)) {
    // Jika salah satu atau keduanya kosong, ambil semua data
    $sql = "SELECT " . implode(", ", $columns) . " FROM $table";
} else {
    // Jika keduanya terisi, gunakan klausa WHERE
    $sql = "SELECT " . implode(", ", $columns) . " FROM $table WHERE $kategori = :label";
}

// Implement WHERE conditions, searching, etc., if needed
if (!empty($_POST['search']['value'])) {
    $search = $_POST['search']['value'];
    $searchConditions = array();
    foreach ($columns as $column) {
        $searchConditions[] = "$column LIKE '%$search%'";
    }
    $sql .= " AND (" . implode(" OR ", $searchConditions) . ")";
}

// Execute the SQL query with parameter binding
$query = $conn->prepare($sql);

if (!empty($kategori) && !empty($label)) {
    $query->bindValue(':label', $label);
}

$query->execute();

// Count total data (before applying LIMIT)
$totalData = $query->rowCount();

// Add sorting and paging to the query
if (!empty($_POST['order'])) {
    $orderByColumn = $columns[$_POST['order'][0]['column']];
    $orderDir = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY $orderByColumn $orderDir";
}

$start = $_POST['start'];
$length = $_POST['length'];
$sql .= " LIMIT $start, $length";

// Execute the SQL query again after applying sorting and paging
$query = $conn->prepare($sql);

if (!empty($kategori) && !empty($label)) {
    $query->bindValue(':label', $label);
}

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
                $nestedData[] = "<a href='profile-2.php?id=" . $row['id'] . "'>" . $row[$column] . "</a>";
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
    "recordsFiltered" => intval($totalData), // Jumlah data yang difilter sekarang adalah total data setelah filter
    "data"            => $data
);

echo json_encode($json_data);
?>
