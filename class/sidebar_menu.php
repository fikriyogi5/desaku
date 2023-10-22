<div id="menu-sidebar-left-4" class="bg-white menu menu-box-left" data-menu-effect="menu-push" data-menu-width="310">
    <div class="d-flex">
        <a href="#" class="flex-fill icon icon-m text-center color-facebook border-right">
            <i class="fab font-15 fa-facebook-f"></i>
        </a>
        <a href="#" class="flex-fill icon icon-m text-center color-twitter border-right">
            <i class="fab font-15 fa-twitter"></i>
        </a>
        <a href="#" class="flex-fill icon icon-m text-center color-instagram border-right">
            <i class="fab font-15 fa-instagram"></i>
        </a>
        <a href="#" class="flex-fill icon icon-m text-center color-whatsapp border-right">
            <i class="fab font-15 fa-whatsapp"></i>
        </a>
        <a href="#" class="flex-fill icon icon-m text-center color-linkedin border-right">
            <i class="fab font-15 fa-linkedin-in"></i>
        </a>
        <a href="#" class="close-menu flex-fill icon icon-m text-center color-red-dark">
            <i class="fa font-15 fa-times"></i>
        </a>
    </div>
    <div class="divider mb-3"></div>
    <div class="ps-3 pe-3 pt-2 mb-4">
        <div class="d-flex">
            <div class="me-2 align-self-center">
                <img src="img/<?php echo tampilkanGambar($mahasiswa) ?>" class=" rounded-sm" width="43">
            </div>
            <div class="flex-grow-1 align-self-center ps-2">
                <h1 class="font-20 font-700 mb-0"><?php echo $user[0]['nama']; ?></h1>
                <p class="mt-n1 mb-0 font-14 font-400"><?php echo maskMiddleDigits($user[0]['nik']); ?></p>
            </div>
        </div>
    </div>
    <div class="divider divider-margins mb-0"></div>
    <div class="me-3 ms-3">
        <div class="list-group list-custom-small list-icon-0">
            <a href="#">
                <i class="fa font-14 fa-star color-yellow-dark"></i>
                <span>Homepage</span>
                <!-- <i class="fa fa-angle-right"></i> -->
            </a>
            <a href="#">
                <i class="fa font-14 fa-cog color-blue-dark"></i>
                <span>Components</span>
                <span class="badge bg-red-dark">NEW</span>
            </a>
            <a href="#">
                <i class="fa font-14 fa-file color-brown-dark"></i>
                <span>Pages</span>
            </a>
            <a href="#">
                <i class="fa font-14 fa-camera color-green-dark"></i>
                <span>Media</span>
            </a>
            <a href="#" class="border-0">
                <i class="fa font-14 fa-image color-teal-dark"></i>
                <span>Contact</span>
            </a>
        </div>
    </div>
    <div class="me-3 ms-3 mt-4">
        <span class="text-uppercase font-900 font-11 opacity-30">SOCIAL LINKS</span>
        <div class="list-group list-custom-small list-icon-0">
            <a href="#">
                <i class="fab font-14 fa-facebook-f color-facebook"></i>
                <span>Facebook</span>
                <i class="fa fa-link"></i>
            </a>
            <a href="#">
                <i class="fab font-14 fa-twitter color-twitter"></i>
                <span>Twitter</span>
                <i class="fa fa-link"></i>
            </a>
            <a href="#" class="border-0">
                <i class="fab font-14 fa-instagram color-instagram"></i>
                <span>Instagram</span>
                <i class="fa fa-link"></i>
            </a>
        </div>
    </div>
    <div class="me-3 ms-3 mt-4 pt-2">
        <span class="text-uppercase font-900 font-11 opacity-30">Account Settings</span>
        <div class="list-group list-custom-small list-icon-0">
            <a href="#" data-toggle-theme data-trigger-switch="switch-dark2-mode">
                <i class="fa font-12 fa-moon color-yellow-dark rounded-s"></i>
                <span>Dark Mode</span>
                <div class="custom-control small-switch ios-switch">
                    <input data-toggle-theme type="checkbox" class="ios-input" id="switch-dark2-mode">
                    <label class="custom-control-label" for="switch-dark2-mode"></label>
                </div>
                <i class="fa fa-angle-right"></i>
            </a>
            <a data-trigger-switch="sidebar-12-switch-2" href="#">
                <i class="fa font-14 fa-circle color-green-dark"></i>
                <span>Active Mode</span>
                <div class="custom-control small-switch ios-switch">
                    <input type="checkbox" class="ios-input" id="sidebar-12-switch-2" checked>
                    <label class="custom-control-label" for="sidebar-12-switch-2"></label>
                </div>
                <i class="fa fa-angle-right"></i>
            </a>
            <a data-trigger-switch="sidebar-12-switch-3" href="#" class="border-0">
                <i class="fa font-14 fa-bell color-blue-dark"></i>
                <span>Notifications</span>
                <div class="custom-control small-switch ios-switch">
                    <input type="checkbox" class="ios-input" id="sidebar-12-switch-3" checked>
                    <label class="custom-control-label" for="sidebar-12-switch-3"></label>
                </div>
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
</div>