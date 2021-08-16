<?php
$head = array("#","NIS","Nama Siswa","Hadir","Sakit","Ijin","Alpha");
?>


<!-- Select Plugin Js -->
<script src="<?= base_url('assets/');?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <?php if (!empty($message=$this->session->flashdata('message'))):?>
                        <div class="alert bg-green alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <?= $message;?> 
                        </div>
                    <?php endif;?>
                    <div class="header">
                        <h2>
                            <?= $title; ?> <?= $satuan->nama_kelas?>
                        </h2>

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Tambah</a></li>
                                </ul>
                            </li>
                        </ul>

                    </div>

                    <div class="body">

                        <div class=" m-b-10">
                            <h2 class="card-inside-title">
                                <?= $title?>
                            </h2>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">

                                <a href='<?= base_url().$this->session->userdata("hak_akses")."/";?>presensi/kelas/<?= $satuan->id_kelas_tahunan?>' class='m-r-15' >
                                    <div class="btn btn-primary p-15 " style="padding: 50px">
                                    <i class="material-icons">date_range</i><br>
                                        Presensi
                                    </div>
                                </a>
                                <a href='<?= base_url().$this->session->userdata("hak_akses")."/";?>nilai_semester/guru/<?= $satuan->id_kelas_tahunan?>' >
                                    <div class="btn btn-warning" style="padding: 50px">
                                        <i class="material-icons">fact_check</i><br>
                                        Nilai
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

        </div>
    </section>



