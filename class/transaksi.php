<!DOCTYPE html>
<html>
<head>
    <title>Transaksi Admin</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Transaksi Admin</h1>
    <!-- Tampilkan daftar transaksi dengan status 'pending' -->
    <?php
    $query = $db->prepare("SELECT id, sender_id, jumlah, deskripsi FROM transactions WHERE status = 'pending'");
    $query->execute();
    $transaksi_pending = $query->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($transaksi_pending)) {
        echo "<table class='history'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>ID Transaksi</th>";
        echo "<th>ID Pengirim</th>";
        echo "<th>Jumlah</th>";
        echo "<th>Deskripsi</th>";
        echo "<th>Setujui</th>";
        echo "<th>Tolak</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        foreach ($transaksi_pending as $transaksi) {
            echo "<tr>";
            echo "<td>{$transaksi['id']}</td>";
            echo "<td>{$transaksi['sender_id']}</td>";
            echo "<td>{$transaksi['jumlah']}</td>";
            echo "<td>{$transaksi['deskripsi']}</td>";
            echo "<td><a href='setujui_transaksi.php?id={$transaksi['id']}'>Setujui</a></td>";
            echo "<td><a href='tolak_transaksi.php?id={$transaksi['id']}'>Tolak</a></td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "<p>Tidak ada transaksi pending.</p>";
    }
    ?>
</body>
</html>
