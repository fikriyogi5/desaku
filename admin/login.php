<?php
// session_start();

include ('../database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_type = $_POST['user_type'];
    $nik = $_POST['nik'];
    $password = $_POST['password'];

    $database = new Database($dbConfig);

    $user = $database->loginMulti('warga', $nik, $user_type, $password);

    if ($user) {
        // Login berhasil, set sesi dan arahkan ke halaman 'home.php'
        $_SESSION['user_id'] = $user['id'];
        header('Location: home.php');
        exit;
    } else {
        // Login gagal, tampilkan pesan error
        echo "Login failed. Please check your credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login E-database</title>

        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="bootstrap.min.css" />
        <link rel="stylesheet" href="custom_login.css" />
        <link rel="stylesheet" href="font-awesome.min.css" />
        <link rel="stylesheet" href="select2.min.css" />

        <link rel="shortcut icon" href="/edb/c43c05a14ae02e7fc0040188ddd59952397a51f1/views/assets/logo.png" type="image/x-icon" />

        <script src="jquery-3.4.1.min.js"></script>

        <style>
            body {
                background-image: url(logo_large.png);
                background-position: center center;
                background-repeat: no-repeat;
                background-size: auto 100%;
            }
        </style>
    </head>

    <body class="body">
        <div class="container">
            <div class="text-center">
                <img src="logo.png" alt="" />

                <h1 class="text-header">
                    Pemerintahan Desa Pulau Terap
                    <div class="highlight">Sistem Informasi Pelayanan Terpadu Masyarakat Desa</div>
                    <div class="row hidden">
                        <a class="btn btn-info" href="//sipd.kemendagri.go.id/sipdmap">
                            <b>LOGIN KE SIPD DAERAH</b>
                        </a>
                    </div>
                </h1>

                <div class="panel-login">

                    <div class="content">
                        <form action="" method="post" id="loginform">
                            <div class="form-group">
                                <label for="username" class="form-label">Pemerintah Daerah</label>
                                <select name="user_type" id="user_type" class="form-control">
                                    <option value="desa">Desa</option>
                                    <option value="perangkat_desa">Perangkat Desa</option>
                                    <option value="puskesmas">Puskesmas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="username" id="lbl_user" class="form-label">User ID</label>
                                <!--input type="text" class="form-control" id="username" name="username" autocomplete="off" autofocus-->

                                <input type="text" class="form-control" name="nik" placeholder="Username" required="" autocomplete="off" autofocus />
                            </div>
                            <div class="input-group">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password" required=""  style="margin-bottom: 5px;" />
                                <span class="input-group-btn">
                                    <button onclick="btnShowPass(event)" class="btn btn-primary" type="button"><i class="fa fa-eye"></i></button>
                                </span>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit">Masuk</button>
                            </div>
                            <div class="form-group">
                                <a href="//sipd.go.id/run2/tampilan-3.html" style="color: #4083a9;">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">© 2019 Direktorat Jenderal Bina Bangda. All rights reserved.</footer>
        <script src="/edb/c43c05a14ae02e7fc0040188ddd59952397a51f1/views/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="/edb/c43c05a14ae02e7fc0040188ddd59952397a51f1/views/assets/select2/4.0.8/js/select2.min.js"></script>
        <script src="/edb/c43c05a14ae02e7fc0040188ddd59952397a51f1/views/assets/pnotify/PNotify.js"></script>
        <script src="/edb/c43c05a14ae02e7fc0040188ddd59952397a51f1/views/assets/pnotify/PNotifyButtons.js"></script>
        <script src="/edb/c43c05a14ae02e7fc0040188ddd59952397a51f1/views/assets/jquery.md5.js"></script>

        <script>
            var BASE_URL = "/edb/c43c05a14ae02e7fc0040188ddd59952397a51f1";
            function btnShowPass(e) {
                const _this = $("#passX");
                const type = _this.attr("type");

                if (type == "password") {
                    _this.attr("type", "text");
                    _this.parent().find("i").attr("class", "fa fa-eye-slash");
                } else {
                    _this.attr("type", "password");
                    _this.parent().find("i").attr("class", "fa fa-eye");
                }
            }

            $("#loginform").submit(function (event) {
                //event.preventDefault();
                // ndak perlu di lower apa adanya saja
                $("#user").val($.md5($.md5($("#userX").val().trim())));
                //$("#user").val( $.md5($.md5($("#userX").val().trim().toLowerCase())) ); //escape case sesitive username
                $("#pass").val($.md5($.md5($("#passX").val())));
            });

            $(document).ready(function () {
                // cek CAPSLOCK
                $("div.capslock_on").hide();
                document.addEventListener("keydown", function (event) {
                    var caps = event.getModifierState && event.getModifierState("CapsLock");
                    // console.log( caps ); // true when you press the keyboard CapsLock key
                    if (caps) {
                        $("div.capslock_on").show();
                    } else {
                        $("div.capslock_on").hide();
                    }
                });

                $("#user_type").select2({
                    placeholder: "Pilih Pemda",
                    allowClear: true,
                    ajax: {
                        url: BASE_URL + "/?f=list_pemda",
                        data: function (params) {
                            var qry = {
                                q: params.term,
                            };
                            return qry;
                        },
                        dataType: "json",
                        delay: 250,
                    },
                });

                $("#user_type").on("change", function (event) {
                    if ($("#user_type").val() == null) {
                        $("#lbl_user").html("User ID Pemerintah Pusat");
                    } else {
                        $("#lbl_user").html("User ID Pemerintah Daerah");
                    }
                });

                const cookieObj = new URLSearchParams(document.cookie.replaceAll("&", "%26").replaceAll("; ", "&"));
                let pemda = JSON.parse(cookieObj.get("pemda"));
                if (pemda != null) {
                    let opt = new Option(pemda.nama, pemda.domain, false, false);
                    $("#user_type").append(opt).trigger("change");
                }
            });
        </script>
    </body>
</html>
