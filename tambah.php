<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        /* Gaya untuk daftar saran nama */
    #nama_suggestion li {
        list-style: none; /* Menghilangkan bullet point pada list */
        padding: 5px; /* Padding untuk memberikan ruang di sekitar setiap nama */
        background-color: #f2f2f2; /* Warna latar belakang untuk setiap nama */
        border: 1px solid #ddd; /* Garis tepi */
        cursor: pointer; /* Kursor berubah menjadi tangan saat diarahkan ke atas */
    }

    /* Gaya untuk daftar saran nama saat dihover */
    #nama_suggestion li:hover {
        background-color: #ddd; /* Warna latar belakang yang berbeda saat dihover */
    }
    </style>
</head>
<body>
    <h1>Tambah Data Mahasiswa</h1>

    <?php
require_once 'database.php';

$database = new Database($dbConfig);
// Inisialisasi variabel untuk menyimpan nilai-nilai yang akan diisi kembali ke dalam formulir
// Inisialisasi variabel untuk menyimpan nilai-nilai yang akan diisi kembali ke dalam formulir
$namaValue = '';
$alamatValue = '';
$emailValue = '';
$passwordValue = '';
$confirmPasswordValue = '';
$hobiValue = [];
$jenisKelaminValue = '';
$tanggalLahirValue = '';


function uploadGambar() {
    if (isset($_FILES['gambar_profil']) && !empty($_FILES['gambar_profil']['name'])) {
        $targetDirectory = 'uploads/';
        $targetFile = $targetDirectory . basename($_FILES['gambar_profil']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $uploadOk = true;

        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            // return IMAGE_UPLOAD_FILE_TYPE;
            echo ERROR_IMAGE_UPLOAD_FILE_TYPE;
        }

        if ($_FILES['gambar_profil']['size'] > 500000) {
            return "Ukuran gambar terlalu besar. Maksimal 500 KB.";
        }

        if (move_uploaded_file($_FILES['gambar_profil']['tmp_name'], $targetFile)) {
            return "Gambar berhasil diunggah dan disimpan.";
        } else {
            return "Terjadi kesalahan saat mengunggah gambar.";
        }
    } else {
        return "Anda belum memilih file gambar untuk diunggah.";
    }
}

function validatePassword($password) {
    $length = strlen($password);
    if ($length < 3) {
        return "Password harus memiliki setidaknya 8 karakter.";
    }

    // if (!preg_match('/[A-Za-z]/', $password) || !preg_match('/\d/', $password)) {
    //     return "Password harus mengandung kombinasi huruf dan angka.";
    // }

    return "";
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadResult = uploadGambar();

    if (strpos($uploadResult, "Terjadi kesalahan") === false) {
        $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
        $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $confirmPassword = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);
        $hobi = isset($_POST['hobi']) ? $_POST['hobi'] : [];
        $jenisKelamin = filter_input(INPUT_POST, 'jenis_kelamin', FILTER_SANITIZE_STRING);
        $tanggalLahir = filter_input(INPUT_POST, 'tanggal_lahir', FILTER_SANITIZE_STRING);

        // Simpan nilai-nilai yang akan diisi kembali ke dalam formulir
        $namaValue = $nama;
        $alamatValue = $alamat;
        $emailValue = $email;
        $passwordValue = $password;
        $confirmPasswordValue = $confirmPassword;
        $hobiValue = $hobi;
        $jenisKelaminValue = $jenisKelamin;
        $tanggalLahirValue = $tanggalLahir;

        $existingData = $database->read('mahasiswa', "email='$email'");
        if ($existingData) {
            echo ERROR_EMAIL_EXIST . '<a href="index.php">Kembali ke Daftar Mahasiswa</a> <br>';
        } else {
            $passwordStrengthError = validatePassword($password);

            if ($passwordStrengthError !== "") {
                echo $passwordStrengthError;
            } else {
                if ($password === $confirmPassword) {
                    $gambarProfil = basename($_FILES['gambar_profil']['name']);
                    $dataToInsert = array(
                        'nama' => $nama,
                        'alamat' => $alamat,
                        'email' => $email,
                        'password' => password_hash($password, PASSWORD_DEFAULT),
                        'gambar_profil' => $gambarProfil,
                        'hobi' => implode(', ', $hobi),
                        'jenis_kelamin' => $jenisKelamin,
                        'tanggal_lahir' => $tanggalLahir
                    );

                    if ($database->create('mahasiswa', $dataToInsert)) {
                        echo SUCCES_INPUT . '<a href="index.php">Kembali ke Daftar Mahasiswa</a> <br>';
                    } else {
                        echo FAILED_INPUT . '<br>';
                    }
                } else {
                    echo ERROR_PASSWORD_NOT_MATCH . ". <br>";
                }
            }
        }
    } else {
        echo $uploadResult;
    }
}
?>
<?= FAILED_INPUT; ?>
    
<ul>
    <li><?= IMAGE_UPLOAD_FILE_TYPE; ?></li>
    <li>Ukuran gambar terlalu besar. Maksimal 500 KB.</li>
    <li>Password harus mengandung kombinasi huruf dan angka. </li>
    <li>Password harus memiliki setidaknya 8 karakter.</li>
    <li>Konfirmasi password harus cocok</li>
</ul>
<form method="post" enctype="multipart/form-data">
    <!-- <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>"> -->

    <label for="nama">Nama:</label>
    <input type="text" id="nama" name="nama" required>
    <ul id="nama_suggestion"></ul>
    <br><br>

    <label for="alamat">Alamat:</label>
    <input type="text" id="alamat" name="alamat" required>
    <br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br><br>

    <!-- Tambahkan field untuk konfirmasi password -->
    <label for="confirm_password">Konfirmasi Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
    <br><br>

    <label>Hobi:</label>
    <br>
    <input type="checkbox" id="sepak_bola" name="hobi[]" value="Sepak Bola">
    <label for="sepak_bola">Sepak Bola</label>
    <br>
    <input type="checkbox" id="basket" name="hobi[]" value="Basket">
    <label for="basket">Basket</label>
    <br>
    <input type="checkbox" id="renang" name="hobi[]" value="Renang">
    <label for="renang">Renang</label>
    <br>
    <input type="checkbox" id="berkendara" name="hobi[]" value="Berkendara">
    <label for="berkendara">Berkendara</label>
    <br><br>

    <label>Jenis Kelamin:</label>
    <input type="radio" id="pria" name="jenis_kelamin" value="Pria" required>
    <label for="pria">Pria</label>
    <input type="radio" id="wanita" name="jenis_kelamin" value="Wanita" required>
    <label for="wanita">Wanita</label>
    <br><br>

    <label for="tanggal_lahir">Tanggal Lahir:</label>
    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
    <br><br>

    Gambar Profil: <input type="file" id="gambar_profil" name="gambar_profil">
    
    <input type="submit" value="Submit">
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#nama").keyup(function() {
        var keyword = $(this).val();

        if (keyword != "") {
            $.ajax({
                url: "ajax/autocomplete.php", // Buat file PHP untuk mengambil daftar nama
                method: "POST",
                data: { keyword: keyword },
                success: function(data) {
                    $("#nama_suggestion").html(data);
                }
            });
        } else {
            $("#nama_suggestion").html("");
        }
    });

    $(document).on("click", "li", function() {
        $("#nama").val($(this).text());
        $("#nama_suggestion").html("");
    });
});
</script>

<?php include 'footer.php'; ?>
</body>
</html>