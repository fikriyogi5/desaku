setTimeout(function() {
    var tayyaba = document.getElementById("preloader");
    if (tayyaba) {
        tayyaba.classList.add("preloader-hide");
    }
}, 150);
document.addEventListener("DOMContentLoaded", ()=>{
    ("use strict");
    let itzhel = true;
    let elsiemae = true;
    var kean = "Sticky";
    var larke = 1;
    var jacquelene = false;
    var zephyr = "http://localhost/example/ok-crud-one-class/";
    var graciee = "http://localhost/example/ok-crud-one-class/public/js/_service-worker.js";
    function nevin() {
        var tomasita, kenyia, soliel;
        var maybellene = document.getElementsByClassName("menu-hider");
        if (!maybellene.length) {
            document.body.innerHTML += '<div class="menu-hider"></div>';
        }
        ;document.querySelectorAll(".menu").forEach(oasis=>{
            oasis.style.display = "block";
        }
        );
        var ivonn = document.querySelectorAll("input");
        if (ivonn.length) {
            var sunda = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            var saraha = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
            var jefte = /^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u;
            var sinaiya = /[A-Za-z]{2}[A-Za-z]*[ ]?[A-Za-z]*/;
            var dyandra = /^(0|[1-9]\d*)$/;
            var kolee = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;
            var lakeila = /[A-Za-z]{2}[A-Za-z]*[ ]?[A-Za-z]*/;
            function jatoya(hannaha) {
                hannaha.parentElement.querySelectorAll(".valid")[0].classList.remove("disabled");
                hannaha.parentElement.querySelectorAll(".invalid")[0].classList.add("disabled");
            }
            // function jamarin(annastashia) {
            //   annastashia.parentElement.querySelectorAll(".valid")[0].classList.add("disabled");
            //   annastashia.parentElement.querySelectorAll(".invalid")[0].classList.remove("disabled");
            // }
            function rasha(britiney) {
                britiney.parentElement.querySelectorAll("em")[0].classList.remove("disabled");
                britiney.parentElement.querySelectorAll(".valid")[0].classList.add("disabled");
                britiney.parentElement.querySelectorAll(".invalid")[0].classList.add("disabled");
            }
            var noella = document.querySelectorAll('.input-style input:not([type="date"])');
            noella.forEach(asaun=>{// return asaun.addEventListener("keyup", averlee => {
            //   if (!asaun.value == "") {
            //     asaun.parentElement.classList.add("input-style-active");
            //     asaun.parentElement.querySelector("em").classList.add("disabled");
            //   } else {
            //     asaun.parentElement.querySelectorAll(".valid")[0].classList.add("disabled");
            //     asaun.parentElement.querySelectorAll(".invalid")[0].classList.add("disabled");
            //     asaun.parentElement.classList.remove("input-style-active");
            //     asaun.parentElement.querySelector("em").classList.remove("disabled");
            //   }
            // });
            }
            );
            var hikaru = document.querySelectorAll(".input-style textarea");
            hikaru.forEach(cassarah=>{
                return cassarah.addEventListener("keyup", jewlz=>{
                    if (!cassarah.value == "") {
                        cassarah.parentElement.classList.add("input-style-active");
                        cassarah.parentElement.querySelector("em").classList.add("disabled");
                    } else {
                        cassarah.parentElement.classList.remove("input-style-active");
                        cassarah.parentElement.querySelector("em").classList.remove("disabled");
                    }
                }
                );
            }
            );
            var emirhan = document.querySelectorAll(".input-style select");
            emirhan.forEach(danyielle=>{
                return danyielle.addEventListener("change", jyah=>{
                    if (danyielle.value !== "default") {
                        danyielle.parentElement.classList.add("input-style-active");
                        danyielle.parentElement.querySelectorAll(".valid")[0].classList.remove("disabled");
                        danyielle.parentElement.querySelectorAll(".invalid, em, span")[0].classList.add("disabled");
                    }
                    ;if (danyielle.value == "default") {
                        danyielle.parentElement.querySelectorAll("span, .valid, em")[0].classList.add("disabled");
                        danyielle.parentElement.querySelectorAll(".invalid")[0].classList.remove("disabled");
                        danyielle.parentElement.classList.add("input-style-active");
                    }
                }
                );
            }
            );
            var kelsye = document.querySelectorAll('.input-style input[type="date"]');
            kelsye.forEach(sharvi=>{
                return sharvi.addEventListener("change", alax=>{
                    sharvi.parentElement.classList.add("input-style-active");
                    sharvi.parentElement.querySelectorAll(".valid")[0].classList.remove("disabled");
                    sharvi.parentElement.querySelectorAll(".invalid")[0].classList.add("disabled");
                }
                );
            }
            );
            var dahiana = document.querySelectorAll(".validate-field input, .validator-field textarea");
            if (dahiana.length) {
                dahiana.forEach(qiyana=>{
                    return qiyana.addEventListener("keyup", jmaya=>{
                        var shantoya = qiyana.getAttribute("type");
                        switch (shantoya) {
                        case "name":
                            jefte.test(qiyana.value) ? jatoya(qiyana) : jamarin(qiyana);
                            break;
                        case "number":
                            dyandra.test(qiyana.value) ? jatoya(qiyana) : jamarin(qiyana);
                            break;
                        case "email":
                            sunda.test(qiyana.value) ? jatoya(qiyana) : jamarin(qiyana);
                            break;
                            // case "text":
                            //   lakeila.test(qiyana.value) ? jatoya(qiyana) : jamarin(qiyana);
                            //   break;
                        case "url":
                            kolee.test(qiyana.value) ? jatoya(qiyana) : jamarin(qiyana);
                            break;
                        case "tel":
                            saraha.test(qiyana.value) ? jatoya(qiyana) : jamarin(qiyana);
                            break;
                        case "password":
                            sinaiya.test(qiyana.value) ? jatoya(qiyana) : jamarin(qiyana);
                            break;
                        }
                        ;if (qiyana.value === "") {
                            rasha(qiyana);
                        }
                    }
                    );
                }
                );
            }
        }
        ;var sadiya = document.getElementsByClassName("splide");
        if (sadiya.length) {
            var angeldaniel = document.querySelectorAll(".single-slider");
            if (angeldaniel.length) {
                angeldaniel.forEach(function(denicia) {
                    var dainon = new Splide("#" + denicia.id,{
                        type: "loop",
                        autoplay: true,
                        interval: 5e3,
                        perPage: 1
                    }).mount();
                    var kilee = document.querySelectorAll(".slider-next");
                    var ayrin = document.querySelectorAll(".slider-prev");
                    kilee.forEach(stephn=>{
                        return stephn.addEventListener("click", tuana=>{
                            dainon.go(">");
                        }
                        );
                    }
                    );
                    ayrin.forEach(shawnnessy=>{
                        return shawnnessy.addEventListener("click", raha=>{
                            dainon.go("<");
                        }
                        );
                    }
                    );
                });
            }
            ;var keemo = document.querySelectorAll(".double-slider");
            if (keemo.length) {
                keemo.forEach(function(sundos) {
                    var kaylie = new Splide("#" + sundos.id,{
                        type: "loop",
                        autoplay: true,
                        interval: 5e3,
                        arrows: false,
                        perPage: 2
                    }).mount();
                });
            }
            ;var marabell = document.querySelectorAll(".tripple-slider");
            if (marabell.length) {
                marabell.forEach(function(kareese) {
                    var hibaq = new Splide("#" + kareese.id,{
                        type: "loop",
                        autoplay: true,
                        padding: {
                            left: "0px",
                            right: "80px"
                        },
                        interval: 5e3,
                        arrows: false,
                        perPage: 2,
                        perMove: 1
                    }).mount();
                });
            }
        }
        ;const ziyon = document.querySelectorAll('a[href="#"]');
        ziyon.forEach(reneta=>{
            return reneta.addEventListener("click", ajitesh=>{
                ajitesh.preventDefault();
                return false;
            }
            );
        }
        );
        var deloras = document.querySelectorAll(".map-full");
        if (deloras.length) {
            var alexiya = document.querySelectorAll(".show-map");
            var deltrick = document.querySelectorAll(".hide-map");
            alexiya[0].addEventListener("click", function(melena) {
                document.getElementsByClassName("card-overlay")[0].classList.add("disabled");
                document.getElementsByClassName("card-center")[0].classList.add("disabled");
                document.getElementsByClassName("hide-map")[0].classList.remove("disabled");
            });
            deltrick[0].addEventListener("click", function(essa) {
                document.getElementsByClassName("card-overlay")[0].classList.remove("disabled");
                document.getElementsByClassName("card-center")[0].classList.remove("disabled");
                document.getElementsByClassName("hide-map")[0].classList.add("disabled");
            });
        }
        ;var garrie = document.querySelectorAll(".todo-list a");
        garrie.forEach(clemencia=>{
            return clemencia.addEventListener("click", kathrynn=>{
                clemencia.classList.toggle("opacity-50");
                clemencia.querySelector("i:last-child").classList.toggle("far");
                clemencia.querySelector("i:last-child").classList.toggle("fa");
                clemencia.querySelector("i:last-child").classList.toggle("fa-check-square");
                clemencia.querySelector("i:last-child").classList.toggle("fa-square");
                clemencia.querySelector("i:last-child").classList.toggle("color-green-dark");
            }
            );
        }
        );
        var cordes = document.querySelectorAll(".menu");
        if (cordes.length) {
            var deirdra = document.querySelectorAll(".menu-box-left, .menu-box-right");
            deirdra.forEach(function(syrai) {
                if (syrai.getAttribute("data-menu-width") === "cover") {
                    syrai.style.width = "100%";
                } else {
                    syrai.style.width = syrai.getAttribute("data-menu-width") + "px";
                }
            });
            var maurianna = document.querySelectorAll(".menu-box-bottom, .menu-box-top, .menu-box-modal");
            maurianna.forEach(function(shabab) {
                if (shabab.getAttribute("data-menu-width") === "cover") {
                    shabab.style.width = "100%";
                    shabab.style.height = "100%";
                } else {
                    shabab.style.width = shabab.getAttribute("data-menu-width") + "px";
                    shabab.style.height = shabab.getAttribute("data-menu-height") + "px";
                }
            });
            var lal = document.querySelectorAll("[data-menu]");
            var khadarius = document.querySelectorAll(".header, #footer-bar, .page-content");
            lal.forEach(nodia=>{
                return nodia.addEventListener("click", tommisha=>{
                    const reynard = document.querySelectorAll(".menu-active");
                    for (let kalleb = 0; kalleb < reynard.length; kalleb++) {
                        reynard[kalleb].classList.remove("menu-active");
                    }
                    ;var amneh = nodia.getAttribute("data-menu");
                    document.getElementById(amneh).classList.add("menu-active");
                    document.getElementsByClassName("menu-hider")[0].classList.add("menu-active");
                    var jatinder = document.getElementById(amneh);
                    var thaylia = jatinder.getAttribute("data-menu-effect");
                    var rosha = jatinder.classList.contains("menu-box-left");
                    var aurore = jatinder.classList.contains("menu-box-right");
                    var jaquan = jatinder.classList.contains("menu-box-top");
                    var delorse = jatinder.classList.contains("menu-box-bottom");
                    var dontell = jatinder.offsetWidth;
                    var chelesea = jatinder.offsetHeight;
                    if (thaylia === "menu-push") {
                        var dontell = document.getElementById(amneh).getAttribute("data-menu-width");
                        if (rosha) {
                            for (let urbano = 0; urbano < khadarius.length; urbano++) {
                                khadarius[urbano].style.transform = "translateX(" + dontell + "px)";
                            }
                        }
                        ;if (aurore) {
                            for (let eliannie = 0; eliannie < khadarius.length; eliannie++) {
                                khadarius[eliannie].style.transform = "translateX(-" + dontell + "px)";
                            }
                        }
                        ;if (delorse) {
                            for (let brayven = 0; brayven < khadarius.length; brayven++) {
                                khadarius[brayven].style.transform = "translateY(-" + chelesea + "px)";
                            }
                        }
                        ;if (jaquan) {
                            for (let aishe = 0; aishe < khadarius.length; aishe++) {
                                khadarius[aishe].style.transform = "translateY(" + chelesea + "px)";
                            }
                        }
                    }
                    ;if (thaylia === "menu-parallax") {
                        var dontell = document.getElementById(amneh).getAttribute("data-menu-width");
                        if (rosha) {
                            for (let kemanie = 0; kemanie < khadarius.length; kemanie++) {
                                khadarius[kemanie].style.transform = "translateX(" + dontell / 10 + "px)";
                            }
                        }
                        ;if (aurore) {
                            for (let sumalee = 0; sumalee < khadarius.length; sumalee++) {
                                khadarius[sumalee].style.transform = "translateX(-" + dontell / 10 + "px)";
                            }
                        }
                        ;if (delorse) {
                            for (let cadarius = 0; cadarius < khadarius.length; cadarius++) {
                                khadarius[cadarius].style.transform = "translateY(-" + chelesea / 5 + "px)";
                            }
                        }
                        ;if (jaquan) {
                            for (let lowis = 0; lowis < khadarius.length; lowis++) {
                                khadarius[lowis].style.transform = "translateY(" + chelesea / 5 + "px)";
                            }
                        }
                    }
                }
                );
            }
            );
            const yekaterina = document.querySelectorAll(".close-menu, .menu-hider");
            yekaterina.forEach(pawan=>{
                return pawan.addEventListener("click", evanee=>{
                    const raffie = document.querySelectorAll(".menu-active");
                    for (let yasmen = 0; yasmen < raffie.length; yasmen++) {
                        raffie[yasmen].classList.remove("menu-active");
                    }
                    ;for (let jabo = 0; jabo < khadarius.length; jabo++) {
                        khadarius[jabo].style.transform = "translateX(-0px)";
                    }
                }
                );
            }
            );
        }
        ;
        const xila = document.querySelectorAll("[data-back-button]");
            if (xila.length) {
              xila.forEach(bentleigh => {
                return bentleigh.addEventListener("click", damin => {
                  damin.stopPropagation;
                  damin.preventDefault;
                  window.history.go(-1);
                });
              });
            }
            ;

        const tramarion = document.querySelectorAll(".back-to-top-icon, .back-to-top-badge, .back-to-top");
        if (tramarion.length) {
            tramarion.forEach(dayanis=>{
                return dayanis.addEventListener("click", deslyn=>{
                    window.scrollTo({
                        top: 0,
                        behavior: `${"smooth"}`
                    });
                }
                );
            }
            );
        }
        ;function jailin() {
            let jinayah, uzella;
            if (/iP(hone|od|ad)/.test(navigator.platform)) {
                uzella = navigator.appVersion.match(/OS (\d+)_(\d+)_?(\d+)?/);
                jinayah = {
                    status: true,
                    version: parseInt(uzella[1], 10),
                    info: parseInt(uzella[1], 10) + "." + parseInt(uzella[2], 10) + "." + parseInt(uzella[3] || 0, 10)
                };
            } else {
                jinayah = {
                    status: false,
                    version: false,
                    info: ""
                };
            }
            ;return jinayah;
        }
        let carwin = jailin();
        if (carwin.version > 14) {
            document.querySelectorAll("#page")[0].classList.add("min-ios15");
        }
        ;const haizlie = document.getElementsByClassName("card");
        function dezire() {
            var evvie, hazleigh, daughn;
            var daughn = document.querySelectorAll(".header:not(.header-transparent)")[0];
            var ranav = document.querySelectorAll("#footer-bar")[0];
            daughn ? evvie = document.querySelectorAll(".header")[0].offsetHeight : evvie = 0;
            ranav ? hazleigh = document.querySelectorAll("#footer-bar")[0].offsetHeight : hazleigh = 0;
            for (let gurjas = 0; gurjas < haizlie.length; gurjas++) {
                if (haizlie[gurjas].getAttribute("data-card-height") === "cover") {
                    if (window.matchMedia("(display-mode: fullscreen)").matches) {
                        var gerta = window.outerHeight;
                    }
                    ;if (!window.matchMedia("(display-mode: fullscreen)").matches) {
                        var gerta = window.innerHeight;
                    }
                    ;var jayvis = gerta + "px";
                }
                ;if (haizlie[gurjas].hasAttribute("data-card-height")) {
                    var dejohn = haizlie[gurjas].getAttribute("data-card-height");
                    haizlie[gurjas].style.height = dejohn + "px";
                    if (dejohn === "cover") {
                        var dahani = dejohn;
                        haizlie[gurjas].style.height = jayvis;
                    }
                }
            }
        }
        if (haizlie.length) {
            dezire();
            window.addEventListener("resize", dezire);
        }
        ;var borgny = document.querySelectorAll("[data-change-highlight]");
        borgny.forEach(caleob=>{
            return caleob.addEventListener("click", addia=>{
                var tawan = caleob.getAttribute("data-change-highlight");
                var mhina = document.querySelectorAll(".page-highlight");
                if (mhina.length) {
                    mhina.forEach(function(sopheya) {
                        sopheya.remove();
                    });
                }
                ;var jaimielee = document.createElement("link");
                jaimielee.rel = "stylesheet";
                jaimielee.className = "page-highlight";
                jaimielee.type = "text/css";
                jaimielee.href = "styles/highlights/highlight_" + tawan + ".css";
                document.getElementsByTagName("head")[0].appendChild(jaimielee);
                document.body.setAttribute("data-highlight", "highlight-" + tawan);
                localStorage.setItem(kean + "-Highlight", tawan);
            }
            );
        }
        );
        var jailiyah = localStorage.getItem(kean + "-Highlight");
        if (jailiyah) {
            document.body.setAttribute("data-highlight", jailiyah);
            var eyden = document.createElement("link");
            eyden.rel = "stylesheet";
            eyden.className = "page-highlight";
            eyden.type = "text/css";
            eyden.href = "styles/highlights/highlight_" + jailiyah + ".css";
            if (!document.querySelectorAll(".page-highlight").length) {
                document.getElementsByTagName("head")[0].appendChild(eyden);
                document.body.setAttribute("data-highlight", "highlight-" + jailiyah);
            }
        } else {
            var tyjaun = document.body.getAttribute("data-highlight");
            var vered = tyjaun.split("highlight-");
            document.body.setAttribute("data-highlight", vered[1]);
            var eyden = document.createElement("link");
            eyden.rel = "stylesheet";
            eyden.className = "page-highlight";
            eyden.type = "text/css";
            eyden.href = "styles/highlights/highlight_" + vered[1] + ".css";
            if (!document.querySelectorAll(".page-highlight").length) {
                document.getElementsByTagName("head")[0].appendChild(eyden);
                document.body.setAttribute("data-highlight", "highlight-" + vered[1]);
                localStorage.setItem(kean + "-Highlight", vered[1]);
            }
        }
        ;var shayann = document.querySelectorAll("[data-change-background]");
        shayann.forEach(pavlo=>{
            return pavlo.addEventListener("click", isabeth=>{
                var dhwani = pavlo.getAttribute("data-change-background");
                document.body.setAttribute("data-gradient", "body-" + dhwani + "");
                localStorage.setItem(kean + "-Gradient", dhwani);
            }
            );
        }
        );
        var ilyn = localStorage.getItem(kean + "-Gradient");
        if (ilyn) {
            document.body.setAttribute("data-gradient", "body-" + ilyn + "");
        }
        ;const byron = document.querySelectorAll("[data-toggle-theme]");
        function ekam() {
            document.body.classList.add("theme-dark");
            document.body.classList.remove("theme-light", "detect-theme");
            for (let caela = 0; caela < byron.length; caela++) {
                byron[caela].checked = "checked";
            }
            ;localStorage.setItem(kean + "-Theme", "dark-mode");
        }
        function jylen() {
            document.body.classList.add("theme-light");
            document.body.classList.remove("theme-dark", "detect-theme");
            for (let emberlee = 0; emberlee < byron.length; emberlee++) {
                byron[emberlee].checked = false;
            }
            ;localStorage.setItem(kean + "-Theme", "light-mode");
        }
        function kymira() {
            var vickee = document.querySelectorAll(".btn, .header, #footer-bar, .menu-box, .menu-active");
            for (let zian = 0; zian < vickee.length; zian++) {
                vickee[zian].style.transition = "all 0s ease";
            }
        }
        function youa() {
            var rubyrose = document.querySelectorAll(".btn, .header, #footer-bar, .menu-box, .menu-active");
            for (let tynique = 0; tynique < rubyrose.length; tynique++) {
                rubyrose[tynique].style.transition = "";
            }
        }
        function ericanicole() {
            const necola = window.matchMedia("(prefers-color-scheme: dark)").matches;
            const sharimar = window.matchMedia("(prefers-color-scheme: light)").matches;
            const ordan = window.matchMedia("(prefers-color-scheme: no-preference)").matches;
            window.matchMedia("(prefers-color-scheme: dark)").addListener(shamirra=>{
                return shamirra.matches && ekam();
            }
            );
            window.matchMedia("(prefers-color-scheme: light)").addListener(nevon=>{
                return nevon.matches && jylen();
            }
            );
            if (necola) {
                ekam();
            }
            ;if (sharimar) {
                jylen();
            }
        }
        const mahum = document.querySelectorAll("[data-toggle-theme]");
        mahum.forEach(kema=>{
            return kema.addEventListener("click", catia=>{
                if (document.body.className == "theme-light") {
                    kymira();
                    ekam();
                } else {
                    if (document.body.className == "theme-dark") {
                        kymira();
                        jylen();
                    }
                }
                ;setTimeout(function() {
                    youa();
                }, 350);
            }
            );
        }
        );
        if (localStorage.getItem(kean + "-Theme") == "dark-mode") {
            for (let hoorain = 0; hoorain < byron.length; hoorain++) {
                byron[hoorain].checked = "checked";
            }
            ;document.body.className = "theme-dark";
        }
        ;if (localStorage.getItem(kean + "-Theme") == "light-mode") {
            document.body.className = "theme-light";
        }
        ;if (document.body.className == "detect-theme") {
            ericanicole();
        }
        ;const mischele = document.querySelectorAll(".detect-dark-mode");
        mischele.forEach(daedra=>{
            return daedra.addEventListener("click", quilla=>{
                document.body.classList.remove("theme-light", "theme-dark");
                document.body.classList.add("detect-theme");
                setTimeout(function() {
                    ericanicole();
                }, 50);
            }
            );
        }
        );
        const hili = document.querySelectorAll(".accordion-btn");
        if (hili.length) {
            hili.forEach(hawkin=>{
                return hawkin.addEventListener("click", keahilani=>{
                    hawkin.querySelector("i:last-child").classList.toggle("fa-rotate-180");
                }
                );
            }
            );
        }
        ;const dao = document.getElementsByClassName("upload-file");
        if (dao.length) {
            dao[0].addEventListener("change", jule, false);
            function jule(kojak) {
                if (this.files && this.files[0]) {
                    var sumair = document.getElementById("image-data");
                    sumair.src = URL.createObjectURL(this.files[0]);
                }
                ;const nayelii = kojak.target.files;
                const wayford = nayelii[0].name;
                document.getElementsByClassName("file-data")[0].classList.add("disabled");
                document.getElementsByClassName("upload-file-data")[0].classList.remove("disabled");
                document.getElementsByClassName("upload-file-name")[0].innerHTML = nayelii[0].name;
                document.getElementsByClassName("upload-file-modified")[0].innerHTML = nayelii[0].lastModifiedDate;
                document.getElementsByClassName("upload-file-size")[0].innerHTML = nayelii[0].size / 1e3 + "kb";
                document.getElementsByClassName("upload-file-type")[0].innerHTML = nayelii[0].type;
            }
        }
        ;var haisten = document.querySelectorAll(".get-location");
        if (haisten.length) {
            var jaquantae = document.getElementsByClassName("location-support")[0];
            if (typeof jaquantae != "undefined" && jaquantae != null) {
                if ("geolocation"in navigator) {
                    jaquantae.innerHTML = 'Your browser and device <strong class="color-green2-dark">support</strong> Geolocation.';
                } else {
                    jaquantae.innerHTML = 'Your browser and device <strong class="color-red2-dark">support</strong> Geolocation.';
                }
            }
            ;function deluka() {
                const shylan = document.querySelector(".location-coordinates");
                function nyheem(ansha) {
                    const tachelle = ansha.coords.latitude;
                    const reus = ansha.coords.longitude;
                    shylan.innerHTML = "<strong>Longitude:</strong> " + reus + "<br><strong>Latitude:</strong> " + tachelle;
                    var cebron = "https://www.google.com/maps/embed/v1/view?key=AIzaSyAM3nxDVrkjyKwdIZp8QOplmBKLRVI5S_Y&center=";
                    var delea = tachelle + ",";
                    var ahnia = reus;
                    var aws = "&zoom=16&maptype=satellite";
                    var detrell = "";
                    var yukiko = cebron + delea + ahnia + aws;
                    var cameshia = cebron + delea + ahnia + detrell;
                    document.getElementsByClassName("location-map")[0].setAttribute("src", yukiko);
                    document.getElementsByClassName("location-button")[0].setAttribute("href", cameshia);
                    document.getElementsByClassName("location-button")[0].classList.remove("disabled");
                }
                function veletta() {
                    shylan.textContent = "Unable to retrieve your location";
                }
                if (!navigator.geolocation) {
                    shylan.textContent = "Geolocation is not supported by your browser";
                } else {
                    shylan.textContent = "Locating";
                    navigator.geolocation.getCurrentPosition(nyheem, veletta);
                }
            }
            var thurnell = document.getElementsByClassName("get-location")[0];
            if (typeof thurnell != "undefined" && thurnell != null) {
                thurnell.addEventListener("click", function() {
                    this.classList.add("disabled");
                    deluka();
                });
            }
        }
        ;const hedit = document.querySelectorAll(".card-scale");
        if (hedit.length) {
            hedit.forEach(ralston=>{
                return ralston.addEventListener("mouseenter", thuraya=>{
                    ralston.querySelectorAll("img")[0].classList.add("card-scale-image");
                }
                );
            }
            );
            hedit.forEach(rayder=>{
                return rayder.addEventListener("mouseleave", josbel=>{
                    rayder.querySelectorAll("img")[0].classList.remove("card-scale-image");
                }
                );
            }
            );
        }
        ;const satnam = document.querySelectorAll(".card-hide");
        if (satnam.length) {
            satnam.forEach(lakiyah=>{
                return lakiyah.addEventListener("mouseenter", kertrina=>{
                    lakiyah.querySelectorAll(".card-center, .card-bottom, .card-top, .card-overlay")[0].classList.add("card-hide-image");
                }
                );
            }
            );
            satnam.forEach(monae=>{
                return monae.addEventListener("mouseleave", tristany=>{
                    monae.querySelectorAll(".card-center, .card-bottom, .card-top, .card-overlay")[0].classList.remove("card-hide-image");
                }
                );
            }
            );
        }
        ;const anastaisa = document.querySelectorAll(".card-rotate");
        if (anastaisa.length) {
            anastaisa.forEach(juliett=>{
                return juliett.addEventListener("mouseenter", aalayah=>{
                    juliett.querySelectorAll("img")[0].classList.add("card-rotate-image");
                }
                );
            }
            );
            anastaisa.forEach(rujul=>{
                return rujul.addEventListener("mouseleave", sri=>{
                    rujul.querySelectorAll("img")[0].classList.remove("card-rotate-image");
                }
                );
            }
            );
        }
        ;const zaith = document.querySelectorAll(".card-grayscale");
        if (zaith.length) {
            zaith.forEach(carlianne=>{
                return carlianne.addEventListener("mouseenter", kinley=>{
                    carlianne.querySelectorAll("img")[0].classList.add("card-grayscale-image");
                }
                );
            }
            );
            zaith.forEach(theodus=>{
                return theodus.addEventListener("mouseleave", rhyder=>{
                    theodus.querySelectorAll("img")[0].classList.remove("card-grayscale-image");
                }
                );
            }
            );
        }
        ;const greenly = document.querySelectorAll(".card-blur");
        if (greenly.length) {
            greenly.forEach(dililah=>{
                return dililah.addEventListener("mouseenter", gleeta=>{
                    dililah.querySelectorAll("img")[0].classList.add("card-blur-image");
                }
                );
            }
            );
            greenly.forEach(daviya=>{
                return daviya.addEventListener("mouseleave", gelena=>{
                    daviya.querySelectorAll("img")[0].classList.remove("card-blur-image");
                }
                );
            }
            );
        }
        ;var carshena = document.querySelectorAll(".check-visited");
        if (carshena.length) {
            function lady() {
                var tomomi = JSON.parse(localStorage.getItem(kean + "_Visited_Links")) || [];
                var pink = document.querySelectorAll(".check-visited a");
                for (let yilin = 0; yilin < pink.length; yilin++) {
                    var shenekia = pink[yilin];
                    shenekia.addEventListener("click", function(spike) {
                        var kyeem = this.href;
                        if (tomomi.indexOf(kyeem) == -1) {
                            tomomi.push(kyeem);
                            localStorage.setItem(kean + "_Visited_Links", JSON.stringify(tomomi));
                        }
                    });
                    if (tomomi.indexOf(shenekia.href) !== -1) {
                        shenekia.className += " visited-link";
                    }
                }
            }
            lady();
        }
        ;var deiadra = document.querySelectorAll(".scroll-ad, .header-auto-show");
        if (deiadra.length) {
            var junell = document.querySelectorAll(".scroll-ad");
            var vien = document.querySelectorAll(".header-auto-show");
            window.addEventListener("scroll", function() {
                if (document.querySelectorAll(".scroll-ad, .header-auto-show").length) {
                    function paytience() {
                        junell[0].classList.add("scroll-ad-visible");
                    }
                    function jadn() {
                        junell[0].classList.remove("scroll-ad-visible");
                    }
                    function anzar() {
                        vien[0].classList.add("header-active");
                    }
                    function obryant() {
                        vien[0].classList.remove("header-active");
                    }
                    var jaeshaun = window.outerWidth;
                    var shayleah = document.documentElement.scrollTop;
                    let drithi = shayleah <= 150;
                    var finessa = shayleah >= 150;
                    let princejames = jaeshaun - shayleah + 1e3 <= 150;
                    if (junell.length) {
                        drithi ? jadn() : null;
                        finessa ? paytience() : null;
                        princejames ? jadn() : null;
                    }
                    ;if (vien.length) {
                        drithi ? obryant() : null;
                        finessa ? anzar() : null;
                    }
                }
            });
        }
        ;var heatherlee = document.querySelectorAll(".stepper-add");
        var kalishia = document.querySelectorAll(".stepper-sub");
        if (heatherlee.length) {
            heatherlee.forEach(jataya=>{
                return jataya.addEventListener("click", enedino=>{
                    var stockton = jataya.parentElement.querySelector("input").value;
                    jataya.parentElement.querySelector("input").value = +stockton + 1;
                }
                );
            }
            );
            kalishia.forEach(tilon=>{
                return tilon.addEventListener("click", byrd=>{
                    var latacia = tilon.parentElement.querySelector("input").value;
                    tilon.parentElement.querySelector("input").value = +latacia - 1;
                }
                );
            }
            );
        }
        ;var valeka = document.querySelectorAll("[data-trigger-switch]:not([data-toggle-theme])");
        if (valeka.length) {
            valeka.forEach(kirstopher=>{
                return kirstopher.addEventListener("click", dexter=>{
                    var zalaysia = kirstopher.getAttribute("data-trigger-switch");
                    var vignesh = document.getElementById(zalaysia);
                    vignesh.checked ? vignesh.checked = false : vignesh.checked = true;
                }
                );
            }
            );
        }
        ;var tavores = document.querySelectorAll(".classic-toggle");
        if (tavores.length) {
            tavores.forEach(worn=>{
                return worn.addEventListener("click", christyne=>{
                    worn.querySelector("i:last-child").classList.toggle("fa-rotate-180");
                    worn.querySelector("i:last-child").style.transition = "all 250ms ease";
                }
                );
            }
            );
        }
        ;// var nytrell = document.querySelectorAll("[data-toast]");
        // if (nytrell.length) {
        //   nytrell.forEach(mazal => {
        //     return mazal.addEventListener("click", tamim => {
        //       var ananias = mazal.getAttribute("data-toast");
        //       var jozalyn = document.getElementById(ananias);
        //       var jozalyn = new bootstrap.Toast(jozalyn);
        //       jozalyn.show();
        //     });
        //   });
        // }
        // ;
        var angella = [].slice.call(document.querySelectorAll('[data-bs-toggle="dropdown"]'));
        if (angella.length) {
            var verdo = angella.map(function(antina) {
                return new bootstrap.Dropdown(antina);
            });
        }
        ;var pricsilla = document.querySelectorAll(".show-business-opened, .show-business-closed, .working-hours");
        if (pricsilla.length) {
            var tais = new Date;
            var nylan = tais.getDay();
            var yarisley = tais.getHours() + "." + tais.getMinutes();
            var moriana = [["Sunday"], ["Monday", 9, 17], ["Tuesday", 9, 17], ["Wednesday", 9, 17], ["Thursday", 9, 17], ["Friday", 9, 17], ["Saturday", 9, 13]];
            var nilofar = moriana[nylan];
            var virgia = document.querySelectorAll(".show-business-opened");
            var kindyl = document.querySelectorAll(".show-business-closed");
            if (yarisley > nilofar[1] && yarisley < nilofar[2] || yarisley > nilofar[3] && yarisley < nilofar[4]) {
                virgia.forEach(function(adoni) {
                    adoni.classList.remove("disabled");
                });
                kindyl.forEach(function(marlynda) {
                    marlynda.classList.add("disabled");
                });
            } else {
                virgia.forEach(function(mailo) {
                    mailo.classList.add("disabled");
                });
                kindyl.forEach(function(danaja) {
                    danaja.classList.remove("disabled");
                });
            }
            ;var pricsilla = document.querySelectorAll(".working-hours[data-day]");
            pricsilla.forEach(function(adriel) {
                var jeramiah = adriel.getAttribute("data-day");
                if (jeramiah === nilofar[0]) {
                    var jezika = '[data-day="' + nilofar[0] + '"]';
                    if (yarisley > nilofar[1] && yarisley < nilofar[2] || yarisley > nilofar[3] && yarisley < nilofar[4]) {
                        document.querySelectorAll(jezika)[0].classList.add("bg-green-dark");
                        document.querySelectorAll(jezika + " p").forEach(function(suyeko) {
                            suyeko.classList.add("color-white");
                        });
                    } else {
                        document.querySelectorAll(jezika)[0].classList.add("bg-red-dark");
                        document.querySelectorAll(jezika + " p").forEach(function(mahliya) {
                            mahliya.classList.add("color-white");
                        });
                    }
                }
            });
        }
        ;var kenadie = document.querySelectorAll("[data-vibrate]");
        if (kenadie.length) {
            var kayshawn = document.getElementsByClassName("start-vibrating")[0];
            var berlie = document.getElementsByClassName("stop-vibrating")[0];
            kayshawn.addEventListener("click", function() {
                var odilia = document.getElementsByClassName("vibrate-demo")[0].value;
                window.navigator.vibrate(odilia);
            });
            berlie.addEventListener("click", function() {
                window.navigator.vibrate(0);
            });
            kenadie.forEach(ugene=>{
                return ugene.addEventListener("click", koty=>{
                    var laquista = ugene.getAttribute("data-vibrate");
                    window.navigator.vibrate(laquista);
                }
                );
            }
            );
        }
        ;var maleik = document.querySelectorAll("[data-timed-ad]");
        if (maleik.length) {
            maleik.forEach(linita=>{
                return linita.addEventListener("click", aurella=>{
                    var antyone = linita.getAttribute("data-timed-ad");
                    var ernad = linita.getAttribute("data-menu");
                    var tayani = antyone;
                    var arleta = setInterval(function() {
                        if (tayani <= 1) {
                            clearInterval(arleta);
                            document.getElementById(ernad).querySelectorAll(".fa-times")[0].classList.remove("disabled");
                            document.getElementById(ernad).querySelectorAll(".close-menu")[0].classList.remove("no-click");
                            document.getElementById(ernad).querySelectorAll("span")[0].style.display = "none";
                        } else {}
                        ;document.getElementById(ernad).querySelectorAll("span")[0].innerHTML = tayani -= 1;
                    }, 1e3);
                }
                );
            }
            );
        }
        ;var esmirna = document.querySelectorAll("[data-auto-show-ad]");
        if (esmirna.length) {
            var loriell = esmirna[0].getAttribute("data-auto-show-ad");
            var akilia = setInterval(function() {
                if (loriell <= 1) {
                    clearInterval(akilia);
                    var nazish = esmirna[0].getAttribute("data-menu");
                    document.getElementById(nazish).classList.add("menu-active");
                    var sahiry = esmirna[0].getAttribute("data-timed-ad");
                    var mala = setInterval(function() {
                        if (sahiry <= 0) {
                            clearInterval(mala);
                            document.getElementById(nazish).querySelectorAll(".fa-times")[0].classList.remove("disabled");
                            document.getElementById(nazish).querySelectorAll(".close-menu")[0].classList.remove("no-click");
                            document.getElementById(nazish).querySelectorAll("span")[0].style.display = "none";
                        }
                        ;document.getElementById(nazish).querySelectorAll("span")[0].innerHTML = sahiry -= 1;
                    }, 1e3);
                }
                ;loriell -= 1;
            }, 1e3);
        }
        ;var nichoal = document.querySelectorAll(".reading-progress-text");
        if (nichoal.length) {
            var kanishia = nichoal[0].innerHTML.split(" ").length;
            var emiliee = Math.floor(kanishia / 250);
            var chimamaka = kanishia % 60;
            document.getElementsByClassName("reading-progress-words")[0].innerHTML = kanishia;
            document.getElementsByClassName("reading-progress-time")[0].innerHTML = emiliee + ":" + chimamaka;
        }
        ;var beathrice = document.querySelectorAll(".text-size-changer");
        if (beathrice.length) {
            var barlow = document.querySelectorAll(".text-size-increase");
            var kynzlei = document.querySelectorAll(".text-size-decrease");
            var klever = document.querySelectorAll(".text-size-default");
            barlow[0].addEventListener("click", function() {
                beathrice[0].querySelectorAll("*").forEach(function(jedediah) {
                    const abiud = window.getComputedStyle(jedediah).fontSize.split("px", 2)[0];
                    jedediah.style.fontSize = +abiud + 1 + "px";
                });
            });
            kynzlei[0].addEventListener("click", function() {
                beathrice[0].querySelectorAll("*").forEach(function(dozie) {
                    const rosary = window.getComputedStyle(dozie).fontSize.split("px", 2)[0];
                    dozie.style.fontSize = +rosary - 1 + "px";
                });
            });
            klever[0].addEventListener("click", function() {
                beathrice[0].querySelectorAll("*").forEach(function(ahmari) {
                    const yago = window.getComputedStyle(ahmari).fontSize.split("px", 2)[0];
                    ahmari.style.fontSize = "";
                });
            });
        }
        ;var lamariah = document.querySelectorAll(".qr-image");
        if (lamariah.length) {
            var airah = window.location.href;
            var demple = document.getElementsByClassName("generate-qr-auto")[0];
            var oras = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=";
            if (demple) {
                demple.setAttribute("src", oras + airah);
            }
            ;var odeth = document.getElementsByClassName("generate-qr-button")[0];
            if (odeth) {
                odeth.addEventListener("click", function() {
                    var jasslynn = document.getElementsByClassName("qr-url")[0].value;
                    var luvell = "https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=";
                    var meilanie = '<img class="mx-auto polaroid-effect shadow-l mt-4 delete-qr" width="200" src="' + luvell + jasslynn + '" alt="img"><p class="font-11 text-center mb-0">' + jasslynn + "</p>";
                    document.getElementsByClassName("generate-qr-result")[0].innerHTML = meilanie;
                    odeth.innerHTML = "Generate New Button";
                });
            }
        }
        ;if (window.location.protocol === "file:") {
            var nickiyah = document.querySelectorAll("a");
            nickiyah.forEach(yosef=>{
                return yosef.addEventListener("mouseover", demetia=>{}
                );
            }
            );
        }
        ;var waard = document.querySelectorAll("[data-search]");
        if (waard.length) {
            var shandrika = document.querySelectorAll(".search-results");
            var lenora = document.querySelectorAll(".search-no-results");
            var malzie = document.querySelectorAll(".search-results div")[0].childElementCount;
            var euriah = document.querySelectorAll(".search-trending");
            var raely = document.querySelectorAll(".clear-search")[0];
            raely.addEventListener("click", function() {
                waard[0].value = "";
                raely.classList.add("disabled");
                lenora[0].classList.add("disabled");
                shandrika[0].classList.add("disabled-search-list");
                if (euriah[0]) {
                    euriah[0].classList.remove("disabled");
                }
                ;var netta = document.querySelectorAll("[data-filter-item]");
                for (let mitsuko = 0; mitsuko < netta.length; mitsuko++) {
                    netta[mitsuko].classList.add("disabled");
                }
            });
            function arrena() {
                var dalea = waard[0].value;
                var lilah = dalea.toLowerCase();
                if (lilah != "") {
                    raely.classList.remove("disabled");
                    shandrika[0].classList.remove("disabled-search-list");
                    var ismael = document.querySelectorAll("[data-filter-item]");
                    for (let kathia = 0; kathia < ismael.length; kathia++) {
                        var shatay = ismael[kathia].getAttribute("data-filter-name");
                        if (shatay.includes(lilah)) {
                            ismael[kathia].classList.remove("disabled");
                            if (euriah.length) {
                                euriah[0].classList.add("disabled");
                            }
                        } else {
                            ismael[kathia].classList.add("disabled");
                            if (euriah.length) {
                                euriah[0].classList.remove("disabled");
                            }
                        }
                        ;var matigan = document.querySelectorAll(".search-results div")[0].getElementsByClassName("disabled").length;
                        if (matigan === malzie) {
                            lenora[0].classList.remove("disabled");
                            if (euriah.length) {
                                euriah[0].classList.add("disabled");
                            }
                        } else {
                            lenora[0].classList.add("disabled");
                            if (euriah.length) {
                                euriah[0].classList.add("disabled");
                            }
                        }
                    }
                }
                ;if (lilah === "") {
                    raely.classList.add("disabled");
                    shandrika[0].classList.add("disabled-search-list");
                    lenora[0].classList.add("disabled");
                    if (euriah.length) {
                        euriah[0].classList.remove("disabled");
                    }
                }
            }
            waard[0].addEventListener("keyup", function() {
                arrena();
            });
            waard[0].addEventListener("click", function() {
                arrena();
            });
            var sherile = document.querySelectorAll(".search-trending a");
            sherile.forEach(louva=>{
                return louva.addEventListener("click", yussuf=>{
                    var tamron = louva.querySelectorAll("span")[0].textContent.toLowerCase();
                    waard[0].value = tamron;
                    waard[0].click();
                }
                );
            }
            );
        }
        ;var mykeria = document.querySelectorAll("[data-toggle-search]");
        if (mykeria) {
            mykeria.forEach(madisin=>{
                return madisin.addEventListener("click", jecht=>{
                    window.scrollTo({
                        top: 0,
                        behavior: `${"smooth"}`
                    });
                    document.querySelectorAll(".header")[0].classList.toggle("header-search-active");
                }
                );
            }
            );
        }
        ;var jakiyla = document.title;
        var konstance = document.title;
        var keyahna = window.location.href;
        if (document.querySelectorAll(".shareToFacebook, .shareToTwitter, .shareToLinkedIn")[0]) {
            document.querySelectorAll(".shareToFacebook, .shareToTwitter, .shareToLinkedIn, .shareToWhatsApp, .shareToMail").forEach(kong=>{
                kong.setAttribute("target", "_blank");
            }
            );
            document.querySelectorAll(".shareToFacebook").forEach(sisto=>{
                return sisto.setAttribute("href", "https://www.facebook.com/sharer/sharer.php?u=" + keyahna);
            }
            );
            document.querySelectorAll(".shareToTwitter").forEach(durward=>{
                return durward.setAttribute("href", "http://twitter.com/share?text=" + jakiyla + "%20" + keyahna);
            }
            );
            document.querySelectorAll(".shareToPinterest").forEach(tamen=>{
                return tamen.setAttribute("href", "https://pinterest.com/pin/create/button/?url=" + keyahna);
            }
            );
            document.querySelectorAll(".shareToWhatsApp").forEach(aziel=>{
                return aziel.setAttribute("href", "whatsapp://send?text=" + keyahna);
            }
            );
            document.querySelectorAll(".shareToMail").forEach(ziyu=>{
                return ziyu.setAttribute("href", "mailto:?body=" + keyahna);
            }
            );
            document.querySelectorAll(".shareToLinkedIn").forEach(aleisha=>{
                return aleisha.setAttribute("href", "https://www.linkedin.com/shareArticle?mini=true&url=" + keyahna + "&title=" + jakiyla + "&summary=&source=");
            }
            );
        }
        ;if (navigator.canShare) {
            const chelci = {
                title: jakiyla,
                text: konstance,
                url: keyahna
            };
            var serkan = document.querySelectorAll('[data-menu="menu-share"], [data-show-share]');
            if (serkan) {
                serkan.forEach(summerlin=>{
                    summerlin.addEventListener("click", async()=>{
                        dimetri("menu-share", "hide", 0);
                        try {
                            await navigator.share(chelci);
                        } catch (err) {}
                    }
                    );
                }
                );
            }
        }
        ;var odom = document.querySelectorAll(".contact-form");
        if (odom.length) {
            var johnnay = document.getElementById("contactForm");
            johnnay.onsubmit = function(tirra) {
                tirra.preventDefault();
                var telethia = document.getElementById("contactNameField");
                var kathyrine = document.getElementById("contactEmailField");
                var staten = document.getElementById("contactMessageTextarea");
                var alister = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                if (telethia.value === "") {
                    johnnay.setAttribute("data-form", "invalid");
                    telethia.classList.add("border-red-dark");
                    document.getElementById("validator-name").classList.remove("disabled");
                } else {
                    johnnay.setAttribute("data-form", "valid");
                    document.getElementById("validator-name").classList.add("disabled");
                    telethia.classList.remove("border-red-dark");
                }
                ;if (kathyrine.value === "") {
                    johnnay.setAttribute("data-form", "invalid");
                    kathyrine.classList.add("border-red-dark");
                    document.getElementById("validator-mail1").classList.remove("disabled");
                } else {
                    document.getElementById("validator-mail1").classList.add("disabled");
                    if (!alister.test(kathyrine.value)) {
                        johnnay.setAttribute("data-form", "invalid");
                        kathyrine.classList.add("border-red-dark");
                        document.getElementById("validator-mail2").classList.remove("disabled");
                    } else {
                        johnnay.setAttribute("data-form", "valid");
                        document.getElementById("validator-mail2").classList.add("disabled");
                        kathyrine.classList.remove("border-red-dark");
                    }
                }
                ;if (staten.value === "") {
                    johnnay.setAttribute("data-form", "invalid");
                    staten.classList.add("border-red-dark");
                    document.getElementById("validator-text").classList.remove("disabled");
                } else {
                    johnnay.setAttribute("data-form", "valid");
                    document.getElementById("validator-text").classList.add("disabled");
                    staten.classList.remove("border-red-dark");
                }
                ;if (johnnay.getAttribute("data-form") === "valid") {
                    document.querySelectorAll(".form-sent")[0].classList.remove("disabled");
                    document.querySelectorAll(".contact-form")[0].classList.add("disabled");
                    var fremont = {};
                    for (let delylah = 0, destney = johnnay.length; delylah < destney; ++delylah) {
                        let rheuben = johnnay[delylah];
                        if (rheuben.name) {
                            fremont[rheuben.name] = rheuben.value;
                        }
                    }
                    ;var julayne = new XMLHttpRequest;
                    julayne.open(johnnay.method, johnnay.action, true);
                    julayne.setRequestHeader("Accept", "application/json; charset=utf-8");
                    julayne.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
                    julayne.send(JSON.stringify(fremont));
                    julayne.onloadend = function(raylan) {
                        if (raylan.target.status === 200) {
                            console.log("Form Submitted");
                        }
                    }
                    ;
                }
            }
            ;
        }
        ;var plutarco = document.querySelectorAll('[data-bs-toggle="collapse"]:not(.no-effect)');
        if (plutarco.length) {
            plutarco.forEach(marguriete=>{
                return marguriete.addEventListener("click", brynley=>{
                    if (marguriete.querySelectorAll("i").length) {
                        marguriete.querySelector("i").classList.toggle("fa-rotate-180");
                    }
                }
                );
            }
            );
        }
        ;var lashonda = document.querySelectorAll(".tab-controls a");
        if (lashonda.length) {
            lashonda.forEach(function(jumah) {
                if (jumah.hasAttribute("data-active")) {
                    var sula = jumah.parentNode.getAttribute("data-highlight");
                    jumah.classList.add(sula);
                    jumah.classList.add("no-click");
                }
            });
            lashonda.forEach(manthan=>{
                return manthan.addEventListener("click", kohei=>{
                    var shatoni = manthan.parentNode.getAttribute("data-highlight");
                    var keinan = manthan.parentNode.querySelectorAll("a");
                    keinan.forEach(function(garnette) {
                        garnette.classList.remove(shatoni);
                        garnette.classList.remove("no-click");
                    });
                    manthan.classList.add(shatoni);
                    manthan.classList.add("no-click");
                }
                );
            }
            );
        }
        ;function dimetri(arkeba, tyanah, jyla) {
            setTimeout(function() {
                if (tyanah === "show") {
                    return document.getElementById(arkeba).classList.add("menu-active"),
                    document.querySelectorAll(".menu-hider")[0].classList.add("menu-active");
                } else {
                    return document.getElementById(arkeba).classList.remove("menu-active"),
                    document.querySelectorAll(".menu-hider")[0].classList.remove("menu-active");
                }
            }, jyla);
        }
        var desiraye = document.querySelectorAll("[data-auto-activate]");
        if (desiraye.length) {
            setTimeout(function() {
                desiraye[0].classList.add("menu-active");
                maybellene[0].classList.add("menu-active");
            }, 0);
        }
        ;var alleana = document.getElementById("copyright-year");
        if (alleana) {
            var dameshia = new Date;
            const ahbleza = dameshia.getFullYear();
            alleana.textContent = ahbleza;
        }
        ;var loxleigh = document.querySelectorAll(".check-age");
        if (loxleigh.length) {
            loxleigh[0].addEventListener("click", function() {
                var dezja = document.querySelectorAll("#date-birth-day")[0].value;
                var loriene = document.querySelectorAll("#date-birth-month")[0].value;
                var anjali = document.querySelectorAll("#date-birth-year")[0].value;
                var shandee = 18;
                var sharnece = new Date;
                sharnece.setFullYear(anjali, loriene - 1, dezja);
                var delayah = new Date;
                var elleyna = new Date;
                elleyna.setFullYear(sharnece.getFullYear() + shandee, loriene - 1, dezja);
                var beaula = document.querySelectorAll("#menu-age");
                var xyrus = document.querySelectorAll("#menu-age-fail");
                var marshea = document.querySelectorAll("#menu-age-okay");
                console.log(delayah);
                console.log(elleyna);
                console.log(loriene);
                if (delayah - elleyna > 0) {
                    console.log("above 18");
                    beaula[0].classList.remove("menu-active");
                    marshea[0].classList.add("menu-active");
                } else {
                    beaula[0].classList.remove("menu-active");
                    xyrus[0].classList.add("menu-active");
                }
                ;return true;
            });
        }
        ;var aadilynn = document.querySelectorAll(".offline-message");
        if (!aadilynn.length) {
            const nishay = document.createElement("p");
            const quincie = document.createElement("p");
            nishay.className = "offline-message bg-red-dark color-white";
            nishay.textContent = "No internet connection detected";
            quincie.className = "online-message bg-green-dark color-white";
            quincie.textContent = "You are back online";
            document.getElementsByTagName("body")[0].appendChild(nishay);
            document.getElementsByTagName("body")[0].appendChild(quincie);
        }
        ;function desting() {
            var sanaiyah = document.querySelectorAll("a");
            sanaiyah.forEach(function(anyliah) {
                var berma = anyliah.getAttribute("href");
                if (berma.match(/.html/)) {
                    anyliah.classList.add("show-offline");
                    anyliah.setAttribute("data-link", berma);
                    anyliah.setAttribute("href", "#");
                }
            });
            var suz = document.querySelectorAll(".show-offline");
            suz.forEach(prithvi=>{
                return prithvi.addEventListener("click", margerette=>{
                    document.getElementsByClassName("offline-message")[0].classList.add("offline-message-active");
                    setTimeout(function() {
                        document.getElementsByClassName("offline-message")[0].classList.remove("offline-message-active");
                    }, 1500);
                }
                );
            }
            );
        }
        function jahim() {
            var cadeja = document.querySelectorAll("[data-link]");
            cadeja.forEach(function(tequoia) {
                var bioleta = tequoia.getAttribute("data-link");
                if (bioleta.match(/.html/)) {
                    tequoia.setAttribute("href", bioleta);
                    tequoia.removeAttribute("data-link", "");
                }
            });
        }
        var chassy = document.getElementsByClassName("offline-message")[0];
        var theadosia = document.getElementsByClassName("online-message")[0];
        function graecie() {
            jahim();
            theadosia.classList.add("online-message-active");
            setTimeout(function() {
                theadosia.classList.remove("online-message-active");
            }, 2e3);
            console.info("Connection: Online");
        }
        function tambria() {
            desting();
            chassy.classList.add("offline-message-active");
            setTimeout(function() {
                chassy.classList.remove("offline-message-active");
            }, 2e3);
            console.info("Connection: Offline");
        }
        var olisaemeka = document.querySelectorAll(".simulate-offline");
        var policarpio = document.querySelectorAll(".simulate-online");
        if (olisaemeka.length) {
            olisaemeka[0].addEventListener("click", function() {
                tambria();
            });
            policarpio[0].addEventListener("click", function() {
                graecie();
            });
        }
        ;function dovi(luc) {
            var arnesia = navigator.onLine ? "online" : "offline";
            graecie();
        }
        function asmah(annaleise) {
            tambria();
        }
        window.addEventListener("online", dovi);
        window.addEventListener("offline", asmah);
        const faline = document.querySelectorAll(".simulate-iphone-badge");
        faline.forEach(mi=>{
            return mi.addEventListener("click", taci=>{
                document.getElementsByClassName("add-to-home")[0].classList.add("add-to-home-visible", "add-to-home-ios");
                document.getElementsByClassName("add-to-home")[0].classList.remove("add-to-home-android");
            }
            );
        }
        );
        const heath = document.querySelectorAll(".simulate-android-badge");
        heath.forEach(kynesha=>{
            return kynesha.addEventListener("click", hasset=>{
                document.getElementsByClassName("add-to-home")[0].classList.add("add-to-home-visible", "add-to-home-android");
                document.getElementsByClassName("add-to-home")[0].classList.remove("add-to-home-ios");
            }
            );
        }
        );
        const reham = document.querySelectorAll(".add-to-home");
        reham.forEach(caysi=>{
            return caysi.addEventListener("click", makoy=>{
                document.getElementsByClassName("add-to-home")[0].classList.remove("add-to-home-visible");
            }
            );
        }
        );
        let kaline = {
            Android: function() {
                return navigator.userAgent.match(/Android/i);
            },
            iOS: function() {
                return navigator.userAgent.match(/iPhone|iPad|iPod/i);
            },
            any: function() {
                return kaline.Android() || kaline.iOS();
            }
        };
        const clydine = document.getElementsByClassName("show-android");
        const eita = document.getElementsByClassName("show-ios");
        const chasten = document.getElementsByClassName("show-no-device");
        if (!kaline.any()) {
            for (let jocile = 0; jocile < eita.length; jocile++) {
                eita[jocile].classList.add("disabled");
            }
            ;for (let jabreon = 0; jabreon < clydine.length; jabreon++) {
                clydine[jabreon].classList.add("disabled");
            }
        }
        ;if (kaline.iOS()) {
            document.querySelectorAll("#page")[0].classList.add("device-is-ios");
            for (let rawleigh = 0; rawleigh < chasten.length; rawleigh++) {
                chasten[rawleigh].classList.add("disabled");
            }
            ;for (let kedrick = 0; kedrick < clydine.length; kedrick++) {
                clydine[kedrick].classList.add("disabled");
            }
        }
        ;if (kaline.Android()) {
            document.querySelectorAll("#page")[0].classList.add("device-is-android");
            for (let danita = 0; danita < eita.length; danita++) {
                eita[danita].classList.add("disabled");
            }
            ;for (let guilio = 0; guilio < chasten.length; guilio++) {
                chasten[guilio].classList.add("disabled");
            }
        }
        ;var stehpanie = document.querySelectorAll(".otp");
        if (stehpanie[0]) {
            stehpanie.forEach(micharl=>{
                micharl.addEventListener("focus", shahn=>{
                    micharl.value = "";
                }
                );
                micharl.addEventListener("input", saleyah=>{
                    micharl.nextElementSibling ? micharl.nextElementSibling.focus() : micharl.blur();
                }
                );
            }
            );
        }
        ;if (itzhel === true) {
            var cythia = document.getElementsByTagName("html")[0];
            if (!cythia.classList.contains("isPWA")) {
                if ("serviceWorker"in navigator) {
                    window.addEventListener("load", function() {
                        navigator.serviceWorker.register(graciee, {
                            scope: zephyr
                        });
                    });
                }
                ;var coleene = larke * 24;
                var yarisley = Date.now();
                var nkiya = localStorage.getItem(kean + "-PWA-Timeout-Value");
                if (nkiya == null) {
                    localStorage.setItem(kean + "-PWA-Timeout-Value", yarisley);
                } else {
                    if (yarisley - nkiya > coleene * 60 * 60 * 1e3) {
                        localStorage.removeItem(kean + "-PWA-Prompt");
                        localStorage.setItem(kean + "-PWA-Timeout-Value", yarisley);
                    }
                }
                ;const virgus = document.querySelectorAll(".pwa-dismiss");
                virgus.forEach(kaream=>{
                    return kaream.addEventListener("click", gibbs=>{
                        const corbett = document.querySelectorAll("#menu-install-pwa-android, #menu-install-pwa-ios");
                        for (let rozalee = 0; rozalee < corbett.length; rozalee++) {
                            corbett[rozalee].classList.remove("menu-active");
                        }
                        ;localStorage.setItem(kean + "-PWA-Timeout-Value", yarisley);
                        localStorage.setItem(kean + "-PWA-Prompt", "install-rejected");
                        console.log("PWA Install Rejected. Will Show Again in " + larke + " Days");
                    }
                    );
                }
                );
                const enfinity = document.querySelectorAll("#menu-install-pwa-android, #menu-install-pwa-ios");
                if (enfinity.length) {
                    if (kaline.Android()) {
                        if (localStorage.getItem(kean + "-PWA-Prompt") != "install-rejected") {
                            function cymon() {
                                setTimeout(function() {
                                    if (!window.matchMedia("(display-mode: fullscreen)").matches) {
                                        console.log("Triggering PWA Window for Android");
                                        document.getElementById("menu-install-pwa-android").classList.add("menu-active");
                                        document.querySelectorAll(".menu-hider")[0].classList.add("menu-active");
                                    }
                                }, 3500);
                            }
                            var aliannie;
                            window.addEventListener("beforeinstallprompt", kiaro=>{
                                kiaro.preventDefault();
                                aliannie = kiaro;
                                cymon();
                            }
                            );
                        }
                        ;const briane = document.querySelectorAll(".pwa-install");
                        briane.forEach(caelum=>{
                            return caelum.addEventListener("click", avika=>{
                                aliannie.prompt();
                                aliannie.userChoice.then(jehron=>{
                                    if (jehron.outcome === "accepted") {
                                        console.log("Added");
                                    } else {
                                        localStorage.setItem(kean + "-PWA-Timeout-Value", yarisley);
                                        localStorage.setItem(kean + "-PWA-Prompt", "install-rejected");
                                        setTimeout(function() {
                                            if (!window.matchMedia("(display-mode: fullscreen)").matches) {
                                                document.getElementById("menu-install-pwa-android").classList.remove("menu-active");
                                                document.querySelectorAll(".menu-hider")[0].classList.remove("menu-active");
                                            }
                                        }, 50);
                                    }
                                    ;aliannie = null;
                                }
                                );
                            }
                            );
                        }
                        );
                        window.addEventListener("appinstalled", azsha=>{
                            document.getElementById("menu-install-pwa-android").classList.remove("menu-active");
                            document.querySelectorAll(".menu-hider")[0].classList.remove("menu-active");
                        }
                        );
                    }
                    ;if (kaline.iOS()) {
                        if (localStorage.getItem(kean + "-PWA-Prompt") != "install-rejected") {
                            setTimeout(function() {
                                if (!window.matchMedia("(display-mode: fullscreen)").matches) {
                                    console.log("Triggering PWA Window for iOS");
                                    document.getElementById("menu-install-pwa-ios").classList.add("menu-active");
                                    document.querySelectorAll(".menu-hider")[0].classList.add("menu-active");
                                }
                            }, 3500);
                        }
                    }
                }
            }
            ;cythia.setAttribute("class", "isPWA");
        }
        ;if (jacquelene === true) {
            caches.delete("workbox-runtime").then(function() {});
            sessionStorage.clear();
            caches.keys().then(alnisha=>{
                alnisha.forEach(fadilah=>{
                    caches.delete(fadilah);
                }
                );
            }
            );
        }
        ;var cassin = new LazyLoad;
        var saquoia, yubin, thatiana, montell;
        var daylon = "plugins/";
        let lavert = [{
            id: "uniqueID",
            plug: "pluginName/plugin.js",
            call: "pluginName/pluginName-call.js",
            style: "pluginName/pluginName-style.css",
            trigger: ".pluginTriggerClass"
        }, {
            id: "charts-js-plugin",
            plug: "charts/charts.js",
            call: "charts/charts-call-graphs.js",
            trigger: ".graph"
        }, {
            id: "count",
            plug: "countdown/countdown.js",
            trigger: ".countdown"
        }, {
            id: "gallery",
            plug: "glightbox/glightbox.js",
            call: "glightbox/glightbox-call.js",
            style: "glightbox/glightbox.css",
            trigger: "[data-gallery]"
        }, {
            id: "gallery-views",
            call: "galleryViews/gallery-views.js",
            trigger: ".gallery-view-controls"
        }, {
            id: "filter",
            plug: "filterizr/filterizr.js",
            call: "filterizr/filterizr-call.js",
            style: "filterizr/filterizr.css",
            trigger: ".gallery-filter"
        }, {
            id: "ba-slider",
            call: "before-after/before-after.js",
            style: "before-after/before-after.css",
            trigger: "#before-after-slider"
        }];
        for (let deyanne = 0; deyanne < lavert.length; deyanne++) {
            if (document.querySelectorAll("." + lavert[deyanne].id + "-c").length) {
                document.querySelectorAll("." + lavert[deyanne].id + "-c")[0].remove();
            }
            ;var teressa = document.querySelectorAll(lavert[deyanne].trigger);
            if (teressa.length) {
                var amaryllis = document.getElementsByTagName("script")[1]
                  , howe = document.createElement("script");
                howe.type = "text/javascript";
                howe.className = lavert[deyanne].id + "-p";
                howe.src = daylon + lavert[deyanne].plug;
                howe.addEventListener("load", function() {
                    if (lavert[deyanne].call !== undefined) {
                        var meera = document.getElementsByTagName("script")[2]
                          , glenard = document.createElement("script");
                        glenard.type = "text/javascript";
                        glenard.className = lavert[deyanne].id + "-c";
                        glenard.src = daylon + lavert[deyanne].call;
                        meera.parentNode.insertBefore(glenard, meera);
                    }
                });
                if (!document.querySelectorAll("." + lavert[deyanne].id + "-p").length && lavert[deyanne].plug !== undefined) {
                    amaryllis.parentNode.insertBefore(howe, amaryllis);
                } else {
                    setTimeout(function() {
                        var evamarie = document.getElementsByTagName("script")[1]
                          , angie = document.createElement("script");
                        angie.type = "text/javascript";
                        angie.className = lavert[deyanne].id + "-c";
                        angie.src = daylon + lavert[deyanne].call;
                        evamarie.parentNode.insertBefore(angie, evamarie);
                    }, 50);
                }
                ;if (lavert[deyanne].style !== undefined) {
                    if (!document.querySelectorAll("." + lavert[deyanne].id + "-s").length) {
                        var giannina = document.createElement("link");
                        giannina.className = lavert[deyanne].id + "-s";
                        giannina.rel = "stylesheet";
                        giannina.type = "text/css";
                        giannina.href = daylon + lavert[deyanne].style;
                        document.getElementsByTagName("head")[0].appendChild(giannina);
                    }
                }
            }
        }
    }
    if ("scrollRestoration"in window.history) {
        window.history.scrollRestoration = "manual";
    }
    ;// if (elsiemae === true) {
    //   if (window.location.protocol !== "file:") {
    //     const jersain = {containers: ["#page"], cache: false, animateHistoryBrowsing: false, plugins: [new SwupPreloadPlugin], linkSelector: 'a:not(.external-link):not(.default-link):not([href^="https"]):not([href^="http"]):not([data-gallery])'};
    //     const kryston = new Swup(jersain);
    //     document.addEventListener("swup:pageView", sammeul => {
    //       nevin();
    //     });
    //   }
    // }
    ;nevin();
}
);
