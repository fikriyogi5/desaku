<?php
// Panggil koneksi database Anda dan buat objek Data (atau sesuaikan dengan implementasi Anda)
// include 'php/db.php'; // Gantilah dengan file koneksi Anda
// $data = new Database();


require_once('php/functions.php'); // Memanggil file functions.php

$data = new Functions(); // Membuat objek Functions

// Menghitung jumlah seluruh warga=
// Menghitung jumlah warga laki-laki
$maleCount = $data->countResidents('jk', 'L');
$FemaleCount = $data->countResidents('jk', 'P');
$AllCount = $data->countResidents();
include ('header.php'); // Memanggil file functions.php
include ('menu.php'); // Memanggil file functions.php

?>

<!-- END HEADER -->

<!-- Left panel : Navigation area -->
<!-- Note: This width of the aside area can be adjusted through LESS variables -->

<!-- END NAVIGATION -->

<!-- MAIN PANEL -->
<div id="main" role="main">

    <!-- RIBBON -->
    <div id="ribbon">

        <span class="ribbon-button-alignment">
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh" rel="tooltip"
                data-placement="bottom"
                data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings."
                data-html="true">
                <i class="fa fa-refresh"></i>
            </span>
        </span>

        <!-- breadcrumb -->
        <ol class="breadcrumb">
            <li>Home</li>
            <li>Tables</li>
            <li>Data Tables</li>
        </ol>

    </div>
    <!-- END RIBBON -->

    <!-- MAIN CONTENT -->
    <div id="content">

        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                <h1 class="page-title txt-color-blueDark">
                    <i class="fa fa-table fa-fw "></i>
                    Table
                    <span>>
                        <a href="#" data-toggle="modal" data-target="#myModal"> Terms and Conditions </a>
                    </span>
                </h1>
            </div>
            <div class="col-xs-12 col-sm-5 col-md-5 col-lg-8">
                <ul id="sparks" class="">
                    <li class="sparks-info">
                        <h5> Penduduk <span class="txt-color-blue"><i class="fa fa-users" data-rel="bootstrap-tooltip"
                                    title="Increased"></i>&nbsp;<?php echo $AllCount;?></span></h5>
                        <div class="sparkline txt-color-blue hidden-mobile hidden-md hidden-sm">
                            1300, 1877, 2500, 2577, 2000, 2100, 3000, 2700, 3631, 2471, 2700, 3631, 2471
                        </div>
                    </li>
                    <li class="sparks-info">
                        <h5> Laki-Laki <span class="txt-color-purple"><i class="fa fa-male" data-rel="bootstrap-tooltip"
                                    title="Increased"></i>&nbsp;<?php echo $maleCount;?></span></h5>
                        <div class="sparkline txt-color-purple hidden-mobile hidden-md hidden-sm">
                            110,150,300,130,400,240,220,310,220,300, 270, 210
                        </div>
                    </li>
                    <li class="sparks-info">
                        <h5> Perempuan <span class="txt-color-greenDark"><i
                                    class="fa fa-female"></i>&nbsp;<?php echo $FemaleCount;?></span></h5>
                        <div class="sparkline txt-color-greenDark hidden-mobile hidden-md hidden-sm">
                            110,150,300,130,400,240,220,310,220,300, 270, 210
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!-- widget grid -->
        <section id="widget-grid" class="">

            <!-- row -->
            <div class="row">

                <!-- NEW WIDGET START -->
                <article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <!-- Widget ID (each widget will need unique ID)-->
                    <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
                        <!-- widget options:
								usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
				
								data-widget-colorbutton="false"
								data-widget-editbutton="false"
								data-widget-togglebutton="false"
								data-widget-deletebutton="false"
								data-widget-fullscreenbutton="false"
								data-widget-custombutton="false"
								data-widget-collapsed="true"
								data-widget-sortable="false"
				
								-->
                        <header>
                            <span class="widget-icon"> <i class="fa fa-table"></i> </span>
                            <h2>Standard Data Tables </h2>

                        </header>

                        <!-- widget div-->
                        <div>

                            <!-- widget edit box -->
                            <div class="jarviswidget-editbox">
                                <!-- This area used as dropdown edit box -->

                            </div>
                            <!-- end widget edit box -->

                            <!-- widget content -->
                            <div class="widget-body no-padding">


                                <table id="dt_basic" class="table table-striped table-bordered table-hover display"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th data-hide="phone">ID</th>
                                            <th data-class="expand"><i
                                                    class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i>
                                                Nama</th>
                                            <th data-hide="phone"><i
                                                    class="fa fa-fw fa-phone text-muted hidden-md hidden-sm hidden-xs"></i>
                                                NIK</th>
                                            <th>KK</th>
                                            <th data-hide="phone,tablet"><i
                                                    class="fa fa-fw fa-map-marker txt-color-blue hidden-md hidden-sm hidden-xs"></i>
                                                Alamat</th>
                                            <th data-hide="phone,tablet">Tempat</th>
                                            <th data-hide="phone,tablet"><i
                                                    class="fa fa-fw fa-calendar txt-color-blue hidden-md hidden-sm hidden-xs"></i>
                                                Tanggal Lahir</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- <tr>
													<td>1</td>
													<td>Jennifer</td>
													<td>1-342-463-8341</td>
													<td>Et Rutrum Non Associates</td>
													<td>35728</td>
													<td>Fogo</td>
													<td>03/04/14</td>
												</tr> -->
                                    </tbody>
                                </table>

                            </div>
                            <!-- end widget content -->

                        </div>
                        <!-- end widget div -->

                    </div>
                    <!-- end widget -->


                </article>
                <!-- WIDGET END -->

            </div>

            <!-- end row -->

            <!-- end row -->

        </section>
        <!-- end widget grid -->

    </div>
    <!-- END MAIN CONTENT -->

</div>
<!-- END MAIN PANEL -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
            </div>
            <div class="modal-body custom-scroll terms-body">

                <div id="left">
                    <form class="smart-form">
                        <header>
                            Standard Form Header
                        </header>

                        <fieldset>

                            <section>
                                <label class="label">Extra Small text input</label>
                                <label class="input">
                                    <input type="text" class="input-xs">
                                </label>
                            </section>

                            <section>
                                <label class="label">Small text input</label>
                                <label class="input">
                                    <input type="text" class="input-sm">
                                </label>
                            </section>

                            <section>
                                <label class="label">Default text input with maxlength</label>
                                <label class="input">
                                    <input type="text" maxlength="10">
                                </label>
                                <div class="note">
                                    <strong>Maxlength</strong> is automatically added via the "maxlength='#'"
                                    attribute
                                </div>
                            </section>

                            <section>
                                <label class="label">Large text input</label>
                                <label class="input">
                                    <input type="text" class="input-lg">
                                </label>
                            </section>

                        </fieldset>

                        <fieldset>

                            <section>
                                <label class="label">File input</label>
                                <div class="input input-file">
                                    <span class="button"><input type="file" id="file" name="file"
                                            onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input
                                        type="text" placeholder="Include some files" readonly="">
                                </div>
                            </section>

                            <section>
                                <label class="label">Input with autocomlete</label>
                                <label class="input">
                                    <input type="text" list="list">
                                    <datalist id="list">
                                        <option value="Alexandra">Alexandra</option>
                                        <option value="Alice">Alice</option>
                                        <option value="Anastasia">Anastasia</option>
                                        <option value="Avelina">Avelina</option>
                                        <option value="Basilia">Basilia</option>
                                        <option value="Beatrice">Beatrice</option>
                                        <option value="Cassandra">Cassandra</option>
                                        <option value="Cecil">Cecil</option>
                                        <option value="Clemencia">Clemencia</option>
                                        <option value="Desiderata">Desiderata</option>
                                        <option value="Dionisia">Dionisia</option>
                                        <option value="Edith">Edith</option>
                                        <option value="Eleanora">Eleanora</option>
                                        <option value="Elizabeth">Elizabeth</option>
                                        <option value="Emma">Emma</option>
                                        <option value="Felicia">Felicia</option>
                                        <option value="Florence">Florence</option>
                                        <option value="Galiana">Galiana</option>
                                        <option value="Grecia">Grecia</option>
                                        <option value="Helen">Helen</option>
                                        <option value="Helewisa">Helewisa</option>
                                        <option value="Idonea">Idonea</option>
                                        <option value="Isabel">Isabel</option>
                                        <option value="Joan">Joan</option>
                                        <option value="Juliana">Juliana</option>
                                        <option value="Karla">Karla</option>
                                        <option value="Karyn">Karyn</option>
                                        <option value="Kate">Kate</option>
                                        <option value="Lakisha">Lakisha</option>
                                        <option value="Lana">Lana</option>
                                        <option value="Laura">Laura</option>
                                        <option value="Leona">Leona</option>
                                        <option value="Mandy">Mandy</option>
                                        <option value="Margaret">Margaret</option>
                                        <option value="Maria">Maria</option>
                                        <option value="Nanacy">Nanacy</option>
                                        <option value="Nicole">Nicole</option>
                                        <option value="Olga">Olga</option>
                                        <option value="Pamela">Pamela</option>
                                        <option value="Patricia">Patricia</option>
                                        <option value="Qiana">Qiana</option>
                                        <option value="Rachel">Rachel</option>
                                        <option value="Ramona">Ramona</option>
                                        <option value="Samantha">Samantha</option>
                                        <option value="Sandra">Sandra</option>
                                        <option value="Tanya">Tanya</option>
                                        <option value="Teresa">Teresa</option>
                                        <option value="Ursula">Ursula</option>
                                        <option value="Valerie">Valerie</option>
                                        <option value="Veronica">Veronica</option>
                                        <option value="Wilma">Wilma</option>
                                        <option value="Yasmin">Yasmin</option>
                                        <option value="Zelma">Zelma</option>
                                    </datalist> </label>
                                <div class="note">
                                    <strong>Note:</strong> works in Chrome, Firefox, Opera and IE10.
                                </div>
                            </section>
                        </fieldset>

                        <fieldset>

                            <section>
                                <label class="label">Select Small</label>
                                <label class="select">
                                    <select class="input-sm">
                                        <option value="0">Choose name</option>
                                        <option value="1">Alexandra</option>
                                        <option value="2">Alice</option>
                                        <option value="3">Anastasia</option>
                                        <option value="4">Avelina</option>
                                    </select> <i></i> </label>
                            </section>

                            <section>
                                <label class="label">Select default</label>
                                <label class="select">
                                    <select>
                                        <option value="0">Choose name</option>
                                        <option value="1">Alexandra</option>
                                        <option value="2">Alice</option>
                                        <option value="3">Anastasia</option>
                                        <option value="4">Avelina</option>
                                    </select> <i></i> </label>
                            </section>

                            <section>
                                <label class="label">Select Large</label>
                                <label class="select">
                                    <select class="input-lg">
                                        <option value="0">Choose name</option>
                                        <option value="1">Alexandra</option>
                                        <option value="2">Alice</option>
                                        <option value="3">Anastasia</option>
                                        <option value="4">Avelina</option>
                                    </select> <i></i> </label>
                            </section>

                            <section>
                                <label class="label">Multiple select</label>
                                <label class="select select-multiple">
                                    <select multiple="" class="custom-scroll">
                                        <option value="1">Alexandra</option>
                                        <option value="2">Alice</option>
                                        <option value="3">Anastasia</option>
                                        <option value="4">Avelina</option>
                                        <option value="5">Basilia</option>
                                        <option value="6">Beatrice</option>
                                        <option value="7">Cassandra</option>
                                        <option value="8">Clemencia</option>
                                        <option value="9">Desiderata</option>
                                    </select> </label>
                                <div class="note">
                                    <strong>Note:</strong> hold down the ctrl/cmd button to select multiple options.
                                </div>
                            </section>
                        </fieldset>

                        <fieldset>
                            <section>
                                <label class="label">Textarea</label>
                                <label class="textarea">
                                    <textarea rows="3" class="custom-scroll"></textarea>
                                </label>
                                <div class="note">
                                    <strong>Note:</strong> height of the textarea depends on the rows attribute.
                                </div>
                            </section>

                            <section>
                                <label class="label">Textarea resizable</label>
                                <label class="textarea textarea-resizable">
                                    <textarea rows="3" class="custom-scroll"></textarea>
                                </label>
                            </section>

                            <section>
                                <label class="label">Textarea expandable</label>
                                <label class="textarea textarea-expandable">
                                    <textarea rows="3" class="custom-scroll"></textarea>
                                </label>
                                <div class="note">
                                    <strong>Note:</strong> expands on focus.
                                </div>
                            </section>
                        </fieldset>

                        <fieldset>
                            <section>
                                <label class="label">Columned radios</label>
                                <div class="row">
                                    <div class="col col-4">
                                        <label class="radio">
                                            <input type="radio" name="radio" checked="checked">
                                            <i></i>Alexandra</label>
                                        <label class="radio">
                                            <input type="radio" name="radio">
                                            <i></i>Alice</label>
                                        <label class="radio">
                                            <input type="radio" name="radio">
                                            <i></i>Anastasia</label>
                                    </div>
                                    <div class="col col-4">
                                        <label class="radio">
                                            <input type="radio" name="radio">
                                            <i></i>Avelina</label>
                                        <label class="radio">
                                            <input type="radio" name="radio">
                                            <i></i>Basilia</label>
                                        <label class="radio">
                                            <input type="radio" name="radio">
                                            <i></i>Beatrice</label>
                                    </div>
                                    <div class="col col-4">
                                        <label class="radio">
                                            <input type="radio" name="radio">
                                            <i></i>Cassandra</label>
                                        <label class="radio">
                                            <input type="radio" name="radio">
                                            <i></i>Clemencia</label>
                                        <label class="radio">
                                            <input type="radio" name="radio">
                                            <i></i>Desiderata</label>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <label class="label">Inline radios</label>
                                <div class="inline-group">
                                    <label class="radio">
                                        <input type="radio" name="radio-inline" checked="checked">
                                        <i></i>Alexandra</label>
                                    <label class="radio">
                                        <input type="radio" name="radio-inline">
                                        <i></i>Alice</label>
                                    <label class="radio">
                                        <input type="radio" name="radio-inline">
                                        <i></i>Anastasia</label>
                                    <label class="radio">
                                        <input type="radio" name="radio-inline">
                                        <i></i>Avelina</label>
                                    <label class="radio">
                                        <input type="radio" name="radio-inline">
                                        <i></i>Beatrice</label>
                                </div>
                            </section>
                        </fieldset>

                        <fieldset>
                            <section>
                                <label class="label">Columned checkboxes</label>
                                <div class="row">
                                    <div class="col col-4">
                                        <label class="checkbox">
                                            <input type="checkbox" name="checkbox" checked="checked">
                                            <i></i>Alexandra</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="checkbox">
                                            <i></i>Alice</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="checkbox">
                                            <i></i>Anastasia</label>
                                    </div>
                                    <div class="col col-4">
                                        <label class="checkbox">
                                            <input type="checkbox" name="checkbox">
                                            <i></i>Avelina</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="checkbox">
                                            <i></i>Basilia</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="checkbox">
                                            <i></i>Beatrice</label>
                                    </div>
                                    <div class="col col-4">
                                        <label class="checkbox">
                                            <input type="checkbox" name="checkbox">
                                            <i></i>Cassandra</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="checkbox">
                                            <i></i>Clemencia</label>
                                        <label class="checkbox">
                                            <input type="checkbox" name="checkbox">
                                            <i></i>Desiderata</label>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <label class="label">Inline checkboxes</label>
                                <div class="inline-group">
                                    <label class="checkbox">
                                        <input type="checkbox" name="checkbox-inline" checked="checked">
                                        <i></i>Alexandra</label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="checkbox-inline">
                                        <i></i>Alice</label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="checkbox-inline">
                                        <i></i>Anastasia</label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="checkbox-inline">
                                        <i></i>Avelina</label>
                                    <label class="checkbox">
                                        <input type="checkbox" name="checkbox-inline">
                                        <i></i>Beatrice</label>
                                </div>
                            </section>
                        </fieldset>

                        <fieldset>
                            <div class="row">
                                <section class="col col-5">
                                    <label class="label">Radio Toggles</label>
                                    <label class="toggle">
                                        <input type="radio" name="radio-toggle" checked="checked">
                                        <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Alexandra</label>
                                    <label class="toggle">
                                        <input type="radio" name="radio-toggle">
                                        <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Anastasia</label>
                                    <label class="toggle">
                                        <input type="radio" name="radio-toggle">
                                        <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Avelina</label>
                                </section>

                                <div class="col col-2"></div>

                                <section class="col col-5">
                                    <label class="label">Checkbox Toggles</label>
                                    <label class="toggle">
                                        <input type="checkbox" name="checkbox-toggle" checked="checked">
                                        <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Cassandra</label>
                                    <label class="toggle">
                                        <input type="checkbox" name="checkbox-toggle">
                                        <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Clemencia</label>
                                    <label class="toggle">
                                        <input type="checkbox" name="checkbox-toggle">
                                        <i data-swchon-text="ON" data-swchoff-text="OFF"></i>Desiderata</label>
                                </section>
                            </div>
                        </fieldset>

                        <fieldset>
                            <section>
                                <label class="label">Ratings with different icons</label>
                                <div class="rating">
                                    <input type="radio" name="stars-rating" id="stars-rating-5">
                                    <label for="stars-rating-5"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="stars-rating" id="stars-rating-4">
                                    <label for="stars-rating-4"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="stars-rating" id="stars-rating-3">
                                    <label for="stars-rating-3"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="stars-rating" id="stars-rating-2">
                                    <label for="stars-rating-2"><i class="fa fa-star"></i></label>
                                    <input type="radio" name="stars-rating" id="stars-rating-1">
                                    <label for="stars-rating-1"><i class="fa fa-star"></i></label>
                                    Stars
                                </div>

                                <div class="rating">
                                    <input type="radio" name="trophies-rating" id="trophies-rating-7">
                                    <label for="trophies-rating-7"><i class="fa fa-trophy"></i></label>
                                    <input type="radio" name="trophies-rating" id="trophies-rating-6">
                                    <label for="trophies-rating-6"><i class="fa fa-trophy"></i></label>
                                    <input type="radio" name="trophies-rating" id="trophies-rating-5">
                                    <label for="trophies-rating-5"><i class="fa fa-trophy"></i></label>
                                    <input type="radio" name="trophies-rating" id="trophies-rating-4">
                                    <label for="trophies-rating-4"><i class="fa fa-trophy"></i></label>
                                    <input type="radio" name="trophies-rating" id="trophies-rating-3">
                                    <label for="trophies-rating-3"><i class="fa fa-trophy"></i></label>
                                    <input type="radio" name="trophies-rating" id="trophies-rating-2">
                                    <label for="trophies-rating-2"><i class="fa fa-trophy"></i></label>
                                    <input type="radio" name="trophies-rating" id="trophies-rating-1">
                                    <label for="trophies-rating-1"><i class="fa fa-trophy"></i></label>
                                    Trophies
                                </div>

                                <div class="rating">
                                    <input type="radio" name="asterisks-rating" id="asterisks-rating-10">
                                    <label for="asterisks-rating-10"><i class="fa fa-asterisk"></i></label>
                                    <input type="radio" name="asterisks-rating" id="asterisks-rating-9">
                                    <label for="asterisks-rating-9"><i class="fa fa-asterisk"></i></label>
                                    <input type="radio" name="asterisks-rating" id="asterisks-rating-8">
                                    <label for="asterisks-rating-8"><i class="fa fa-asterisk"></i></label>
                                    <input type="radio" name="asterisks-rating" id="asterisks-rating-7">
                                    <label for="asterisks-rating-7"><i class="fa fa-asterisk"></i></label>
                                    <input type="radio" name="asterisks-rating" id="asterisks-rating-6">
                                    <label for="asterisks-rating-6"><i class="fa fa-asterisk"></i></label>
                                    <input type="radio" name="asterisks-rating" id="asterisks-rating-5">
                                    <label for="asterisks-rating-5"><i class="fa fa-asterisk"></i></label>
                                    <input type="radio" name="asterisks-rating" id="asterisks-rating-4">
                                    <label for="asterisks-rating-4"><i class="fa fa-asterisk"></i></label>
                                    <input type="radio" name="asterisks-rating" id="asterisks-rating-3">
                                    <label for="asterisks-rating-3"><i class="fa fa-asterisk"></i></label>
                                    <input type="radio" name="asterisks-rating" id="asterisks-rating-2">
                                    <label for="asterisks-rating-2"><i class="fa fa-asterisk"></i></label>
                                    <input type="radio" name="asterisks-rating" id="asterisks-rating-1">
                                    <label for="asterisks-rating-1"><i class="fa fa-asterisk"></i></label>
                                    Asterisks
                                </div>
                                <div class="note">
                                    <strong>Note:</strong> you can use more than 300 vector icons for rating.
                                </div>
                            </section>
                        </fieldset>

                        <footer>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                            <button type="button" class="btn btn-default" onclick="window.history.back();">
                                Back
                            </button>
                        </footer>
                    </form>



                    <form id="checkout-form" class="smart-form" novalidate="novalidate">

                        <fieldset>
                            <div class="row">
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" name="fname" placeholder="First name">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-user"></i>
                                        <input type="text" name="lname" placeholder="Last name">
                                    </label>
                                </section>
                            </div>

                            <div class="row">
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-envelope-o"></i>
                                        <input type="email" name="email" placeholder="E-mail">
                                    </label>
                                </section>
                                <section class="col col-6">
                                    <label class="input"> <i class="icon-prepend fa fa-phone"></i>
                                        <input type="tel" name="phone" placeholder="Phone" data-mask="(999) 999-9999">
                                    </label>
                                </section>
                            </div>
                        </fieldset>

                        <fieldset>
                            <div class="row">
                                <section class="col col-5">
                                    <label class="select">
                                        <select name="country">
                                            <option value="0" selected="" disabled="">Country</option>
                                            <option value="244">Aaland Islands</option>
                                            <option value="1">Afghanistan</option>
                                            <option value="2">Albania</option>
                                            <option value="3">Algeria</option>
                                            <option value="4">American Samoa</option>
                                            <option value="5">Andorra</option>
                                            <option value="6">Angola</option>
                                            <option value="7">Anguilla</option>
                                            <option value="8">Antarctica</option>
                                            <option value="9">Antigua and Barbuda</option>
                                            <option value="10">Argentina</option>
                                            <option value="11">Armenia</option>
                                            <option value="12">Aruba</option>
                                            <option value="13">Australia</option>
                                            <option value="14">Austria</option>
                                            <option value="15">Azerbaijan</option>
                                            <option value="16">Bahamas</option>
                                            <option value="17">Bahrain</option>
                                            <option value="18">Bangladesh</option>
                                            <option value="19">Barbados</option>
                                            <option value="20">Belarus</option>
                                            <option value="21">Belgium</option>
                                            <option value="22">Belize</option>
                                            <option value="23">Benin</option>
                                            <option value="24">Bermuda</option>
                                            <option value="25">Bhutan</option>
                                            <option value="26">Bolivia</option>
                                            <option value="245">Bonaire, Sint Eustatius and Saba</option>
                                            <option value="27">Bosnia and Herzegovina</option>
                                            <option value="28">Botswana</option>
                                            <option value="29">Bouvet Island</option>
                                            <option value="30">Brazil</option>
                                            <option value="31">British Indian Ocean Territory</option>
                                            <option value="32">Brunei Darussalam</option>
                                            <option value="33">Bulgaria</option>
                                            <option value="34">Burkina Faso</option>
                                            <option value="35">Burundi</option>
                                            <option value="36">Cambodia</option>
                                            <option value="37">Cameroon</option>
                                            <option value="38">Canada</option>
                                            <option value="251">Canary Islands</option>
                                            <option value="39">Cape Verde</option>
                                            <option value="40">Cayman Islands</option>
                                            <option value="41">Central African Republic</option>
                                            <option value="42">Chad</option>
                                            <option value="43">Chile</option>
                                            <option value="44">China</option>
                                            <option value="45">Christmas Island</option>
                                            <option value="46">Cocos (Keeling) Islands</option>
                                            <option value="47">Colombia</option>
                                            <option value="48">Comoros</option>
                                            <option value="49">Congo</option>
                                            <option value="50">Cook Islands</option>
                                            <option value="51">Costa Rica</option>
                                            <option value="52">Cote D'Ivoire</option>
                                            <option value="53">Croatia</option>
                                            <option value="54">Cuba</option>
                                            <option value="246">Curacao</option>
                                            <option value="55">Cyprus</option>
                                            <option value="56">Czech Republic</option>
                                            <option value="237">Democratic Republic of Congo</option>
                                            <option value="57">Denmark</option>
                                            <option value="58">Djibouti</option>
                                            <option value="59">Dominica</option>
                                            <option value="60">Dominican Republic</option>
                                            <option value="61">East Timor</option>
                                            <option value="62">Ecuador</option>
                                            <option value="63">Egypt</option>
                                            <option value="64">El Salvador</option>
                                            <option value="65">Equatorial Guinea</option>
                                            <option value="66">Eritrea</option>
                                            <option value="67">Estonia</option>
                                            <option value="68">Ethiopia</option>
                                            <option value="69">Falkland Islands (Malvinas)</option>
                                            <option value="70">Faroe Islands</option>
                                            <option value="71">Fiji</option>
                                            <option value="72">Finland</option>
                                            <option value="74">France, skypolitan</option>
                                            <option value="75">French Guiana</option>
                                            <option value="76">French Polynesia</option>
                                            <option value="77">French Southern Territories</option>
                                            <option value="126">FYROM</option>
                                            <option value="78">Gabon</option>
                                            <option value="79">Gambia</option>
                                            <option value="80">Georgia</option>
                                            <option value="81">Germany</option>
                                            <option value="82">Ghana</option>
                                            <option value="83">Gibraltar</option>
                                            <option value="84">Greece</option>
                                            <option value="85">Greenland</option>
                                            <option value="86">Grenada</option>
                                            <option value="87">Guadeloupe</option>
                                            <option value="88">Guam</option>
                                            <option value="89">Guatemala</option>
                                            <option value="241">Guernsey</option>
                                            <option value="90">Guinea</option>
                                            <option value="91">Guinea-Bissau</option>
                                            <option value="92">Guyana</option>
                                            <option value="93">Haiti</option>
                                            <option value="94">Heard and Mc Donald Islands</option>
                                            <option value="95">Honduras</option>
                                            <option value="96">Hong Kong</option>
                                            <option value="97">Hungary</option>
                                            <option value="98">Iceland</option>
                                            <option value="99">India</option>
                                            <option value="100">Indonesia</option>
                                            <option value="101">Iran (Islamic Republic of)</option>
                                            <option value="102">Iraq</option>
                                            <option value="103">Ireland</option>
                                            <option value="104">Israel</option>
                                            <option value="105">Italy</option>
                                            <option value="106">Jamaica</option>
                                            <option value="107">Japan</option>
                                            <option value="240">Jersey</option>
                                            <option value="108">Jordan</option>
                                            <option value="109">Kazakhstan</option>
                                            <option value="110">Kenya</option>
                                            <option value="111">Kiribati</option>
                                            <option value="113">Korea, Republic of</option>
                                            <option value="114">Kuwait</option>
                                            <option value="115">Kyrgyzstan</option>
                                            <option value="116">Lao People's Democratic Republic</option>
                                            <option value="117">Latvia</option>
                                            <option value="118">Lebanon</option>
                                            <option value="119">Lesotho</option>
                                            <option value="120">Liberia</option>
                                            <option value="121">Libyan Arab Jamahiriya</option>
                                            <option value="122">Liechtenstein</option>
                                            <option value="123">Lithuania</option>
                                            <option value="124">Luxembourg</option>
                                            <option value="125">Macau</option>
                                            <option value="127">Madagascar</option>
                                            <option value="128">Malawi</option>
                                            <option value="129">Malaysia</option>
                                            <option value="130">Maldives</option>
                                            <option value="131">Mali</option>
                                            <option value="132">Malta</option>
                                            <option value="133">Marshall Islands</option>
                                            <option value="134">Martinique</option>
                                            <option value="135">Mauritania</option>
                                            <option value="136">Mauritius</option>
                                            <option value="137">Mayotte</option>
                                            <option value="138">Mexico</option>
                                            <option value="139">Micronesia, Federated States of</option>
                                            <option value="140">Moldova, Republic of</option>
                                            <option value="141">Monaco</option>
                                            <option value="142">Mongolia</option>
                                            <option value="242">Montenegro</option>
                                            <option value="143">Montserrat</option>
                                            <option value="144">Morocco</option>
                                            <option value="145">Mozambique</option>
                                            <option value="146">Myanmar</option>
                                            <option value="147">Namibia</option>
                                            <option value="148">Nauru</option>
                                            <option value="149">Nepal</option>
                                            <option value="150">Netherlands</option>
                                            <option value="151">Netherlands Antilles</option>
                                            <option value="152">New Caledonia</option>
                                            <option value="153">New Zealand</option>
                                            <option value="154">Nicaragua</option>
                                            <option value="155">Niger</option>
                                            <option value="156">Nigeria</option>
                                            <option value="157">Niue</option>
                                            <option value="158">Norfolk Island</option>
                                            <option value="112">North Korea</option>
                                            <option value="159">Northern Mariana Islands</option>
                                            <option value="160">Norway</option>
                                            <option value="161">Oman</option>
                                            <option value="162">Pakistan</option>
                                            <option value="163">Palau</option>
                                            <option value="247">Palestinian Territory, Occupied</option>
                                            <option value="164">Panama</option>
                                            <option value="165">Papua New Guinea</option>
                                            <option value="166">Paraguay</option>
                                            <option value="167">Peru</option>
                                            <option value="168">Philippines</option>
                                            <option value="169">Pitcairn</option>
                                            <option value="170">Poland</option>
                                            <option value="171">Portugal</option>
                                            <option value="172">Puerto Rico</option>
                                            <option value="173">Qatar</option>
                                            <option value="174">Reunion</option>
                                            <option value="175">Romania</option>
                                            <option value="176">Russian Federation</option>
                                            <option value="177">Rwanda</option>
                                            <option value="178">Saint Kitts and Nevis</option>
                                            <option value="179">Saint Lucia</option>
                                            <option value="180">Saint Vincent and the Grenadines</option>
                                            <option value="181">Samoa</option>
                                            <option value="182">San Marino</option>
                                            <option value="183">Sao Tome and Principe</option>
                                            <option value="184">Saudi Arabia</option>
                                            <option value="185">Senegal</option>
                                            <option value="243">Serbia</option>
                                            <option value="186">Seychelles</option>
                                            <option value="187">Sierra Leone</option>
                                            <option value="188">Singapore</option>
                                            <option value="189">Slovak Republic</option>
                                            <option value="190">Slovenia</option>
                                            <option value="191">Solomon Islands</option>
                                            <option value="192">Somalia</option>
                                            <option value="193">South Africa</option>
                                            <option value="194">South Georgia &amp; South Sandwich Islands</option>
                                            <option value="248">South Sudan</option>
                                            <option value="195">Spain</option>
                                            <option value="196">Sri Lanka</option>
                                            <option value="249">St. Barthelemy</option>
                                            <option value="197">St. Helena</option>
                                            <option value="250">St. Martin (French part)</option>
                                            <option value="198">St. Pierre and Miquelon</option>
                                            <option value="199">Sudan</option>
                                            <option value="200">Suriname</option>
                                            <option value="201">Svalbard and Jan Mayen Islands</option>
                                            <option value="202">Swaziland</option>
                                            <option value="203">Sweden</option>
                                            <option value="204">Switzerland</option>
                                            <option value="205">Syrian Arab Republic</option>
                                            <option value="206">Taiwan</option>
                                            <option value="207">Tajikistan</option>
                                            <option value="208">Tanzania, United Republic of</option>
                                            <option value="209">Thailand</option>
                                            <option value="210">Togo</option>
                                            <option value="211">Tokelau</option>
                                            <option value="212">Tonga</option>
                                            <option value="213">Trinidad and Tobago</option>
                                            <option value="214">Tunisia</option>
                                            <option value="215">Turkey</option>
                                            <option value="216">Turkmenistan</option>
                                            <option value="217">Turks and Caicos Islands</option>
                                            <option value="218">Tuvalu</option>
                                            <option value="219">Uganda</option>
                                            <option value="220">Ukraine</option>
                                            <option value="221">United Arab Emirates</option>
                                            <option value="222">United Kingdom</option>
                                            <option value="223">United States</option>
                                            <option value="224">United States Minor Outlying Islands</option>
                                            <option value="225">Uruguay</option>
                                            <option value="226">Uzbekistan</option>
                                            <option value="227">Vanuatu</option>
                                            <option value="228">Vatican City State (Holy See)</option>
                                            <option value="229">Venezuela</option>
                                            <option value="230">Viet Nam</option>
                                            <option value="231">Virgin Islands (British)</option>
                                            <option value="232">Virgin Islands (U.S.)</option>
                                            <option value="233">Wallis and Futuna Islands</option>
                                            <option value="234">Western Sahara</option>
                                            <option value="235">Yemen</option>
                                            <option value="238">Zambia</option>
                                            <option value="239">Zimbabwe</option>
                                        </select> <i></i> </label>
                                </section>

                                <section class="col col-4">
                                    <label class="input">
                                        <input type="text" name="city" placeholder="City">
                                    </label>
                                </section>

                                <section class="col col-3">
                                    <label class="input">
                                        <input type="text" name="code" placeholder="Post code">
                                    </label>
                                </section>
                            </div>

                            <section>
                                <label for="address2" class="input">
                                    <input type="text" name="address2" id="address2" placeholder="Address">
                                </label>
                            </section>

                            <section>
                                <label class="textarea">
                                    <textarea rows="3" name="info" placeholder="Additional info"></textarea>
                                </label>
                            </section>
                        </fieldset>

                        <fieldset>
                            <section>
                                <div class="inline-group">
                                    <label class="radio">
                                        <input type="radio" name="radio-inline" checked="">
                                        <i></i>Visa</label>
                                    <label class="radio">
                                        <input type="radio" name="radio-inline">
                                        <i></i>MasterCard</label>
                                    <label class="radio">
                                        <input type="radio" name="radio-inline">
                                        <i></i>American Express</label>
                                </div>
                            </section>

                            <section>
                                <label class="input">
                                    <input type="text" name="name" placeholder="Name on card">
                                </label>
                            </section>

                            <div class="row">
                                <section class="col col-10">
                                    <label class="input">
                                        <input type="text" name="card" placeholder="Card number"
                                            data-mask="9999-9999-9999-9999">
                                    </label>
                                </section>
                                <section class="col col-2">
                                    <label class="input">
                                        <input type="text" name="cvv" placeholder="CVV2" data-mask="999">
                                    </label>
                                </section>
                            </div>

                            <div class="row">
                                <label class="label col col-4">Expiration date</label>
                                <section class="col col-5">
                                    <label class="select">
                                        <select name="month">
                                            <option value="0" selected="" disabled="">Month</option>
                                            <option value="1">January</option>
                                            <option value="1">February</option>
                                            <option value="3">March</option>
                                            <option value="4">April</option>
                                            <option value="5">May</option>
                                            <option value="6">June</option>
                                            <option value="7">July</option>
                                            <option value="8">August</option>
                                            <option value="9">September</option>
                                            <option value="10">October</option>
                                            <option value="11">November</option>
                                            <option value="12">December</option>
                                        </select> <i></i> </label>
                                </section>
                                <section class="col col-3">
                                    <label class="input">
                                        <input type="text" name="year" placeholder="Year" data-mask="2099">
                                    </label>
                                </section>
                            </div>
                        </fieldset>

                        <footer>
                            <button type="submit" class="btn btn-primary">
                                Validate Form
                            </button>
                        </footer>
                    </form>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    Cancel
                </button>
                <button type="button" class="btn btn-primary" id="i-agree">
                    <i class="fa fa-check"></i> I Agree
                </button>

                <button type="button" class="btn btn-danger pull-left" id="print">
                    <i class="fa fa-print"></i> Print
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- PAGE FOOTER -->
<div class="page-footer">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <span class="txt-color-white">SmartAdmin 1.5 <span class="hidden-xs"> - Web Application Framework</span>
                © 2014-2015</span>
        </div>

        <div class="col-xs-6 col-sm-6 text-right hidden-xs">
            <div class="txt-color-white inline-block">
                <i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i>
                    <strong>52 mins ago &nbsp;</strong> </i>
                <div class="btn-group dropup">
                    <button class="btn btn-xs dropdown-toggle bg-color-blue txt-color-white" data-toggle="dropdown">
                        <i class="fa fa-link"></i> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right text-left">
                        <li>
                            <div class="padding-5">
                                <p class="txt-color-darken font-sm no-margin">Download Progress</p>
                                <div class="progress progress-micro no-margin">
                                    <div class="progress-bar progress-bar-success" style="width: 50%;"></div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="padding-5">
                                <p class="txt-color-darken font-sm no-margin">Server Load</p>
                                <div class="progress progress-micro no-margin">
                                    <div class="progress-bar progress-bar-success" style="width: 20%;"></div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="padding-5">
                                <p class="txt-color-darken font-sm no-margin">Memory Load <span
                                        class="text-danger">*critical*</span></p>
                                <div class="progress progress-micro no-margin">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%;"></div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="padding-5">
                                <button class="btn btn-block btn-default">refresh</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PAGE FOOTER -->

<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
<div id="shortcut">
    <ul>
        <li>
            <a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i
                        class="fa fa-envelope fa-4x"></i> <span>Mail <span
                            class="label pull-right bg-color-darken">14</span></span> </span> </a>
        </li>
        <li>
            <a href="calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox">
                    <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
        </li>
        <li>
            <a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i
                        class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
        </li>
        <li>
            <a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i
                        class="fa fa-book fa-4x"></i> <span>Invoice <span
                            class="label pull-right bg-color-darken">99</span></span> </span> </a>
        </li>
        <li>
            <a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i
                        class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
        </li>
        <li>
            <a href="profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox">
                    <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
        </li>
    </ul>
</div>
<!-- END SHORTCUT AREA -->

<!--================================================== -->

<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
<script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>

<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
if (!window.jQuery) {
    document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');
}
</script>

<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script>
if (!window.jQuery.ui) {
    document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');
}
</script>

<!-- IMPORTANT: APP CONFIG -->
<script src="js/app.config.js"></script>

<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>

<!-- BOOTSTRAP JS -->
<script src="js/bootstrap/bootstrap.min.js"></script>

<!-- CUSTOM NOTIFICATION -->
<script src="js/notification/SmartNotification.min.js"></script>

<!-- JARVIS WIDGETS -->
<script src="js/smartwidgets/jarvis.widget.min.js"></script>

<!-- EASY PIE CHARTS -->
<script src="js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

<!-- SPARKLINES -->
<script src="js/plugin/sparkline/jquery.sparkline.min.js"></script>

<!-- JQUERY VALIDATE -->
<script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>

<!-- JQUERY MASKED INPUT -->
<script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>

<!-- JQUERY SELECT2 INPUT -->
<script src="js/plugin/select2/select2.min.js"></script>

<!-- JQUERY UI + Bootstrap Slider -->
<script src="js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

<!-- browser msie issue fix -->
<script src="js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

<!-- FastClick: For mobile devices -->
<script src="js/plugin/fastclick/fastclick.min.js"></script>

<!--[if IE 8]>

		<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

<!-- Demo purpose only -->
<script src="js/demo.min.js"></script>

<!-- MAIN APP JS FILE -->
<script src="js/app.min.js"></script>

<!-- ENHANCEMENT PLUGINS : NOT A REQUIREMENT -->
<!-- Voice command : plugin -->
<script src="js/speech/voicecommand.min.js"></script>

<!-- SmartChat UI : plugin -->
<script src="js/smart-chat-ui/smart.chat.ui.min.js"></script>
<script src="js/smart-chat-ui/smart.chat.manager.min.js"></script>

<!-- PAGE RELATED PLUGIN(S) -->
<script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
<script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
<script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
<script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
<script src="js/plugin/datatable-responsive/datatables.responsive.min.js"></script>

<!-- <script type="text/javascript">
		        $(document).ready(function() {
		            $('#dt_basic').DataTable({
		                "processing": true,
		                "serverSide": true,
		                "ajax": {
		                    "url": "data/serverside.php", // Adjust the URL to your server-side script
		                    "type": "POST"
		                }
		            });
		        });
		    </script> -->

<script type="text/javascript">
// DO NOT REMOVE : GLOBAL FUNCTIONS!

$(document).ready(function() {

    pageSetUp();

    /* // DOM Position key index //
		
			l - Length changing (dropdown)
			f - Filtering input (search)
			t - The Table! (datatable)
			i - Information (records)
			p - Pagination (paging)
			r - pRocessing 
			< and > - div elements
			<"#id" and > - div with an id
			<"class" and > - div with a class
			<"#id.class" and > - div with an id and class
			
			Also see: http://legacy.datatables.net/usage/features
			*/

    /* BASIC ;*/
    var responsiveHelper_dt_basic = undefined;
    var responsiveHelper_datatable_fixed_column = undefined;
    var responsiveHelper_datatable_col_reorder = undefined;
    var responsiveHelper_datatable_tabletools = undefined;

    var breakpointDefinition = {
        tablet: 1024,
        phone: 480
    };

    // var kategori = getUrlParameter('kategori');
    // var label = getUrlParameter('label');
    var ajaxUrl = "data/serverside-umum.php?table=warga";
    
    // if (kategori && label) {
    //     ajaxUrl += "&kategori=" + kategori + "&label=" + label;
    // }

    $('#dt_basic').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>" +
            "t" +
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth": true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            // "url": "data/serverside-umum.php?table=warga", // Adjust the URL to your server-side script
            // "url": "data/serverside-umum.php?table=warga&kategori=jk&label=L", // Adjust the URL to your server-side script
            
            "url": ajaxUrl,
            "type": "POST"
        },
        "preDrawCallback": function() {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper_dt_basic) {
                responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'),
                    breakpointDefinition);
            }
        },
        "rowCallback": function(nRow) {
            responsiveHelper_dt_basic.createExpandIcon(nRow);
        },
        "drawCallback": function(oSettings) {
            responsiveHelper_dt_basic.respond();
        }
    });

    /* END BASIC */

    /* COLUMN FILTER  */
    var otable = $('#datatable_fixed_column').DataTable({
        //"bFilter": false,
        //"bInfo": false,
        //"bLengthChange": false
        //"bAutoWidth": false,
        //"bPaginate": false,
        //"bStateSave": true // saves sort state using localStorage
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6 hidden-xs'f><'col-sm-6 col-xs-12 hidden-xs'<'toolbar'>>r>" +
            "t" +
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
        "autoWidth": true,
        "preDrawCallback": function() {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper_datatable_fixed_column) {
                responsiveHelper_datatable_fixed_column = new ResponsiveDatatablesHelper($(
                    '#datatable_fixed_column'), breakpointDefinition);
            }
        },
        "rowCallback": function(nRow) {
            responsiveHelper_datatable_fixed_column.createExpandIcon(nRow);
        },
        "drawCallback": function(oSettings) {
            responsiveHelper_datatable_fixed_column.respond();
        }

    });

    // custom toolbar
    $("div.toolbar").html(
        '<div class="text-right"><img src="img/logo.png" alt="SmartAdmin" style="width: 111px; margin-top: 3px; margin-right: 10px;"></div>'
    );

    // Apply the filter
    $("#datatable_fixed_column thead th input[type=text]").on('keyup change', function() {

        otable
            .column($(this).parent().index() + ':visible')
            .search(this.value)
            .draw();

    });
    /* END COLUMN FILTER */

    /* COLUMN SHOW - HIDE */
    $('#datatable_col_reorder').dataTable({
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'C>r>" +
            "t" +
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
        "autoWidth": true,
        "preDrawCallback": function() {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper_datatable_col_reorder) {
                responsiveHelper_datatable_col_reorder = new ResponsiveDatatablesHelper($(
                    '#datatable_col_reorder'), breakpointDefinition);
            }
        },
        "rowCallback": function(nRow) {
            responsiveHelper_datatable_col_reorder.createExpandIcon(nRow);
        },
        "drawCallback": function(oSettings) {
            responsiveHelper_datatable_col_reorder.respond();
        }
    });

    /* END COLUMN SHOW - HIDE */

    /* TABLETOOLS */
    $('#datatable_tabletools').dataTable({

        // Tabletools options: 
        //   https://datatables.net/extensions/tabletools/button_options
        "sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-6 hidden-xs'T>r>" +
            "t" +
            "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-sm-6 col-xs-12'p>>",
        "oTableTools": {
            "aButtons": [
                "copy",
                "csv",
                "xls",
                {
                    "sExtends": "pdf",
                    "sTitle": "SmartAdmin_PDF",
                    "sPdfMessage": "SmartAdmin PDF Export",
                    "sPdfSize": "letter"
                },
                {
                    "sExtends": "print",
                    "sMessage": "Generated by SmartAdmin <i>(press Esc to close)</i>"
                }
            ],
            "sSwfPath": "js/plugin/datatables/swf/copy_csv_xls_pdf.swf"
        },
        "autoWidth": true,
        "preDrawCallback": function() {
            // Initialize the responsive datatables helper once.
            if (!responsiveHelper_datatable_tabletools) {
                responsiveHelper_datatable_tabletools = new ResponsiveDatatablesHelper($(
                    '#datatable_tabletools'), breakpointDefinition);
            }
        },
        "rowCallback": function(nRow) {
            responsiveHelper_datatable_tabletools.createExpandIcon(nRow);
        },
        "drawCallback": function(oSettings) {
            responsiveHelper_datatable_tabletools.respond();
        }
    });

    /* END TABLETOOLS */

})
</script>

<!-- Your GOOGLE ANALYTICS CODE Below -->

</body>

</html>