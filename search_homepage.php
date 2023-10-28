<?php
// session_start();

// include('error_handling.php');
include 'database.php';
// require_once 'auth.php';

$database = new Database($dbConfig);


// Halaman home
// Contoh penggunaan fungsi generateHeader dengan parameter sebagai array
$headerOptions = [
    'title' => 'Selamat Datang',
    'header_menu' => 0, // 1 for Home, 0 for Back
    'link_back' => 'splash.html',
    'icon' => 'fa-user',
    'header_title' => 'Welcome',
    'footer_menu' => 0, // 1 for Tab Menu, 0 for none
    'header_style' => 'header-clear-small',
];

echo generateHeader($headerOptions);

?>

    <div class="content pertama">

    <div class="input-style has-borders has-icon validate-field mt-5">
            <i class="fa fa-search"></i>
            <input type="name" class="form-control validate-name" id="form1" placeholder="Cari Informasi Disini">
            <!-- <label for="form1" class="color-highlight">Name</label> -->
        </div>
    </div>


</div>
</div>

<div id="menu-event-sample" class="menu menu-box-bottom" data-menu-height="cover" data-menu-width="cover">
    <div class="card bg-18 rounded-0" data-card-height="350">
        <div class="card-top">
            <a href="#"
                class="close-menu float-start btn btn-m rounded-sm font-700 text-uppercase m-3 bg-white color-black">Get
                Tickets</a>
            <a href="#" class="float-end close-menu icon icon-s color-black m-3 rounded-circle bg-white"><i
                    class="fa fa-times"></i></a>
        </div>
        <div class="card-bottom m-3">
            <span class="mb-n1 bg-highlight px-2 py-1 rounded-xs font-10 font-700">MOBILE PWA</span>
            <h1 class="color-white font-30">Envato Summer Sale</h1>
            <p class="color-white opacity-70 pt-3 mb-2 line-height-s">We're the best Mobile Authors on Envato Market.
                Creating products you love and listening to every feedback you give us.</p>
        </div>
        <div class="card-overlay bg-gradient"></div>
    </div>
    <div class="content mt-n3 pb-4">
        <div class="d-flex">
            <div class="align-self-center">
                <img src="images/splash/apple-touch-icon-76x76.png" class="rounded-sm" width="40" />
            </div>
            <div class="align-self-center">
                <span class="font-800 ps-2 opacity-50 font-11 d-block mt-n1">Event Organizer</span>
                <h4 class="ps-2 mt-n2 mb-0">Enabled Studio</h4>
            </div>
            <div class="ms-auto">
                <a href="#" class="btn btn-sm rounded-s text-uppercase font-700 bg-green-dark">Follow</a>
            </div>
        </div>
        <div class="divider mt-3"></div>
        <h2>About Event</h2>
        <div class="input-style has-borders has-icon validate-field mb-4">
            <i class="fa fa-user"></i>
            <input type="text" class="form-control validate-text" id="form4" placeholder="Name" />
            <label for="form4" class="color-highlight">Name</label>
            <i class="fa fa-times disabled invalid color-red-dark"></i>
            <i class="fa fa-check disabled valid color-green-dark"></i>
            <em>(required)</em>
        </div>
        <div class="input-style has-borders has-icon validate-field mb-4">
            <i class="fa fa-at"></i>
            <input type="email" class="form-control validate-email" id="form41" placeholder="Email" />
            <label for="form41" class="color-highlight">Email</label>
            <i class="fa fa-times disabled invalid color-red-dark"></i>
            <i class="fa fa-check disabled valid color-green-dark"></i>
            <em>(required)</em>
        </div>
        <div class="input-style has-borders has-icon validate-field mb-4">
            <i class="fa fa-phone"></i>
            <input type="tel" class="form-control validate-tel" id="form42" placeholder="Phone" />
            <label for="form42" class="color-highlight">Phone</label>
            <i class="fa fa-times disabled invalid color-red-dark"></i>
            <i class="fa fa-check disabled valid color-green-dark"></i>
            <em>(required)</em>
        </div>
        <div class="form-check icon-check">
            <input class="form-check-input" type="checkbox" value id="check2" checked />
            <label class="form-check-label" for="check2">I accept the Event Terms and Conditions</label>
            <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
            <i class="icon-check-2 fa fa-check-square font-16 color-blue-dark"></i>
        </div>

        <div class="divider mt-4"></div>
        <a href="#" class="close-menu btn bg-green-dark btn-full btn-xl text-uppercase font-700 rounded-sm mt-4">Get
            Tickets</a>
    </div>
</div>
<div id="menu-modal-event-sample" class="menu menu-box-bottom" data-menu-height="cover" data-menu-width="cover">
    <div class="card bg-18 rounded-0" data-card-height="350">
        <div class="card-top">
            <a href="#"
                class="close-menu float-start btn btn-m rounded-sm font-700 text-uppercase m-3 bg-white color-black">Get
                Tickets</a>
            <a href="#" class="float-end close-menu icon icon-s color-black m-3 rounded-circle bg-white"><i
                    class="fa fa-times"></i></a>
        </div>
        <div class="card-bottom m-3">
            <span class="mb-n1 bg-highlight px-2 py-1 rounded-xs font-10 font-700">MOBILE PWA</span>
            <h1 class="color-white font-30">Envato Summer Sale</h1>
            <p class="color-white opacity-70 pt-3 mb-2 line-height-s">We're the best Mobile Authors on Envato Market.
                Creating products you love and listening to every feedback you give us.</p>
        </div>
        <div class="card-overlay bg-gradient"></div>
    </div>
    <div class="content mt-n3 pb-4">
        <div class="d-flex">
            <div class="align-self-center">
                <img src="images/splash/apple-touch-icon-76x76.png" class="rounded-sm" width="40" />
            </div>
            <div class="align-self-center">
                <span class="font-800 ps-2 opacity-50 font-11 d-block mt-n1">Event Organizer</span>
                <h4 class="ps-2 mt-n2 mb-0">Enabled Studio</h4>
            </div>
            <div class="ms-auto">
                <a href="#" class="btn btn-sm rounded-s text-uppercase font-700 bg-green-dark">Follow</a>
            </div>
        </div>
        <div class="divider mt-3"></div>
        <h2>About Event</h2>
        <div class="content">
            <div class="input-style has-borders has-icon validate-field mb-4">
                <i class="fa fa-user"></i>
                <input type="text" class="form-control validate-text" id="form4" placeholder="Name" />
                <label for="form4" class="color-highlight">Name</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <div class="input-style has-borders has-icon validate-field mb-4">
                <i class="fa fa-at"></i>
                <input type="email" class="form-control validate-email" id="form41" placeholder="Email" />
                <label for="form41" class="color-highlight">Email</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <div class="input-style has-borders has-icon validate-field mb-4">
                <i class="fa fa-phone"></i>
                <input type="tel" class="form-control validate-tel" id="form42" placeholder="Phone" />
                <label for="form42" class="color-highlight">Phone</label>
                <i class="fa fa-times disabled invalid color-red-dark"></i>
                <i class="fa fa-check disabled valid color-green-dark"></i>
                <em>(required)</em>
            </div>
            <div class="form-check icon-check">
                <input class="form-check-input" type="checkbox" value id="check2" checked />
                <label class="form-check-label" for="check2">I accept the Event Terms and Conditions</label>
                <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                <i class="icon-check-2 fa fa-check-square font-16 color-blue-dark"></i>
            </div>
            <a href="#" class="btn btn-m rounded-sm text-uppercase font-700 bg-blue-dark btn-full mt-3">Join Event</a>
        </div>

        <div class="card card-style mx-0" data-card-height="250">
            <div class="card-top">
                <a href="#" class="btn bg-white color-black btn-sm rounded-sm text-uppercase font-700 m-2"><i
                        class="fa fa-car color-blue-dark pe-2"></i>Get directions</a>
            </div>
            <div class="card-bottom">
                <div class="content">
                    <div class="input-style has-borders has-icon validate-field mb-4">
                        <i class="fa fa-user"></i>
                        <input type="text" class="form-control validate-text" id="form4" placeholder="Name" />
                        <label for="form4" class="color-highlight">Name</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style has-borders has-icon validate-field mb-4">
                        <i class="fa fa-at"></i>
                        <input type="email" class="form-control validate-email" id="form41" placeholder="Email" />
                        <label for="form41" class="color-highlight">Email</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style has-borders has-icon validate-field mb-4">
                        <i class="fa fa-phone"></i>
                        <input type="tel" class="form-control validate-tel" id="form42" placeholder="Phone" />
                        <label for="form42" class="color-highlight">Phone</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="form-check icon-check">
                        <input class="form-check-input" type="checkbox" value id="check2" checked />
                        <label class="form-check-label" for="check2">I accept the Event Terms and Conditions</label>
                        <i class="icon-check-1 fa fa-square color-gray-dark font-16"></i>
                        <i class="icon-check-2 fa fa-check-square font-16 color-blue-dark"></i>
                    </div>
                    <a href="#" class="btn btn-m rounded-sm text-uppercase font-700 bg-blue-dark btn-full mt-3">Join
                        Event</a>
                </div>

            </div>
            <div class="card-overlay bg-black opacity-60"></div>
            <div class="responsive-iframe">
                <iframe
                    src="https://www.google.com/maps/embed/v1/view?key=AIzaSyAM3nxDVrkjyKwdIZp8QOplmBKLRVI5S_Y&center=-33.8569,151.2152&zoom=16&maptype=satellite"
                    frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="divider"></div>
        <h2>Event Schedule</h2>
        <p class="line-height-m">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vulputate ac nunc nec accumsan. Nullam
            ultricies quis lacus a suscipit. Vivamus efficitur eros quis erat euismod consectetur
        </p>
        <div class="d-flex">
            <div class="align-self-top">
                <div class="bg-white rounded-sm color-theme shadow-xl text-center me-4 overflow-hidden">
                    <span class="bg-red-dark font-10 d-block mb-2 px-3 line-height-xs py-1">APR</span>
                    <span class="font-23 font-600 d-block mb-n3 line-height-s">17</span><br />
                </div>
            </div>
            <div class="align-self-center">
                <h4 class="mb-0 pt-1">09:00 AM - 02:30 PM</h4>
                <p class="mb-3">
                    Intro to our Event and host speach.
                </p>
            </div>
        </div>
        <div class="d-flex mt-4">
            <div class="align-self-top">
                <div class="bg-white rounded-sm color-theme shadow-xl text-center me-4 overflow-hidden">
                    <span class="bg-red-dark font-10 d-block mb-2 px-3 line-height-xs py-1">APR</span>
                    <span class="font-23 font-600 d-block mb-n3 line-height-s">18</span><br />
                </div>
            </div>
            <div class="align-self-center">
                <h4 class="mb-0 pt-2">09:00 AM - 02:30 PM</h4>
                <p class="mb-3">
                    Intro to our Event and host speach.
                </p>
                <h4 class="mb-0">05:00 PM - 00:00 AM</h4>
                <p class="mb-0">
                    After Party. Let's dance and mingle!
                </p>
            </div>
        </div>
        <div class="divider mt-4"></div>
        <a href="#" class="close-menu btn bg-green-dark btn-full btn-xl text-uppercase font-700 rounded-sm mt-4">Get
            Tickets</a>
    </div>
</div>

<div id="menu-wizard-step-1" class="menu menu-box-left" data-menu-height="cover" data-menu-width="cover">
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
                    class="me-auto font-600 text-center rounded-l bg-green-dark"><i class="fa fa-check mx-n1"></i></a>
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
                    class="me-auto font-600 rounded-xl text-center bg-green-dark"><i class="fa fa-check mx-n1"></i></a>
                <a href="#" style="width: 35px; line-height: 35px;" data-menu="menu-wizard-step-2"
                    class="m-auto font-600 rounded-xl text-center bg-green-dark"><i class="fa fa-check mx-n1"></i></a>
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
                <img src="img/<?php echo tampilkanGambar($mahasiswa) ?>" width="50" id="profile-gambar" />
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
        <a href="" class="btn btn-full btn-m rounded-sm bg-highlight font-800 text-uppercase mb-4 " id="profile-id">View
            full Profile</a>
    </div>
</div>


<?php include "class/sidebar_menu.php";?>
<script>
$(document).ready(function() {
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
    $(".tab-link").click(function() {
        var tabId = $(this).data("tab");
        showTab(tabId);
    });

    // Menangani swipe pada konten halaman untuk mengganti tab
    var startX = 0;
    var swipeThreshold = 100;
    // Ambang batas swipe

    contentContainer.addEventListener("touchstart", function(event) {
        startX = event.touches[0].clientX;
    });

    contentContainer.addEventListener("touchend", function(event) {
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

    $(".tab-content").each(function() {
        var swiper = new Swiper(this, {
            slidesPerView: 'auto',
            // Menyesuaikan jumlah slide yang terlihat sesuai layar
            freeMode: true,
            // Mode swipe bebas
            watchSlidesProgress: true,
            // Memantau progress slide saat digulir
            on: {
                progress: function(progress) {
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
    tabSwipers.forEach(function(swiper) {
        swiper.on('tap', function(e) {
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
            link.addEventListener("click", function(e) {
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
        closeMenu.addEventListener("click", function() {
            modal.classList.remove("menu-active");
        });
    }

    function loadWarga() {
        const search = $("#searchInput").val();
        $.ajax({
            url: "ajax/fetch_warga.php", // PHP script to fetch warga data
            method: "POST",
            data: {
                offset: offset,
                limit: limit,
                search: search
            },
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