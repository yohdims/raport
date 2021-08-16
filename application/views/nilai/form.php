<?php
if(!empty($satuan)){
	$data = array(
		$satuan['id_kompetensi_dasar'],
		$satuan['id_jenis_nilai'],
	);
}else{
	$data = array("","","","","","","");
}
?>


	<div class="col-sm-12">


		<div class="row clearfix">
			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
				<label >Kompetensi Dasar</label>
			</div>
			<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
				<div class="form-group">
					<div class="form-line">
						<select required class="form-control show-tick" name='id_kompetensi_dasar'>
                            <option value="">Pilih</option>
                            <?php foreach ($kompetensi_dasar as $kompetensi_dasar ) {?>
                            <option value="<?= $kompetensi_dasar['id_kompetensi_dasar'];?>" <?php if($data[0]==$kompetensi_dasar['id_kompetensi_dasar']){echo "selected"; }?>><?= $kompetensi_dasar['kode_kompetensi'];?> - <?= $kompetensi_dasar['deskripsi'];?></option>
                            <?php } ?>
                        </select>
					</div>
				</div>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
				<label>Jenis Nilai</label>
			</div>
			<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
				<div class="form-group">
					<div class="form-line">
						<select required class="form-control show-tick" name='id_jenis_nilai'>
                            <option value="">Pilih</option>
                            <?php foreach ($jenis_nilai as $jenis_nilai ) {?>
                            <option value="<?= $jenis_nilai['id_jenis_nilai'];?>" <?php if($data[1]==$jenis_nilai['id_jenis_nilai']){echo "selected"; }?>><?= $jenis_nilai['jenis_nilai'];?></option>
                            <?php } ?>
                        </select>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
			<button class="btn btn-primary m-t-15 waves-effect" name='cek' value="cek">Tampilkan</button>
			<button type="submit" class="btn btn-primary m-t-15 waves-effect" name='simpan' value="simpan">Simpan</button>
		</div>

	</div>
