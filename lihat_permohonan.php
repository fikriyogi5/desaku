
<?php
// Sambungkan ke database
try {
    $db = new PDO('mysql:host=localhost;dbname=namadatabase', 'username', 'password');
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newData = $_POST['new_data'];

    // Masukkan data baru ke tabel "data_pending"
    $stmt = $db->prepare("INSERT INTO data_pending (data) VALUES (:data)");
    $stmt->bindParam(':data', $newData);
    $stmt->execute();

    // Beri pesan bahwa permintaan telah dikirim
    echo "Permintaan pembaruan data telah dikirim dan menunggu persetujuan admin.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Permintaan Pembaruan Data</title>
</head>
<body>
    <form method="post">
        <textarea name="new_data"></textarea>
        <input type="submit" value="Kirim Permintaan Pembaruan">
    </form>
</body>
</html>
<?php
// Sambungkan ke database
try {
    $db = new PDO('mysql:host=localhost;dbname=namadatabase', 'username', 'password');
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    if ($status === 'approved') {
        // Ambil data dari "data_pending"
        $stmt = $db->prepare("SELECT data FROM data_pending WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchColumn();

        // Masukkan data ke tabel "data_approved"
        $stmt = $db->prepare("INSERT INTO data_approved (data) VALUES (:data)");
        $stmt->bindParam(':data', $data);
        $stmt->execute();

        // Hapus data dari "data_pending"
        $stmt = $db->prepare("DELETE FROM data_pending WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } else {
        // Jika ditolak, cukup hapus dari "data_pending"
        $stmt = $db->prepare("DELETE FROM data_pending WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    // Beri pesan bahwa status telah diperbarui
    echo "Status permintaan dengan ID $id telah diperbarui menjadi $status.";
}

// Ambil semua permintaan yang masih dalam status "pending" dari "data_pending"
$stmt = $db->query("SELECT * FROM data_pending");
$dataRequests = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Permintaan Pembaruan Data</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Action</th>
        </tr>
        <?php foreach ($dataRequests as $request): ?>
            <tr>
                <td><?= $request['id'] ?></td>
                <td><?= $request['data'] ?></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="id" value="<?= $request['id'] ?>">
                        <select name="status">
                            <option value="approved">Disetujui</option>
                            <option value="rejected">Ditolak</option>
                        </select>
                        <input type="submit" value="Simpan">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>


<?php
// Sambungkan ke database
try {
    $db = new PDO('mysql:host=localhost;dbname=namadatabase', 'username', 'password');
} catch (PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}

// Periksa apakah pengguna sudah login (sesuaikan sesuai dengan sistem autentikasi Anda)
// Jika belum login, Anda bisa redirect ke halaman login.
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Ambil status permintaan pembaruan data untuk pengguna yang sudah login
$userID = $_SESSION['user_id']; // Gantilah ini dengan cara Anda menyimpan ID pengguna pada sesi
$stmt = $db->prepare("SELECT * FROM data_pending WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $userID);
$stmt->execute();
$dataRequests = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Status Permintaan Pembaruan Data</title>
</head>
<body>
    <h1>Status Permintaan Pembaruan Data</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Status</th>
        </tr>
        <?php foreach ($dataRequests as $request): ?>
            <tr>
                <td><?= $request['id'] ?></td>
                <td><?= $request['data'] ?></td>
                <td><?= $request['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

google search
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google-like Mobile Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .header {
            background-color: #4285f4;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .search-container {
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .search-box {
            width: 80%;
            max-width: 400px;
            padding: 10px;
            border: none;
        }

        .search-button {
            background-color: #4285f4;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        .search-options {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            background-color: white;
        }

        .search-results {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Google-like Mobile Search</h1>
    </div>

    <div class="search-container">
        <input type="text" class="search-box" placeholder="Cari di Google">
        <button class="search-button">Cari</button>
    </div>

    <div class="search-options">
        <div>
            <input type="radio" name="search-type" value="web" id="web" checked>
            <label for="web">Web</label>
        </div>
        <div>
            <input type="radio" name="search-type" value="images" id="images">
            <label for="images">Gambar</label>
        </div>
        <div>
            <input type="radio" name="search-type" value="videos" id="videos">
            <label for="videos">Video</label>
        </div>
    </div>

    <div class="search-results">
        <!-- Placeholder for search results -->
    </div>

    <script>
        // Simpan elemen-elemen HTML yang diperlukan
        const searchBox = document.querySelector('.search-box');
        const searchButton = document.querySelector('.search-button');
        const searchOptions = document.querySelectorAll('input[name="search-type"]');
        const searchResults = document.querySelector('.search-results');

        // Fungsi untuk menampilkan hasil pencarian (di sini hanya placeholder)
        function showSearchResults() {
            searchResults.innerHTML = '<p>Ini adalah hasil pencarian Anda.</p>';
        }

        // Tambahkan event listener untuk tombol pencarian
        searchButton.addEventListener('click', showSearchResults);

        // Tambahkan event listener untuk tipe pencarian yang dipilih
        searchOptions.forEach(option => {
            option.addEventListener('change', showSearchResults);
        });
    </script>
</body>
</html>
