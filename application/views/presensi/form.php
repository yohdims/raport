<?php
if(empty($tanggal)){

    $data = array(
        $this->session->userdata("tgl_sekarang"),
        "I",
    );
}else{

    $data = array(
        $tanggal,
        $semester,
    );
}
?>

<div class="col-sm-12">
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label>Tanggal</label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input required type="date" name="tanggal" class="form-control" value='<?php echo $data[0]?>' >

                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix">
        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
            <label>Semester</label>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <select class="form-control show-tick" name='semester'>
                        <option value="I" <?php if($data[1]=="I"){echo "selected"; }?>>I</option>
                        <option value="II" <?php if($data[1]=="II"){echo "selected"; }?>>II</option>
                    </select>

                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
        <button name='cek' value="cek" class="btn btn-secondary m-t-15 waves-effect">Cek Presensi</button>
        <button type="submit" name='simpan' value='simpan' class="btn btn-primary m-t-15 waves-effect">Simpan</button>
    </div>
</div>
