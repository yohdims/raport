<?php
if(!empty($satuan)){
    $data = array(
        "$satuan->id_kompetensi_dasar", //
        "$satuan->id_ta", //0
        "$satuan->id_kompetensi_keahlian", //2
        "$satuan->id_guru_mapel",
        "$satuan->id_mapel",
        "$satuan->id_kel_nilai_mapel",
        "$satuan->id_kel_mapel",
        "$satuan->kode_kompetensi",
        "$satuan->semester",
        "$satuan->deskripsi",
    );
}else{
    $data = array("","984","Sis","Hindu","Yogyakarta","2021-04-29","P","A","a","s","s","as","asd","8769","3","4");
    $data = array("","","","","","","","","","","","","","","","");
}
?>
<form method="POST" action="<?= base_url().$this->session->userdata("hak_akses")."/";?>kompetensi_dasar/input/<?= $id_kelas;?>" enctype="multipart/form-data">
    <div class="col-sm-6">
        <h4>Data Guru Mata Pelajaran/Wali Kelas</h4>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Tahun Ajaran</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <input required type="hidden" name="id_kompetensi_dasar" class="form-control" value='<?php echo $data[0]?>' >
                        <select required class="form-control show-tick" name='id_ta'>
                            <option value="">Pilih</option>
                            <?php foreach ($tahun_ajaran as $tahun_ajaran ) {?>
                            <option value="<?= $tahun_ajaran['id_ta'];?>" <?php if($data[1]==$tahun_ajaran['id_ta']){echo "selected"; }?>><?= $tahun_ajaran['tahun_ajaran'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Guru Mapel</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <select required class="form-control show-tick" name='id_guru_mapel'>
                            <?php foreach ($guru_mapel as $guru_mapel ) {?>
                            <option value="<?= $guru_mapel['id_guru_mapel'];?>" <?php if($data[2]==$guru_mapel['id_guru_mapel']){echo "selected"; }?>><?= $guru_mapel['nama_guru'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Kompetensi Keahlian</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <select required class="form-control show-tick" name='id_kompetensi_keahlian'>
                            <option value="">Pilih</option>
                            <?php foreach ($kompetensi_keahlian as $kompetensi_keahlian ) {?>
                            <option value="<?= $kompetensi_keahlian['id_kompetensi_keahlian'];?>" <?php if($data[3]==$kompetensi_keahlian['id_kompetensi_keahlian']){echo "selected"; }?>><?= $kompetensi_keahlian['nama_kompetensi_keahlian'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
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
                            <option value="<?= $mapel['id_mapel'];?>" <?php if($data[4]==$mapel['id_mapel']){echo "selected"; }?>><?= $mapel['nama_mapel'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Kelompok Nilai Mapel</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <select required class="form-control show-tick" name='id_kel_nilai_mapel'>
                            <option value="">Pilih</option>
                            <?php foreach ($kel_nilai_mapel as $kel_nilai_mapel ) {?>
                            <option value="<?= $kel_nilai_mapel['id_kel_nilai_mapel'];?>" <?php if($data[5]==$kel_nilai_mapel['id_kel_nilai_mapel']){echo "selected"; }?>><?= $kel_nilai_mapel['kelompok_nilai'];?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>




        <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Simpan</button>
        </div>
    </div>
    <div class="col-sm-6">
        <h4>Data Kompetensi Dasar</h4>
        <div class="row clearfix">
            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                <label>Kelompok Mapel</label>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                <div class="form-group">
                    <div class="form-line">
                        <select required class="form-control show-tick" name='id_kel_mapel'>
                            <option value="">Pilih</option>
                            <?php foreach ($kel_mapel as $kel_mapel ) {?>
                            <option value="<?= $kel_mapel['id_kel_mapel'];?>" <?php if($data[6]==$kel_mapel['id_kel_mapel']){echo "selected"; }?>><?= $kel_mapel['kelompok_mapel'];?></option>
                            <?php } ?>
                        </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label>Kode Kompetensi</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="kode_kompetensi"  class="form-control" placeholder="Kode Kompetensi"  value="<?= $data[7]?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label>Semester</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" name="semester"  class="form-control" placeholder="Kode Kompetensi" value="<?= $data[8]?>" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label>Deskripsi</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                        <div class="form-line">
                            <textarea required name="deskripsi" class="form-control" placeholder="Deskripsi" value='' ><?= $data[9]?></textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>