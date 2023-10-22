<?php
// session_start();

// include('error_handling.php');
include 'database.php';
require_once 'auth.php';

$database = new Database($dbConfig);

// Gantilah 'users' dengan nama tabel pengguna Anda
$user = $database->read('warga', "id = ".$_SESSION['user_id']."");

// if (!$user) {
//     echo "User not found.";
//     exit;
// }
$mahasiswa = [
    'gambar' => $user[0]['gambar'], // Ganti dengan nama gambar yang ada atau kosong
    'jenis_kelamin' => $user[0]['jk'] // Ganti jenis kelamin
];
// Halaman home
// Contoh penggunaan fungsi generateHeader dengan parameter sebagai array
$headerOptions = [
    'title' => 'Selamat Datang',
    'header_menu' => 1, // 1 for Home, 0 for Back
    'link_back' => '#',
    'header_title' => 'Welcome',
    'footer_menu' => 1, // 1 for Tab Menu, 0 for none
    'header_style' => 'header-clear-small',
];

echo generateHeader($headerOptions);


?>
        <div id="tab-1" class="tab-content active mt-5">
            <?= checkDefaultPassword(12345, $user[0]['password']); ?>
            <div class="content">
                <div class="input-style has-borders has-icon validate-field mb-2">
                    <i class="fa fa-search"></i>
                    <input type="name" class="form-control validate-name" id="form1" placeholder="Cari Informasi Disini">
                    <!-- <label for="form1" class="color-highlight">Name</label> -->
                </div>
            </div>
            <div class="card ">
            <div class="content">
            <h4 class="mx-3">Statistik</h4>
                    <div class="divider"></div>
                <div class="row mb-n2">
                    <div class="col-4 pe-2">
                        <div class="card card-style mx-0 mb-3">
                            <div class="p-3">
                                <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">PENDUDUK</h4>
                                <h1 class="font-700 font-34 color-red-dark mb-0"><?= $totalData = $database->countData('warga');?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 ps-2 pe-2">
                        <div class="card card-style mx-0 mb-3">
                            <div class="p-3">
                                <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">PRIA</h4>
                                <h1 class="font-700 font-34 color-blue-dark mb-0"><?= $totalDataWithCondition = $database->countData('warga', 'jk = "L"'); ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 ps-2">
                        <div class="card card-style mx-0 mb-3">
                            <div class="p-3">
                                <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">WANITA</h4>
                                <h1 class="font-700 font-34 color-green-dark mb-0"><?= $totalDataWithCondition = $database->countData('warga', 'jk = "P"'); ?></h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            
            
            <div class="card ">
                <div class="content">
                    <h4 class="mx-2">Menu Cepat</h4>
                    <div class="divider"></div>
                    <div class="row mb-0 text-center">
                        <a href="#" class="col-3">
                            <i class="fa fa-mobile-alt font-30 color-red-dark"></i>
                            <p class="font-11 font-700 text-uppercase">BANTUAN</p>
                        </a>
                        <a href="dana-desa.html" class="col-3">
                            <i class="fa fa-tablet-alt font-30 color-green-dark"></i>
                            <p class="font-11 font-700 text-uppercase">DANA DESA</p>
                        </a>
                        <a href="#" class="col-3">
                            <i class="fa fa-laptop font-30 color-blue-dark"></i>
                            <p class="font-11 font-700 text-uppercase">BUMDes</p>
                        </a>
                        <a href="#" class="col-3">
                            <i class="fa fa-desktop font-30 color-teal-dark"></i>
                            <p class="font-11 font-700 text-uppercase">IURAN DESA</p>
                        </a>
                        <div class="w-100 mb-3 mt-3"></div>
                        <a href="#" class="col-3">
                            <i class="fa fa-gamepad font-30 color-yellow-dark"></i>
                            <p class="font-11 font-700 text-uppercase">DONASI</p>
                        </a>
                        <a href="pemilu.php" class="col-3">
                            <i class="fa fa-gamepad font-30 color-yellow-dark"></i>
                            <p class="font-11 font-700 text-uppercase">PEMILU</p>
                        </a>
                        <a href="semua-layanan.php" class="col-3">
                            <i class="fa fa-tv font-30 color-orange-dark"></i>
                            <p class="font-11 font-700 text-uppercase">Lainnya</p>
                        </a>
                    </div>
                </div>
                <div class="btn-fab"></div>
            </div>
            <div class="splide single-slider slider-no-arrows slider-dots" id="single-slider-1"  >
                <div class="splide__track">
                    <div class="splide__list">
                        <div class="splide__slide">
                            <a href="#" class="card  bg-21" data-card-height="200">
                                <div class="card-top">
                                    <span class="badge float-end bg-blue-dark p-2 text-uppercase rounded-s m-2">Technology</span>
                                </div>
                                <div class="card-bottom m-3">
                                    <h1 class="color-white font-20">
                                        Apple's new Macbook M1 is perfect. Here are our thoughts.
                                    </h1>
                                    <p class="mb-0 color-white font-12 opacity-40 pt-1">Posted by Enabled - 25 Minutes Ago</p>
                                </div>
                                <div class="card-overlay bg-gradient opacity-90"></div>
                            </a>
                        </div>
                        <div class="splide__slide">
                            <a href="#" class="card  bg-28" data-card-height="200">
                                <div class="card-top">
                                    <span class="badge float-end bg-red-dark p-2 text-uppercase rounded-s m-2">SPORTS</span>
                                </div>
                                <div class="card-bottom m-3">
                                    <h1 class="color-white font-20">
                                        The Apple Watch is keeps you on track with your workouts.
                                    </h1>
                                    <p class="mb-0 color-white font-12 opacity-40 pt-1">Posted by Enabled - 2 Hours, 21 Minutes Ago</p>
                                </div>
                                <div class="card-overlay bg-gradient opacity-90"></div>
                            </a>
                        </div>
                        <div class="splide__slide">
                            <a href="#" class="card  bg-29" data-card-height="200">
                                <div class="card-top">
                                    <span class="badge float-end bg-green-dark p-2 text-uppercase rounded-s m-2">BUSINESS</span>
                                </div>
                                <div class="card-bottom m-3">
                                    <h1 class="color-white font-20">
                                        Keep your schedule organized. Here are the best tricks.
                                    </h1>
                                    <p class="mb-0 color-white font-12 opacity-40 pt-1">Posted by Enabled - 3 Hours, 37 Minutes Ago</p>
                                </div>
                                <div class="card-overlay bg-gradient opacity-90"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <div id="tab-2" class="tab-content mt-2">
            <div class="splide single-slider slider-no-dots" id="single-slider-home">
                <div class="splide__track">
                    <div class="splide__list">
                        <div class="splide__slide"  data-card-height="100">
                            <div class="card rounded-0 shadow-l mb-0">
                                <img class="img-fluid" src="img/3m.jpg" />
                            </div>
                        </div>
                        <div class="splide__slide"  data-card-height="100">
                            <div class="card rounded-0 shadow-l mb-0">
                                <img class="img-fluid" src="img/8m.jpg" />
                            </div>
                        </div>
                        <div class="splide__slide"  data-card-height="100">
                            <div class="card rounded-0 shadow-l mb-0">
                                <img class="img-fluid" src="img/3m.jpg" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex px-3 mb-n3">
    <div class="align-self-center">
        <h4 class="mb-0">Recommended</h4>
    </div>
    <div class="align-self-center ms-auto">
        <a href="#" class="font-12">View All</a>
    </div>
</div>
<div class="splide double-slider slider-no-dots visible-slider" id="double-slider-1a">
    <div class="splide__track">
        <div class="splide__list">
            <div class="splide__slide">
                <a href="berita-detail.html" class="mx-3">
                    <div class="card card-style me-0 mb-0" style="background-image: url(images/fitness/5m.jpg);" data-card-height="250">
                        <div class="card-top p-2">
                            <span class="color-black bg-white px-2 py-1 rounded-xs font-11"><i class="fa fa-fire color-orange-dark pe-2"></i>495 KCal</span>
                        </div>
                        <div class="card-bottom p-2 px-3">
                            <h3 class="color-white line-height-s">Sprint Training</h3>
                            <span class="color-white font-10 opacity-60"><i class="fa fa-map-marker pe-2"></i>Outdoors - 15 min</span>
                        </div>
                        <div class="card-overlay bg-gradient"></div>
                    </div>
                </a>
            </div>
            <div class="splide__slide">
                <a href="#" class="mx-3">
                    <div class="card card-style me-0 mb-0" style="background-image: url(images/fitness/8m.jpg);" data-card-height="250">
                        <div class="card-top p-2">
                            <span class="color-black bg-white px-2 py-1 rounded-xs font-11"><i class="fa fa-fire color-orange-dark pe-2"></i>657 KCal</span>
                        </div>
                        <div class="card-bottom p-2 px-3">
                            <h3 class="color-white line-height-s">Resistance Band Squats</h3>
                            <span class="color-white font-10 opacity-60"><i class="fa fa-map-marker pe-2"></i>Indoor - 35 min</span>
                        </div>
                        <div class="card-overlay bg-gradient"></div>
                    </div>
                </a>
            </div>
            <div class="splide__slide">
                <a href="#" class="mx-3">
                    <div class="card card-style me-0 mb-0" style="background-image: url(images/fitness/3m.jpg);" data-card-height="250">
                        <div class="card-top p-2">
                            <span class="color-black bg-white px-2 py-1 rounded-xs font-11"><i class="fa fa-fire color-orange-dark pe-2"></i>457 KCal</span>
                        </div>
                        <div class="card-bottom p-2 px-3">
                            <h3 class="color-white line-height-s">Forward Lunges</h3>
                            <span class="color-white font-10 opacity-60"><i class="fa fa-map-marker pe-2"></i>Indoor - 25 min</span>
                        </div>
                        <div class="card-overlay bg-gradient"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="d-flex px-3 mb-2">
    <div class="align-self-center">
        <h4 class="mb-0">Workout of the Day</h4>
    </div>
    <div class="align-self-center ms-auto">
        <a href="#" class="font-12">View All</a>
    </div>
</div>
    <?php

    // Menampilkan data mahasiswa
    $berita = $database->read('berita', '', 3);
    if ($berita) {
        foreach ($berita as $news) {
            echo '<a href="berita-detail.php?id=' . $news['id'] . '"><div class="card card-style" style="background-image: url(img/news/'.$news['gambar'].');" data-card-height="260">
            <div class="card-top no-click p-2 m-1">
                <h1 class="color-white font-19 mb-0">1500 kcal</h1>
                <p class="color-white mb-0 mt-n2 font-9 line-height-xs">
                    1 Hour, 20 Minutes
                </p>
            </div>
            <div class="card-top p-3">
                
            </div>
            <div class="card-bottom m-2">
                <div class="d-block px-2 py-2 rounded-m">
                    <div class="pe-3">
                        <h1 class="color-white font-23 font-800 mb-0">' . $news['judul'] . '</h1>
                        <p class="color-white font-12 mb-0 line-height-s opacity-70">' . potongTeks($news['isi']) . '</p>
                    </div>
                </div>
            </div>
            <div class="card-overlay bg-gradient opacity-80"></div>
        </div></a>';
        }
    } else {
        echo 'Tidak ada data berita.';
    }
    ?>

<div class="d-flex px-3">
    <div class="align-self-center">
        <h4 class="mb-0">Steps to Success</h4>
    </div>
    <div class="align-self-center ms-auto">
        <a href="#" class="font-12">View All</a>
    </div>
</div>
<div class="content mt-2 mb-n3">
    <div class="row">
        <div class="col-6 pe-2">
            <a href="#" class="card card-style mx-0 mb-3">
                <div class="card-top m-2">
                    <span class="bg-white color-black font-11 px-2 py-1 font-700 rounded-xs shadow-xxl">1</span>
                </div>
                <img src="images/fitness/4m.jpg" alt="img" class="img-fluid" />
                <div class="p-2">
                    <h4>Stay Hydrated</h4>
                    <p class="mb-0 mt-n1 opacity-70 line-height-s pt-1 font-11">For best results, drink at least 6 glasses of Water daily.</p>
                </div>
            </a>
        </div>
        <div class="col-6 ps-2">
            <a href="#" class="card card-style mx-0 mb-3">
                <div class="card-top m-2">
                    <span class="bg-white color-black font-11 px-2 py-1 font-700 rounded-xs shadow-xxl">2</span>
                </div>
                <img src="images/fitness/7m.jpg" alt="img" width="100" class="img-fluid" />
                <div class="p-2">
                    <h4>Eat Clean</h4>
                    <p class="mb-0 mt-n1 opacity-70 line-height-s pt-1 font-11">Stay away from processed foods. Eat natural and clean.</p>
                </div>
            </a>
        </div>
        <div class="col-6 pe-2">
            <a href="#" class="card card-style mx-0 mb-3">
                <div class="card-top m-2">
                    <span class="bg-white color-black font-11 px-2 py-1 font-700 rounded-xs shadow-xxl">3</span>
                </div>
                <img src="images/fitness/6m.jpg" alt="img" class="img-fluid" />
                <div class="p-2">
                    <h4>Keep a Routine</h4>
                    <p class="mb-0 mt-n1 opacity-70 line-height-s pt-1 font-11">Make a habbit of working out each day and stick to it!</p>
                </div>
            </a>
        </div>
        <div class="col-6 ps-2">
            <a href="#" class="card card-style mx-0 mb-3">
                <div class="card-top m-2">
                    <span class="bg-white color-black font-11 px-2 py-1 font-700 rounded-xs shadow-xxl">4</span>
                </div>
                <img src="images/fitness/8m.jpg" alt="img" width="100" class="img-fluid" />
                <div class="p-2">
                    <h4>Focus on Form</h4>
                    <p class="mb-0 mt-n1 opacity-70 line-height-s pt-1 font-11">Form follows function. Focus on a great feel, not weights.</p>
                </div>
            </a>
        </div>
    </div>
</div>

            <div class="content">
                <a href="#">
                    <div class="card rounded-sm bg-28" data-card-height="250">
                        <div class="card-top">
                            <div class="badge text-uppercase px-3 py-2 bg-dark-dark m-3 rounded-m float-end"><i class="fab fa-apple pe-2"></i>APPLE</div>
                        </div>
                        <div class="card-bottom">
                            <h4 class="color-white pb-5 px-3">Apple Watch sales increased by 250% this year alone.</h4>
                        </div>
                        <div class="card-bottom m-3">
                            <div class="d-flex pt-3">
                                <div class="align-self-center">
                                    <img src="images/pictures/10s.jpg" width="20" class="rounded-xs me-2" />
                                </div>
                                <div class="align-self-center">
                                    <span class="font-14 d-block font-500 opacity-50 color-white">by Enabled </span>
                                </div>
                                <div class="align-self-center ms-auto">
                                    <strong class="font-300 opacity-50 color-white">26 min ago</strong>
                                </div>
                            </div>
                        </div>
                        <div class="card-overlay bg-gradient rounded-sm"></div>
                    </div>
                </a>
            </div>


        </div>
        <div id="tab-3" class="tab-content mt-5">
        	<div class="content">
                <form action="" method="post">
            	    <div class="input-style has-borders has-icon validate-field mb-2">
            	        <i class="fa fa-search"></i>
            	        <input type="text" name="search" class="form-control validate-name" id="cariInput" placeholder="Masukkan kata kunci">
            	        <!-- <label for="form1" class="color-highlight">Name</label> -->
                        <input type="submit" name="submit" value="Cari">
            	    </div>
                </form>
        	</div>
        	<div class="card card-style bg-theme pb-0">
                <div class="tabs">

        	      <input type="radio" id="tab1" name="tab-control" checked>
        	      <input type="radio" id="tab2" name="tab-control">
        	      <input type="radio" id="tab3" name="tab-control">
        	      <input type="radio" id="tab4" name="tab-control">
        	      <ul>
        	        <li title="Features"><label for="tab1" role="button"><svg viewBox="0 0 24 24"><path d="M14,2A8,8 0 0,0 6,10A8,8 0 0,0 14,18A8,8 0 0,0 22,10H20C20,13.32 17.32,16 14,16A6,6 0 0,1 8,10A6,6 0 0,1 14,4C14.43,4 14.86,4.05 15.27,4.14L16.88,2.54C15.96,2.18 15,2 14,2M20.59,3.58L14,10.17L11.62,7.79L10.21,9.21L14,13L22,5M4.93,5.82C3.08,7.34 2,9.61 2,12A8,8 0 0,0 10,20C10.64,20 11.27,19.92 11.88,19.77C10.12,19.38 8.5,18.5 7.17,17.29C5.22,16.25 4,14.21 4,12C4,11.7 4.03,11.41 4.07,11.11C4.03,10.74 4,10.37 4,10C4,8.56 4.32,7.13 4.93,5.82Z"/>
        	    </svg><br><span>Features</span></label></li>
        	        <li title="Delivery Contents"><label for="tab2" role="button"><svg viewBox="0 0 24 24"><path d="M2,10.96C1.5,10.68 1.35,10.07 1.63,9.59L3.13,7C3.24,6.8 3.41,6.66 3.6,6.58L11.43,2.18C11.59,2.06 11.79,2 12,2C12.21,2 12.41,2.06 12.57,2.18L20.47,6.62C20.66,6.72 20.82,6.88 20.91,7.08L22.36,9.6C22.64,10.08 22.47,10.69 22,10.96L21,11.54V16.5C21,16.88 20.79,17.21 20.47,17.38L12.57,21.82C12.41,21.94 12.21,22 12,22C11.79,22 11.59,21.94 11.43,21.82L3.53,17.38C3.21,17.21 3,16.88 3,16.5V10.96C2.7,11.13 2.32,11.14 2,10.96M12,4.15V4.15L12,10.85V10.85L17.96,7.5L12,4.15M5,15.91L11,19.29V12.58L5,9.21V15.91M19,15.91V12.69L14,15.59C13.67,15.77 13.3,15.76 13,15.6V19.29L19,15.91M13.85,13.36L20.13,9.73L19.55,8.72L13.27,12.35L13.85,13.36Z" />
        	    </svg><br><span>Delivery Contents</span></label></li>
        	        <li title="Shipping"><label for="tab3" role="button"><svg viewBox="0 0 24 24">
        	        <path d="M3,4A2,2 0 0,0 1,6V17H3A3,3 0 0,0 6,20A3,3 0 0,0 9,17H15A3,3 0 0,0 18,20A3,3 0 0,0 21,17H23V12L20,8H17V4M10,6L14,10L10,14V11H4V9H10M17,9.5H19.5L21.47,12H17M6,15.5A1.5,1.5 0 0,1 7.5,17A1.5,1.5 0 0,1 6,18.5A1.5,1.5 0 0,1 4.5,17A1.5,1.5 0 0,1 6,15.5M18,15.5A1.5,1.5 0 0,1 19.5,17A1.5,1.5 0 0,1 18,18.5A1.5,1.5 0 0,1 16.5,17A1.5,1.5 0 0,1 18,15.5Z" />
        	    </svg><br><span>Shipping</span></label></li>    <li title="Returns"><label for="tab4" role="button"><svg viewBox="0 0 24 24">
        	        <path d="M11,9H13V7H11M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2M11,17H13V11H11V17Z" />
        	    </svg><br><span>Returns</span></label></li>
        	      </ul>

        	      <div class="slider"><div class="indicator"></div></div>
        	      <div class="content">
                    <?php
include "class/class.search.php";
if (isset($_POST['submit'])) {
    $searchQuery = $_POST['search'];
    $searchEngine = new SearchEngine();
    $namaResults = $searchEngine->searchNama($searchQuery);
    $nikResults = $searchEngine->searchNik($searchQuery);
    $emailResults = $searchEngine->searchEmail($searchQuery);
}
if (isset($namaResults)) {
    foreach ($namaResults as $result) {
        echo "<section>
                      <h2>Nama</h2>
                      " . $result['nama'] . "<br>
                    </section>";
    }

    foreach ($nikResults as $result) {
        echo "NIK: " . $result['nik'] . "<br>";
    }

    foreach ($emailResults as $result) {
        echo "Email: " . $result['email'] . "<br>";
    }

    // Close the database connection
    $searchEngine->close();
}
?>
        	        <section>
        	          <h2>Nama</h2>
                    </section>
        	        <section>
                      <h2>NIK</h2>
                    </section><section>
                      <h2>Email</h2>
                    </section><section>
                      <h2>Features</h2>
                    </section>
        	      </div>
        	    </div>



        	</div>

        </div>
        <div id="tab-4" class="tab-content mt-5">

            <div class="content">
                <div class="input-style has-borders has-icon validate-field mb-2">
                    <i class="fa fa-search"></i>
                    <input type="text" class="form-control validate-name" id="searchInput" placeholder="Search by name or nickname" autofocus>
                    <!-- <label for="form1" class="color-highlight">Name</label> -->
                </div>
            </div>
            <div class="card">
                <div class="content">
                    <div id="wargaList"></div>
                </div>

            </div>

        </div>
        <div id="tab-5" class="tab-content mt-4">
            <div class="card ">
                <a href="profil.php" class="d-flex m-3">
                    <div><img data-src="img/<?php echo tampilkanGambar($mahasiswa) ?>" src="img/<?php echo tampilkanGambar($mahasiswa) ?>"
                            class="me-3 rounded-circle shadow-l preload-img entered loaded" width="60" height="60"
                            data-ll-status="loaded"></div>
                    <div>
                        <h3 class="mt-2 mb-0 font-700"><?php echo $user[0]['nama']; ?></h3>
                        <p class="font-12 mt-n1 mb-0 pb-0"><?php echo maskMiddleDigits($user[0]['nik']); ?></p>
                    </div>
                    <div class="ms-auto mt-3 pt-1"><i class="fa fa-chevron-right color-theme opacity-30"></i></div>
                </a>
            </div>
            <div class="card">
                <div class="content">
                    <div class="list-group list-custom-small">
                        <a href="#">
                            <span>Pengaturan</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="update-password.php" >
                            <span>Ubah Password</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="#">
                            <span>Ultra Mobile</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="#">
                            <span>Ultra Mobile</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="#">
                            <span>Ultra Mobile</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="#">
                            <span>Ultra Mobile</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="#">
                            <span>Ultra Mobile</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>

            </div>
            <a href="logout.php" class="btn btn-full btn-l mx-2 rounded-sm font-800 text-uppercase bg-highlight">Keluar</a>


        </div>
    </div>
    <div id="menu-wizard-step-1" class="menu menu-box-left" data-menu-height="cover"  data-menu-width="cover">
        <div class="card card-style bg-transparent shadow-0 mb-0 mx-4" style="height: 100%;">
            <div class="card-top mt-4">
                <div class="d-flex pb-3 mb-n4">
                    <a href="#" style="width: 35px; line-height: 35px;"
                        class="me-auto font-600 rounded-l text-center bg-green-dark">1</a>
                    <a href="#" style="width: 35px; line-height: 35px;"
                        class="m-auto font-600 rounded-l text-center bg-gray-dark">2</a>
                    <a href="#" style="width: 35px; line-height: 35px;"
                        class="ms-auto font-600 rounded-l text-center bg-gray-dark">3</a>
                </div>
                <div class="divider position-absolute start-0 end-0 mt-n2" style="z-index: -1;"></div>
                <h1 class="pt-4 mt-3">Welcome</h1>
                <p>This is just a dummy example of the form wizard. You can use any field from the <a
                        href="component-inputs.html">Component Inputs</a> here.</p>
                <h5>Tell us your Name</h5>
                <div class="input-style has-borders no-icon validate-field mb-4">
                    <input type="name" class="form-control validate-name" id="form1" placeholder="John" />
                    <label for="form1" class="color-highlight disabled">John</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(optional)</em>
                </div>
                <h5>Where are you From?</h5>
                <div class="input-style has-borders no-icon validate-field mb-4">
                    <input type="name" class="form-control validate-name" id="form1" placeholder="Europe" />
                    <label for="form1" class="color-highlight disabled">Europe</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(required)</em>
                </div>
                <h5>Choose your Age Group</h5>
                <div class="input-style has-borders no-icon mb-4">
                    <label for="form5" class="color-highlight disabled">Select A Value</label>
                    <select id="form5">
                        <option value="default" disabled selected>Select a Value</option>
                        <option value="1">20 - 25</option>
                        <option value="2">25 - 30</option>
                        <option value="3">30 - 35</option>
                        <option value="4">35 - 40</option>
                        <option value="5">40 - 50</option>
                        <option value="6">50 - 55</option>
                        <option value="7">55 - 60</option>
                        <option value="8">60 - 65</option>
                    </select>
                    <span><i class="fa fa-chevron-down"></i></span>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <i class="fa fa-check disabled invalid color-red-dark"></i>
                    <em></em>
                </div>
            </div>
            <div class="card-bottom mb-5 pb-3">
                <a href="#" data-menu="menu-wizard-step-2"
                    class="btn btn-full btn-m rounded-m bg-blue-dark font-700 text-uppercase">Next Step</a>
            </div>
        </div>
    </div>
    <div id="menu-wizard-step-2" class="menu menu-box-left" data-menu-height="cover" data-menu-width="cover">
        <div class="card card-style bg-transparent shadow-0 mb-0" style="height: 100%;">
            <div class="card-top mt-4">
                <div class="d-flex pb-3 mb-n4">
                    <a href="#" style="width: 35px; line-height: 35px;" data-menu="menu-wizard-step-1"
                        class="me-auto font-600 text-center rounded-l bg-green-dark"><i
                            class="fa fa-check mx-n1"></i></a>
                    <a href="#" style="width: 35px; line-height: 35px;"
                        class="m-auto font-600 text-center rounded-l bg-green-dark">2</a>
                    <a href="#" style="width: 35px; line-height: 35px;"
                        class="ms-auto font-600 text-center rounded-l bg-gray-dark">3</a>
                </div>
                <div class="divider position-absolute start-0 end-0 mt-n2" style="z-index: -1;"></div>
                <h1 class="pt-4 mt-3">Tell us about the Product?</h1>
                <p>This is just a dummy example of the form wizard. You can use any field from the <a
                        href="component-inputs.html">Component Inputs</a> here.</p>
                <h5>What product did you use?</h5>
                <div class="input-style has-borders no-icon validate-field mb-4">
                    <input type="name" class="form-control validate-name" id="form1a" placeholder="Sticky" />
                    <label for="form1a" class="color-highlight disabled">Sticky</label>
                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <em>(optional)</em>
                </div>
                <h5>Which version did you use?</h5>
                <div class="input-style has-borders no-icon mb-4">
                    <label for="form5a" class="color-highlight disabled">Select A Value</label>
                    <select id="form5a">
                        <option value="default" disabled selected>Select a Value</option>
                        <option value="1a">v1.0</option>
                        <option value="2a">v2.0</option>
                        <option value="3a">v3.0</option>
                        <option value="4a">v4.0</option>
                        <option value="4a">v4.0</option>
                        <option value="5a">v5.0</option>
                    </select>
                    <span><i class="fa fa-chevron-down"></i></span>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <i class="fa fa-check disabled invalid color-red-dark"></i>
                    <em></em>
                </div>
            </div>
            <div class="card-bottom mb-5 pb-3">
                <a href="#" data-menu="menu-wizard-step-3"
                    class="btn btn-full btn-m rounded-m bg-blue-dark font-700 text-uppercase">Next Step</a>
            </div>
        </div>
    </div>
    <div id="menu-wizard-step-3" class="menu menu-box-left" data-menu-height="cover" data-menu-width="cover">
        <div class="card card-style bg-transparent shadow-0 mb-0" style="height: 100%;">
            <div class="card-top mt-4">
                <div class="d-flex pb-3 mb-n4">
                    <a href="#" style="width: 35px; line-height: 35px;" data-menu="menu-wizard-step-1"
                        class="me-auto font-600 rounded-xl text-center bg-green-dark"><i
                            class="fa fa-check mx-n1"></i></a>
                    <a href="#" style="width: 35px; line-height: 35px;" data-menu="menu-wizard-step-2"
                        class="m-auto font-600 rounded-xl text-center bg-green-dark"><i
                            class="fa fa-check mx-n1"></i></a>
                    <a href="#" style="width: 35px; line-height: 35px;"
                        class="ms-auto font-600 rounded-xl text-center bg-green-dark">3</a>
                </div>
                <div class="divider position-absolute start-0 end-0 mt-n2" style="z-index: -1;"></div>
                <h1 class="pt-4 mt-3">Would you recommend it?</h1>
                <p>This is just a dummy example of the form wizard. You can use any field from the <a
                        href="component-inputs.html">Component Inputs</a> here.</p>
                <h5>Did you enjoy our product?</h5>
                <div class="input-style has-borders no-icon mb-4">
                    <label for="form5ab" class="color-highlight disabled">Select A Value</label>
                    <select id="form5ab">
                        <option value="default" disabled selected>Select a Value</option>
                        <option value="1ab">Yes</option>
                        <option value="2ab">Not Sure</option>
                        <option value="2ab">No</option>
                    </select>
                    <span><i class="fa fa-chevron-down"></i></span>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <i class="fa fa-check disabled invalid color-red-dark"></i>
                    <em></em>
                </div>
                <h5>Would you recommend it?</h5>
                <div class="input-style has-borders no-icon mb-4">
                    <label for="form5abc" class="color-highlight disabled">Select A Value</label>
                    <select id="form5abc">
                        <option value="default" disabled selected>Select a Value</option>
                        <option value="1abc">Yes</option>
                        <option value="2abc">Not Sure</option>
                        <option value="2abc">No</option>
                    </select>
                    <span><i class="fa fa-chevron-down"></i></span>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <i class="fa fa-check disabled invalid color-red-dark"></i>
                    <em></em>
                </div>
                <h5>What did you like most?</h5>
                <div class="input-style has-borders no-icon mb-4">
                    <label for="form5abcd" class="color-highlight disabled">Select A Value</label>
                    <select id="form5abcd">
                        <option value="default" disabled selected>Select a Value</option>
                        <option value="1abcd">Code Quality</option>
                        <option value="2abcd">Design Quality</option>
                        <option value="3abcd">Feature Availability</option>
                        <option value="4abcd">Author Support</option>
                    </select>
                    <span><i class="fa fa-chevron-down"></i></span>
                    <i class="fa fa-check disabled valid color-green-dark"></i>
                    <i class="fa fa-check disabled invalid color-red-dark"></i>
                    <em></em>
                </div>
            </div>
            <div class="card-bottom mb-5 pb-3">
                <a href="#" data-menu="menu-wizard-step-4"
                    class="btn btn-full btn-m rounded-m bg-blue-dark font-700 text-uppercase">Next Step</a>
            </div>
        </div>
    </div>
    <div id="menu-wizard-step-4" class="menu menu-box-left" data-menu-height="cover" data-menu-width="cover">
        <div class="card card-style bg-transparent shadow-0 mb-0" style="height: 100%;">
            <div class="card-center text-center">
                <i class="fa fa-check-circle scale-box color-green-dark fa-5x pb-3"></i>
                <h1>Thank you!</h1>
                <p class="px-3 mb-5">
                    We'll get back to you if we need clarifications. Thank you for taking our survay!
                </p>
            </div>
            <div class="card-bottom mb-5 pb-3">
                <a href="#"
                    class="close-menu btn btn-full btn-m rounded-m bg-green-dark font-700 text-uppercase">Awesome!</a>
            </div>
        </div>
    </div>
    <div id="menu-author-details" class="menu menu-box-bottom menu-box-full">
            <div class="menu-title">
                <h1>Profil Singkat</h1>
                <p class="color-highlight">Premium Verified Author Account</p>
                <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
            </div>
            <div class="divider divider-margins mb-4"></div>
            <div class="content">
                <div class="d-flex">
                    <div class="align-self-center">
                        <img src="img/<?php echo tampilkanGambar($mahasiswa) ?>" width="50" id="profile-gambar"/>
                    </div>
                    <div class="align-self-center">
                        <h3 class="ps-3 pe-4 mb-0" id="profile-name"></h3>
                        <h5 class="ps-3 font-12 font-400"><i class="fa fa-check-circle color-blue-dark"></i> Verified Writer</h5>
                    </div>
                </div>
                <div class="divider mt-4 mb-4"></div>
                <div class="d-flex text-center mx-3">
                    <div class="me-auto">
                        <h1 class="font-24" id="profile-umur"></h1>
                        <p class="font-11 line-height-xs">Umur</p>
                    </div>
                    <div class="me-auto ms-auto">
                        <h1 class="font-24">134</h1>
                        <p class="font-11 line-height-xs">Thesis</p>
                    </div>
                    <div class="ms-auto">
                        <h1 class="font-24">321</h1>
                        <p class="font-11 line-height-xs">Followers</p>
                    </div>
                </div>
                <div class="divider mt-4"></div>
                <a href="" class="btn btn-full btn-m rounded-sm bg-highlight font-800 text-uppercase mb-4 " id="profile-id">View full Profile</a>
            </div>
        </div>
        

    <?php include "class/sidebar_menu.php"; ?>
    <script>

        $(document).ready(function () {
            var tabIds = ["tab-1", "tab-2", "tab-3", "tab-4", "tab-5"];
            var currentTabIndex = 0;
            var contentContainer = document.getElementById("tab-content");

            // Fungsi untuk menampilkan konten tab saat tab diklik
            function showTab(tabId) {
                $(".tab-content").removeClass("active");
                $("#" + tabId).addClass("active");
                $(".tab-link").removeClass("active-nav");
                $(".tab-link[data-tab='" + tabId + "']").addClass("active-nav");
                currentTabIndex = tabIds.indexOf(tabId);
                // Simpan status tab aktif ke sessionStorage
                sessionStorage.setItem("activeTab", tabId);
            }

            // Memuat konten awal
            var activeTab = sessionStorage.getItem("activeTab");
            if (activeTab) {
                showTab(activeTab);
                // Tampilkan tab yang sesuai saat halaman dimuat kembali
            } else {
                showTab(tabIds[currentTabIndex]);
                // Jika tidak ada tab yang disimpan, tampilkan tab pertama
            }

            // Fungsi untuk menampilkan konten tab saat tab diklik
            $(".tab-link").click(function () {
                var tabId = $(this).data("tab");
                showTab(tabId);
            });

            // Menangani swipe pada konten halaman untuk mengganti tab
            var startX = 0;
            var swipeThreshold = 100;
            // Ambang batas swipe

            contentContainer.addEventListener("touchstart", function (event) {
                startX = event.touches[0].clientX;
            });

            contentContainer.addEventListener("touchend", function (event) {
                var endX = event.changedTouches[0].clientX;
                var deltaX = endX - startX;

                if (deltaX > swipeThreshold) {
                    // Swipe ke kanan, navigasi ke tab sebelumnya
                    var prevTabIndex = currentTabIndex - 1;
                    if (prevTabIndex >= 0) {
                        showTab(tabIds[prevTabIndex]);
                    }
                } else if (deltaX < -swipeThreshold) {
                    // Swipe ke kiri, navigasi ke tab berikutnya
                    var nextTabIndex = currentTabIndex + 1;
                    if (nextTabIndex < tabIds.length) {
                        showTab(tabIds[nextTabIndex]);
                    }
                }
            });

            // Inisialisasi Swiper untuk masing-masing tab
            var tabSwipers = [];

            $(".tab-content").each(function () {
                var swiper = new Swiper(this, {
                    slidesPerView: 'auto',
                    // Menyesuaikan jumlah slide yang terlihat sesuai layar
                    freeMode: true,
                    // Mode swipe bebas
                    watchSlidesProgress: true,
                    // Memantau progress slide saat digulir
                    on: {
                        progress: function (progress) {
                            var activeTab = $('.tab-link.active-nav');
                            activeTab.removeClass('active-nav');
                            if (progress > 0) {
                                activeTab.next().addClass('active-nav');
                            } else {
                                activeTab.prev().addClass('active-nav');
                            }
                        }
                    }
                });

                tabSwipers.push(swiper);
            });

            // Mengganti tab saat elemen swipe dilepaskan
            tabSwipers.forEach(function (swiper) {
                swiper.on('tap', function (e) {
                    var clickedTab = $(e.target);
                    var tabId = clickedTab.data('tab');

                    // Sembunyikan semua konten tab
                    $('.tab-content').removeClass('active');

                    // Tampilkan konten tab yang sesuai
                    $('#' + tabId).addClass('active');

                    // Nonaktifkan semua tautan
                    $('.tab-link').removeClass('active-nav');

                    // Aktifkan tautan yang diklik
                    clickedTab.addClass('active-nav');
                });
            });

        });
    </script>
    <script>
    // Menggunakan JavaScript untuk filter list-group
    document.getElementById("cariInput").addEventListener("input", function() {
        var filter = this.value.toLowerCase();
        var listGroup = document.getElementById("listGroup");
        var links = listGroup.getElementsByTagName("a");

        for (var i = 0; i < links.length; i++) {
            var span = links[i].getElementsByTagName("span")[0];
            var txtValue = span.textContent || span.innerText;

            if (txtValue.toLowerCase().indexOf(filter) > -1) {
                links[i].style.display = "";
            } else {
                links[i].style.display = "none";
            }
        }
    });
</script>
    <script>
        // Disable long-click context menu
document.addEventListener("contextmenu", function(e) {
    e.preventDefault();
});



    </script>
    <script>
    function mostrarConteudo(idConteudo) {
        var conteudos = document.querySelectorAll('.conteudo');
        for (var i = 0; i < conteudos.length; i++) {
            conteudos[i].style.display = 'none';
        }

        document.getElementById(idConteudo).style.display = 'block';

        var abas = document.querySelectorAll('#abas li');
        for (var j = 0; j < abas.length; j++) {
            abas[j].classList.remove('selecionada');
        }

        var aba = document.querySelector('a[href="#' + idConteudo + '"]');
        aba.parentElement.classList.add('selecionada');
    }
</script>

<script>
    $(document).ready(function() {
    let offset = 0; // Offset for loading more data
    const limit = 15; // Number of records to load at a time

    // Fungsi untuk menampilkan profil dalam modal saat item daftar diklik
    function showProfile() {
        const showProfileLinks = document.querySelectorAll(".show-profile");
        const modal = document.getElementById("menu-author-details");
        const profileName = document.getElementById("profile-name");
        const profileUmur = document.getElementById("profile-umur");
        const profileId = document.getElementById("profile-id");
        const profileGambar = document.getElementById("profile-gambar");
        // const viewProfileLink = document.getElementById("view-profile-link");

        showProfileLinks.forEach((link) => {
            link.addEventListener("click", function (e) {
                e.preventDefault();
                const name = this.dataset.profileName;
                const umur = this.dataset.profileUmur;
                const id = this.dataset.profileId;
                const gambar = this.dataset.profileGambar;

                profileName.textContent = name;
                profileUmur.textContent = umur;
                profileId.textContent = id;
                profileGambar.textContent = gambar;

                modal.classList.add("menu-active");
                
                // Arahkan pengguna ke halaman baru dengan parameter ID saat tautan diklik
                // Setel href tautan "View Full Profile" dengan URL yang sesuai
                profileId.href = 'profil.php?id=' + id;

            });
        });

        const closeMenu = modal.querySelector(".close-menu");
        closeMenu.addEventListener("click", function () {
            modal.classList.remove("menu-active");
        });
    }

    function loadWarga() {
        const search = $("#searchInput").val();
        $.ajax({
            url: "ajax/fetch_warga.php", // PHP script to fetch warga data
            method: "POST",
            data: { offset: offset, limit: limit, search: search },
            success: function(data) {
                $("#wargaList").append(data);
                offset += limit;

                // Setelah data dimuat, inisialisasikan event click pada link
                showProfile();
            }
        });
    }

    // Initial data load
    loadWarga();

    // Listen for scrolling and trigger data loading when nearing the bottom of the page
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            loadWarga();
        }
    });

    // Listen for input changes in the search box and reset offset
    $("#searchInput").on("input", function() {
        offset = 0;
        $("#wargaList").empty();
        loadWarga();
    });
});

</script>
</body>

</html>