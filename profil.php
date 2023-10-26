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
    $mahasiswa = $database->read('warga', "nik=".$_SESSION['user_id']."");    
    $hide = '<a href="update-profil.php" class="btn btn-full btn-l rounded-sm font-800 text-uppercase bg-highlight" >Update Profil</a>';


} else {
    $mahasiswa = $database->read('warga', "nik=".$_GET['id']."");
    $hide = '';
}





if ($mahasiswa) {
$mhs = $mahasiswa[0];

$headerOptions = [
    'title' => 'Profil',
    'header_menu' => 0,
    'link_back' => 'index.php',
    'header_title' => 'Profil Warga',
    'footer_menu' => 0,
    'header_style' => 'header-clear-medium',
];

echo generateHeader($headerOptions);
?>

                <div class="card">
                    <div class="content">
                        <div class="d-flex">
                            <div>
                                <p class="color-highlight font-600 mb-n1"><?php echo $mhs['jenis_pekerjaan']; ?></p>
                                <h1 class="mb-0 mt-2"><?php echo $mhs['nama']; ?></h1>
                            </div>
                            <div class="ms-auto align-self-center">
                                
                                <?php
                                // Cara menggunakannya
                                $mahasiswa = [
                                    'gambar' => $mhs['gambar'], // Ganti dengan nama gambar yang ada atau kosong
                                    'jenis_kelamin' => $mhs['jk'] // Ganti jenis kelamin
                                ];


                                ?>
                                <img src="img/<?php echo tampilkanGambar($mahasiswa); ?>" data-src="img/<?php echo tampilkanGambar($mahasiswa); ?>" class="rounded-circle  preload-img entered loaded" width="80" height="80">
                                <!-- <i class="fab fa-spotify font-40 color-green-dark"></i> -->
                            </div>
                        </div>
                        <div class="row mb-3 mt-4">
                            <h5 class="col-6 text-start font-14">Nama Lengkap</h5>
                            <h5 class="col-6 text-end font-14 "><?php echo $mhs['nama']; ?></h5>
                            <h5 class="col-6 text-start font-14">Tempat/Tanggal Lahir</h5>
                            <h5 class="col-6 text-end font-14 "><?php echo $mhs['tempat_lahir']; ?>, <?php echo $mhs['tanggal_lahir']; ?></h5>
                            <h5 class="col-6 text-start font-14">Alamat</h5>
                            <h5 class="col-6 text-end font-14 "><?php echo $mhs['alamat']; ?></h5>
                            <h5 class="col-6 text-start font-14">NIK</h5>
                            <h5 class="col-6 text-end font-14 "><?php echo $mhs['nik']; ?></h5>
                            <h5 class="col-6 text-start font-14">No. KK</h5>
                            <h5 class="col-6 text-end font-14 "><?php echo $mhs['kk']; ?></h5>
                            <h5 class="col-6 text-start font-14">Ayah</h5>
                            <h5 class="col-6 text-end font-14 "><?php echo $mhs['ayah']; ?></h5>
                            <h5 class="col-6 text-start font-14">Ibu</h5>
                            <h5 class="col-6 text-end font-14 "><?php echo $mhs['ibu']; ?></h5>
                        </div>
                        <div class="divider mt-4"></div>
                        <?= $hide; ?>
                    </div>
                </div>
                <div class="card">
                <div class="content">
                    <h3 class="mb-3">Anggota Keluarga</h3>
                    <?php
                    // Menggunakan metode filterData untuk mencari anggota keluarga berdasarkan nomor KK

                    $filteredFamilyMembers = $database->filterData("warga", "kk", $mhs['kk']);

                    // Tampilkan hasil pencarian
                    if (!empty($filteredFamilyMembers)) {
                        foreach ($filteredFamilyMembers as $familyMember) {
                            $sliderOptions = json_encode(["autoplay" => false]);

                            $warga = [
                                'gambar' => $familyMember['gambar'], // Ganti dengan nama gambar yang ada atau kosong
                                'jenis_kelamin' => $familyMember['jk'] // Ganti jenis kelamin
                            ];


                            echo '<div data-splide='.$sliderOptions.' class="splide single-slider slider-no-arrows slider-no-dots" id="user-slider-'.$familyMember['id'].'">
                        <div class="splide__track">
                            <div class="splide__list">
                                <div class="splide__slide mx-3">
                                    <div class="d-flex">
                                        <div><img src="img/'.tampilkanGambar($warga).'" class="me-3 rounded-circle shadow-l" width="50" /></div>
                                        <div>
                                            <h5 class="mt-1 mb-0">'.$familyMember['nama'].'</h5>
                                            <p class="font-10 mt-n1 color-red-dark">'.$familyMember['hubungan_keluarga'].'</p>
                                        </div>
                                        <div class="ms-auto"><span class="slider-next badge bg-red-dark mt-2 p-2 font-8">SWIPE LEFT</span></div>
                                    </div>
                                </div>
                                <div class="splide__slide mx-3">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mt-1 mb-0">'.$familyMember['nama'].'</h5>
                                            <p class="font-10 mt-n1 color-red-dark">Executive Officer</p>
                                        </div>
                                        <div class="ms-auto">
                                            <a href="#" class="icon icon-xs rounded-circle shadow-l bg-phone"><i class="fa fa-phone"></i></a>
                                            <a href="#" class="icon icon-xs rounded-circle shadow-l bg-facebook me-2 ms-2"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#"  data-menu="menu-author-details" data-profile-name="' . $familyMember['nama'] . '" class=" show-profile icon icon-xs rounded-circle shadow-l bg-twitter"><i class="fab fa-twitter"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="divider mt-1 mb-1"></div>';
                        }
                    } else {
                        echo "Tidak ada anggota keluarga yang cocok dengan nomor KK tersebut.";
                    }

                    ?>


                    
                    
                </div>
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
                        <img src="images/pictures/faces/2s.png" width="50" />
                    </div>
                    <div class="align-self-center">
                        <h3 class="ps-3 pe-4 mb-0" id="profile-name"></h3>
                        <h5 class="ps-3 font-12 font-400"><i class="fa fa-check-circle color-blue-dark"></i> Verified Writer</h5>
                    </div>
                </div>
                <div class="divider mt-4 mb-4"></div>
                <div class="d-flex text-center mx-3">
                    <div class="me-auto">
                        <h1 class="font-24">34</h1>
                        <p class="font-11 line-height-xs">Published</p>
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
                <a href="#" class="btn btn-full btn-m rounded-sm bg-highlight font-800 text-uppercase mb-4">View full Profile</a>
            </div>
        </div>
        <div id="menu-modal-author-details" class="menu menu-box-modal menu-box-detached">
            <div class="menu-title">
                <h1>Author Details</h1>
                <p class="color-highlight">Premium Verified Author Account</p>
                <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
            </div>
            <div class="divider divider-margins mb-4"></div>
            <div class="content">
                <div class="d-flex">
                    <div class="align-self-center">
                        <img src="images/pictures/faces/2s.png" width="50" />
                    </div>
                    <div class="align-self-center">
                        <h3 class="ps-3 pe-4 mb-0">John Doe</h3>
                        <h5 class="ps-3 font-12 font-400"><i class="fa fa-check-circle color-blue-dark"></i> Verified Writer</h5>
                    </div>
                </div>
                <div class="divider mt-4 mb-4"></div>
                <div class="d-flex text-center mx-3">
                    <div class="me-auto">
                        <h1 class="font-24">34</h1>
                        <p class="font-11 line-height-xs">Published</p>
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
                <a href="#" class="btn btn-full btn-m rounded-sm bg-highlight font-800 text-uppercase mb-4">View full Profile</a>
            </div>
        </div>
        <script>
            // Fungsi untuk menampilkan profil dalam modal saat item daftar diklik
            document.addEventListener("DOMContentLoaded", function () {
                const showProfileLinks = document.querySelectorAll(".show-profile");
                const modal = document.getElementById("menu-author-details");
                const profileName = document.getElementById("profile-name");
                // const profileImage = document.getElementById("profile-image");
                // const profilePublished = document.getElementById("profile-published");
                // const profileThesis = document.getElementById("profile-thesis");
                // const profileFollowers = document.getElementById("profile-followers");

                showProfileLinks.forEach((link) => {
                    link.addEventListener("click", function (e) {
                        e.preventDefault();
                        // Mengambil data dari atribut data-
                        const name = this.dataset.profileName;
                        // const image = this.dataset.profileImage;
                        // const published = this.dataset.profilePublished;
                        // const thesis = this.dataset.profileThesis;
                        // const followers = this.dataset.profileFollowers;

                        // Memperbarui konten modal dengan data yang sesuai
                        profileName.textContent = name;
                        // profileImage.src = image;
                        // profilePublished.textContent = published;
                        // profileThesis.textContent = thesis;
                        // profileFollowers.textContent = followers;

                        // Tampilkan modal
                        modal.classList.add("menu-active");
                    });
                });

                const closeMenu = modal.querySelector(".close-menu");
                closeMenu.addEventListener("click", function () {
                    // Tutup modal saat tombol close diklik
                    modal.classList.remove("menu-active");
                });
            });
        </script>

    <?php } ?>
    </body>
</html>
