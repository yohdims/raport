<?php
if(!empty($satuan)){
    $data = array(
        "$satuan->id_guru",
        "$satuan->nip",
        "$satuan->password",
        "$satuan->nama_guru",
        "$satuan->tempat_lahir",
        "$satuan->tgl_lahir",
        "$satuan->alamat",
        "$satuan->no_telp",
        "$satuan->pendidikan"
    );
}else{
    $data = array("","984","Sis","Sleman","2021-04-29","Yogyakarta","P","A","a","s","s","as","asd","8769","3","4");
    $data = array("","","","","","","","");
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
                        <form method="POST" action="<?= base_url().$this->session->userdata("hak_akses")."/";?>guru/input" enctype="multipart/form-data">
                            <div class="col-sm-12">
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>NIP</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input required type="hidden" name="id_guru" class="form-control" value='<?php echo $data[0]?>' >
                                                <input required type="text" name="nip" class="form-control" placeholder="NIP" value='<?php echo $data[1]?>' >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Password</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input required type="password" name="password" class="form-control" placeholder="Nama Siswa" value='<?php echo $data[2]?>' >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Nama Guru</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input required type="text" name="nama_guru" class="form-control" placeholder="Nama Siswa" value='<?php echo $data[3]?>' >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Tempat Lahir</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input required type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value='<?= $data[4]?>' >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Tanggal Lahir</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input required type="date" name="tgl_lahir" class="form-control" placeholder="Nama Siswa" value='<?= $data[5]?>' >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Alamat</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <textarea required type="date" name="alamat" class="form-control" placeholder="Alamat " value='' ><?= $data[6]?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>No Telepon</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input required type="text" name="no_telp"  class="form-control" placeholder="No Telepon" value='<?php echo $data[7]?>' >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label>Pendidikan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                               <select class="form-control show-tick" name='pendidikan'>
                                                <?php foreach ($this->M_1Settings->pendidikan() as $key => $value) {?>
                                                <option value="<?= $key;?>" <?php if($data[8]==$key){echo "selected"; }?>><?= $value;?></option>
                                                <?php } ?></select>
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

