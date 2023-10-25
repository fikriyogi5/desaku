<?php
include('db.php');
include('function.php');

$query = '';
$output = array();
$query .= "SELECT * FROM surat ";

if(isset($_POST["search"]["value"])) {
    $query .= 'WHERE first_name LIKE "%'.$_POST["search"]["value"].'%" ';
    $query .= 'OR last_name LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"])) {
    $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
} else {
    $query .= 'ORDER BY id DESC ';
}

if($_POST["length"] != -1) {
    $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$data = array();
$filtered_rows = $statement->rowCount();

foreach($result as $row) {
    $image = ($row["image"] != '') ? '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />' : '';

    $sub_array = array(
        $image,
        $row["first_name"],
        $row["last_name"],
        '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>',
        '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>'
    );

    $data[] = $sub_array;
}

$output = array(
    "draw" => intval($_POST["draw"]),
    "recordsTotal" => $filtered_rows,
    "recordsFiltered" => get_total_all_records(),
    "data" => $data
);

echo json_encode($output);
?>
