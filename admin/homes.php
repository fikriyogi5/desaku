<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
</head>
<body>

<h2>Welcome to the Home Page</h2>

<?php
session_start();

if (isset($_SESSION['user_id'])) {
    // Jika ada sesi 'user_id', pengguna telah berhasil login
    echo "<p>Welcome, User ID: " . $_SESSION['user_id'] . "</p>";
    echo "<p><a href='logout.php'>Logout</a></p>"; // Tambahkan link untuk logout
} else {
    // Jika tidak ada sesi 'user_id', pengguna belum login
    echo "<p>You are not logged in.</p>";
}

?>

</body>
</html>
