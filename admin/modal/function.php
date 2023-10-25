<?php

function upload_image()
{
    if(isset($_FILES["user_image"]))
    {
        if ($_FILES["user_image"]["error"] == UPLOAD_ERR_OK) {
            $new_name = uniqid() . '.' . pathinfo($_FILES["user_image"]["name"], PATHINFO_EXTENSION);
            $destination = './upload/' . $new_name;
            move_uploaded_file($_FILES["user_image"]["tmp_name"], $destination);
            return $new_name;
        }
    }
    return null; // Kembalikan null jika tidak ada gambar yang diunggah
}

function get_image_name($user_id)
{
    include('db.php');
    $statement = $connection->prepare("SELECT image FROM surat WHERE id = :user_id");
    $statement->bindParam(':user_id', $user_id);
    $statement->execute();
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    return $result ? $result["image"] : '';
}


function get_total_all_records()
{
    include('db.php');
    $statement = $connection->prepare("SELECT COUNT(*) FROM surat");
    $statement->execute();
    return $statement->fetchColumn();
}
