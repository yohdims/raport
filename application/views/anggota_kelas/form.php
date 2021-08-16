<?php
if(!empty($satuan)){
    $data = array(
        "$satuan->id_anggota_kelas",
        "$satuan->id",
        "$satuan->id_mapel",
        "$satuan->id_kelas_tahunan",
    );
}else{
    $data = array("","984","Sis","Sleman","2021-04-29","Yogyakarta","P","A","a","s","s","as","asd","8769","3","4");
    $data = array("","","","","","","","");
}

?>
<form method="POST" action="<?= base_url().$this->session->userdata("hak_akses")."/";?>anggota_kelas/input" enctype="multipart/form-data">
    <div class="col-sm-12">
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Siswa</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="hidden" name="id_kelas_tahunan" class="form-control" value='<?= $kelas_tahunan->id_kelas_tahunan?>' >
                        <select required class="form-control show-tick" name='id_siswa'>
                            <option value="">Pilih</option>
                        <?php foreach ($siswa as $siswa ) {?>
                        <option value="<?= $siswa['id_siswa'];?>"><?= $siswa['nis'];?> - <?= $siswa['nama_siswa'];?></option>
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