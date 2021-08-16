<?php
$head = array("No","Mapel","KKM","Nilai","Predikat","Deskripsi");


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
                            <?= $title; ?> Kelas <?= $satuan->nama_kelas;?>
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
                           <h2 class="card-inside-title"><?= $title?></h2>
                       </div>
                       <div class="">
                        <table class="table">
                            <tr>
                                <th>Nama</th>
                                <td>: <?= $satuan->nama_siswa?></td>
                            </tr>
                            <tr>
                                <th>NIS</th>
                                <td>: <?= $satuan->nis?></td>
                            </tr>
                            <tr>
                                <th>Kelas</th>
                                <td>: <?= $satuan->nama_kelas?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover ">
                            <thead>
                                <?php for($i=0;$i<count($head);$i++){?>
                                <th><?php echo $head[$i]?></th>
                                <?php }?>
                            </thead>
                            <tfoot>
                                <?php for($i=0;$i<count($head);$i++){?>
                                <th><?php echo $head[$i]?></th>
                                <?php }?>
                            </tfoot>
                            <tbody>
                                <?php $no=1;$jumlah=0; foreach ( $all as $data) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data['nama_mapel']; ?></td>
                                    <td><?= $data['kkm']; ?></td>
                                    <td><?= number_format($data['nilai_akhir'],2); ?></td>
                                    <td><?= $data['predikat']; ?></td>
                                    <td><?= $data['deskripsi']; ?></td>
                                </tr>
                                <?php 
                                    $jumlah+=$data['nilai_akhir'];}
                                ?>
                                <tr>
                                    <th colspan="3" style="text-align: center;">JUMLAH</th>
                                    <th colspan="3"><?= $jumlah?></th>
                                </tr>
                                <tr>
                                    <th colspan="3" style="text-align: center;">RATA-RATA</th>
                                    <th colspan="3"><?= $jumlah/($no-1)?></th>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="rows clearfix">
                        <table class="table col-lg-6">
                            <tr>
                                <th>Hadir</th>
                                <th><?= $presensi[0]['hadir'];?> hari</th>
                            </tr>
                            <tr>
                                <th>Sakit</th>
                                <th><?= $presensi[0]['sakit'];?> hari</th>
                            </tr>
                            <tr>
                                <th>Ijin</th>
                                <th><?= $presensi[0]['ijin'];?> hari</th>
                            </tr>
                            <tr>
                                <th>Alpha</th>
                                <th><?= $presensi[0]['alpha'];?> hari</th>
                            </tr>
                        </table>
                    </div>
                    <div class="rows clearfix">
                        <table class="col-lg-12">
                            <tr>
                                <th></th>
                                <th>Yogyakarta, <?= date('d M Y');?></th>
                            </tr>
                            <tr>
                                <th>Orang tua/Wali</th>
                                <th>Guru Kelas <?= $satuan->nama_kelas ?></th>
                            </tr>
                            
                            <tr style="height: 80px">
                                
                            </tr>
                            <tr>
                                <th>(_________________________)</th>
                                <td>
                                    <?= $satuan->nama_guru?>
                                    <br>____________________________<br>
                                    <?= $satuan->nip?>
                                </td>
                            </tr>
                        </table>
                    </div>


                </div>

            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->

</div>
</section>



