<?php
$head = array("#","NIS","Nama Siswa","Nilai");


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
                        <form method="POST" enctype="multipart/form-data">
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
                                <?php if(!empty($all)){
                                    $no=1; foreach ( $all as $data) { ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $data['nis']; ?></td>
                                        <td><?= $data['nama_siswa']; ?> - <?= $data['id_ks']; ?></td>
                                        <td><input type="number" style='width: 50px' min='0' max='100' step='0.1' name="nilai[<?= $data['id_ks']; ?>]" value='<?= $data['nilai']; ?>'></td>
                                    </tr>
                                    <?php $no++; 
                                }
                            } ?>
                        </tbody>
                    </table>

                </div>

            </form>
        </div>

    </div>
</div>
</div>
<!-- #END# Basic Examples -->

</div>
</section>



