<?php

// Hapus semua variabel sesi
    session_unset();

    // Hancurkan sesi
    session_destroy();

    // Alihkan ke halaman login
    header('Location: login.php'); // Ganti 'login.php' dengan halaman login Anda
    exit;