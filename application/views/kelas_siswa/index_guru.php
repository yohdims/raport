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
                         <a href='<?= base_url().$this->session->userdata("hak_akses")."/";?>presensi/index/1' class="m-t-15 pull-right">
                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Tambah</button>
                    </a>
                    </div>

                    <div class="body">
                       
                        <div class=" m-b-10">
                           <h2 class="card-inside-title"><?= $title?></h2>

                       </div>
                       <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
                                <?php $no=1; foreach ( $all as $data) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $data['nis']; ?></td>
                                    <td><?= $data['nama_siswa']; ?></td>
                                    <td><?= $data['hadir']; ?></td>
                                    <td><?= $data['sakit']; ?></td>
                                    <td><?= $data['ijin']; ?></td>
                                    <td><?= $data['alpha']; ?></td>
                                </tr>
                                <?php $no++; endforeach ?>
                            </tbody>
                        </table>

                    </div>


                </div>

            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->

</div>
</section>



