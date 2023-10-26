<?php 
// session_start();

// include ('error_handling.php');
include ('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $database = new Database($dbConfig);

    // Gantilah 'users' dengan nama tabel pengguna Anda
    $user = $database->read('users', "username = '$username'");

    if ($user && password_verify($password, $user[0]['password'])) {
        // Login berhasil, set session dan alihkan ke halaman beranda
        $_SESSION['user_id'] = $user[0]['username'];
        // header('Location: facebook.php');
        header('Location: index.php');
        exit;
    } else {
        // Login gagal, tampilkan pesan error
        // Login failed, show the snackbar using JavaScript
        echo 'Login failed. Please check your username and password';

    }
}
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <title>StickyMobile BootStrap</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900,900i|Source+Sans+Pro:300,300i,400,400i,600,600i,700,700i,900,900i&display=swap"
        rel="stylesheet">        
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>

    <link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
    <link rel="apple-touch-icon" sizes="180x180" href="public/assets/icons/icon-192x192.png">
    <!-- Include jQuery first -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="public/css/framework7-icons.css">
</head>

    <body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">
        <div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
        <div id="page">
            <div class="page-content pb-0">
                <div data-card-height="cover" class="card">
                    <div class="card-top notch-clear">
                        <div class="d-flex">
                            <!-- <a href="#" data-back-button class="me-auto icon icon-m"><i class="font-14 fa fa-arrow-left color-theme"></i></a> -->
                            <a href="#" data-toggle-theme class="show-on-theme-light ms-auto icon icon-m"><i class="font-12 fa fa-moon color-theme"></i></a>
                            <a href="#" data-toggle-theme class="show-on-theme-dark ms-auto icon icon-m"><i class="font-12 fa fa-lightbulb color-yellow-dark"></i></a>
                        </div>
                    </div>
                    <div class="card-center">
                    </div>
                    <div class="card-center">
                        <img src="img/login.png" class="center" width="150">
                        <form method="post" action="">
                            <div class="ps-3 pe-3">
                                <h1 class="text-start font-800 font-40 mb-2">Selamat Datang!</h1>
                                <p class="color-highlight text-start font-14">Untuk masuk, pastikan Anda sudah terdaftar di desa.</p>
                                <div class="input-style has-borders has-icon validate-field">
                                    <i class="fa fa-user"></i>
                                    <input type="number" class="form-control validate-name" id="form1a" name="username" placeholder="username/No. Hp" />
                                    <label for="form1a" class="color-black font-12 mt-n1">username/No. Hp</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <!-- <em>(required)</em> -->
                                </div>
                                <div class="input-style has-borders has-icon validate-field mt-4">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control validate-password" id="form3a" name="password" placeholder="Password" />
                                    <label for="form3a" class="color-black font-12 mt-n1">Password</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <!-- <em>(required)</em> -->
                                    <!-- <i id="togglePassword" class="fa fa-eye-slash" onclick="togglePassword()"></i> -->
                                </div>

                                <div class="d-flex mt-4 mb-4">
                                    <div class="w-50 font-14 pb-2 text-start"><a href="page-signup-2.html">Create Account</a></div>
                                    <div class="w-50 font-14 pb-2 text-end"><a href="page-forgot-2.html">Forgot Credentials</a></div>
                                </div>
                                <div class="divider mt-4"></div>
                                <button class="back-button btn btn-full btn-m shadow-large rounded-sm text-uppercase font-700 bg-highlight" type="submit">LOGIN</button>
                                <!-- <a href="#" class="back-button btn btn-full btn-m shadow-large rounded-sm text-uppercase font-700 bg-highlight">LOGIN</a> -->
                                <div class="divider mt-4"></div>
                                <!-- <a href="#" class="btn btn-icon btn-m btn-full shadow-l rounded-sm bg-facebook text-uppercase font-700 text-start"><i class="fab fa-facebook-f text-center bg-transparent"></i>Sign in with Facebook</a>
                                <a href="#" class="btn btn-icon btn-m btn-full shadow-l rounded-sm bg-twitter text-uppercase font-700 text-start mt-2"><i class="fab fa-twitter text-center bg-transparent"></i>Sign in with Twitter</a> -->
                            </div>
                        </form>
                    </div>
                </div>
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

            <!-- Snackbar -->
            <div id="snackbar-2" class="snackbar-toast rounded-sm bg-red-dark color-white fade hide" data-delay="3500" data-autohide="true">
                <i class="fa fa-heart me-3"></i>Login failed. Please check your username and password
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
        
    <script type="text/javascript" src="bootstrap.min.js"></script>
    <script type="text/javascript" src="custom.js"></script>
    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("form3a");
            var toggleIcon = document.getElementById("togglePassword");
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            var passwordInput = document.getElementById("form3a");
            passwordInput.type = "password";
        });
    </script>
    </body>
</html>
