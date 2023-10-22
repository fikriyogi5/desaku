<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'desaku');
define('DB_USER', 'root');
define('DB_PASS', '');

session_start();
// Fungsi untuk mengambil terjemahan dari database
function getTranslation($pdo, $language, $textKey) {
    $stmt = $pdo->prepare('SELECT text_translation FROM translations WHERE language_code = ? AND text_key = ?');
    $stmt->execute([$language, $textKey]);
    $result = $stmt->fetchColumn();
    
    return $result !== false ? $result : $textKey; // Kembalikan teks asli jika terjemahan tidak ditemukan
}

// Koneksi ke database
try {
    $pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.'', DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Koneksi ke database gagal: ' . $e->getMessage());
}

// Mulai atau lanjutkan sesi

// Periksa apakah bahasa sudah dipilih dalam sesi
if (isset($_GET['language'])) {
    $selectedLanguage = $_GET['language'];
    $_SESSION['selected_language'] = $selectedLanguage;

    // Redirect ke halaman translate.php tanpa menyertakan parameter bahasa dalam URL
    header('Location: translate.php');
    exit();
} elseif (isset($_SESSION['selected_language'])) {
    $selectedLanguage = $_SESSION['selected_language'];
} else {
    // Jika belum ada bahasa yang dipilih dalam sesi, gunakan bahasa default
    $selectedLanguage = 'en'; // Ganti dengan bahasa default yang Anda inginkan
}

// Ambil daftar kunci terjemahan dari database
$query = $pdo->prepare('SELECT DISTINCT text_key FROM translations');
$query->execute();
$textKeys = $query->fetchAll(PDO::FETCH_COLUMN);

// Terjemahkan teks
$translations = [];

foreach ($textKeys as $textKey) {
    $translations[$textKey] = getTranslation($pdo, $selectedLanguage, $textKey);
}






// Pesan error kustom
define('ERROR_EMAIL_EXIST', htmlspecialchars($translations['ERROR_EMAIL_EXIST']));
define('SUCCES_INPUT', htmlspecialchars($translations['SUCCES_INPUT']));
define('IMAGE_UPLOAD_FILE_TYPE', htmlspecialchars($translations['IMAGE_UPLOAD_FILE_TYPE']));
define('FAILED_INPUT', htmlspecialchars($translations['FAILED_INPUT']));
define('ERROR_PASSWORD_NOT_MATCH', 'Konfirmasi password tidak cocok');
?>
