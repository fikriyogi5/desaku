<?php
require_once('php/functions.php'); // Memanggil file functions.php

$function = new Functions(); // Membuat objek Functions

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit'])) {
        // Form edit data
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $jk = $_POST['jk'];
        $hobi = implode(', ', $_POST['hobi']);
        $gambar = $_FILES['gambar']['name'];

        // Memindahkan file gambar yang diunggah ke folder tujuan jika ada gambar baru
        if (!empty($gambar)) {
            move_uploaded_file($_FILES['gambar']['tmp_name'], 'uploads/' . $gambar);
        }

        if ($function->updateData($id, $nama, $email, $jk, $hobi, $gambar)) {
            echo "Data berhasil diupdate!";
        } else {
            echo "Gagal mengupdate data.";
        }
    } elseif (isset($_POST['ganti_password'])) {
        // Form ganti password
        $id = $_POST['id'];
        $passwordLama = $_POST["passwordLama"];
        $passwordBaru = $_POST["passwordBaru"];
        $konfirmasiPasswordBaru = $_POST["konfirmasiPasswordBaru"];

        // Panggil fungsi untuk mengganti password
        $result = $function->updatePassword($id, $passwordLama, $passwordBaru, $konfirmasiPasswordBaru);

        if ($result) {
            echo "Password berhasil diubah.";
        } else {
            echo "Gagal mengganti password. Pastikan password lama benar dan password baru cocok dengan konfirmasi.";
        }
    }
}


// Ambil data berdasarkan ID yang akan diedit
if (isset($_GET['id'])) {
    // $id = $_GET['id'];
    $id = decrypt($_GET['id'], $key);
    $data = $function->getDataById("id", $id);
    $nik = $data['nik'];
    $kk = $data['kk'];
    if ($data) {
include "header.php";
 include 'menu.php'; ?>
        <!-- END NAVIGATION -->
        <!-- MAIN PANEL -->
        <div id="main" role="main">
        <!-- RIBBON -->
        <div id="ribbon">
            <span class="ribbon-button-alignment"> 
            <span id="refresh" class="btn btn-ribbon" data-action="resetWidgets" data-title="refresh"  rel="tooltip" data-placement="bottom" data-original-title="<i class='text-warning fa fa-warning'></i> Warning! This will reset all your widget settings." data-html="true">
            <i class="fa fa-refresh"></i>
            </span> 
            </span>
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li>Home</li>
                <li>App Views</li>
                <li>Profile</li>
            </ol>
            
        </div>
        <!-- END RIBBON -->
        <!-- MAIN CONTENT -->
        <div id="content">
            <!-- Bread crumb is created dynamically -->
            <!-- row -->
            <!-- <div class="row">
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
                    <h1 class="page-title txt-color-blueDark">
                        <i class="fa-fw fa fa-user"></i> <?= $data['nama']; ?> 
                    </h1>
                </div>
            </div> -->
            <!-- end row -->
            <!-- row -->
            <div class="row">
                <div class="col-sm-12">
                    <section class="content">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="nav-tabs-custom">
                                    <ul class="nav nav-tabs navlistscroll">
                                        <li class="active"><a href="#overview" data-toggle="tab" aria-expanded="true"><i class="fa fa-th"></i> Overview</a></li>
                                        <li ><a href="#Visit" data-toggle="tab" aria-expanded="true"><i class="far fa-caret-square-down"></i> Riwayat Kunjungan</a></li>
                                        <li><a href="#labinvestigation" data-toggle="tab" aria-expanded="true"><i class="fas fa-diagnoses"></i> Anggota Keluarga</a></li>
                                        <li><a href="#treatment_history" data-toggle="tab" aria-expanded="true"><i class="fas fa-diagnoses"></i> Laporan Masuk</a></li>
                                        <li><a href="#timeline" data-toggle="tab" aria-expanded="true"><i class="far fa-calendar-check"></i> Kasus Individu</a></li>
                                        <li><a href="#prints" data-toggle="tab" aria-expanded="true"><i class="far fa-calendar-check"></i> Cetak Surat</a></li>
                                        <li><a href="#r_sekolah" data-toggle="tab" aria-expanded="true"><i class="far fa-calendar-check"></i> Sekolah</a></li>
                                        <li><a href="#r_permohonan" data-toggle="tab" aria-expanded="true"><i class="far fa-calendar-check"></i> Riwayat Permohonan</a></li>
                                        <li><a href="#sekolah" data-toggle="tab" aria-expanded="true"><i class="far fa-calendar-check"></i> Riwayat Pengobatan</a></li>
                                        <li><a href="#kontak" data-toggle="tab" aria-expanded="true"><i class="far fa-calendar-check"></i> Kontak</a></li>
                                        <li><a href="#sekolah" data-toggle="tab" aria-expanded="true"><i class="far fa-calendar-check"></i> Bank</a></li>
                                        <li><a href="#sekolah" data-toggle="tab" aria-expanded="true"><i class="far fa-calendar-check"></i> Riwayat Nilai</a></li>
                                        <li><a href="#sekolah" data-toggle="tab" aria-expanded="true"><i class="far fa-calendar-check"></i> Riwayat Iuran</a></li>
                                        <li><a href="#sekolah" data-toggle="tab" aria-expanded="true"><i class="far fa-calendar-check"></i> Riwayat Pekerjaan</a></li>
                                        <li><a href="#sekolah" data-toggle="tab" aria-expanded="true"><i class="far fa-calendar-check"></i> Pengaturan</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane tab-content-height active" id="overview">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-12 border-r">
                                                    <div class="box-header border-b mb10 pl-0 pt0">
                                                        <h3 class="text-uppercase bolds mt0 ptt10 pull-left font14"><?= $data['nama']; ?> (<?= $function->calculateAgeFromDateOfBirth($data['tanggal_lahir']);?>)</h3>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-4 col-sm-12 ptt10">
                                                            <img width="115" height="115" class="profile-user-img img-responsive img-rounded" src="img/avatars/<?= $function->displayProfileImage($data['gambar'], $data['jk'])?>" >
                                                        </div>
                                                        <!--./col-lg-5-->
                                                        <div class="col-lg-9 col-md-8 col-sm-12">
                                                            <table class="table table-bordered mb0">
                                                                <tr>
                                                                    <td class="bolds">Jenis Kelamin</td>
                                                                    <td><?= $function->getGenderDescription($data['jk'])?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bolds">Umur</td>
                                                                    <td><?= $function->calculateAgeFromDateOfBirth($data['tanggal_lahir']);?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bolds">Nama Panggilan</td>
                                                                    <td><?= $data['alias'];?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="bolds">Phone</td>
                                                                    <td>98189818456</td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <!--./col-lg-7-->
                                                    </div>
                                                    <!--./row-->
                                                    <hr class="hr-panel-heading hr-10">
                                                    <p><b><i class="fa fa-tag"></i> Known Allergies:</b></p>
                                                    <ul>
                                                    </ul>
                                                    <hr class="hr-panel-heading hr-10">
                                                    <p><b><i class="fa fa-tag"></i> Findings:</b></p>
                                                    <ul>
                                                    </ul>
                                                    <hr class="hr-panel-heading hr-10">
                                                    <p><b><i class="fa fa-tag"></i> Symptoms:</b></p>
                                                    <ul> 
                                                    </ul>
                                                    <hr class="hr-panel-heading hr-10">
                                                    <div class="box-header mb10 pl-0">
                                                        <h3 class="text-uppercase bolds mt0 ptt10 pull-left font14">Consultant Doctor</h3>
                                                        <div class="pull-right">
                                                            <div class="editviewdelete-icon pt8">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="staff-members">
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a  href="https://demo.smart-hospital.in/admin/staff/profile/4">
                                                                <img src="https://demo.smart-hospital.in/uploads/staff_images/4.jpg?1694980088" class="member-profile-small media-object"></a>
                                                            </div>
                                                            <div class="media-body">
                                                                <a  href="https://demo.smart-hospital.in/admin/staff/profile/4"class="pull-right text-danger pt4" data-toggle="tooltip" data-placement="top" ></a>
                                                                <h5 class="media-heading"><a href="https://demo.smart-hospital.in/admin/staff/profile/4">Sansa Gomez  (9008)</a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <!--./media-->
                                                        <div class="media">
                                                            <div class="media-left">
                                                                <a  href="https://demo.smart-hospital.in/admin/staff/profile/12"> <img src="https://demo.smart-hospital.in/uploads/staff_images/no_image.png?1694980088" class="member-profile-small media-object"></a>
                                                            </div>
                                                            <div class="media-body">
                                                                <a  href="https://demo.smart-hospital.in/admin/staff/profile/12"class="pull-right text-danger pt4" data-toggle="tooltip" data-placement="top" ></a>
                                                                <h5 class="media-heading"><a href="https://demo.smart-hospital.in/admin/staff/profile/12">Reyan Jain  (9011)</a>
                                                                </h5>
                                                            </div>
                                                        </div>
                                                        <!--./media-->
                                                    </div>
                                                    <!--./staff-members-->
                                                    <hr class="hr-panel-heading hr-10">
                                                    <div class="box-header mb10 pl-0">
                                                        <h3 class="text-uppercase bolds mt0 ptt10 pull-left font14">Timeline</h3>
                                                        <div class="pull-right">
                                                            <div class="editviewdelete-icon pt8">
                                                                <a href="#" data-toggle="tooltip" data-placement="top" title="add-edit-members"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-header no-border">
                                                        <div id="timeline_list">
                                                            <ul>                        
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--./col-lg-6-->
                                                <div class="col-lg-6 col-md-6 col-sm-12">
                                                    <div class="box-header border-b mb10 pl-0 pt0">
                                                        <h3 class="text-uppercase bolds mt0 ptt10 pull-left font14">Medical History</h3>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                            <div class="box box-info">
                                                                <div class="box-body">
                                                                    <div class="chart">
                                                                        <canvas id="medical-history-chart" height="300"></canvas>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--./col-lg-7-->
                                                    </div>
                                                    <div class="">
                                                        <div class="">
                                                            <div class="box-header mb10 pl-0">
                                                                <h3 class="text-uppercase bolds mt0 ptt10 pull-left font14">Visit Details</h3>
                                                                <div class="pull-right">
                                                                    <div class="editviewdelete-icon pt8">
                                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="add-edit-members"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="staff-members">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped table-bordered table-hover "  data-export-title="Zak Crawkly (380) OPD Details">
                                                                        <thead>
                                                                            <th>OPD No</th>
                                                                            <th>Case ID</th>
                                                                            <th>Appointment Date</th>
                                                                            <th>Consultant</th>
                                                                            <th>Reference</th>
                                                                            <th>Symptoms</th>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td><a href= "https://demo.smart-hospital.in/admin/patient/visitdetails/380/4757">OPDN4757</a></td>
                                                                                <td>4781</td>
                                                                                <td>09/30/2023 03:46 PM</td>
                                                                                <td>Sansa Gomez (9008)</td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><a href= "https://demo.smart-hospital.in/admin/patient/visitdetails/380/3353">OPDN3353</a></td>
                                                                                <td>3377</td>
                                                                                <td>03/15/2023 01:38 PM</td>
                                                                                <td>Sansa Gomez (9008)</td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><a href= "https://demo.smart-hospital.in/admin/patient/visitdetails/380/1786">OPDN1786</a></td>
                                                                                <td>1810</td>
                                                                                <td>09/02/2022 12:59 PM</td>
                                                                                <td>Sansa Gomez (9008)</td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><a href= "https://demo.smart-hospital.in/admin/patient/visitdetails/380/1574">OPDN1574</a></td>
                                                                                <td>1595</td>
                                                                                <td>07/02/2022 10:59 AM</td>
                                                                                <td>Reyan Jain (9011)</td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><a href= "https://demo.smart-hospital.in/admin/patient/visitdetails/380/1573">OPDN1573</a></td>
                                                                                <td>1594</td>
                                                                                <td>07/02/2022 10:58 AM</td>
                                                                                <td>Reyan Jain (9011)</td>
                                                                                <td></td>
                                                                                <td></td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <!--./staff-members-->
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div class="">
                                                            <div class="box-header mb10 pl-0">
                                                                <h3 class="text-uppercase bolds mt0 ptt10 pull-left font14">Anggota Keluarga</h3>
                                                                <div class="pull-right">
                                                                    <div class="editviewdelete-icon pt8">
                                                                        <a href="#" data-toggle="tooltip" data-placement="top" title="add-edit-members"></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="staff-members">
                                                                <div class="table-responsive">
                                                                	
                                                                </div>
                                                            </div>
                                                            <!--./staff-members-->
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <div >
                                                            <div class="box-header mb10 pl-0">
                                                                <h3 class="text-uppercase bolds mt0 ptt10 pull-left font14">Treatment History</h3>
                                                                <div class="pull-right">
                                                                    <div class="editviewdelete-icon pt8">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="staff-members">
                                                                <div class="table-responsive">
                                                                </div>
                                                            </div>
                                                            <!--./staff-members-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--./col-lg-6-->
                                            </div>
                                            <!--./row-->  
                                        </div>
                                        <!--#/overview-->
                                        <div class="tab-pane" id="Visit">
                                            <div class="box-tab-header">
                                                <h3 class="box-tab-title">Visits</h3>
                                                <div class="box-tab-tools">
                                                    <a href="#"  onclick="getRevisitRecord('4757')" class="btn btn-primary btn-sm revisitpatient"  data-toggle="modal" title=""><i class="fas fa-exchange-alt"></i> New Visit                                            </a>
                                                </div>
                                            </div>
                                            <div class="download_label">Zak Crawkly (380) OPD Details</div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover ajaxlistvisit" cellspacing="0" width="100%" data-export-title="Zak Crawkly (380) OPD Details">
                                                    <thead>
                                                        <th>OPD No</th>
                                                        <th>Case ID</th>
                                                        <th>Appointment Date</th>
                                                        <th>Consultant</th>
                                                        <th>Reference</th>
                                                        <th>Symptoms</th>
                                                        <th>Previous Medical Issue</th>
                                                        <th class="text-right noExport">Action</th>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="r_permohonan">
                                            <div class="box-tab-header">
                                                <h3 class="box-tab-title">Riwayat Permohonan Perubahan Data</h3>
                                                <div class="box-tab-tools">
                                                    <a href="#"  onclick="getRevisitRecord('4757')" class="btn btn-primary btn-sm revisitpatient"  data-toggle="modal" title=""><i class="fas fa-exchange-alt"></i> New Visit                                            </a>
                                                </div>
                                            </div>
                                            <div class="download_label">Zak Crawkly (380) OPD Details</div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover ajaxlistvisit" cellspacing="0" width="100%" data-export-title="Zak Crawkly (380) OPD Details">
                                                    <thead>
                                                        <th>OPD No</th>
                                                        <th>Case ID</th>
                                                        <th>Appointment Date</th>
                                                        <th>Consultant</th>
                                                        <th>Reference</th>
                                                        <th>Symptoms</th>
                                                        <th>Previous Medical Issue</th>
                                                        <th class="text-right noExport">Action</th>
                                                    </thead>
                                                    <tbody>
                                                    	<?php 
                                                        // Tampilkan data dalam bentuk tabel
                                                        $data = $function->getDataByKategoris('warga_update', 'nik', $data['nik']);

                                                        if (!empty($data)) {
                                                            foreach ($data as $row) {
                                                                echo '<tr>
                                                                <td>' . $row['id'] . '</td>
                                                                <td>' . $row['nama'] . '</td>
                                                                <td>' . $row['nik'] . '</td>
                                                                <td>' . $row['tempat_lahir'] . '</td>
                                                                <td>' . $row['tanggal_lahir'] . '</td>
                                                                <td>' . $row['jk'] . '</td>
                                                                <td>' . $row['alamat'] . '</td>
                                                                <td class="text-right noExport">' . $row['pendidikan'] . '</td>
                                                                </tr>';
                                                            }
                                                        } else {
                                                            echo '<tr>
                                                            <td colspan="7" class="text-center">Tidak ada data yang cocok.</td>
                                                            </tr>';
                                                        }
                                                        ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- -->
                                        <div class="tab-pane" id="labinvestigation">
                                            <div class="box-tab-header">
                                                <h3 class="box-tab-title">Anggota Keluarga</h3>
                                            </div>
                                            <div class="impbtnview-t9">
                                            </div>
                                            <div class="download_label">Zak Crawkly (380) OPD Details</div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover example" data-export-title="Zak Crawkly (380) OPD Details">
                                                    <thead>
                                                        <th>Test Name</th>
                                                        <th>Case ID</th>
                                                        <th>Lab</th>
                                                        <th>Sample Collected</th>
                                                        <th><strong>Expected Date</strong></th>
                                                        <th>Approved By</th>
                                                        <th class="text-right noExport">Action</th>
                                                    </thead>
                                                    <tbody id="">
                                                        <?php 
                                                        // Tampilkan data dalam bentuk tabel
                                                        $data = $function->getDataByKategoris('warga', 'kk', $kk);

                                                        if (!empty($data)) {
                                                            foreach ($data as $row) {
                                                                echo '<tr>
                                                                <td>' . $row['id'] . '</td>
                                                                <td><a href="profile-2.php?id=' . $encrypted = encrypt($row['id'], $key) .'">' . $row['nama'] . '</a></td>
                                                                <td>' . $row['nik'] . '</td>
                                                                <td>' . $row['tempat_lahir'] . '</td>
                                                                <td>' . $row['tanggal_lahir'] . '</td>
                                                                <td>' . $row['jk'] . '</td>
                                                                <td>' . $row['alamat'] . '</td>
                                                                <td class="text-right noExport">' . $row['pendidikan'] . '</td>
                                                                </tr>';
                                                            }
                                                        } else {
                                                            echo '<tr>
                                                            <td colspan="7" class="text-center">Tidak ada data yang cocok.</td>
                                                            </tr>';
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- -->
                                        <div class="tab-pane" id="r_sekolah">
                                        <div class="box-tab-header">
                                                <h3 class="box-tab-title">Riwayat Sekolah</h3>
                                                <div class="box-tab-tools">
                                                    <a href="#"  onclick="getRevisitRecord('4757')" class="btn btn-primary btn-sm revisitpatient"  data-toggle="modal" title=""><i class="fas fa-exchange-alt"></i> New Visit                                            </a>
                                                </div>
                                            </div>
                                            <div class="download_label">Zak Crawkly (380) OPD Details</div>
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover ajaxlistvisit" cellspacing="0" width="100%" data-export-title="Zak Crawkly (380) OPD Details">
                                                    <thead>
                                                        <th>OPD No</th>
                                                        <th>Case ID</th>
                                                        <th>Appointment Date</th>
                                                        <th>Consultant</th>
                                                        <th>Reference</th>
                                                        <th>Symptoms</th>
                                                        <th class="text-right noExport">Action</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php 
                                                        // Tampilkan data dalam bentuk tabel
                                                        $data = $function->getDataByKategoris('riwayat_sekolah', 'nik', $nik);

                                                        if (!empty($data)) {
                                                            foreach ($data as $row) {
                                                                echo '<tr>
                                                                <td>' . $row['id'] . '</td>
                                                                <td>' . $row['nama_sekolah'] . '</td>
                                                                <td>' . $row['jenis'] . '</td>
                                                                <td>' . $row['alamat'] . '</td>
                                                                <td>' . $row['tahun_masuk'] . '</td>
                                                                <td>' . $row['tahun_keluar'] . '</td>
                                                                <td>' . $row['nilai_terakhir'] . '</td>
                                                                </tr>';
                                                            }
                                                        } else {
                                                            echo '<tr>
                                                            <td colspan="7" class="text-center">Tidak ada data yang cocok.</td>
                                                            </tr>';
                                                        }
                                                        ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="timeline">
                                            <div class="box-tab-header">
                                                <h3 class="box-tab-title">Timeline</h3>
                                            </div>
                                            <div class="impbtnview-t9"> 
                                                <a data-toggle="modal" onclick="holdModal('myTimelineModal')" class="btn btn-primary btn-sm addtimeline"><i class="fa fa-plus"></i>  Add Timeline</a> 
                                            </div>
                                            <div class="timeline-header no-border">
                                                <div id="timeline_list">
                                                    <br/>
                                                    <div class="alert alert-info">No Record Found</div>
                                                    <ul>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="kontak">
                                        <div class="box-tab-header">
                                                <h3 class="box-tab-title">Riwayat Permohonan Perubahan Data</h3>
                                                <div class="box-tab-tools">
                                                    <a href="#"  onclick="getRevisitRecord('4757')" class="btn btn-primary btn-sm revisitpatient"  data-toggle="modal" title=""><i class="fas fa-exchange-alt"></i> New Visit                                            </a>
                                                </div>
                                            </div>
                                            <div class="download_label">Zak Crawkly (380) OPD Details</div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                <div class="widget-body no-padding">
						
                                                    <form action="php/demo-comment.php" method="post" id="comment-form" class="smart-form" novalidate="novalidate">
                                                        
                                                        <fieldset>
                                                                <!-- <section class="col col-4"> -->
                                                                <section class="">
                                                                    <label class="label">Name</label>
                                                                    <label class="input"> <i class="icon-append fa fa-user"></i>
                                                                        <input type="text" name="name">
                                                                    </label>
                                                                </section>
                                                                <section class="">
                                                                    <label class="label">E-mail</label>
                                                                    <label class="input"> <i class="icon-append fa fa-envelope-o"></i>
                                                                        <input type="email" name="email">
                                                                    </label>
                                                                </section>
                                                                <section class="">
                                                                    <label class="label">Website</label>
                                                                    <label class="input"> <i class="icon-append fa fa-globe"></i>
                                                                        <input type="url" name="url">
                                                                    </label>
                                                                </section>

                                                            <section>
                                                                <label class="label">Comment</label>
                                                                <label class="textarea"> <i class="icon-append fa fa-comment"></i> 										<textarea rows="4" name="comment"></textarea> </label>
                                                                <div class="note">
                                                                    You may use these HTML tags and attributes: &lt;a href="" title=""&gt;, &lt;abbr title=""&gt;, &lt;acronym title=""&gt;, &lt;b&gt;, &lt;blockquote cite=""&gt;, &lt;cite&gt;, &lt;code&gt;, &lt;del datetime=""&gt;, &lt;em&gt;, &lt;i&gt;, &lt;q cite=""&gt;, &lt;strike&gt;, &lt;strong&gt;.
                                                                </div>
                                                            </section>
                                                        </fieldset>

                                                        <footer>
                                                            <button type="submit" name="submit" class="btn btn-primary">
                                                                Validate Form
                                                            </button>
                                                        </footer>

                                                        <div class="message">
                                                            <i class="fa fa-check fa-lg"></i>
                                                            <p>
                                                                Your comment was successfully added!
                                                            </p>
                                                        </div>
                                                    </form>
                                                    
                                                </div>
                                                </div>
                                                <div class="col-md-8">
                                                <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover ajaxlistvisit" cellspacing="0" width="100%" data-export-title="Zak Crawkly (380) OPD Details">
                                                    <thead>
                                                        <th>OPD No</th>
                                                        <th>Case ID</th>
                                                        <th>Case ID</th>
                                                        <th class="text-right noExport">Action</th>
                                                    </thead>
                                                    <tbody>
                                                    	<?php 
                                                        // Tampilkan data dalam bentuk tabel
                                                        $data = $function->getDataByKategoris('kontak', 'nik_id', $nik);

                                                        if (!empty($data)) {
                                                            foreach ($data as $row) {
                                                                echo '<tr>
                                                                <td>' . $row['id'] . '</td>
                                                                <td>' . $row['tipe_kontak'] . '</td>
                                                                <td>' . $row['nilai_kontak'] . '</td>
                                                                <td class="text-right noExport">' . $row['tipe_kontak'] . '</td>
                                                                </tr>';
                                                            }
                                                        } else {
                                                            echo '<tr>
                                                            <td colspan="7" class="text-center">Tidak ada data yang cocok.</td>
                                                            </tr>';
                                                        }
                                                        ?>
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                                
                                                </div>
                                            </div>

                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </section>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- END MAIN CONTENT -->
        </div>
        <!-- END MAIN PANEL -->
        <!-- PAGE FOOTER -->
        <div class="page-footer">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <span class="txt-color-white">SmartAdmin 1.5 <span class="hidden-xs"> - Web Application Framework</span> © 2014-2015</span>
                </div>
                <div class="col-xs-6 col-sm-6 text-right hidden-xs">
                    <div class="txt-color-white inline-block">
                        <i class="txt-color-blueLight hidden-mobile">Last account activity <i class="fa fa-clock-o"></i> <strong>52 mins ago &nbsp;</strong> </i>
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
                                        <p class="txt-color-darken font-sm no-margin">Memory Load <span class="text-danger">*critical*</span></p>
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
                    <a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
                </li>
                <li>
                    <a href="calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
                </li>
                <li>
                    <a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
                </li>
                <li>
                    <a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
                </li>
                <li>
                    <a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
                </li>
                <li>
                    <a href="profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
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
        <!-- PAGE RELATED PLUGIN(S) 
            <script src="..."></script>-->
        <script type="text/javascript">
            // DO NOT REMOVE : GLOBAL FUNCTIONS!
            
            $(document).ready(function() {
            	
            	pageSetUp();
            
            })
            
        </script>
        <!-- Your GOOGLE ANALYTICS CODE Below -->
    </body>
</html>
<?php
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    echo "ID tidak valid.";
}
?>
