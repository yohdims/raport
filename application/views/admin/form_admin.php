<?php
if(!empty($satuan)){
    $data = array(
        "$satuan->id_admin",
        "$satuan->nama_admin",
        "$satuan->username",
        "$satuan->password",
        "$satuan->no_telp"
    );
}else{
    $data = array("","","","","","","");
}
?>
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
                        <h2 class="card-inside-title"><?= $title?></h2>
                        <div class="row clearfix">
                            

                            <form method="POST" action="<?= base_url().$this->session->userdata("hak_akses")."/";?>admin/input" enctype="multipart/form-data">
                                <div class="col-sm-12">


                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="nama_admin">Nama Admin</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input required type="hidden" name="id_admin" id="id_admin" class="form-control" value='<?php echo $data[0]?>' >
                                                    <input required type="text" name="nama_admin" id="nama_admin" class="form-control" placeholder="Nama Admin" value='<?php echo $data[1]?>' >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="nama_admin">Username</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input required type="text" name="username" id="username" class="form-control" placeholder="Username" value='<?php echo $data[2]?>' >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input required type="password" name="password" id="password" class="form-control" placeholder="Password" value='<?php echo $data[3]?>' >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                            <label for="password">No Telepon</label>
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input required type="no_telp" name="no_telp" id="no_telp" class="form-control" placeholder="No Telepon" value='<?php echo $data[4]?>' >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                        <button type="submit" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>

                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>

