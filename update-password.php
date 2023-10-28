<?php
// if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
//     // Jika parameter 'id' kosong atau bukan angka, kembalikan ke halaman sebelumnya
//     header('Location: index.php');
//     exit;
// }

// Sisipkan kelas Database
require_once 'database.php';
require_once 'auth.php';

$database = new Database($dbConfig);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $warga = $database->read('warga', "nik=".$_SESSION['user_id']."");

    if ($warga) {
        $mhs = $warga[0];

        $passwordLama = filter_input(INPUT_POST, 'password_lama', FILTER_SANITIZE_STRING);
        $passwordBaru = filter_input(INPUT_POST, 'password_baru', FILTER_SANITIZE_STRING);
        $konfirmasiPasswordBaru = filter_input(INPUT_POST, 'konfirmasi_password_baru', FILTER_SANITIZE_STRING);

        // Validasi password lama sesuai dengan yang ada di database
        if (password_verify($passwordLama, $mhs['password'])) {
            // Validasi password baru dan konfirmasi password baru
            if ($passwordBaru === $konfirmasiPasswordBaru) {
                // Mengupdate password baru di database
                $updateData = array(
                    'password' => password_hash($passwordBaru, PASSWORD_DEFAULT)
                );

                if ($database->update('warga', $updateData, "nik=".$_SESSION['user_id']."")) {
                    header("Location: update-password.php");
                    $_SESSION['notification'] = '<div class="card card-style bg-red-dark mt-5 mx-2 me-2">
    <div class="content">
        <h4 class="color-white">Content Colors</h4>
        <p class="color-white">
            Password berhasil diperbarui!
        </p>
    </div>
</div>
';
                } else {
                    header("Location: update-password.php");
                    $_SESSION['notification'] = '<div class="card card-style bg-red-dark mt-5 mx-2 me-2">
    <div class="content">
        <h4 class="color-white">Content Colors</h4>
        <p class="color-white">
            Gagal mengupdate password!
        </p>
    </div>
</div>
';
                }
            } else {
                    header("Location: update-password.php");
                    $_SESSION['notification'] = '<div class="card card-style bg-red-dark mt-5 mx-2 me-2">
    <div class="content">
        <h4 class="color-white">Content Colors</h4>
        <p class="color-white">
            Konfirmasi password baru tidak sesuai.!
        </p>
    </div>
</div>
';
            }
        } else {
                    header("Location: update-password.php");
                    $_SESSION['notification'] = '<div class="card card-style bg-red-dark mt-5 mx-2 me-2">
    <div class="content">
        <h4 class="color-white">Content Colors</h4>
        <p class="color-white">
            Password lama tidak valid.
        </p>
    </div>
</div>
';
        }
    } else {
        echo 'Data tidak ditemukan.';
    }
} else {
    $warga = $database->read('warga', "nik=".$_SESSION['user_id']."");

    if ($warga) {
        $mhs = $warga[0];
        ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript" src="custom.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js"></script>
        <title></title>
    </head>
    <body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">
        <div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
        <div id="page">
            <div class="header header-fixed header-logo-center">
                <a href="index.html" class="header-title">Ganti Password</a>
                <a href="index.php" class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
                <a href="#" data-toggle-theme class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a>
            </div>
                    <?php

                    if (isset($_SESSION['notification'])) {
                        echo '<div id="notification">' . $_SESSION['notification'] . '</div>';
                        unset($_SESSION['notification']); // Hapus pesan notifikasi dari sesi setelah menampilkannya
                    }
                    ?>
                <div class="card mt-2">
                    <form method="post" action="" >
                        <input type="hidden" name="id" value="<?php echo $mhs['id']; ?>">
                    
                        <div class="content mb-0 mt-5">
                            <h2 class="mb-0">Account Security</h2>
                            <p class="mb-4">
                                Activate options or set different elements here that are different from basic fields.
                            </p>
                            <div class="input-style input-style-always-active has-borders no-icon validate-field">
                                <input type="password" class="form-control validate-text" id="f3c" value="" name="password_lama" placeholder="" />
                                <label for="f3c" class="color-black fw-bold font-12">Password Lama</label>
                                <i class="fa fa-times disabled invalid color-red-dark"></i>
                                <i class="fa fa-check disabled valid color-green-dark"></i>
                                <em>(required)</em>
                            </div>
                            <div class="input-style input-style-always-active has-borders no-icon validate-field">
                                <input type="password" class="form-control validate-text" id="f3a" value="" name="password_baru" placeholder="" />
                                <label for="f3a" class="color-black fw-bold font-12">Password Baru</label>
                                <i class="fa fa-times disabled invalid color-red-dark"></i>
                                <i class="fa fa-check disabled valid color-green-dark"></i>
                                <em>(required)</em>
                            </div>
                            <div class="input-style input-style-always-active has-borders no-icon validate-field">
                                <input type="password" class="form-control validate-text" id="f3b" value="" name="konfirmasi_password_baru" placeholder="" />
                                <label for="f3b" class="color-black fw-bold font-12">Konfirmasi Password Baru</label>
                                <i class="fa fa-times disabled invalid color-red-dark"></i>
                                <i class="fa fa-check disabled valid color-green-dark"></i>
                                <em>(required)</em>
                            </div>
                            <input type="submit" value="Simpan Password" class="btn btn-full bg-green-dark btn-m text-uppercase rounded-sm shadow-l mb-3 mt-4 font-900">

                        </div>
                    </form>
                </div>

            </div>
                    <?php
                } else {
                    echo 'Data tidak ditemukan.';
                }
            }
            ?>
        </div>
        <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/custom.js"></script>
        <script>
                // Tambahkan skrip JavaScript untuk menghilangkan notifikasi setelah 3 detik
                setTimeout(function() {
                    var notification = document.getElementById('notification');
                    if (notification) {
                        notification.style.display = 'none';
                    }
                }, 3000);
            </script>
 
</body>
    </body>
</html>
