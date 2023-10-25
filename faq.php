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
    'title' => 'Profil',
    'header_menu' => 0,
    'link_back' => 'index.php',
    'header_title' => 'FAQ',
    'footer_menu' => 0,
    'header_style' => 'header-clear-medium',
];

echo generateHeader($headerOptions);
?>

<div class="card ">
    <div class="content mb-2">
        <h3>Frequent Questions</h3>
        <p class="color-highlight font-12 mt-n2 mb-2">Really, we get asked this often.</p>
        <p>
            We get asked these questions a lot, so we made this small section to help you out identifying what you need
            faster.
        </p>
        <?php
        // Menampilkan data mahasiswa
        $berita = $database->read('faq', '', 3);
        if ($berita) {
            foreach ($berita as $news) {
                echo '<div class="divider mt-3 mb-3"></div>
                <h5 href="#FAQ' . $news['id'] . '" data-bs-toggle="collapse" role="button" class="font-600 collapsed" aria-expanded="false">
                ' . $news['question'] . '
                    <i class="fa fa-angle-down float-end me-2 mt-1 opacity-50 font-10"></i>
                </h5>
                <div class="collapse" id="FAQ' . $news['id'] . '" style="">
                    <p class="pb-3">
                    ' . $news['answer'] . '
                    // ' . potongTeks($news['answer']) . '
                    </p>
                </div>';
            }
        } else {
            echo 'Tidak ada data berita.';
        }
        ?>
        
        <div class="divider mt-3 mb-3"></div>
        <h5 href="#FAQ2" data-bs-toggle="collapse" role="button" class="font-600 collapsed" aria-expanded="false">
            Is this a Cordova App?
            <i class="fa fa-angle-down float-end me-2 mt-1 opacity-50 font-10"></i>
        </h5>
        <div class="collapse" id="FAQ2" style="">
            <p class="pb-3">
                No, but we have a ready built version in our portfolio and you can convert it to Cordova yourself. It's
                really simple.
            </p>
        </div>
        <div class="divider mt-3 mb-3"></div>
        <h5 href="#FAQ3" data-bs-toggle="collapse" role="button" class="font-600 collapsed" aria-expanded="false">
            Is this a WordPres Theme?
            <i class="fa fa-angle-down float-end me-2 mt-1 opacity-50 font-10"></i>
        </h5>
        <div class="collapse" id="FAQ3" style="">
            <p class="pb-3">
                No. Our item is a HTML, CSS3 and JS Site Template. You can however convert it to a WordPress Theme.
            </p>
        </div>
        <div class="divider mt-3 mb-3"></div>
        <h5 href="#FAQ4" data-bs-toggle="collapse" role="button" class="font-600">
            Is this built with Boostrap?
            <i class="fa fa-angle-down float-end me-2 mt-1 opacity-50 font-10"></i>
        </h5>
        <div class="collapse" id="FAQ4">
            <p class="pb-3">
                Yes! We include 2 versions, one built with Boostrap, and a much more flexible and powerful custom AJAX
                version.
            </p>
        </div>
    </div>
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
                <h5 class="ps-3 font-12 font-400"><i class="fa fa-check-circle color-blue-dark"></i> Verified Writer
                </h5>
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
        <a href="#" class="btn btn-full btn-m rounded-sm bg-highlight font-800 text-uppercase mb-4">View full
            Profile</a>
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
                <h5 class="ps-3 font-12 font-400"><i class="fa fa-check-circle color-blue-dark"></i> Verified Writer
                </h5>
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
        <a href="#" class="btn btn-full btn-m rounded-sm bg-highlight font-800 text-uppercase mb-4">View full
            Profile</a>
    </div>
</div>
<script>
// Fungsi untuk menampilkan profil dalam modal saat item daftar diklik
document.addEventListener("DOMContentLoaded", function() {
    const showProfileLinks = document.querySelectorAll(".show-profile");
    const modal = document.getElementById("menu-author-details");
    const profileName = document.getElementById("profile-name");
    // const profileImage = document.getElementById("profile-image");
    // const profilePublished = document.getElementById("profile-published");
    // const profileThesis = document.getElementById("profile-thesis");
    // const profileFollowers = document.getElementById("profile-followers");

    showProfileLinks.forEach((link) => {
        link.addEventListener("click", function(e) {
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
    closeMenu.addEventListener("click", function() {
        // Tutup modal saat tombol close diklik
        modal.classList.remove("menu-active");
    });
});
</script>

<?php } ?>
</body>

</html>