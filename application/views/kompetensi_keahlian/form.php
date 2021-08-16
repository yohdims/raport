<?php
if(!empty($satuan)){
    $data = array(
        "$satuan->id_kompentensi_keahlian",
        "$satuan->nama_kompentensi_keahlian",
        "$satuan->id_program_keahlian",
    );
}else{
    $data = array("","984","Sis","Sleman","2021-04-29","Yogyakarta","P","A","a","s","s","as","asd","8769","3","4");
    $data = array("","","","","","","","");
}

?>
<form method="POST" action="<?= base_url().$this->session->userdata("hak_akses")."/";?>kompetensi_keahlian/input" enctype="multipart/form-data">
    <div class="col-sm-12">
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Nama Kompetensi Keahlian</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="hidden" name="id_kompetensi_keahlian" class="form-control" value='<?php echo $data[0]?>' >
                        <input required type="text" name="nama_kompetensi_keahlian" class="form-control" placeholder="Nama Kompetensi" value='<?php echo $data[1]?>' >
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
        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
        </div>
    </div>
</form>