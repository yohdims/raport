<?php
if(!empty($satuan)){
    $data = array(
        "$satuan->id_siswa", //0
        "$satuan->nis", //1
        "$satuan->password", //2
        "$satuan->nama_siswa", //3
        "$satuan->agama", //4
        "$satuan->tempat_lahir",//5
        "$satuan->tgl_lahir",
        "$satuan->alamat",
        "$satuan->jk",
        "$satuan->nama_ayah",
        "$satuan->nama_ibu", //10
        "$satuan->pekerjaan_ayah",
        "$satuan->pekerjaan_ibu",
        "$satuan->alamat_ortu",
        "$satuan->no_telp",
        "$satuan->jml_saudara",//15
        "$satuan->anak_ke",
        "$satuan->password_ortu",
    );
}else{
    $data = array("","984","Sis","Hindu","Yogyakarta","2021-04-29","P","A","a","s","s","as","asd","8769","3","4");
    $data = array("","","","","","","","","","","","","","","","","");
}
?>
<form method="POST" action="<?= base_url().$this->session->userdata("hak_akses")."/";?>siswa/input" enctype="multipart/form-data">
    <div class="col-sm-6">
        <h4>Data Siswa</h4>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>NIS</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="hidden" name="id_siswa" class="form-control" value='<?php echo $data[0]?>' >
                        <input required type="text" name="nis" class="form-control" placeholder="NIS" value='<?php echo $data[1]?>' >
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
                <label>Nama Siswa</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="text" name="nama_siswa" class="form-control" placeholder="Nama Siswa" value='<?php echo $data[3]?>' >
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Agama</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <select class="form-control show-tick" name='agama'>
                            <?php foreach ($this->M_1Settings->agama() as $key => $value) {?>
                            <option value="<?= $key;?>" <?php if($data[4]==$key){echo "selected"; }?>><?= $value;?></option>
                            <?php } ?>
                        </select>
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
                        <input required type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir" value='<?= $data[5]?>' >
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
                        <input required type="date" name="tgl_lahir" class="form-control" placeholder="Nama Siswa" value='<?= $data[6]?>' >
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
                        <textarea required type="date" name="alamat" class="form-control" placeholder="Alamat " value='' ><?= $data[7]?></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Jenis Kelamin</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                       <select class="form-control show-tick" name='jk'>
                        <?php foreach ($this->M_1Settings->jk() as $key => $value) {?>
                        <option value="<?= $key;?>" <?php if($data[8]==$key){echo "selected"; }?>><?= $value;?></option>
                        <?php } ?></select>
                    </div>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Foto</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input type="file" name="foto"  class="form-control" placeholder="Foto"  >
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Jumlah Saudara</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="text" name="jml_saudara"  class="form-control" placeholder="Jumlah Saudara" value='<?php echo $data[15]?>' >
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Anak Ke</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="text" name="anak_ke"  class="form-control" placeholder="Anak Ke" value='<?php echo $data[16]?>' >
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
        </div>
    </div>
    <div class="col-sm-6">
        <h4>Data Orang Tua</h4>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Nama Ayah</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="text" name="nama_ayah" class="form-control" placeholder="Nama Ayah" value='<?= $data[9]?>' >
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Pekerjaan Ayah</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="text" name="pekerjaan_ayah" class="form-control" placeholder="Pekerjaan Ayah" value='<?= $data[10]?>' >
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Nama Ibu</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="text" name="nama_ibu" class="form-control" placeholder="Nama Ibu" value='<?= $data[11]?>' >
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Pekerjaan Ibu</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="text" name="pekerjaan_ibu" class="form-control" placeholder="Pekerjaan Ibu" value='<?= $data[12]?>' >
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Alamat Orang Tua</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <textarea required type="date" name="alamat_ortu" class="form-control" placeholder="Alamat Orang Tua" value='' ><?= $data[13]?></textarea>
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
                        <input required type="text" name="no_telp"  class="form-control" placeholder="No Telepon" value='<?php echo $data[14]?>' >
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Password Ortu</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="text" name="password_ortu"  class="form-control" placeholder="Password" value='<?php echo $data[17]?>' >
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>