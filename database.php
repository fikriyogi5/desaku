<?php
include 'error_handling.php';
include "functions.php";

// Membuat objek database
$dbConfig = array(
    'host' => DB_HOST,
    'username' => DB_USER,
    'password' => DB_PASS,
    'database' => DB_NAME,
);

class Database
{
    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;

    public function __construct($config)
    {
        $this->host = $config['host'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->database = $config['database'];

        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function create($table, $data)
    {
        $keys = implode(', ', array_keys($data));
        $values = implode(', ', array_fill(0, count($data), '?'));

        $query = "INSERT INTO $table ($keys) VALUES ($values)";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array_values($data));
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function uploadFile($fileInputName, $targetDirectory, $allowedExtensions, $maxFileSize)
    {
        if (isset($_FILES[$fileInputName]) && !empty($_FILES[$fileInputName]['name'])) {
            // Check if there was a file uploaded
            $targetFile = $targetDirectory . basename($_FILES[$fileInputName]['name']);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $uploadOk = true;

            // Check if the file extension is allowed
            if (!in_array($imageFileType, $allowedExtensions)) {
                return 'Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.';
            }

            // Check if the file size is within the limit
            if ($_FILES[$fileInputName]['size'] > $maxFileSize) {
                return 'Ukuran gambar terlalu besar. Maksimal 500 KB.';
            }

            // Attempt to move the uploaded file to the target directory
            if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $targetFile)) {
                // Return the uploaded file name
                return basename($_FILES[$fileInputName]['name']);
            } else {
                return 'Terjadi kesalahan saat mengunggah gambar.';
            }
        }

        // Return null if no file was uploaded
        return null;
    }

    public function login($table, $username, $password)
    {
        // Mengecek apakah username ada di database
        $query = "SELECT * FROM $table WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            // Username tidak ditemukan
            return false;
        }

        // Memeriksa apakah password cocok
        if (password_verify($password, $user['password'])) {
            // Password cocok, login berhasil
            return $user;
        } else {
            // Password tidak cocok
            return false;
        }
    }
    public function read($table, $condition = '', $limit = null)
    {
        $query = "SELECT * FROM $table";
        if ($condition != '') {
            $query .= " WHERE $condition";
        }
        if ($limit !== null) {
            $query .= " LIMIT $limit";
        }

        try {
            $stmt = $this->conn->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function readDataFromFiveTables($wargaTable, $pekerjaanTable, $pemiluTable, $donasiTable, $bantuanTable, $condition = '', $limit = null)
    {
        $query = "SELECT w.nama, w.usia, p.pekerjaan, pem.tanggal_pemilu, d.jumlah_donasi, bp.jenis_bantuan
                FROM $wargaTable AS w
                LEFT JOIN $pekerjaanTable AS p ON w.id_pekerjaan = p.id
                LEFT JOIN $pemiluTable AS pem ON w.id_warga = pem.id_warga
                LEFT JOIN $donasiTable AS d ON w.id_warga = d.id_warga
                LEFT JOIN $bantuanTable AS bp ON w.id_warga = bp.id_warga";
        
        if ($condition != '') {
            $query .= " WHERE $condition";
        }
        
        if ($limit !== null) {
            $query .= " LIMIT $limit";
        }

        try {
            $stmt = $this->conn->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
        // $db = new YourDatabaseClass();
        // $data = $db->readDataFromFiveTables('warga', 'pekerjaan', 'pemilihan_pemilu', 'donasi', 'bantuan_pemerintah');

        // $db = new YourDatabaseClass();
        // $condition = 'w.usia > 30';
        // $limit = 10;
        // $data = $db->readDataWithConditionAndLimit('warga', 'pekerjaan', 'pemilihan_pemilu', 'donasi', 'bantuan_pemerintah', $condition, $limit);

    }


    public function countData($table, $condition = '')
    {
        $query = "SELECT COUNT(*) as total FROM $table";
        if ($condition != '') {
            $query .= " WHERE $condition";
        }

        try {
            $stmt = $this->conn->query($query);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function update($table, $data, $condition)
    {
        $setClause = implode('=?, ', array_keys($data)) . '=?';

        $query = "UPDATE $table SET $setClause WHERE $condition";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute(array_values($data));
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    public function delete($table, $condition)
    {
        $query = "DELETE FROM $table WHERE $condition";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function loginMulti($table, $nik, $user_type, $password)
    {
        // Verify that the user_type is valid
        $query = "SELECT * FROM $table WHERE nik = :nik AND user_type = :user_type";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nik', $nik, PDO::PARAM_STR); // Menghapus tanda ":" sebelum 'nik'
        $stmt->bindParam(':user_type', $user_type, PDO::PARAM_STR); // Menghapus tanda ":" sebelum 'user_type'
        $stmt->execute();

        try {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                // Token tidak valid atau tidak ditemukan
                return false;
            }

            // Memeriksa apakah password cocok
            if (password_verify($password, $user['password'])) {
                // Password cocok, login berhasil
                return $user;
            } else {
                // Password tidak cocok
                return false;
            }
        } catch (PDOException $e) {
            throw new Exception("Error: " . $e->getMessage());
        }
    }

    // Fungsi autentikasi pengguna
    public function authenticateUser($username, $password)
    {
        // Di sini Anda dapat menambahkan logika autentikasi berdasarkan jenis kredensial
        // Misalnya, validasi untuk admin, sekdes, kades, warga, dll.

        // Contoh autentikasi sederhana (username dan password disimpan dalam array)
        $users = [
            ['username' => 'admin', 'password' => 'admin_password', 'type' => 'admin'],
            ['username' => 'sekdes', 'password' => 'sekdes_password', 'type' => 'sekdes'],
            ['username' => 'kades', 'password' => 'kades_password', 'type' => 'kades'],
            ['username' => 'warga', 'password' => 'warga_password', 'type' => 'warga'],
            // Tambahkan pengguna lain jika diperlukan
        ];

        // Cari pengguna berdasarkan username
        foreach ($users as $user) {
            if ($user['username'] === $username && $user['password'] === $password) {
                return $user['type']; // Kembalikan jenis kredensial pengguna
            }
        }

        return false; // Autentikasi gagal
    }
    public function getUserByUsername($nik)
    {
        $stmt = $this->conn->prepare("SELECT * FROM warga WHERE nik = :nik");
        $stmt->execute([':nik' => $nik]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function generatePasswordResetToken($table, $email)
    {
        // Generate a unique token
        $token = bin2hex(random_bytes(32));

        // Store the token in the database along with the user's email
        $query = "UPDATE $table SET password_reset_token = :token WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $token;
    }
    public function resetPassword($table, $email, $token, $newPassword)
    {
        // Verify that the token is valid
        $query = "SELECT * FROM $table WHERE email = :email AND password_reset_token = :token";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':token', $token, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            // Token tidak valid atau tidak ditemukan
            return false;
        }

        // Reset password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $query = "UPDATE $table SET password = :password, password_reset_token = NULL WHERE email = :email";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return true;
    }
    public function generateUniqueAduanNumber($length = 8)
    {
        // Karakter yang akan digunakan untuk nomor aduan
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // Inisialisasi nomor aduan acak
        $aduanNumber = '';

        // Loop untuk menghasilkan nomor aduan acak dengan panjang tertentu
        for ($i = 0; $i < $length; $i++) {
            $aduanNumber .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $aduanNumber;
    }
    public function readLastAduanNumber()
    {
        try {
            $query = "SELECT last_aduan_number FROM aduan";
            $stmt = $this->conn->query($query);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['last_aduan_number'];
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function checkDuplicateAduan($nama, $jenis)
    {
        $query = "SELECT COUNT(*) FROM aduan WHERE nama = :nama AND jenis = :jenis";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
            $stmt->bindParam(':jenis', $jenis, PDO::PARAM_STR);
            $stmt->execute();

            // Mengambil jumlah baris yang sesuai dengan kriteria
            $count = $stmt->fetchColumn();

            return $count > 0; // Mengembalikan true jika ada duplikat, false jika tidak
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function updateLastAduanNumber($newAduanNumber)
    {
        try {
            $query = "UPDATE aduan SET last_aduan_number = :newNumber";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':newNumber', $newAduanNumber, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function ReadMultiTable($tables, $columns, $joins, $where = null)
    {
        $tablesClause = implode(', ', $tables);
        $columnsClause = implode(', ', $columns);
        $joinsClause = implode(' ', $joins);

        $query = "SELECT $columnsClause FROM $tablesClause $joinsClause";

        if ($where) {
            $query .= " WHERE $where";
        }

        try {
            $stmt = $this->conn->query($query);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

// Contoh penggunaan:

// Contoh penggunaan:

    // Contoh penggunaan:
    // $tables = ['warga', 'rumah', 'pekerjaan'];
    // $columns = ['warga.nama', 'rumah.alamat', 'pekerjaan.jabatan'];
    // $joins = [
    //     'INNER JOIN rumah ON warga.id = rumah.warga_id',
    //     'INNER JOIN pekerjaan ON warga.id = pekerjaan.warga_id'
    // ];
    // $where = 'warga.id = 1'; // Opsional, tambahkan kondisi WHERE jika diperlukan

    // $result = $database->read($tables, $columns, $joins, $where);

    // if ($result) {
    //     foreach ($result as $row) {
    //         echo "Nama: " . $row['nama'] . "<br>";
    //         echo "Alamat: " . $row['alamat'] . "<br>";
    //         echo "Jabatan: " . $row['jabatan'] . "<br>";
    //         echo "<br>";
    //     }
    // } else {
    //     echo "Gagal membaca data.";
    // }

    public function filterData($table, $filterField, $filterValue)
    {
        // Melakukan query untuk mengambil data berdasarkan filter
        $stmt = $this->conn->prepare("SELECT * FROM $table WHERE $filterField LIKE :filterValue");
        $filterValue = "%$filterValue%"; // Menambahkan wildcard (%) agar mencari nilai yang cocok
        $stmt->bindParam(':filterValue', $filterValue, PDO::PARAM_STR);
        $stmt->execute();

        // Mengambil hasil query sebagai array asosiatif
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
    public function searchNama($nama)
    {
        $query = "SELECT nama FROM warga WHERE nama LIKE :nama";
        $stmt = $this->conn->prepare($query);
        $nama = "%$nama%"; // Menambahkan wildcard (%) agar mencari nama yang cocok
        $stmt->bindParam(':nama', $nama, PDO::PARAM_STR);
        $stmt->execute();

        // Mengambil hasil query sebagai array asosiatif
        $result = $stmt->fetchAll(PDO::FETCH_COLUMN);

        return $result;
    }

}

// Konfigurasi database
// $dbConfig = array(
//     'host' => 'localhost',
//     'username' => 'root',
//     'password' => '',
//     'database' => 'desaku'
// );

// // Membuat objek database
// $database = new Database($dbConfig);

// // Contoh penggunaan:
// // Membuat data
// $dataToInsert = array('nama' => 'John Doe', 'email' => 'john@example.com');
// $database->create('tabel_nama', $dataToInsert);

// // Membaca data
// $allData = $database->read('tabel_nama');
// var_dump($allData);

// // Mengupdate data
// $updateData = array('nama' => 'Jane Doe', 'email' => 'jane@example.com');
// $database->update('tabel_nama', $updateData, 'id=1');

// // Menghapus data
// $database->delete('tabel_nama', 'id=2');
//
