<?php
$head = array("#","Tahun Ajaran","Program Keahlian","Kompetensi Keahilan","Kelompok","Mapel","Action");
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
                            <?= $title; ?>
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
                       <h2 class="card-inside-title">Form <?= $title2?></h2>
                       <div class="row clearfix">
                        <?= $form?>
                    </div>
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
                                    <td><?= $data['tahun_ajaran']; ?></td>
                                    <td><?= $data['nama_program']; ?></td>
                                    <td><?= $data['nama_kompetensi_keahlian']; ?></td>
                                    <td><?= $data['kelompok_nilai']; ?></td>
                                    <td><?= $data['nama_mapel']; ?></td>
                                    <td>
                                        <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>kompetensi_dasar/index/<?= $id_kelas; ?>/<?= $data['id_kompetensi_dasar']; ?>" >
                                            <button type="submit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="material-icons" style="font-size:16px">edit</i></button>
                                        </a>
                                        <a href="<?= base_url().$this->session->userdata("hak_akses")."/";?>kompetensi_dasar/hapus/<?= $data['id_kompetensi_dasar']; ?>" onClick="return confirm('Anda yakin ingin menghapus data ini?')">
                                            <button type="button" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="material-icons" style="font-size:16px">delete</i></button>
                                        </a>
                                    </td>
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



