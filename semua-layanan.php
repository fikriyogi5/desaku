<?php
// Sisipkan kelas Database
require_once 'database.php';
require_once 'auth.php';
    // Periksa apakah pengguna telah login, jika tidak, alihkan ke halaman login

$database = new Database($dbConfig);
if (empty($_GET['id']) || !is_numeric($_GET['id'])) {
    // Jika parameter 'id' kosong atau bukan angka, kembalikan ke halaman sebelumnya
    // header('Location: index.php');
    // exit;
    $mahasiswa = $database->read('warga', "id=".$_SESSION['user_id']."");    
    $hide = '<a href="update-profil.php" class="btn btn-full btn-l rounded-sm font-800 text-uppercase bg-highlight" >Update Profil</a>';


} else {
    $mahasiswa = $database->read('warga', "id=".$_GET['id']."");
    $hide = '';
}





if ($mahasiswa) {
$mhs = $mahasiswa[0];

$headerOptions = [
    'title' => 'Layanan',
    'header_menu' => 0,
    'link_back' => 'index.php',
    'header_title' => 'Semua Layanan',
    'footer_menu' => 0,
    'header_style' => 'header-clear-medium',
];

echo generateHeader($headerOptions);
?>
            <div class="card ">
                <div class="content">
                    <h5 class="fw-normal">Tagihan</h5>
                    <div class="divider" ></div>
                    <div class="row mb-0 text-center">
                        <a href="#" class="col-3">
                            <i class="fa fa-laptop font-30 color-blue-dark"></i>
                            <p class="font-11 font-700 text-uppercase">Pulsa</p>
                        </a>
                        <a href="#" class="col-3">
                            <i class="fa fa-mobile-alt font-30 color-red-dark"></i>
                            <p class="font-11 font-700 text-uppercase">Listrik</p>
                        </a>
                        <a href="#" class="col-3">
                            <i class="fa fa-tablet-alt font-30 color-green-dark"></i>
                            <p class="font-11 font-700 text-uppercase">BPJS</p>
                        </a>
                        <a href="#" class="col-3">
                            <i class="fa fa-laptop font-30 color-blue-dark"></i>
                            <p class="font-11 font-700 text-uppercase">Pajak</p>
                        </a>
                        <div class="w-100 mb-3 mt-3"></div>
                        <a href="#" class="col-3">
                            <i class="fa fa-laptop font-30 color-blue-dark"></i>
                            <p class="font-11 font-700 text-uppercase">E-Money</p>
                        </a>
                        <a href="#" class="col-3">
                            <i class="fa fa-laptop font-30 color-blue-dark"></i>
                            <p class="font-11 font-700 text-uppercase">Cicilan</p>
                        </a>
                        <a href="#" class="col-3">
                            <i class="fa fa-laptop font-30 color-blue-dark"></i>
                            <p class="font-11 font-700 text-uppercase">Wifi</p>
                        </a>
                        
                        <a href="tg-game.html" class="col-3">
                            <i class="fa fa-laptop font-30 color-blue-dark"></i>
                            <p class="font-11 font-700 text-uppercase">Game</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="content">
                    <h5 class="fw-normal">Kebutuhan Harian</h5>
                    <div class="divider" ></div>
                    <div class="row mb-0 text-center">
                        <a href="#" class="col-3">
                            <i class="fa fa-mobile-alt font-30 color-red-dark"></i>
                            <p class="font-11 font-700 text-uppercase">PKH</p>
                        </a>
                        <a href="#" class="col-3">
                            <i class="fa fa-tablet-alt font-30 color-green-dark"></i>
                            <p class="font-11 font-700 text-uppercase">BLT</p>
                        </a>
                        <a href="#" class="col-3">
                            <i class="fa fa-laptop font-30 color-blue-dark"></i>
                            <p class="font-11 font-700 text-uppercase">PIP</p>
                        </a>
                        <a href="#" class="col-3">
                            <i class="fa fa-laptop font-30 color-blue-dark"></i>
                            <p class="font-11 font-700 text-uppercase">KIP</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="content">
                    <h5 class="fw-normal">Bantuan Pemerintah</h5>
                    <div class="divider" ></div>
                    <div class="row mb-0 text-center">
                        <a href="#" class="col-3">
                            <i class="fa fa-mobile-alt font-30 color-red-dark"></i>
                            <p class="font-11 font-700 text-uppercase">PKH</p>
                        </a>
                        <a href="#" class="col-3">
                            <i class="fa fa-tablet-alt font-30 color-green-dark"></i>
                            <p class="font-11 font-700 text-uppercase">BLT</p>
                        </a>
                        <a href="#" class="col-3">
                            <i class="fa fa-laptop font-30 color-blue-dark"></i>
                            <p class="font-11 font-700 text-uppercase">PIP</p>
                        </a>
                    </div>
                </div>
                <div class="btn-fab">

                </div>
            </div>

        </div>

        <div id="menu-install-pwa-android" class="menu menu-box-bottom menu-box-detached rounded-l">
            <div class="boxed-text-l mt-4 pb-3">
                <img class="rounded-l mb-3" src="app/icons/icon-128x128.png" alt="img" width="90" />
                <h4 class="mt-3">Add Sticky on your Home Screen</h4>
                <p>
                    Install Sticky on your home screen, and access it just like a regular app. It really is that simple!
                </p>
                <a href="#"
                    class="pwa-install btn btn-s rounded-s shadow-l text-uppercase font-900 bg-highlight mb-2">Add to
                    Home Screen</a><br />
                <a href="#"
                    class="pwa-dismiss close-menu color-gray-dark text-uppercase font-900 opacity-60 font-10 pt-2">Maybe
                    later</a>
                <div class="clear"></div>
            </div>
        </div>

        <div id="menu-install-pwa-ios" class="menu menu-box-bottom menu-box-detached rounded-l">
            <div class="boxed-text-xl mt-4 pb-3">
                <img class="rounded-l mb-3" src="app/icons/icon-128x128.png" alt="img" width="90" />
                <h4 class="mt-3">Add Sticky on your Home Screen</h4>
                <p class="mb-0 pb-0">
                    Install Sticky, and access it like a regular app. Open your Safari menu and tap "Add to Home
                    Screen".
                </p>
                <div class="clearfix pt-3"></div>
                <a href="#" class="pwa-dismiss close-menu color-highlight text-uppercase font-700">Maybe later</a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../public/js/custom.js"></script>
    <script>
        $(document).ready(function () {
            var tabIds = ["tab-home", "tab-search", "tab-notification", "tab-settings"];
            var currentTabIndex = 0;
            var contentContainer = document.getElementById("page-content");

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
                showTab(activeTab); // Tampilkan tab yang sesuai saat halaman dimuat kembali
            } else {
                showTab(tabIds[currentTabIndex]); // Jika tidak ada tab yang disimpan, tampilkan tab pertama
            }

            // Fungsi untuk memuat konten tab menggunakan Ajax
            function loadTabContent(tabId) {
                if (tabId === "tab-search") {
                    $.ajax({
                        type: "GET",
                        url: "getDataFromDatabase.php", // Ganti dengan URL yang sesuai
                        success: function (response) {
                            $("#data-container").html(response);
                        }
                    });
                }
                // Tambahkan logika Ajax untuk tab lain jika diperlukan
            }

            // Aktifkan fitur pull to refresh
            const ptr = PullToRefresh.init({
                mainElement: '#page',
                onRefresh: function () {
                    loadTabContent(tabIds[currentTabIndex]);
                    setTimeout(function () {
                        // Simulasi refresh selesai setelah beberapa waktu tertentu
                        ptr.done();
                    }, 1000); // Contoh: 1000 ms (1 detik)
                }
            });

            // Event listener untuk tombol "Refresh Halaman"
            $("#refresh-button").click(function () {
                loadTabContent(tabIds[currentTabIndex]);
            });

            // Menangani swipe pada konten halaman untuk mengganti tab
            // Menangani swipe pada konten halaman untuk mengganti tab
            var startX = 0;
            var swipeThreshold = 100; // Ambang batas swipe

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


            // Fungsi untuk menampilkan konten tab saat tab diklik
            $(".tab-link").click(function () {
                var tabId = $(this).data("tab");
                showTab(tabId);
            });

            // Inisialisasi Swiper untuk masing-masing tab
            var tabSwipers = [];

            $(".swiper-container").each(function () {
                var swiper = new Swiper(this, {
                    slidesPerView: 'auto', // Menyesuaikan jumlah slide yang terlihat sesuai layar
                    freeMode: true, // Mode swipe bebas
                    watchSlidesProgress: true, // Memantau progress slide saat digulir
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

            $('.fab').click(function () {
                $('.radial').toggleClass('open');
            });
        });
    </script>

    <?php } ?>
</body>

</html>