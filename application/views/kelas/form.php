<?php
if(!empty($satuan)){
    $data = array(
        "$satuan->id_kelas",
        "$satuan->kelas",
        "$satuan->id_program_keahlian",
        "$satuan->kelompok",
        "$satuan->nama_kelas",
    );
}else{
    $data = array("","984","Sis","Sleman","2021-04-29","Yogyakarta","P","A","a","s","s","as","asd","8769","3","4");
    $data = array("","","","","","","","");
}

?>
<form method="POST" action="<?= base_url().$this->session->userdata("hak_akses")."/";?>kelas/input" enctype="multipart/form-data">
    <div class="col-sm-12">
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Kelas</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="hidden" name="id_kelas" class="form-control" value='<?php echo $data[0]?>' >
                        <select class="form-control show-tick" name='kelas'>
                        <?php foreach ($this->M_1Settings->kelas() as $kelas => $value) {?>
                        <option value="<?= $value;?>" <?php if($data[1]==$value){echo "selected"; }?>><?= $value;?></option>
                        <?php } ?></select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Program Keahlian</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <select class="form-control show-tick" name='id_program_keahlian'>
                        <?php foreach ($program_keahlian as $data_program ) {?>
                        <option value="<?= $data_program['id_program_keahlian'];?>" <?php if($data[2]==$data_program['id_program_keahlian']){echo "selected"; }?>><?= $data_program['nama_program'];?></option>
                        <?php } ?></select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Kelompok</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="number" name="kelompok" class="form-control" placeholder="Kelompok" value='<?php echo $data[3]?>' >
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Nama Kelas</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas" value='<?php echo $data[4]?>' >
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
        </div>
    </div>
</form>