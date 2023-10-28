<?php 
// session_start();

// include ('error_handling.php');
include ('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Assuming you have received the data from the client in a POST request
    $deviceType = $_POST['device_type'];
    $os = $_POST['operating_system'];
    $deviceDetails = $_POST['device_details'];
    $imei = $_POST['imei'];
    $networkInfo = $_POST['network_info'];
    $userLocation = $_POST['user_location'];

    // Insert this information into a database table for user/device information
    $dataToInsert = array(
        'user_id' => $user_id, // Associating the data with a user
        'device_type' => $deviceType,
        'operating_system' => $os,
        'device_details' => $deviceDetails,
        'imei' => $imei,
        'network_info' => $networkInfo,
        'user_location' => $userLocation,
        'capture_time' => date('Y-m-d H:i:s')
    );



    $database = new Database($dbConfig);

    // Gantilah 'users' dengan nama tabel pengguna Anda
    $user = $database->read('users', "username = '$username'");
    $analytic = $database->create('user_device_info', $dataToInsert);


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
                            <a href="#" data-toggle-theme class="show-on-theme-light ms-auto icon icon-m"><i class="font-14 fa fa-moon color-theme"></i></a>
                            <a href="#" data-toggle-theme class="show-on-theme-dark ms-auto icon icon-m"><i class="font-14 fa fa-lightbulb color-yellow-dark"></i></a>
                        </div>
                    </div>
                    <div class="card-center">
                    </div>
                    <div class="card-center">
                        <img src="img/login.png" class="center" width="150">
                        <form method="post" action="">
                            <div class="ps-3 pe-3">
                                <h1 class="text-start font-800 font-40 mb-2">Selamat Datang!</h1>
                                <p class="color-highlight text-start font-15">Untuk masuk, pastikan Anda sudah terdaftar di desa.</p>
                                <div class="input-style has-borders has-icon validate-field mt-5">
                                    <i class="fa fa-user"></i>
                                    <input type="number" class="form-control validate-name" id="form1a" name="username" placeholder="username/No. Hp" />
                                    <label for="form1a" class="color-black font-15 mt-n1">username/No. Hp</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <!-- <em>(required)</em> -->
                                </div>
                                <div class="input-style has-borders has-icon validate-field mt-5">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control validate-password" id="form3a" name="password" placeholder="Password" />
                                    <label for="form3a" class="color-black font-15 mt-n1">Password</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <!-- <em>(required)</em> -->
                                    <!-- <i id="togglePassword" class="fa fa-eye-slash" onclick="togglePassword()"></i> -->
                                </div>

                                <div class="d-flex mt-4 mb-4">
                                    <div class="w-50 font-15 pb-2 text-start"><a href="page-signup-2.html">Create Account</a></div>
                                    <div class="w-50 font-15 pb-2 text-end"><a href="page-forgot-2.html">Forgot Credentials</a></div>
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

            <!-- Snackbar -->
            <div id="snackbar-2" class="snackbar-toast rounded-sm bg-red-dark color-white fade hide" data-delay="3500" data-autohide="true">
                <i class="fa fa-heart me-3"></i>Login failed. Please check your username and password
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
    <script>
        // Function to get device type
        function getDeviceType() {
            if (/Android/i.test(navigator.userAgent)) {
                return "Mobile (Android)";
            } else if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
                return "Mobile (iOS)";
            } else {
                return "Desktop";
            }
        }

        // Function to get operating system
        function getOperatingSystem() {
            const userAgent = navigator.userAgent;
            if (/Android/i.test(userAgent)) {
                return "Android OS";
            } else if (/iPhone|iPad|iPod/i.test(userAgent)) {
                return "iOS";
            } else if (/Windows/i.test(userAgent)) {
                return "Windows";
            } else if (/Mac OS X/i.test(userAgent)) {
                return "macOS";
            } else if (/Linux/i.test(userAgent)) {
                return "Linux";
            } else {
                return "Other";
            }
        }

        // Function to get device details
        function getDeviceDetails() {
            return `${window.screen.width}x${window.screen.height}, Color Depth: ${window.screen.colorDepth}`;
        }

        // Function to get network information
        function getNetworkInformation() {
            return `IP Address: ${getIPAddress()}, Connection Type: ${getConnectionType()}`;
        }

        // Function to get user's IP address (may require a server-side call)
        function getIPAddress() {
            // You might need to make a server-side request to get the user's IP address
            // Example: Fetch user's IP address from your server
            return "123.45.67.89";
        }

        // Function to get connection type (e.g., 4G, Wi-Fi, etc.)
        function getConnectionType() {
            // You can use the Network Information API if available, but support may be limited
            if (navigator.connection) {
                return navigator.connection.type;
            } else {
                return "Unknown";
            }
        }

        // Function to get user's geolocation (requires user consent)
        function getUserLocation() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;
                        const accuracy = position.coords.accuracy;
                        console.log(`Latitude: ${latitude}, Longitude: ${longitude}, Accuracy: ${accuracy} meters`);
                    },
                    function (error) {
                        console.error("Error getting geolocation: " + error.message);
                    }
                );
            } else {
                console.error("Geolocation not supported by the browser");
            }
        }

        // Usage
        const deviceType = getDeviceType();
        const os = getOperatingSystem();
        const deviceDetails = getDeviceDetails();
        const networkInfo = getNetworkInformation();
        getUserLocation(); // Capture user's geolocation (requires user consent)
    </script>
    </body>
</html>
