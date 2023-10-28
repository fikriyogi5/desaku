<?php
// session_start();

// include('error_handling.php');
include 'database.php';
require_once 'auth.php';

$database = new Database($dbConfig);

// Gantilah 'users' dengan nama tabel pengguna Anda
$user = $database->read('warga', "id = " . $_SESSION['user_id'] . "");

// if (!$user) {
//     echo "User not found.";
//     exit;
// }

// Halaman home
// Contoh penggunaan fungsi generateHeader dengan parameter sebagai array
$headerOptions = [
    'title' => 'Selamat Datang',
    'header_menu' => 0, // 1 for Home, 0 for Back
    'link_back' => 'index.php',
    'icon' => 'fa-arrow-left',
    'header_title' => 'Pemilu',
    'footer_menu' => 1, // 1 for Tab Menu, 0 for none
    'header_style' => 'header-clear-medium',
];

echo generateHeader($headerOptions);

?>
                <div class="content">
                    <div class="row mb-n2">
                        <div class="col-12 pe-2">
                            <div class="card card-style mx-0 mb-3 text-center">
                                <div class="p-3">
                                    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">LOKASI TPS SAYA</h4>
                                    <h1 class="font-700 font-50 color-green-dark mt-3 mb-2">2</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 pe-2">
                            <div class="card card-style mx-0 mb-3 text-center">
                                <div class="p-3">
                                    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">NOMOR URUT</h4>
                                    <h1 class="font-700 font-34 color-red-dark mt-3 mb-2">212</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 pe-2">
                            <div class="card card-style mx-0 mb-3 text-center">
                                <div class="p-3">
                                    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">STATUS</h4>
                                    <h1 class="font-700 font-30 color-red-dark mt-3 mb-2">PEMILIH</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content">
                    <div class="row mb-n2">
                        <div class="col-4 pe-2">
                            <div class="card card-style mx-0 mb-3">
                                <div class="p-3">
                                    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">JUMLAH TPS</h4>
                                    <h1 class="font-700 font-34 color-red-dark mb-0">4</h1>
                                    <i class="fa fa-arrow-right float-end mt-n3 opacity-20"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 ps-2 pe-2">
                            <div class="card card-style mx-0 mb-3">
                                <div class="p-3">
                                    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">JUMLAH DPS</h4>
                                    <h1 class="font-700 font-34 color-blue-dark mb-0">2102</h1>
                                    <i class="fa fa-arrow-right float-end mt-n3 opacity-20"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-4 ps-2">
                            <div class="card card-style mx-0 mb-3">
                                <div class="p-3">
                                    <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">JUMLAH DPT</h4>
                                    <h1 class="font-700 font-34 color-green-dark mb-0">2100</h1>
                                    <i class="fa fa-arrow-right float-end mt-n3 opacity-20"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-style">
                    <div class="content">
                        <div class="row mb-2 mt-n2">
                            <div class="col-6 text-start">
                                <h4 class="font-700 text-uppercase font-12 opacity-50 mt-1">Project Detail</h4>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#" data-menu="menu-manage" class="font-14 color-theme icon icon-xxs"><i class="fa fa-cog fa-spin"></i></a>
                            </div>
                        </div>
                        <div class="divider mb-3"></div>
                        <div class="d-flex">
                            <div class="w-35 border-right pe-3 border-blue-dark">
                                <a href="#"><img src="images/empty.png" data-src="images/pictures/faces/4s.png" width="70" class="rounded-circle preload-img" /></a>
                                <h6 class="color-blue-dark font-14 font-600 mt-2 text-center">Johnatan D</h6>
                                <p class="color-blue-dark mt-n3 font-9 font-400 text-center mb-0 pt-1">Group Manager</p>
                            </div>
                            <div class="w-65 ps-3">
                                <h4>Web Dev Team - 1</h4>
                                <p class="color-blue-dark mt-n3 font-10 pt-1 mb-3">website-launch@domain.com</p>
                                <a href="#"><img src="images/empty.png" data-src="images/pictures/faces/1s.png" width="40" class="rounded-circle preload-img me-n3" /></a>
                                <a href="#"><img src="images/empty.png" data-src="images/pictures/faces/2s.png" width="40" class="rounded-circle preload-img me-n3" /></a>
                                <a href="#"><img src="images/empty.png" data-src="images/pictures/faces/3s.png" width="40" class="rounded-circle preload-img me-n3" /></a>
                                <a href="#"><img src="images/empty.png" data-src="images/pictures/faces/4s.png" width="40" class="rounded-circle preload-img me-n3" /></a>
                            </div>
                        </div>
                        <div class="divider mt-4 mb-3"></div>
                        <div class="d-flex">
                            <div class="align-self-center w-100">
                                <h5>Website Launch</h5>
                                <div class="progress mt-2 mb-1" style="height: 3px;">
                                    <div class="progress-bar border-0 bg-blue-dark text-start ps-2" role="progressbar" style="width: 80%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <div class="row mb-0">
                                    <div class="col-6 text-start">
                                        <p class="mb-n1 font-12 opacity-60">Developing</p>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p class="mb-n1 font-12 opacity-60">3/7</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="#" data-menu="menu-manage" class="btn btn-full btn-sm rounded-sm bg-highlight font-700 text-uppercase mt-3">Project Settings</a>
                    </div>
                </div>
                <div class="card card-style">
                    <div class="content">
                        <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Pending Tasks</h4>
                        <div class="divider mb-3"></div>
                        <div class="form-check icon-check">
                            <input class="font-14 form-check-input" type="checkbox" value id="check2b" />
                            <label class="font-14 form-check-label" for="check2b">Clean Code</label>
                            <i class="font-17 icon-check-1 far fa-square color-gray-dark"></i>
                            <i class="font-17 icon-check-2 fa fa-check-square color-green-dark"></i>
                            <span class="badge bg-green-dark text-uppercase float-end mt-2 p-1 font-8">YOUR TASK</span>
                        </div>
                        <div class="form-check icon-check">
                            <input class="font-14 form-check-input" type="checkbox" value id="check2a" />
                            <label class="font-14 form-check-label" for="check2a">Create Pages</label>
                            <i class="font-17 icon-check-1 far fa-square color-gray-dark"></i>
                            <i class="font-17 icon-check-2 fa fa-check-square color-green-dark"></i>
                            <span class="badge bg-blue-dark text-uppercase float-end mt-2 p-1 font-8">JACK SON</span>
                        </div>
                        <div class="form-check icon-check">
                            <input class="font-14 form-check-input" type="checkbox" value id="check2c" />
                            <label class="font-14 form-check-label" for="check2c">Connect to CMS</label>
                            <i class="font-17 icon-check-1 far fa-square color-gray-dark"></i>
                            <i class="font-17 icon-check-2 fa fa-check-square color-green-dark"></i>
                            <span class="badge bg-blue-dark text-uppercase float-end mt-2 p-1 font-8">John DOE</span>
                        </div>
                    </div>
                </div>
                <div class="card card-style">
                    <div class="content">
                        <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Completed tasks</h4>
                        <div class="divider mb-3"></div>
                        <div class="form-check icon-check">
                            <input class="font-14 form-check-input" type="checkbox" value id="check1a" checked />
                            <label class="font-14 form-check-label" for="check1a">Wireframe</label>
                            <i class="font-17 icon-check-1 far fa-square color-gray-dark"></i>
                            <i class="font-17 icon-check-2 fa fa-check-square color-green-dark"></i>
                            <span class="badge bg-green-dark text-uppercase float-end mt-2 p-1 font-8">APPROVED</span>
                        </div>
                        <div class="form-check icon-check">
                            <input class="font-14 form-check-input" type="checkbox" value id="check1b" checked />
                            <label class="font-14 form-check-label" for="check1b">Code Framework</label>
                            <i class="font-17 icon-check-1 far fa-square color-gray-dark"></i>
                            <i class="font-17 icon-check-2 fa fa-check-square color-green-dark"></i>
                            <span class="badge bg-green-dark text-uppercase float-end mt-2 p-1 font-8">APPROVED</span>
                        </div>
                        <div class="form-check icon-check">
                            <input class="font-14 form-check-input" type="checkbox" value id="check1c" checked />
                            <label class="font-14 form-check-label" for="check1c">Install Requisites</label>
                            <i class="font-17 icon-check-1 far fa-square color-gray-dark"></i>
                            <i class="font-17 icon-check-2 fa fa-check-square color-green-dark"></i>
                            <span class="badge bg-green-dark text-uppercase float-end mt-2 p-1 font-8">APPROVED</span>
                        </div>
                        <div class="form-check icon-check">
                            <input class="font-14 form-check-input" type="checkbox" value id="check1d" checked />
                            <label class="font-14 form-check-label" for="check1d">Develop Starter Page</label>
                            <i class="font-17 icon-check-1 far fa-square color-gray-dark"></i>
                            <i class="font-17 icon-check-2 fa fa-check-square color-green-dark"></i>
                            <span class="badge bg-green-dark text-uppercase float-end mt-2 p-1 font-8">APPROVED</span>
                        </div>
                    </div>
                </div>
                <div class="card card-style">
                    <div class="content">
                        <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Canceled Tasks</h4>
                        <div class="divider mb-3"></div>
                        <div class="form-check icon-check">
                            <input class="font-14 form-check-input" type="checkbox" value id="check3a" checked />
                            <label class="font-14 form-check-label" for="check3a">Create Pages</label>
                            <i class="font-17 icon-check-1 fa fa-times color-red-dark"></i>
                            <i class="font-17 icon-check-2 fa fa-times color-red-dark"></i>
                            <span class="badge bg-red-dark text-uppercase float-end mt-2 p-1 font-8">CANCELED BY ADMIN</span>
                        </div>
                    </div>
                </div>
                <div class="card card-style">
                    <div class="content">
                        <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Project Attachements</h4>
                        <div class="divider mb-n1"></div>
                    </div>
                    <a href="#">
                        <div class="d-flex px-3 mb-3">
                            <div class="align-self-center">
                                <i class="fa fa-file-archive font-26 pe-3 color-blue-dark"></i>
                            </div>
                            <div class="align-self-center me-auto">
                                <h4 class="font-14 mb-n1">Project Update.</h4>
                                <p class="mb-0 mt-n2"><a href="#" class="color-theme opacity-30 font-11 font-400">315kb, ZIP Archive</a></p>
                            </div>
                            <div class="align-self-center ms-auto">
                                <i class="fa fa-download font-16 opacity-30"></i>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="d-flex px-3 mb-3">
                            <div class="align-self-center">
                                <i class="fa fa-file-pdf font-26 pe-3 color-red-dark"></i>
                            </div>
                            <div class="align-self-center me-auto">
                                <h4 class="font-14 mb-n1">Customer Briefing.</h4>
                                <p class="mb-0 mt-n2"><a href="#" class="color-theme opacity-30 font-11 font-400">315kb, ZIP Archive</a></p>
                            </div>
                            <div class="align-self-center ms-auto">
                                <i class="fa fa-download font-16 opacity-30"></i>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="d-flex px-3 mb-3">
                            <div class="align-self-center">
                                <i class="fa fa-file-alt font-26 pe-3 color-gray-dark"></i>
                            </div>
                            <div class="align-self-center me-auto">
                                <h4 class="font-14 mb-n1">Product Licenses</h4>
                                <p class="mb-0 mt-n2"><a href="#" class="color-theme opacity-30 font-11 font-400">315kb, ZIP Archive</a></p>
                            </div>
                            <div class="align-self-center ms-auto">
                                <i class="fa fa-download font-16 opacity-30"></i>
                            </div>
                        </div>
                    </a>
                    <a href="#">
                        <div class="d-flex px-3 mb-3">
                            <div class="align-self-center">
                                <i class="fa fa-file-image font-26 pe-3 color-green-dark"></i>
                            </div>
                            <div class="align-self-center me-auto">
                                <h4 class="font-14 mb-n1">Screenshot Design.</h4>
                                <p class="mb-0 mt-n2"><a href="#" class="color-theme opacity-30 font-11 font-400">315kb, ZIP Archive</a></p>
                            </div>
                            <div class="align-self-center ms-auto">
                                <i class="fa fa-download font-16 opacity-30"></i>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="card card-style">
                    <div class="content">
                        <h4 class="font-700 text-uppercase font-12 opacity-50 mt-n2">Project Activity & Chat</h4>
                        <div class="divider mb-3"></div>
                        <div class="speech-icon-left">
                            <div class="speech-bubble speech-right bg-highlight color-white"><strong>@Enabled</strong>, code standards task is up to you mate. Sounds good?</div>
                            <div class="clearfix"></div>
                            <img src="images/pictures/faces/1s.png" class="rounded-xl border border-highlight border-s" />
                        </div>
                        <div class="speech-icon-right">
                            <div class="speech-bubble speech-left color-black">
                                Yeap! I'll take it from here.
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="speech-icon-right">
                            <div class="speech-bubble speech-left color-black mt-n2">
                                I'll keep you posted.
                            </div>
                            <div class="clearfix"></div>
                            <img src="images/preload-logo.png" class="rounded-xl border border-black border-s" />
                        </div>
                        <div class="speech-icon-left">
                            <div class="speech-bubble speech-right bg-highlight color-white"><strong>@Jack Son</strong>, Finished the wireframe yet?</div>
                            <div class="clearfix"></div>
                            <img src="images/pictures/faces/1s.png" class="rounded-xl border border-highlight border-s" />
                        </div>
                        <div>
                            <div class="d-flex border rounded-m p-3 mt-2 mb-4">
                                <div class="align-self-center">
                                    <i class="fa fa-file-archive font-26 pe-3 color-brown-dark"></i>
                                </div>
                                <div class="align-self-center me-auto">
                                    <h4 class="font-14 mb-n1">Jack Son uploaded a file.</h4>
                                    <p class="mb-0 mt-n2">
                                        <a href="#" class="color-highlight font-11 font-600">Download file <span class="color-theme opacity-50">315kb, ZIP Archive</span></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="speech-icon-right">
                            <div class="speech-bubble speech-left bg-green-dark color-white">
                                Yeah, mark it as done.
                            </div>
                            <div class="clearfix"></div>
                            <img src="images/pictures/faces/3s.png" class="rounded-xl border border-green-dark border-s" />
                        </div>
                        <div>
                            <div class="d-flex border rounded-m p-3 mt-2 mb-4">
                                <div class="align-self-center">
                                    <i class="fa fa-check-circle font-22 pe-3 mt-1 color-green-dark"></i>
                                </div>
                                <div class="align-self-center me-auto">
                                    <h4 class="font-14 mb-0">Admin Marked a task Completed.</h4>
                                    <p class="font-11 opacity-50 mb-0 mt-n2">Wireframe Marked as Completed</p>
                                </div>
                            </div>
                        </div>
                        <div class="speech-icon-left">
                            <div class="speech-bubble speech-right bg-highlight color-white">
                                Done! Keep me updated with your progress guys.
                            </div>
                            <div class="clearfix"></div>
                            <img src="images/pictures/faces/1s.png" class="rounded-xl border border-highlight border-s" />
                        </div>
                    </div>
                    <div class="divider divider-margins mb-2"></div>
                    <div class="d-flex text-center mb-3">
                        <div class="me-3 speach-icon">
                            <a href="#" class="bg-gray-dark ms-2" data-menu="menu-upload"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="flex-fill speach-input">
                            <input type="text" class="form-control" placeholder="Enter your Message here" />
                        </div>
                        <div class="ms-3 speach-icon">
                            <a href="#" class="bg-blue-dark me-2"><i class="fa fa-arrow-up"></i></a>
                        </div>
                    </div>
                </div>
                <div class="footer card card-style">
                    <a href="#" class="footer-title"><span class="color-highlight">StickyMobile</span></a>
                    <p class="footer-text">
                        <span>Made with <i class="fa fa-heart color-highlight font-16 ps-2 pe-2"></i> by Enabled</span><br />
                        <br />
                        Powered by the best Mobile Website Developer on Envato Market. Elite Quality. Elite Products.
                    </p>
                    <div class="text-center mb-3">
                        <a href="#" class="icon icon-xs rounded-sm shadow-l me-1 bg-facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="icon icon-xs rounded-sm shadow-l me-1 bg-twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="icon icon-xs rounded-sm shadow-l me-1 bg-phone"><i class="fa fa-phone"></i></a>
                        <a href="#" data-menu="menu-share" class="icon icon-xs rounded-sm me-1 shadow-l bg-red-dark"><i class="fa fa-share-alt"></i></a>
                        <a href="#" class="back-to-top icon icon-xs rounded-sm shadow-l bg-dark-light"><i class="fa fa-angle-up"></i></a>
                    </div>
                    <p class="footer-copyright">Copyright &copy; Enabled <span id="copyright-year">2017</span>. All Rights Reserved.</p>
                    <p class="footer-links"><a href="#" class="color-highlight">Privacy Policy</a> | <a href="#" class="color-highlight">Terms and Conditions</a> | <a href="#" class="back-to-top color-highlight"> Back to Top</a></p>
                    <div class="clear"></div>
                </div>
            </div>

            <div id="menu-upload" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="255" data-menu-effect="menu-over">
                <div class="list-group list-custom-small ps-2 me-4">
                    <a href="#">
                        <i class="font-14 fa fa-file color-gray-dark"></i>
                        <span class="font-13">File</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="#">
                        <i class="font-14 fa fa-image color-gray-dark"></i>
                        <span class="font-13">Photo</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="#">
                        <i class="font-14 fa fa-video color-gray-dark"></i>
                        <span class="font-13">Video</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="#">
                        <i class="font-14 fa fa-user color-gray-dark"></i>
                        <span class="font-13">Camera</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="#">
                        <i class="font-14 fa fa-map-marker color-gray-dark"></i>
                        <span class="font-13">Location</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>

            <div id="menu-manage" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="230" data-menu-effect="menu-over">
                <div class="menu-title">
                    <h1>Manage Project</h1>
                    <p class="color-theme opacity-40">Manage your Project Details</p>
                    <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
                </div>
                <div class="divider divider-margins mb-n2"></div>
                <div class="content mt-2">
                    <div class="list-group list-custom-large">
                        <a href="#" data-menu="menu-team">
                            <i class="fa font-14 fa-user bg-green-dark rounded-s"></i>
                            <span>Team</span>
                            <strong>Assign Members</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="#" data-menu="menu-dates" class="border-0">
                            <i class="fa font-14 fa-cog bg-blue-dark rounded-s"></i>
                            <span>Dates</span>
                            <strong>Project Timeframe</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div id="menu-team" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="360" data-menu-effect="menu-over">
                <div class="menu-title">
                    <h1>Manage Team</h1>
                    <p class="color-theme opacity-40">Manage your Project Details</p>
                    <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
                </div>
                <div class="divider divider-margins mb-n2"></div>
                <div class="content mt-2">
                    <div class="list-group list-custom-small">
                        <a href="#" data-menu="menu-member">
                            <img src="images/pictures/faces/1small.png" width="35" class="rounded-sm me-2" />
                            <span>John Doe</span>
                            <strong class="badge bg-green-dark">YOU</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="#" data-menu="menu-member">
                            <img src="images/pictures/faces/2small.png" width="35" class="rounded-sm me-2" />
                            <span>James Bond</span>
                            <strong class="badge bg-yellow-dark">FRONT END</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="#" data-menu="menu-member">
                            <img src="images/pictures/faces/4small.png" width="35" class="rounded-sm me-2" />
                            <span>Jack Sir</span>
                            <strong class="badge bg-blue-dark">GRAPHIC DESIGN</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <a href="#" data-menu="menu-member">
                            <img src="images/pictures/faces/3small.png" width="35" class="rounded-sm me-2" />
                            <span>Jack Son</span>
                            <strong class="badge bg-red-dark">SERVER LANGUAGE</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    <a href="#" data-menu="menu-manage" class="btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-3">Back to Settings</a>
                </div>
            </div>

            <div id="menu-member" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="360" data-menu-effect="menu-over">
                <div class="menu-title">
                    <h1>John Doe</h1>
                    <p class="color-theme opacity-40">Manage Permissions</p>
                    <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
                </div>
                <div class="divider divider-margins mb-n2"></div>
                <div class="content mt-2">
                    <div class="list-group list-custom-small">
                        <a href="#" data-trigger-switch="switch-1">
                            <i class="fa fa-upload bg-gray-dark rounded-sm ms-0"></i>
                            <span>Upload Files</span>
                            <div class="custom-control small-switch ios-switch">
                                <input type="checkbox" class="ios-input" id="switch-1" checked />
                                <label class="custom-control-label" for="switch-1"></label>
                            </div>
                        </a>
                        <a href="#" data-trigger-switch="switch-1">
                            <i class="fa fa-download bg-blue-dark rounded-sm ms-0"></i>
                            <span>Download Files</span>
                            <div class="custom-control small-switch ios-switch">
                                <input type="checkbox" class="ios-input" id="switch-1" checked />
                                <label class="custom-control-label" for="switch-1"></label>
                            </div>
                        </a>
                        <a href="#" data-trigger-switch="switch-2">
                            <i class="fa fa-check bg-green-dark rounded-sm ms-0"></i>
                            <span>Complete Task</span>
                            <div class="custom-control small-switch ios-switch">
                                <input type="checkbox" class="ios-input" id="switch-2" />
                                <label class="custom-control-label" for="switch-2"></label>
                            </div>
                        </a>
                        <a href="#" data-trigger-switch="switch-2">
                            <i class="fa fa-plus bg-brown-dark rounded-sm ms-0"></i>
                            <span>Add New Members</span>
                            <div class="custom-control small-switch ios-switch">
                                <input type="checkbox" class="ios-input" id="switch-2" />
                                <label class="custom-control-label" for="switch-2"></label>
                            </div>
                        </a>
                    </div>
                    <a href="#" data-menu="menu-team" class="btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-3">Back to Members</a>
                </div>
            </div>

            <div id="menu-dates" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="360" data-menu-effect="menu-over">
                <div class="menu-title">
                    <h1>Dates</h1>
                    <p class="color-theme opacity-40">Project Deadlines</p>
                    <a href="#" class="close-menu"><i class="fa fa-times"></i></a>
                </div>
                <div class="divider divider-margins mb-4"></div>
                <div class="content mt-2">
                    <div class="input-style input-style-2">
                        <span class="input-style-1-active">Project Deadline</span>
                        <em><i class="fa fa-angle-down"></i></em>
                        <input type="date" value="1980-08-26" />
                    </div>
                    <div class="input-style input-style-2">
                        <span class="input-style-1-active">Project Priority</span>
                        <em><i class="fa fa-angle-down"></i></em>
                        <select>
                            <option value="a" selected>Low</option>
                            <option value="b">Medium</option>
                            <option value="c">High</option>
                            <option value="d">Critical</option>
                        </select>
                    </div>
                    <div class="input-style input-style-2">
                        <span class="input-style-1-active">Project Status</span>
                        <em><i class="fa fa-angle-down"></i></em>
                        <select>
                            <option value="1">Planing</option>
                            <option value="2" selected>Developing</option>
                            <option value="3">Complete</option>
                        </select>
                    </div>
                    <a href="#" data-menu="menu-manage" class="btn btn-full btn-m rounded-sm bg-highlight shadow-xl text-uppercase font-900 mt-3">Back to Members</a>
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
    </body>
</html>
