<?php
include('db.php');
include('function.php');

if(isset($_POST["user_id"]))
{
    $output = array();
    $statement = $connection->prepare(
        "SELECT * FROM surat 
        WHERE id = :user_id 
        LIMIT 1"
    );
    $statement->bindParam(':user_id', $_POST["user_id"]);
    $statement->execute();
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $output = [
            "first_name" => $row["first_name"],
            "last_name" => $row["last_name"],
            "user_image" => ($row["image"] != '') ? '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />' : '<input type="hidden" name="hidden_user_image" value="" />'
        ];
        echo json_encode($output);
    } else {
        echo json_encode(["error" => "Data not found"]); // Menambahkan pesan kesalahan jika data tidak ditemukan
    }
}
?>
