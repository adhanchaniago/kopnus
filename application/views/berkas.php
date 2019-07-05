<div class="boxed">
	<div id="content-container">
		<div class="pageheader hidden-xs">
      <h3>
				<a class="back" href="<?= base_url().'nasabah' ?>"><i class="fas fa-arrow-circle-left  fa-lg"></i></a>
				Berkas </h3>
    </div>
		<?php $data = "0"; ?>
    <div id="page-content">
			<div class="row">
				<div class="col-lg-2"></div>
					<div class="col-lg-8">
					<div class="panel">
							<div class="panel-heading">
								<?php if ($user['norek'] == "1"){ ?>
									<h3 class="panel-title">Berkas <?= $user_berkas['nama']; ?></h3>
								<?php } ?>
							</div>
							<div class="panel-body">
								<table id="demo-foo-filtering" class="table table-bordered table-hover toggle-circle" data-page-size="7">
									<thead>
										<tr>
											<th data-hide="phone, tablet">Nama Berkas</th>
											<th><center> Status Berkas </center></th>
											<th> </th>
											<th> </th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<div class="media-object">Kartu Keluarga</div>
											</td>
											<td class="tblbr">
												<?php if ($kk['status'] == "0") { ?>
													<i class="far fa-check-circle"></i>
												<?php } ?>
											</td>
											<td>
												<center>
													<?php if (!isset($kk['status'])) { ?>
														<button  type="button" name="button1" data-toggle="modal" data-target="#kk"> Upload </button>
													<?php } ?>
												</center>
											</td>
											<td>
												<center>
												<?php if ($kk['status'] == "0") { ?>
													<button  type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$user_berkas['norek'].'/1' ?>'"> Download </button>
												<?php } ?>
												</center>
											</td>
										</tr>
										<tr>
											<td>
												<div class="media-object">Slip Gaji</div>
											</td>
											<td class="tblbr">
												<?php if ($slip['status'] == "0") { ?>
													<i class="far fa-check-circle"></i>
												<?php } ?>
											</td>
											<td>
												<center>
												<?php if (!isset($slip['status'])) { ?>
													<button  type="button" name="button1" data-toggle="modal" data-target="#slip"> Upload </button>
												<?php } ?>
												</center>
											</td>
											<td>
												<center>
											<?php if ($slip['status'] == "0") { ?>
												<button  type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$user_berkas['norek'].'/2' ?>'"> Download </button>
											<?php } ?>
											</center>
										</td>
										</tr>
										<tr>
											<td>
												<div class="media-object">NPWP</div>
											</td>
											<td class="tblbr">
												<?php if ($npwp['status'] == "0") { ?>
													<i class="far fa-check-circle"></i>
												<?php } ?>
											</td>
											<td>
												<center>
												<?php if (!isset($npwp['status'])) { ?>
												<button  type="button" name="button1" data-toggle="modal" data-target="#npwp"> Upload </button>
												<?php } ?>
												</center>
											</td>
											<td>
												<center>
											<?php if ($npwp['status'] == "0") { ?>
												<button  type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$user_berkas['norek'].'/3' ?>'"> Download </button>
										<?php } ?>
											</center>
										</td>
										</tr>
										<tr>
											<td>
												<div class="media-object">Foto Diri</div>
											</td>
											<td class="tblbr">
												<?php if ($foto_diri['status'] == "0") { ?>
													<i class="far fa-check-circle"></i>
												<?php } ?>
											</td>
											<td>
												<center>
												<?php if (!isset($foto_diri['status'])) { ?>
												<button  type="button" name="button1" data-toggle="modal" data-target="#foto_diri"> Upload </button>
												<?php } ?>
												</center>
											</td>
											<td>
												<center>
											<?php if ($foto_diri['status'] == "0") { ?>
												<button  type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$user_berkas['norek'].'/4' ?>'"> Download </button>
											<?php } ?>
											</center>
										</td>
										</tr>
										<tr>
											<td>
												<div class="media-object">Karip</div>
											</td>
											<td class="tblbr">
												<?php if ($karip['status'] == "0") { ?>
													<i class="far fa-check-circle"></i>
												<?php } ?>
											</td>
											<td>
												<center>
												<?php if (!isset($karip['status'])) { ?>
												<button  type="button" name="button1" data-toggle="modal" data-target="#karip"> Upload </button>
												<?php } ?>
												</center>
											</td>
											<td>
												<center>
											<?php if ($karip['status'] == "0") { ?>
												<button  type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$user_berkas['norek'].'/5' ?>'"> Download </button>
												<?php } ?>
											</center>
										</td>
										</tr>
										<tr>
											<td>
												<div class="media-object">KTP Suami Istri</div>
											</td>
											<td class="tblbr">
												<?php if ($ktp['status'] == "0") { ?>
													<i class="far fa-check-circle"></i>
												<?php } ?>
											</td>
											<td>
												<center>
												<?php if (!isset($ktp['status'])) { ?>
												<button  type="button" name="button1" data-toggle="modal" data-target="#ktpsi"> Upload </button>
												<?php } ?>
												</center>
											</td>
											<td>
												<center>
											<?php if ($ktp['status'] == "0") { ?>
												<button  type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$user_berkas['norek'].'/6' ?>'"> Download </button>
												<?php } ?>
											</center>
										</td>
										</tr>
										<tr>
											<td>
												<div class="media-object">SK</div>
											</td>
											<td class="tblbr">
												<?php if ($sk['status'] == "0") { ?>
													<i class="far fa-check-circle"></i>
												<?php } ?>
											</td>
											<td>
												<center>
												<?php if (!isset($sk['status'])) { ?>
												<button  type="button" name="button1" data-toggle="modal" data-target="#sk"> Upload </button>
												<?php } ?>
												</center>
											</td>
											<td>
												<center>
											<?php if ($sk['status'] == "0") { ?>
												<button  type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$user_berkas['norek'].'/7' ?>'"> Download </button>
											<?php } ?>
											</center>
										</td>
										</tr>
									</tbody>
								</table><!-- End Foo Table - Filtering -->
							</div>
						</div>
					</div>
				</div><!--End page content-->
		</div>
	</div>
</div>
<div class="modal fade" id="kk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
  	<div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Upload Berkas Kartu Keluarga (KK) </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
			<form  action="<?= base_url().'upload_kk/'.$user_berkas['norek'] ?>" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload KK (Max 2 Mb) : </h4>
					<input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto"><br>
      </div>
			<div class="modal-footer">
          <input type="submit" value="Register" class="btn btn-primary" >
        </div>
		</form>
    </div>
  </div>
</div>
<div class="modal fade" id="slip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
  	<div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Upload Berkas Slip Gaji </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
			<form  action="<?= base_url().'upload_slip/'.$user_berkas['norek'] ?> ?>" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload Slip Gaji (Max 2 Mb) : </h4>
					<input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto"><br>
      </div>
			<div class="modal-footer">
          <input type="submit" value="Register" class="btn btn-primary" >
        </div>
		</form>
    </div>
  </div>
</div>
<div class="modal fade" id="npwp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
  	<div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Upload Berkas MPWP </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
			<form  action="<?= base_url().'upload_npwp/'.$user_berkas['norek'] ?>" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload NPWP (Max 2 Mb) : </h4>
					<input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto"><br>
      </div>
			<div class="modal-footer">
          <input type="submit" value="Register" class="btn btn-primary" >
        </div>
		</form>
    </div>
  </div>
</div>
<div class="modal fade" id="foto_diri" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
  	<div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Upload Berkas Foto Diri </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
			<form  action="<?= base_url().'upload_foto_diri/'.$user_berkas['norek'] ?>" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload Foto Diri (Max 2 Mb) : </h4>
					<input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto"><br>
      </div>
			<div class="modal-footer">
          <input type="submit" value="Register" class="btn btn-primary" >
        </div>
		</form>
    </div>
  </div>
</div>
<div class="modal fade" id="karip" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
  	<div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Upload Berkas Karip </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
			<form  action="<?= base_url().'upload_karip/'.$user_berkas['norek'] ?>" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload Karip (Max 2 Mb) : </h4>
					<input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto"><br>
      </div>
			<div class="modal-footer">
          <input type="submit" value="Register" class="btn btn-primary" >
        </div>
		</form>
    </div>
  </div>
</div>
<div class="modal fade" id="ktpsi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
  	<div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Upload Berkas KTP Suami Istri </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
			<form  action="<?= base_url().'upload_ktp/'.$user_berkas['norek'] ?>" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload KTP Suami Istri (Max 2 Mb) : </h4>
					<input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto"><br>
      </div>
			<div class="modal-footer">
          <input type="submit" value="Register" class="btn btn-primary" >
        </div>
		</form>
    </div>
  </div>
</div>
<div class="modal fade" id="sk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
  	<div class="modal-content">
      <div class="modal-header">
      	<h4 class="modal-title" id="myModalLabel">Upload Berkas SK </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
			<form  action="<?= base_url().'upload_sk/'.$user_berkas['norek'] ?>" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload SK (Max 2 Mb) : </h4>
					<input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto"><br>
      </div>
			<div class="modal-footer">
          <input type="submit" value="Register" class="btn btn-primary" >
        </div>
		</form>
    </div>
  </div>
</div>
