<?php
if(!empty($satuan)){
    $data = array(
        "$satuan->id_guru_mapel",
        "$satuan->id_guru",
        "$satuan->id_mapel",
        "$satuan->id_kelas_tahunan",
    );
}else{
    $data = array("","984","Sis","Sleman","2021-04-29","Yogyakarta","P","A","a","s","s","as","asd","8769","3","4");
    $data = array("","","","","","","","");
}

?>
<form method="POST" action="<?= base_url().$this->session->userdata("hak_akses")."/";?>guru_mapel/input" enctype="multipart/form-data">
    <div class="col-sm-12">
        <input required type="hidden" name="id_guru_mapel" class="form-control" value='<?php echo $data[0]?>' >
        <input required type="hidden" name="id_guru" class="form-control" value='<?= $guru->id_guru; ?>' >
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Mata Pelajaran</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <select required class="form-control show-tick" name='id_mapel'>
                            <option value="">Pilih</option>
                            <?php foreach ($mapel as $mapel ) {?>
                            <option value="<?= $mapel['id_mapel'];?>" <?php if($data[2]==$mapel['id_mapel']){echo "selected"; }?>><?= $mapel['nama_mapel'];?></option>
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
                            <select required class="form-control show-tick" name='id_kelas_tahunan'>
                                <option value="">Pilih</option>
                                <?php foreach ($kelas_tahunan as $kelas_tahunan ) {?>
                                <option value="<?= $kelas_tahunan['id_kelas_tahunan'];?>" <?php if($data[3]==$kelas_tahunan['id_kelas_tahunan']){echo "selected"; }?>><?= $kelas_tahunan['nama_kelas'];?></option>
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