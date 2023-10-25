<?php
include('db.php');
include('function.php');

if (isset($_POST["user_id"])) {
    $user_id = $_POST["user_id"];
    
    // Ambil nama gambar dari basis data
    $image = get_image_name($user_id);

    // Hapus data dari basis data
    $statement = $connection->prepare("DELETE FROM surat WHERE id = :id");
    $result = $statement->execute([':id' => $user_id]);

    if (!empty($result)) {
        echo 'Data Deleted';
    }

    // Hapus gambar jika ada
    if ($image != '') {
        $image_path = "upload/" . $image;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
    }
}
?>
