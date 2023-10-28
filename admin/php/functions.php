<?php
require_once('db.php'); // Include file database.php untuk mengakses koneksi database
class Functions
{
    private $db;

    public function __construct()
    {
        $this->db = new Database(); // Membuat objek Database untuk koneksi
    }

    public function isEmailExists($email)
    {
        $conn = $this->db->getConnection();

        $stmt = $conn->prepare("SELECT COUNT(*) FROM warga WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $emailExists = $stmt->fetchColumn();

        return $emailExists > 0;
    }


    public function insertData($nama, $email, $jk, $hobi, $gambar, $password)
    {
        $conn = $this->db->getConnection();

        // Periksa apakah email sudah ada di database menggunakan isEmailExists()
        if ($this->isEmailExists($email)) {
            return "Email sudah terdaftar. Silakan gunakan email yang berbeda.";
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO warga (nama, email, jk, hobi, gambar, password) VALUES (:nama, :email, :jk, :hobi, :gambar, :password)");

            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':jk', $jk);
            $stmt->bindParam(':hobi', $hobi);
            $stmt->bindParam(':gambar', $gambar);
            $stmt->bindParam(':password', $hashedPassword);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getDataById($jenis, $id)
    {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM warga WHERE $jenis = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateData($id, $nama, $email, $jk, $hobi, $gambar)
    {
        $conn = $this->db->getConnection();
        $dataLama = $this->getDataById("id", $id); // Menggunakan method dari class Database

        $stmt = $conn->prepare("UPDATE warga SET nama = :nama, email = :email, jk = :jk, hobi = :hobi, gambar = :gambar WHERE id = :id");

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':jk', $jk);
        $stmt->bindParam(':hobi', $hobi);

        // Jika gambar baru diunggah, gunakan yang baru. Jika tidak, gunakan gambar lama.
        if (!empty($gambar)) {
            $stmt->bindParam(':gambar', $gambar);
        } else {
            $stmt->bindParam(':gambar', $dataLama['gambar']);
        }

        return $stmt->execute();
    }

    public function updatePassword($id, $passwordLama, $passwordBaru, $konfirmasiPasswordBaru)
    {
        $conn = $this->db->getConnection();
        $dataLama = $this->getDataById("id", $id); // Menggunakan method dari class Database

        // Memeriksa apakah password lama yang dimasukkan cocok dengan password yang tersimpan
        if (password_verify($passwordLama, $dataLama['password'])) {
            // Memeriksa apakah password baru dan konfirmasi password baru cocok
            if ($passwordBaru === $konfirmasiPasswordBaru) {
                // Hash password baru
                $hashedPassword = password_hash($passwordBaru, PASSWORD_DEFAULT);

                $stmt = $conn->prepare("UPDATE warga SET password = :password WHERE id = :id");
                $stmt->bindParam(':id', $id);
                $stmt->bindParam(':password', $hashedPassword);

                return $stmt->execute();
            } else {
                return false; // Password baru dan konfirmasi tidak cocok
            }
        } else {
            return false; // Password lama tidak cocok
        }
    }



   public function getAllData()
{
    $conn = $this->db->getConnection();
    $stmt = $conn->prepare("SELECT * FROM warga");
    $stmt->execute(); // Eksekusi query
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengambil semua data sebagai array
}
public function getUmur($id)
{
    $conn = $this->db->getConnection();
    $stmt = $conn->prepare("SELECT * FROM warga WHERE id=:id");
    $stmt->execute(':id', $id); // Eksekusi query
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengambil semua data sebagai array

    // Hitung umur dari data warga dan tambahkan ke dalam array
    $currentYear = date("Y");
    foreach ($data as &$row) {
        $birthdate = $row['tanggal_lahir'];
        $birthYear = date("Y", strtotime($birthdate));
        $row['umur'] = $currentYear - $birthYear;
    }

    return $data;
}
public function displayProfileImage($photoUrl, $genderCode)
{
    if (!empty($photoUrl)) {
        echo $photoUrl;
    } else {
        if ($genderCode === 'L') {
            echo 'male.png';
        } elseif ($genderCode === 'P') {
            echo 'female.png';
        } else {
            echo 'Tidak ada foto profil dan jenis kelamin tidak diketahui.';
        }
    }
}

public function getGenderDescription($genderCode)
{
    if ($genderCode === 'L') {
        return 'Laki-laki';
    } elseif ($genderCode === 'P') {
        return 'Perempuan';
    } else {
        return 'Tidak Diketahui';
    }
}
public function calculateAgeFromDateOfBirth($dateOfBirth)
{
    $currentYear = date("Y");
    $birthYear = date("Y", strtotime($dateOfBirth));
    return $currentYear - $birthYear;
}
public function countResidents($category = null, $value = null)
{
    $data = $this->getAllData(); // Mengambil semua data

    // Menginisialisasi variabel untuk menghitung jumlah warga
    $count = 0;

    // Mengambil hasil data satu per satu
    foreach ($data as $row) {
        // Memeriksa apakah data pada kategori yang ditentukan sesuai dengan nilai yang dicari
        if ($category === null || ($row[$category] === $value)) {
            $count++;
        }
    }

    // Mengembalikan jumlah warga
    return $count;
}


   public function displayFamilyMembersWidget($kk)
   {
       // Panggil fungsi untuk mengambil data anggota keluarga berdasarkan KK
       $familyMembers = $this->getFamilyMembersByKK($kk);

       if (!empty($familyMembers)) {
           // Tampilkan data anggota keluarga dalam bentuk tabel atau cara lain sesuai kebutuhan
           // echo '<table border="1">
           //         <tr>
           //             <th>ID</th>
           //             <th>KK</th>
           //             <th>NIK</th>
           //             <th>Nama</th>
           //             <!-- Tambahkan kolom lain sesuai kebutuhan -->
           //         </tr>';
           foreach ($familyMembers as $member) {
               echo '<tr>
               <td>' . $member['id'] . '</td>
               <td>' . $member['nama'] . '</td>
               <td>' . $member['nik'] . '</td>
               <td>' . $member['tempat_lahir'] . '</td>
               <td>' . $member['tanggal_lahir'] . '</td>
               <td>' . $member['jk'] . '</td>
               <td class="text-right noExport">' . $member['pendidikan'] . '</td>
               </tr>';

               // '<tr>
               //         <td>' . $member['id'] . '</td>
               //         <td>' . $member['kk'] . '</td>
               //         <td>' . $member['nik'] . '</td>
               //         <td>' . $member['nama'] . '</td>
               //         <!-- Tambahkan kolom lain sesuai kebutuhan -->
               //       </tr>';
           }
           // echo '</table>';
       } else {
           echo 'Tidak ada anggota keluarga ditemukan untuk KK ' . $kk;
       }
   }
   

    public function getFamilyMembersByKK($kk)
    {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM warga WHERE kk = :kk");
        $stmt->bindParam(':kk', $kk, PDO::PARAM_STR);
        $stmt->execute();

        // Menginisialisasi array untuk menyimpan data anggota keluarga
        $familyMembers = array();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $familyMembers[] = $row;
        }

        // Mengembalikan array data anggota keluarga
        return $familyMembers;
    }


    public function getDataByKategoris($table, $category, $id) {
        try {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("SELECT * FROM $table WHERE $category = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            // Menggunakan fetchAll untuk mengambil semua hasil yang cocok
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
    public function getDataByKategori($table, $category, $id) {
        try {
            $conn = $this->db->getConnection();
            $stmt = $conn->prepare("SELECT * FROM $table WHERE $category = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
    
            // Menggunakan fetch untuk mengambil satu baris data
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null; // Mengembalikan null jika terjadi kesalahan
        }
    }
    

    public function deleteData($id)
    {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("DELETE FROM warga WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
  }