    <?php
    

    // if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
    //     // Jika parameter 'id' kosong atau bukan angka, kembalikan ke halaman sebelumnya
    //     header('Location: index.php');
    //     exit;
    // }

    // Sisipkan kelas Database
    require_once 'database.php';
    require_once 'auth.php';
        // Periksa apakah pengguna telah login, jika tidak, alihkan ke halaman login
    $database = new Database($dbConfig);
    
    // $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
        $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $hobi = isset($_POST['hobi']) ? implode(', ', $_POST['hobi']) : ''; // Input hobi dalam bentuk checkbox
        $jenisKelamin = filter_input(INPUT_POST, 'jk', FILTER_SANITIZE_STRING); // Input jenis kelamin dalam bentuk radio
        $tanggalLahir = $_POST['tanggal_lahir']; // Input tanggal lahir

    // Mengupdate data di database
    $updateData = array(
        'nama' => $nama,
        'alamat' => $alamat,
        'email' => $email,
        'hobi' => $hobi, // Menyimpan hobi sebagai string yang dipisahkan oleh koma
        'jk' => $jenisKelamin,
        'tanggal_lahir' => $tanggalLahir
    );
        
        if (isset($_FILES['gambar']) && !empty($_FILES['gambar']['name'])) {
            // Jika ada file gambar yang diunggah, proses untuk menyimpan gambar
            $targetDirectory = 'img/';
            $targetFile = $targetDirectory . basename($_FILES['gambar']['name']);

            // Cek apakah file yang diunggah adalah gambar
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $uploadOk = true;

            if (!in_array($imageFileType, array('jpg', 'jpeg', 'png', 'gif'))) {
                echo 'Hanya file JPG, JPEG, PNG, dan GIF yang diizinkan.';
                $uploadOk = false;
            }

            // if ($_FILES['gambar']['size'] > 5000000) {
            //     echo 'Ukuran gambar terlalu besar. Maksimal 500 KB.';
            //     $uploadOk = false;
            // }

            if ($uploadOk) {
                if (move_uploaded_file($_FILES['gambar']['tmp_name'], $targetFile)) {
                    // Jika gambar berhasil diunggah, tambahkan nama gambar ke data yang akan diupdate
                    $updateData['gambar'] = basename($_FILES['gambar']['name']);
                } else {
                    echo 'Terjadi kesalahan saat mengunggah gambar.';
                }
            }
        }

        if ($database->update('warga', $updateData, "id=".$_SESSION['user_id']."")) {
            // If the condition is met, generate JavaScript code to trigger the menu modal
            header("Location:profil.php");
        } else {
            echo 'Gagal mengupdate data.';
        }
    } else {
        $warga = $database->read('warga', "id=".$_SESSION['user_id']."");

        if ($warga) {
            $mhs = $warga[0];

            $dateInYMD = $mhs['tanggal_lahir']; // Your date in Y-m-d format
            $dateTime = new DateTime($dateInYMD);
            $dateInMDY = $dateTime->format("m-d-Y"); // Convert to m-d-Y format
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
                <a href="index.html" class="header-title">Profil Warga</a>
                <a href="profil.php" class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
                <a href="#" data-toggle-theme class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a>
            </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="page-content header-clear-medium">
                        <input type="hidden" name="id" value="<?php echo $mhs['id']; ?>">

                        <div class="card ">
                            <div class="content mb-0">
                                <h3>Modern Fields</h3>
                                <p>
                                    These boxes will react to them when you type or select a value.
                                </p>
                                <div class="input-style has-borders has-icon validate-field mb-4">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control validate-name" id="form1" name="nik" value="<?php echo $mhs['nik']; ?>" placeholder="NIK" readonly />
                                    <label for="form1" class="color-black fw-bold">NIK</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>
                                <div class="input-style has-borders has-icon validate-field mb-4">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control validate-name" id="form1" name="nama" value="<?php echo $mhs['nama']; ?>" placeholder="Nama" />
                                    <label for="form1" class="color-black fw-bold">Nama</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>
                                <div class="input-style has-borders has-icon validate-field mb-4">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control validate-name" id="form1" name="kk" value="<?php echo $mhs['kk']; ?>" placeholder="KK" />
                                    <label for="form1" class="color-black fw-bold">KK</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>
                                <div class="input-style has-borders no-icon validate-field mb-4">
                                    <input type="text" class="form-control validate-text" id="form2" name="tempat_lahir" value="<?php echo $mhs['tempat_lahir']; ?>" placeholder="Tempat Lahir" />
                                    <label for="form2" class="color-black fw-bold">Tempat Lahir</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>
                                <!-- <div class="input-style has-borders no-icon mb-4">
                                    <input type="date" value="2030-12-31" value="<?php echo $mhs['tanggal_lahir']; ?>" max="2030-01-01" min="2021-01-01" class="form-control validate-text" id="form6" placeholder="Phone" />
                                    <label for="form6" class="color-black fw-bold">Tanggal Lahir</label>
                                    <i class="fa fa-check disabled valid me-4 pe-3 font-12 color-green-dark"></i>
                                    <i class="fa fa-check disabled invalid me-4 pe-3 font-12 color-red-dark"></i>
                                </div>
                                <div class="input-style has-borders no-icon validate-field mb-4">
                                    <input type="email" class="form-control validate-text" id="form2" value="<?php echo $mhs['email']; ?>" placeholder="Email" />
                                    <label for="form2" class="color-black fw-bold">Email</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>
                                <div class="input-style has-borders has-icon validate-field mb-4">
                                    
                                    <input type="file" class="form-control validate-name" id="form1" placeholder="Name" />
                                    <label for="form1" class="color-black fw-bold">Photo</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>
                                <div class="input-style has-borders no-icon validate-field mb-4">
                                    <input type="password" class="form-control validate-text" id="form3" placeholder="Password" />
                                    <label for="form3" class="color-black fw-bold">Password</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>
                                <div class="input-style has-borders no-icon validate-field mb-4">
                                    <input type="url" class="form-control validate-text" id="form44" placeholder="Website" />
                                    <label for="form44" class="color-black fw-bold">Website</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>
                                <div class="input-style has-borders no-icon validate-field mb-4">
                                    <input type="tel" class="form-control validate-text" id="form4" placeholder="Phone" />
                                    <label for="form4" class="color-black fw-bold">Phone</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>
                                <div class="input-style has-borders no-icon mb-4">
                                    <label for="form5" class="color-black fw-bold">Select A Value</label>
                                    <select id="form5">
                                        <option value="default" disabled selected>Select a Value</option>
                                        <option value="iOS">iOS</option>
                                        <option value="Linux">Linux</option>
                                        <option value="MacOS">MacOS</option>
                                        <option value="Android">Android</option>
                                        <option value="Windows">Windows</option>
                                    </select>
                                    <span><i class="fa fa-chevron-down"></i></span>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <i class="fa fa-check disabled invalid color-red-dark"></i>
                                    <em></em>
                                </div> -->
                                <div class="input-style has-borders no-icon mb-4">
                                    <textarea id="form7" name="alamat" placeholder="Enter your message"><?php echo $mhs['alamat']; ?></textarea>
                                    <label for="form7" class="color-black fw-bold">Enter your Message</label>
                                    <em class="mt-n3">(required)</em>
                                </div>
                                <div class="form-check icon-check">
                                    <input class="form-check-input" type="checkbox" name="hobi[]" value="Sepak Bola" <?php if (in_array('Sepak Bola', explode(', ', $mhs['hobi']))) echo 'checked'; ?> id="check1" >
                                    <label class="form-check-label" for="check1">Sepak Bola</label>
                                    <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                                    <i class="icon-check-2 fa fa-check-square font-16 color-black fw-bold"></i>
                                </div>
                                <div class="form-check icon-check">
                                    <input class="form-check-input" type="checkbox" name="hobi[]" value="Basket" <?php if (in_array('Basket', explode(', ', $mhs['hobi']))) echo 'checked'; ?> id="check2" >
                                    <label class="form-check-label" for="check1">Basket</label>
                                    <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                                    <i class="icon-check-2 fa fa-check-square font-16 color-black fw-bold"></i>
                                </div>
                                <div class="form-check icon-check">
                                    <input class="form-check-input" type="checkbox" name="hobi[]" value="Renang" <?php if (in_array('Renang', explode(', ', $mhs['hobi']))) echo 'checked'; ?> id="check3" >
                                    <label class="form-check-label" for="check1">Renang</label>
                                    <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                                    <i class="icon-check-2 fa fa-check-square font-16 color-black fw-bold"></i>
                                </div>
                                <div class="form-check icon-check">
                                    <input class="form-check-input" type="checkbox" name="hobi[]" value="Berkendara" <?php if (in_array('Berkendara', explode(', ', $mhs['hobi']))) echo 'checked'; ?> id="check4" >
                                    <label class="form-check-label" for="check1">Berkendara</label>
                                    <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                                    <i class="icon-check-2 fa fa-check-square font-16 color-black fw-bold"></i>
                                </div>
                                <div class="form-check icon-check">
                                    <input class="form-check-input" type="radio" name="jk" value="L" <?php if ($mhs['jk'] == 'L') echo 'checked'; ?> id="radio1">
                                    <label class="form-check-label" for="radio1">Laki-laki</label>
                                    <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                                    <i class="icon-check-2 fa fa-check-square font-16 color-black fw-bold"></i>
                                </div>
                                <div class="form-check icon-check mb-4">
                                    <input class="form-check-input" type="radio" name="jk" value="P" <?php if ($mhs['jk'] == 'P') echo 'checked'; ?> id="radio2">
                                    <label class="form-check-label" for="radio2">Perempuan</label>
                                    <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                                    <i class="icon-check-2 fa fa-check-square font-16 color-black fw-bold"></i>
                                </div>

                                <div class="input-style has-borders validate-field mb-4">
                                    
                                    <input type="file" class="form-control validate-name" name="ktp" id="form1" placeholder="Name" />
                                    <label for="form1" class="color-black fw-bold">KTP</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>
                                <div class="input-style has-borders validate-field mb-4">
                                    
                                    <input type="file" class="form-control validate-name" name="kk" id="form1" placeholder="Name" />
                                    <label for="form1" class="color-black fw-bold">KK</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>
                                Tanggal Lahir: <input type="date" name="tanggal_lahir" value="<?php echo $dateInMDY; ?>"><br>
                                Gambar Profil: <input type="file" name="gambar"><br>
                                <img src="img/<?php echo $mhs['gambar']; ?>" width="250">
                                
                                <!-- <input type="submit" class="btn btn-full btn-l rounded-sm font-800 text-uppercase bg-highlight" value="Simpan"> -->
                            </div>
                        </div>
                            <div class="row fixed-bottom mb-0 bg-dark p-2">
                                <div class="col-6">
                                    <a href="profil.php" class="btn btn-full  btn-l  mx-4 me-4  rounded-sm font-800 text-uppercase bg-highlight" >Batal</a>
                                </div>
                                <div class="col-6">
                                    <a href="#" data-menu="menu-modal-call" class="btn btn-full  btn-l  mx-4 me-4  rounded-sm font-800 text-uppercase bg-green-dark" >Simpan</a>
                                </div>
                            </div>

                        
                    </div>
                    <div id="menu-modal-call" class="menu menu-box-modal menu-box-detached rounded-m" data-menu-height="250" style="display: block; height: 250px;">
                        <div class="menu-title mt-n1">
                        <h1>Call Now</h1>
                        <p class="color-highlight">Tap to Start a Call Now</p>
                        <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
                        </div>
                        <div class="content mb-0 mt-2">
                        <div class="divider mb-3"></div>
                        <p>
                        We're always here to help. Give us a Call Today. Just tap the button and get in touch with us.
                        </p>
                        <input type="submit" class=" btn btn-l  rounded-sm btn-full bg-green-dark text-uppercase font-800 btn-icon" value="Simpan">
                    </div>
                </form>
            </div>

                



            

            <div id="menu-settings" class="menu menu-box-bottom menu-box-detached">
                <div class="menu-title mt-0 pt-0">
                    <h1>Settings</h1>
                    <p class="color-highlight">Flexible and Easy to Use</p>
                    <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
                </div>
                <div class="divider divider-margins mb-n2"></div>
                <div class="content">
                    <div class="list-group list-custom-small">
                        <a href="#" data-toggle-theme data-trigger-switch="switch-dark-mode" class="pb-2 ms-n1">
                            <i class="fa font-12 fa-moon rounded-s bg-highlight color-white me-3"></i>
                            <span>Dark Mode</span>
                            <div class="custom-control scale-switch ios-switch">
                                <input data-toggle-theme type="checkbox" class="ios-input" id="switch-dark-mode" />
                                <label class="custom-control-label" for="switch-dark-mode"></label>
                            </div>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    <div class="list-group list-custom-large">
                        <a data-menu="menu-highlights" href="#">
                            <i class="fa font-14 fa-tint bg-green-dark rounded-s"></i>
                            <span>Page Highlight</span>
                            <strong>16 Colors Highlights Included</strong>
                            <span class="badge bg-highlight color-white">HOT</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a data-menu="menu-backgrounds" href="#" class="border-0">
                            <i class="fa font-14 fa-cog bg-blue-dark rounded-s"></i>
                            <span>Background Color</span>
                            <strong>10 Page Gradients Included</strong>
                            <span class="badge bg-highlight color-white">NEW</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div id="menu-highlights" class="menu menu-box-bottom menu-box-detached">
                <div class="menu-title">
                    <h1>Highlights</h1>
                    <p class="color-highlight">Any Element can have a Highlight Color</p>
                    <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
                </div>
                <div class="divider divider-margins mb-n2"></div>
                <div class="content">
                    <div class="highlight-changer">
                        <a href="#" data-change-highlight="blue"><i class="fa fa-circle color-blue-dark"></i><span class="color-blue-light">Default</span></a>
                        <a href="#" data-change-highlight="red"><i class="fa fa-circle color-red-dark"></i><span class="color-red-light">Red</span></a>
                        <a href="#" data-change-highlight="orange"><i class="fa fa-circle color-orange-dark"></i><span class="color-orange-light">Orange</span></a>
                        <a href="#" data-change-highlight="pink2"><i class="fa fa-circle color-pink2-dark"></i><span class="color-pink-dark">Pink</span></a>
                        <a href="#" data-change-highlight="magenta"><i class="fa fa-circle color-magenta-dark"></i><span class="color-magenta-light">Purple</span></a>
                        <a href="#" data-change-highlight="aqua"><i class="fa fa-circle color-aqua-dark"></i><span class="color-aqua-light">Aqua</span></a>
                        <a href="#" data-change-highlight="teal"><i class="fa fa-circle color-teal-dark"></i><span class="color-teal-light">Teal</span></a>
                        <a href="#" data-change-highlight="mint"><i class="fa fa-circle color-mint-dark"></i><span class="color-mint-light">Mint</span></a>
                        <a href="#" data-change-highlight="green"><i class="fa fa-circle color-green-light"></i><span class="color-green-light">Green</span></a>
                        <a href="#" data-change-highlight="grass"><i class="fa fa-circle color-green-dark"></i><span class="color-green-dark">Grass</span></a>
                        <a href="#" data-change-highlight="sunny"><i class="fa fa-circle color-yellow-light"></i><span class="color-yellow-light">Sunny</span></a>
                        <a href="#" data-change-highlight="yellow"><i class="fa fa-circle color-yellow-dark"></i><span class="color-yellow-light">Goldish</span></a>
                        <a href="#" data-change-highlight="brown"><i class="fa fa-circle color-brown-dark"></i><span class="color-brown-light">Wood</span></a>
                        <a href="#" data-change-highlight="night"><i class="fa fa-circle color-dark-dark"></i><span class="color-dark-light">Night</span></a>
                        <a href="#" data-change-highlight="dark"><i class="fa fa-circle color-dark-light"></i><span class="color-dark-light">Dark</span></a>
                        <div class="clearfix"></div>
                    </div>
                    <a href="#" data-menu="menu-settings" class="mb-3 btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-4">Back to Settings</a>
                </div>
            </div>

            <div id="menu-backgrounds" class="menu menu-box-bottom menu-box-detached">
                <div class="menu-title">
                    <h1>Backgrounds</h1>
                    <p class="color-highlight">Change Page Color Behind Content Boxes</p>
                    <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
                </div>
                <div class="divider divider-margins mb-n2"></div>
                <div class="content">
                    <div class="background-changer">
                        <a href="#" data-change-background="default"><i class="bg-theme"></i><span class="color-dark-dark">Default</span></a>
                        <a href="#" data-change-background="plum"><i class="body-plum"></i><span class="color-plum-dark">Plum</span></a>
                        <a href="#" data-change-background="magenta"><i class="body-magenta"></i><span class="color-dark-dark">Magenta</span></a>
                        <a href="#" data-change-background="dark"><i class="body-dark"></i><span class="color-dark-dark">Dark</span></a>
                        <a href="#" data-change-background="violet"><i class="body-violet"></i><span class="color-violet-dark">Violet</span></a>
                        <a href="#" data-change-background="red"><i class="body-red"></i><span class="color-red-dark">Red</span></a>
                        <a href="#" data-change-background="green"><i class="body-green"></i><span class="color-green-dark">Green</span></a>
                        <a href="#" data-change-background="sky"><i class="body-sky"></i><span class="color-sky-dark">Sky</span></a>
                        <a href="#" data-change-background="orange"><i class="body-orange"></i><span class="color-orange-dark">Orange</span></a>
                        <a href="#" data-change-background="yellow"><i class="body-yellow"></i><span class="color-yellow-dark">Yellow</span></a>
                        <div class="clearfix"></div>
                    </div>
                    <a href="#" data-menu="menu-settings" class="mb-3 btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-4">Back to Settings</a>
                </div>
            </div>

            <div id="menu-share" class="menu menu-box-bottom menu-box-detached">
                <div class="menu-title mt-n1">
                    <h1>Share the Love</h1>
                    <p class="color-highlight">Just Tap the Social Icon. We'll add the Link</p>
                    <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
                </div>
                <div class="content mb-0">
                    <div class="divider mb-0"></div>
                    <div class="list-group list-custom-small list-icon-0">
                        <a href="auto_generated" class="shareToFacebook external-link">
                            <i class="font-18 fab fa-facebook-square color-facebook"></i>
                            <span class="font-13">Facebook</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="auto_generated" class="shareToTwitter external-link">
                            <i class="font-18 fab fa-twitter-square color-twitter"></i>
                            <span class="font-13">Twitter</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="auto_generated" class="shareToLinkedIn external-link">
                            <i class="font-18 fab fa-linkedin color-linkedin"></i>
                            <span class="font-13">LinkedIn</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="auto_generated" class="shareToWhatsApp external-link">
                            <i class="font-18 fab fa-whatsapp-square color-whatsapp"></i>
                            <span class="font-13">WhatsApp</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="auto_generated" class="shareToMail external-link border-0">
                            <i class="font-18 fa fa-envelope-square color-mail"></i>
                            <span class="font-13">Email</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
        <script type="text/javascript" src="scripts/custom.js"></script>
    <?php
        } else {
            echo 'Data tidak ditemukan.';
        }
    }
    ?>
</body>
    </body>
</html>
