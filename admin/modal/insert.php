<?php
include('db.php');
include('function.php');

if(isset($_POST["operation"]))
{
    $image = '';
    if ($_FILES["user_image"]["name"] != '') {
        // Hapus gambar lama jika ada gambar baru yang diunggah
        $image = upload_image();
    } else {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $image = $_POST["hidden_user_image"];
    }

    if($_POST["operation"] == "Add" || $_POST["operation"] == "Edit")
    {
        $data = array(
            ':first_name' => $_POST["first_name"],
            ':last_name' => $_POST["last_name"],
            ':image'  => $image
        );

        if($_POST["operation"] == "Add")
        {
            $statement = $connection->prepare("
                INSERT INTO surat (first_name, last_name, image) 
                VALUES (:first_name, :last_name, :image)
            ");
        }
        else if($_POST["operation"] == "Edit" && isset($_POST["user_id"]))
        {
            $data[':id'] = $_POST["user_id"];
            $statement = $connection->prepare("
                UPDATE surat 
                SET first_name = :first_name, last_name = :last_name, image = :image  
                WHERE id = :id
            ");
        }

        $result = $statement->execute($data);

        if(!empty($result))
        {
            if($_POST["operation"] == "Add")
            {
                echo 'Data Inserted';
            }
            else if($_POST["operation"] == "Edit")
            {
                echo 'Data Updated';
            }
        }
    }
}
?>
