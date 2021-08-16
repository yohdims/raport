<?php
if(!empty($satuan)){
    $data = array(
        "$satuan->id_kelas_tahunan",
        "$satuan->id_ta",
        "$satuan->id_kelas",
        "$satuan->id_guru",
    );
}else{
    $data = array("","984","Sis","Sleman","2021-04-29","Yogyakarta","P","A","a","s","s","as","asd","8769","3","4");
    $data = array("","","","","","","","");
}

?>
<form method="POST" action="<?= base_url().$this->session->userdata("hak_akses")."/";?>kelas_tahunan/input" enctype="multipart/form-data">
    <div class="col-sm-12">
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Tahun Ajaran</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="hidden" name="id_kelas_tahunan" class="form-control" value='<?php echo $data[0]?>' >
                        <select class="form-control show-tick" name='id_ta'>
                        <?php foreach ($tahun_ajaran as $tahun_ajaran ) {?>
                        <option value="<?= $tahun_ajaran['id_ta'];?>" <?php if($data[1]==$tahun_ajaran['id_ta']){echo "selected"; }?>><?= $tahun_ajaran['tahun_ajaran'];?></option>
                        <?php } ?></select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Kelas</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <select class="form-control show-tick" name='id_kelas'>
                        <?php foreach ($kelas as $kelas ) {?>
                        <option value="<?= $kelas['id_kelas'];?>" <?php if($data[2]==$kelas['id_kelas']){echo "selected"; }?>><?= $kelas['nama_kelas'];?></option>
                        <?php } ?></select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Wali Kelas</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <select class="form-control show-tick" name='id_guru'>
                        <?php foreach ($guru as $guru ) {?>
                        <option value="<?= $guru['id_guru'];?>" <?php if($data[3]==$guru['id_guru']){echo "selected"; }?>><?= $guru['nip'];?> - <?= $guru['nama_guru'];?></option>
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