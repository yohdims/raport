<?php
if(!empty($satuan)){
	$data = array(
		$semester,
	);
}else{
	$data = array("","","","","","","");
}
?>


<div class="col-sm-12">


	<div class="row clearfix">
		<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
			<label >Semester</label>
		</div>
		<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
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
		<button class="btn btn-primary m-t-15 waves-effect" name='cek' value="cek">Cek Nilai</button>
		<button type="submit" class="btn btn-primary m-t-15 waves-effect" name='simpan' value="simpan">Simpan</button>
	</div>

</div>
