<?php
    // Sisipkan kelas Database
    require_once 'database.php';

    $database = new Database($dbConfig);

    // Menampilkan data mahasiswa
    // $mahasiswa = $database->read('warga','nik="1401051804910001"','5');
    $mahasiswa = $database->read('pengaturan_aplikasi');

    if ($mahasiswa) {
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Nama</th><th>Alamat</th><th>Aksi</th></tr>';
        foreach ($mahasiswa as $mhs) {
            echo '<tr>';
            echo '<td>' . $mhs['id'] . '</td>';
            echo '<td><img src="uploads/' . $mhs['logo'] . '" width="30px"></td>';
            echo '<td>' . $mhs['nama_aplikasi'] . '</td>';
            echo '<td>' . $mhs['alamat'] . '</td>';
            echo '<td>' . $mhs['email'] . '</td>';
            echo '<td><a href="edit.php?id=' . $mhs['id'] . '">Edit</a> | <a href="hapus.php?id=' . $mhs['id'] . '">Hapus</a></td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Tidak ada data mahasiswa.';
    }
    
    ?>