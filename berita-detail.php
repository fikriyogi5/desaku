<?php
// Sisipkan kelas Database
require_once 'database.php';
require_once 'auth.php';
    // Periksa apakah pengguna telah login, jika tidak, alihkan ke halaman login

$database = new Database($dbConfig);
if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
    // Jika parameter 'id' kosong atau bukan angka, kembalikan ke halaman sebelumnya
    header('Location: index.php');
    exit;
    // $mahasiswa = $database->read('berita', "id=".$_SESSION['user_id']."");
} else {
    $mahasiswa = $database->read('berita', "id=".$_GET['id']."");
}





if ($mahasiswa) {
$mhs = $mahasiswa[0];
?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <script type="text/javascript" src="bootstrap.min.js"></script>
    <script type="text/javascript" src="custom.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.19/jquery.touchSwipe.min.js"></script>
    <title></title>
</head>

<body class="theme-light" data-highlight="highlight-red" data-gradient="body-default">
    <div id="preloader">
        <div class="spinner-border color-highlight" role="status"></div>
    </div>
    <div id="page">
        <div class="header header-fixed header-auto-show header-logo-center">
            <a href="index.html" class="header-title">Sticky Mobile</a>
            <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-arrow-left"></i></a>
            <a href="#" data-toggle-theme class="header-icon header-icon-4"><i class="fas fa-lightbulb"></i></a>
        </div>
        <div class="page-content pb-5 mb-2">
            <div class="card mb-0 rounded-0 " data-card-height="400" style="background-image: url(img/news/<?php echo $mhs['gambar']; ?>);">
                <div class="card-top notch-clear">
                    <a href="#" data-back-button class="icon icon-xl color-white font-15 font-700"><i
                            class="fa fa-arrow-left color-white pt-2 font-14 me-n2"></i> Back</a>
                </div>
                <div class="card-top notch-clear">
                    <a href="#" data-menu="menu-share" class="icon icon-xl float-end"><i
                            class="fa fa-share-alt color-white pt-1"></i></a>
                </div>
                <div class="card-bottom p-3">
                    <h1 class="color-white pt-2">
                    <?php echo $mhs['judul']; ?>
                    </h1>
                </div>
                <div class="card-overlay bg-gradient"></div>
            </div>
            <div class="card mb-0">
                <div class="content mt-2">
                    <div class="d-flex mb-2">
                        <div class="me-auto"><span class="opacity-100 font-12"><i class="far fa-clock pe-2"></i>15th
                                Dec</span></div>
                        <div class="mx-auto"><span class="opacity-100 font-12"><i class="far fa-comment pe-2"></i>14k
                                Comments</span></div>
                        <div class="ms-auto"><span class="opacity-100 font-12"><i class="far fa-comment pe-2"></i>25k
                                Shares</span></div>
                    </div>
                    <div class="divider mb-3"></div>
                    <p class="fw-normal font-16">
                    <?php echo $mhs['isi']; ?>
                    </p>
                    <div class="divider"></div>
                    <div class="d-flex mb-4">
                        <a href="#" class="mx-auto shareToFacebook icon icon-xs rounded-sm bg-facebook"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="#" class="mx-auto shareToTwitter icon icon-xs rounded-sm bg-twitter"><i
                                class="fab fa-twitter"></i></a>
                        <a href="#" class="mx-auto shareToWhatsApp icon icon-xs rounded-sm bg-whatsapp"><i
                                class="fab fa-whatsapp"></i></a>
                        <a href="#" class="mx-auto shareToLinkedIn icon icon-xs rounded-sm bg-linkedin"><i
                                class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="mx-auto shareToMail icon icon-xs rounded-sm bg-mail"><i
                                class="fa fa-envelope"></i></a>
                    </div>
                    <div class="divider"></div>
                    <div class="card mx-n3 px-3 bg-18" data-card-height="150">
                        <div class="card-center">
                            <div class="splide single-slider slider-no-arrows slider-no-dots" id="single-slider-1">
                                <div class="splide__track">
                                    <div class="splide__list">
                                        <div class="splide__slide">
                                            <a href="#" class="d-block mx-3">
                                                <div class="d-flex">
                                                    <div class="align-self-center me-auto">
                                                        <img src="images/pictures/18s.jpg" class="rounded-m me-3"
                                                            width="90">
                                                        <span
                                                            class="badge text-uppercase px-2 py-1 bg-blue-dark d-block me-3 mt-n3 rounded-m under-slider-btn">ECONOMICS</span>
                                                    </div>
                                                    <div class="align-self-center w-100">
                                                        <h5 class="font-500 font-15 pt-2">Global warming increases
                                                            development speed of electric cars.</h5>
                                                        <span class="color-theme font-11 opacity-50">25 Minutes
                                                            Ago</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="splide__slide">
                                            <a href="#" class="d-block mx-3">
                                                <div class="d-flex">
                                                    <div class="align-self-center me-auto">
                                                        <img src="images/pictures/28s.jpg" class="rounded-m me-3"
                                                            width="90">
                                                        <span
                                                            class="badge text-uppercase px-2 py-1 bg-green-dark d-block me-3 mt-n3 rounded-m under-slider-btn">SOCIAL</span>
                                                    </div>
                                                    <div class="align-self-center w-100">
                                                        <h5 class="font-500 font-15 pt-2">Hosting companies now charge
                                                            influencers more that double. Here's why.</h5>
                                                        <span class="color-theme font-11 opacity-50">25 Minutes
                                                            Ago</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="splide__slide">
                                            <a href="#" class="d-block mx-3">
                                                <div class="d-flex">
                                                    <div class="align-self-center me-auto">
                                                        <img src="images/pictures/21s.jpg" class="rounded-m me-3"
                                                            width="90">
                                                        <span
                                                            class="badge text-uppercase px-2 py-1 bg-red-dark d-block me-3 mt-n3 rounded-m under-slider-btn">TECHNOLOGY</span>
                                                    </div>
                                                    <div class="align-self-center w-100">
                                                        <h5 class="font-500 font-15 pt-2">Apple's sales increased
                                                            tenfold after new Macbook M1 Realease.</h5>
                                                        <span class="color-theme font-11 opacity-50">25 Minutes
                                                            Ago</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-overlay bg-theme opacity-80"></div>
                    </div>
                    <div class="divider"></div>
                    <h4>This is an Image Gallery</h4>
                    <p>
                        This page is not WordPress, it's an HTML website. Yes, that's right. but you can convert it to
                        WordPress yourself or hire an expert from Envato Studio.
                    </p>
                    <div class="row">
                        <div class="col-4">
                            <a href="images/pictures/21.jpg" class="default-link" data-gallery="gallery-1"
                                title="Image Title or Caption">
                                <img src="images/empty.png" data-src="images/pictures/21s.jpg"
                                    class="preload-img shadow-s img-fluid rounded-s" alt="img">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="images/pictures/14.jpg" class="default-link" data-gallery="gallery-1"
                                title="Image Title or Caption">
                                <img src="images/empty.png" data-src="images/pictures/14s.jpg"
                                    class="preload-img shadow-s img-fluid rounded-s" alt="img">
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="images/pictures/18.jpg" class="default-link" data-gallery="gallery-1"
                                title="Image Title or Caption">
                                <img src="images/empty.png" data-src="images/pictures/18s.jpg"
                                    class="preload-img shadow-s img-fluid rounded-s" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <h3 class="font-700">Font Weights</h3>
                    <p>
                        Select the thickness of your font with ease. Add a secondary class that will change weights.
                    </p>
                    <p class="font-900 pb-0 mb-0">This text is set to 900 weight.</p>
                    <p class="font-800 pb-0 mb-0">This text is set to 800 weight.</p>
                    <p class="font-700 pb-0 mb-0">This text is set to 700 weight.</p>
                    <p class="font-600 pb-0 mb-0">This text is set to 600 weight.</p>
                    <p class="font-500 pb-0 mb-0">This text is set to 500 weight.</p>
                    <p class="font-400 pb-0 mb-0">This text is set to 400 weight.</p>
                    <p class="font-300 pb-0 mb-0">This text is set to 300 weight.</p>
                    <p class="font-200 pb-0 mb-0">This text is set to 200 weight.</p>
                    <p class="font-100">This text is set to 100 weight.</p>
                    <div class="divider"></div>
                    <div class="card mx-n3  bg-28">
                        <div class="card-body my-3">
                            <h5 class="badge bg-highlight color-white px-1 py-1 font-12 mb-3">LIVE FEED</h5>
                            <h1 class="color-white">
                                Event
                                <br>Coverage
                            </h1>
                            <p class="color-white opacity-60 mb-0">
                                We are here to show off the brand new Apple Watch Release. Join us and watch it live!
                            </p>
                            <a href="#"
                                class="btn btn-s rounded-sm bg-highlight color-white mt-3 text-uppercase font-800"><i
                                    class="fa fa-play-circle pe-2"></i> WATCH LIVE</a>
                        </div>
                        <div class="card-overlay bg-black opacity-70"></div>
                    </div>
                    <div class="divider"></div>
                    <h3 class="font-700">Lists</h3>
                    <p class>
                        Select the thickness of your font with ease. Add a secondary class that will change weights.
                    </p>
                    <div class="row mb-0">
                        <div class="col-4">
                            <ul class="icon-list">
                                <li><i class="fa fa-check color-green-dark"></i>List</li>
                                <li><i class="fa fa-star color-yellow-dark"></i>List</li>
                                <li><i class="fa fa-heart color-red-dark"></i>List</li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <ul>
                                <li>List</li>
                                <li>List</li>
                                <li>List</li>
                            </ul>
                        </div>
                        <div class="col-4">
                            <ol>
                                <li>List</li>
                                <li>List</li>
                                <li>List</li>
                            </ol>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <h3>What's your thoughts?</h3>
                    <p>
                        Leave a comment below with your opionion. We're curious what you have to say.
                    </p>
                    <div class="comment">
                        <div class="d-flex mb-2">
                            <div class="align-self-center">
                                <img src="images/pictures/faces/1small.png" class="rounded-m me-2" width="45">
                            </div>
                            <div class="align-self-center">
                                <h5 class="mb-0 font-600 font-14">John Doe</h5>
                                <span class="font-11 d-block mt-n1">Posted 1 Year Ago</span>
                            </div>
                            <div class="align-self-center ms-auto">
                                <a href="#" class="color-theme"><i class="fa fa-share pe-2"></i>Reply</a>
                            </div>
                        </div>
                        <p class="opacity-70 mb-4">
                            I found this to be quite interesting, especially since the other Mobile PWA's look like they
                            have absolutely no sense whatsoever.
                        </p>
                    </div>
                    <div class="reply ps-5">
                        <div class="d-flex mb-2">
                            <div class="align-self-center">
                                <img src="images/pictures/faces/2small.png" class="rounded-m me-2" width="45">
                            </div>
                            <div class="align-self-center">
                                <h5 class="mb-0 font-600 font-14">Jack Son</h5>
                                <span class="font-11 d-block mt-n1">Posted 1 Year Ago</span>
                            </div>
                            <div class="align-self-center ms-auto">
                                <a href="#" class="color-theme"><i class="fa fa-share pe-2"></i>Reply</a>
                            </div>
                        </div>
                        <p class="opacity-70 mb-4">
                            Couldn't agree more! Everything pales compared to Azures! Great job Enabled.
                        </p>
                    </div>
                    <div class="reply ps-5">
                        <div class="d-flex mb-2">
                            <div class="align-self-center">
                                <img src="images/pictures/faces/4small.png" class="rounded-m me-2" width="45">
                            </div>
                            <div class="align-self-center">
                                <h5 class="mb-0 font-600 font-14">Jimmy Snow</h5>
                                <span class="font-11 d-block mt-n1">Posted 1 Year Ago</span>
                            </div>
                            <div class="align-self-center ms-auto">
                                <a href="#" class="color-theme"><i class="fa fa-share pe-2"></i>Reply</a>
                            </div>
                        </div>
                        <p class="opacity-70 mb-4">
                            Love it! So fast and easy to customise and use. Thanks guys!
                        </p>
                    </div>
                    <div class="comment">
                        <div class="d-flex mb-2">
                            <div class="align-self-center">
                                <img src="images/pictures/faces/3small.png" class="rounded-m me-2" width="45">
                            </div>
                            <div class="align-self-center">
                                <h5 class="mb-0 font-600 font-14">Jim Jimmer</h5>
                                <span class="font-11 d-block mt-n1">Posted 1 Year Ago</span>
                            </div>
                            <div class="align-self-center ms-auto">
                                <a href="#" class="color-theme"><i class="fa fa-share pe-2"></i>Reply</a>
                            </div>
                        </div>
                        <p class="opacity-70 mb-4">
                            Awesome article! Thanks for sharing!
                        </p>
                    </div>
                    <div class="divider"></div>
                    <h3>Leave a Reply</h3>
                    <p>This is a Template. Comments are HTML made.</p>
                    <div class="input-style no-borders no-icon validate-field mb-4">
                        <input type="name" class="form-control validate-name" id="form1a" placeholder="Name">
                        <label for="form1a" class="color-highlight">Name</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style no-borders no-icon validate-field mb-4">
                        <input type="email" class="form-control validate-text" id="form2a" placeholder="Email">
                        <label for="form2a" class="color-highlight">Email</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style no-borders no-icon mb-4">
                        <textarea id="form7a" placeholder="Enter your message"></textarea>
                        <label for="form7a" class="color-highlight">Enter your Message</label>
                        <em class="mt-n3">(required)</em>
                    </div>
                    <a href="#" class="btn btn-full btn-m bg-highlight text-uppercase font-700 rounded-sm mt-4">Post
                        Comment</a>
                    <div class="divider mt-4 mb-0"></div>
                </div>
            </div>
            <div class="footer card">
                <a href="#" class="footer-title"><span class="color-highlight">StickyMobile</span></a>
                <p class="footer-text"><span>Made with <i class="fa fa-heart color-highlight font-16 ps-2 pe-2"></i> by
                        Enabled</span><br><br>Powered by the best Mobile Website Developer on Envato Market. Elite
                    Quality. Elite Products.</p>
                <div class="text-center mb-3">
                    <a href="#" class="icon icon-xs rounded-sm shadow-l me-1 bg-facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a href="#" class="icon icon-xs rounded-sm shadow-l me-1 bg-twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a href="#" class="icon icon-xs rounded-sm shadow-l me-1 bg-phone"><i class="fa fa-phone"></i></a>
                    <a href="#" data-menu="menu-share" class="icon icon-xs rounded-sm me-1 shadow-l bg-red-dark"><i
                            class="fa fa-share-alt"></i></a>
                    <a href="#" class="back-to-top icon icon-xs rounded-sm shadow-l bg-dark-light"><i
                            class="fa fa-angle-up"></i></a>
                </div>
                <p class="footer-copyright">Copyright &copy; Enabled <span id="copyright-year">2017</span>. All Rights
                    Reserved.</p>
                <p class="footer-links"><a href="#" class="color-highlight">Privacy Policy</a> | <a href="#"
                        class="color-highlight">Terms and Conditions</a> | <a href="#"
                        class="back-to-top color-highlight"> Back to Top</a></p>
                <div class="clear"></div>
            </div>
        </div>


        <div id="menu-settings" class="menu menu-box-bottom menu-box-detached">
            <div class="menu-title mt-0 pt-0">
                <h1>Settings</h1>
                <p class="color-highlight">Flexible and Easy to Use</p><a href="#" class="close-menu"><i
                        class="fa fa-times"></i></a>
            </div>
            <div class="divider divider-margins mb-n2"></div>
            <div class="content">
                <div class="list-group list-custom-small">
                    <a href="#" data-toggle-theme data-trigger-switch="switch-dark-mode" class="pb-2 ms-n1">
                        <i class="fa font-12 fa-moon rounded-s bg-highlight color-white me-3"></i>
                        <span>Dark Mode</span>
                        <div class="custom-control scale-switch ios-switch">
                            <input data-toggle-theme type="checkbox" class="ios-input" id="switch-dark-mode">
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
                <p class="color-highlight">Any Element can have a Highlight Color</p><a href="#" class="close-menu"><i
                        class="fa fa-times"></i></a>
            </div>
            <div class="divider divider-margins mb-n2"></div>
            <div class="content">
                <div class="highlight-changer">
                    <a href="#" data-change-highlight="blue"><i class="fa fa-circle color-blue-dark"></i><span
                            class="color-blue-light">Default</span></a>
                    <a href="#" data-change-highlight="red"><i class="fa fa-circle color-red-dark"></i><span
                            class="color-red-light">Red</span></a>
                    <a href="#" data-change-highlight="orange"><i class="fa fa-circle color-orange-dark"></i><span
                            class="color-orange-light">Orange</span></a>
                    <a href="#" data-change-highlight="pink2"><i class="fa fa-circle color-pink2-dark"></i><span
                            class="color-pink-dark">Pink</span></a>
                    <a href="#" data-change-highlight="magenta"><i class="fa fa-circle color-magenta-dark"></i><span
                            class="color-magenta-light">Purple</span></a>
                    <a href="#" data-change-highlight="aqua"><i class="fa fa-circle color-aqua-dark"></i><span
                            class="color-aqua-light">Aqua</span></a>
                    <a href="#" data-change-highlight="teal"><i class="fa fa-circle color-teal-dark"></i><span
                            class="color-teal-light">Teal</span></a>
                    <a href="#" data-change-highlight="mint"><i class="fa fa-circle color-mint-dark"></i><span
                            class="color-mint-light">Mint</span></a>
                    <a href="#" data-change-highlight="green"><i class="fa fa-circle color-green-light"></i><span
                            class="color-green-light">Green</span></a>
                    <a href="#" data-change-highlight="grass"><i class="fa fa-circle color-green-dark"></i><span
                            class="color-green-dark">Grass</span></a>
                    <a href="#" data-change-highlight="sunny"><i class="fa fa-circle color-yellow-light"></i><span
                            class="color-yellow-light">Sunny</span></a>
                    <a href="#" data-change-highlight="yellow"><i class="fa fa-circle color-yellow-dark"></i><span
                            class="color-yellow-light">Goldish</span></a>
                    <a href="#" data-change-highlight="brown"><i class="fa fa-circle color-brown-dark"></i><span
                            class="color-brown-light">Wood</span></a>
                    <a href="#" data-change-highlight="night"><i class="fa fa-circle color-dark-dark"></i><span
                            class="color-dark-light">Night</span></a>
                    <a href="#" data-change-highlight="dark"><i class="fa fa-circle color-dark-light"></i><span
                            class="color-dark-light">Dark</span></a>
                    <div class="clearfix"></div>
                </div>
                <a href="#" data-menu="menu-settings"
                    class="mb-3 btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-4">Back
                    to Settings</a>
            </div>
        </div>

        <div id="menu-backgrounds" class="menu menu-box-bottom menu-box-detached">
            <div class="menu-title">
                <h1>Backgrounds</h1>
                <p class="color-highlight">Change Page Color Behind Content Boxes</p><a href="#" class="close-menu"><i
                        class="fa fa-times"></i></a>
            </div>
            <div class="divider divider-margins mb-n2"></div>
            <div class="content">
                <div class="background-changer">
                    <a href="#" data-change-background="default"><i class="bg-theme"></i><span
                            class="color-dark-dark">Default</span></a>
                    <a href="#" data-change-background="plum"><i class="body-plum"></i><span
                            class="color-plum-dark">Plum</span></a>
                    <a href="#" data-change-background="magenta"><i class="body-magenta"></i><span
                            class="color-dark-dark">Magenta</span></a>
                    <a href="#" data-change-background="dark"><i class="body-dark"></i><span
                            class="color-dark-dark">Dark</span></a>
                    <a href="#" data-change-background="violet"><i class="body-violet"></i><span
                            class="color-violet-dark">Violet</span></a>
                    <a href="#" data-change-background="red"><i class="body-red"></i><span
                            class="color-red-dark">Red</span></a>
                    <a href="#" data-change-background="green"><i class="body-green"></i><span
                            class="color-green-dark">Green</span></a>
                    <a href="#" data-change-background="sky"><i class="body-sky"></i><span
                            class="color-sky-dark">Sky</span></a>
                    <a href="#" data-change-background="orange"><i class="body-orange"></i><span
                            class="color-orange-dark">Orange</span></a>
                    <a href="#" data-change-background="yellow"><i class="body-yellow"></i><span
                            class="color-yellow-dark">Yellow</span></a>
                    <div class="clearfix"></div>
                </div>
                <a href="#" data-menu="menu-settings"
                    class="mb-3 btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-4">Back
                    to Settings</a>
            </div>
        </div>

        <div id="menu-share" class="menu menu-box-bottom menu-box-detached">
            <div class="menu-title mt-n1">
                <h1>Share the Love</h1>
                <p class="color-highlight">Just Tap the Social Icon. We'll add the Link</p><a href="#"
                    class="close-menu"><i class="fa fa-times"></i></a>
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
    
    <?php } ?>
</body>
</html>