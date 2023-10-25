<?php
session_start();
session_destroy(); // Menghancurkan semua sesi
header("Location: login.php"); // Mengarahkan pengguna ke halaman login setelah logout
exit;
?>
