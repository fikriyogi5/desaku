<?php
// session_start();

include ('../database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_type = $_POST['user_type'];
    $nik = $_POST['nik'];
    $password = $_POST['password'];

    $database = new Database($dbConfig);

    $user = $database->loginMulti('warga', $nik, $user_type, $password);

    if ($user) {
        // Login berhasil, set sesi dan arahkan ke halaman 'home.php'
        $_SESSION['user_id'] = $user['id'];
        header('Location: home.php');
        exit;
    } else {
        // Login gagal, tampilkan pesan error
        echo "Login failed. Please check your credentials.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>

<h2>Login</h2>

<form action="" method="POST">
    <label for="user_type">User Type:</label>
    <input type="text" name="user_type" id="user_type" required><br><br>
    
    <label for="nik">NIK:</label>
    <input type="text" name="nik" id="nik" required><br><br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br>

    <input type="submit" value="Login">
</form>

</body>
</html>
