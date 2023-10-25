<?php
function displayFamilyMembersWidget($kk) {
    // Panggil koneksi database Anda dan buat objek Data (atau sesuaikan dengan implementasi Anda)
    include 'db.php'; // Gantilah dengan file koneksi Anda
    // $data = new Database();

    // Panggil fungsi untuk mengambil data anggota keluarga berdasarkan KK
    $familyMembers = $data->getFamilyMembersByKK($kk);

    if (!empty($familyMembers)) {
        // Tampilkan data anggota keluarga dalam bentuk tabel atau cara lain sesuai kebutuhan
        echo '<table border="1">
                <tr>
                    <th>ID</th>
                    <th>KK</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>';
        foreach ($familyMembers as $member) {
            echo '<tr>
                    <td>' . $member['id'] . '</td>
                    <td>' . $member['kk'] . '</td>
                    <td>' . $member['nik'] . '</td>
                    <td>' . $member['nama'] . '</td>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                  </tr>';
        }
        echo '</table>';
    } else {
        echo 'Tidak ada anggota keluarga ditemukan untuk KK ' . $kk;
    }
}
?>
