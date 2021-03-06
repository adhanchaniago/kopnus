<div class="boxed">
	<div id="content-container">
		<div class="pageheader hidden-xs">
			<h3><?php if ($this->session->uid == "0000000001"){ ?>
				<a class="back" href="<?= base_url().'nasabah' ?>"><i class="fas fa-arrow-circle-left  fa-lg"></i></a>
			<?php }else {?>
				<a class="back" href="<?= base_url() ?>"><i class="fas fa-arrow-circle-left  fa-lg"></i></a>
			<?php } ?> Berkas </h3>
		</div>
		<?php $data = "0"; ?>
		<div id="page-content">
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8">
					<div class="panel">
						<div class="panel-heading">
							<div class="row">
								<div class="col-sm-6">
									<?php if ($user['norek'] == "0000000001"){ ?>
										<h3 class="panel-title">Berkas <?= $user_berkas['nama']; ?></h3>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<table id="demo-foo-filtering" class="table mr-5 table-bordered table-hover toggle-circle" data-page-size="5">
								<thead>
									<tr>
										<th data-hide="phone, tablet" width="700px">Nama Berkas</th>
										<th width="250px"><center> Status Berkas </center></th>
										<th width="250px"><center> Upload </center></th>
										<th width="250px"> </th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<div class="media-object">Kartu Keluarga</div>
										</td>
										<td><center>
											<?php if (!empty($berkas['kk'])) { ?>
												<i class="far fa-check-circle fa-2x"></i>
											<?php } ?>
										</center>
									</td>
									<td>
										<center>
											<?php if ($this->session->uid == "0000000001"){ ?>
												<button class="btn btn-info" type="button" name="button1" data-toggle="modal" data-target="#kk"> Upload </button>
											<?php }else {
												if (empty($berkas['kk'])) { ?>
													<button class="btn btn-info" type="button" name="button1" data-toggle="modal" data-target="#kk"> Upload </button>
												<?php }?>
											<?php } ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (!empty($berkas['kk'])) { ?>
												<button class="btn btn-success" type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$user_berkas['norek'].'/1' ?>'"> Download </button>
											<?php } ?>
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<div class="media-object">Slip Gaji</div>
									</td>
									<td><center>
										<?php if (!empty($berkas['slip'])) { ?>
											<i class="far fa-check-circle fa-2x"></i>
										<?php } ?></center>
									</td>
									<td>
										<center>
											<?php if ($this->session->uid == "0000000001"){ ?>
												<button class="btn btn-info" type="button" name="button1" data-toggle="modal" data-target="#slip"> Upload </button>
											<?php }else {
												if (empty($berkas['slip'])) { ?>
													<button class="btn btn-info" type="button" name="button1" data-toggle="modal" data-target="#slip"> Upload </button>
												<?php } ?>
											<?php } ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (!empty($berkas['slip'])) { ?>
												<button class="btn btn-success" type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$user_berkas['norek'].'/2' ?>'"> Download </button>
											<?php } ?>
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<div class="media-object">NPWP</div>
									</td>
									<td><center>
										<?php if (!empty($berkas['npwp'])) { ?>
											<i class="far fa-check-circle fa-2x"></i>
										<?php } ?></center>
									</td>
									<td>
										<center>
											<?php if ($this->session->uid == "0000000001"){ ?>
												<button class="btn btn-info" type="button" name="button1" data-toggle="modal" data-target="#npwp"> Upload </button>
											<?php }else {
												if (empty($berkas['npwp'])) { ?>
													<button class="btn btn-info" type="button" name="button1" data-toggle="modal" data-target="#npwp"> Upload </button>
												<?php } ?>
											<?php } ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (!empty($berkas['npwp'])) { ?>
												<button class="btn btn-success" type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$user_berkas['norek'].'/3' ?>'"> Download </button>
											<?php } ?>
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<div class="media-object">Foto Diri</div>
									</td>
									<td><center>
										<?php if (!empty($berkas['foto_diri'])) { ?>
											<i class="far fa-check-circle fa-2x"></i>
										<?php } ?></center>
									</td>
									<td>
										<center>
											<?php if ($this->session->uid == "0000000001"){ ?>
												<button class="btn btn-info" type="button" name="button1" data-toggle="modal" data-target="#foto_diri"> Upload </button>
											<?php }else {
												if (empty($berkas['foto_diri'])) { ?>
													<button class="btn btn-info" type="button" name="button1" data-toggle="modal" data-target="#foto_diri"> Upload </button>
												<?php } ?>
											<?php } ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (!empty($berkas['foto_diri'])) { ?>
												<button class="btn btn-success" type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$user_berkas['norek'].'/4' ?>'"> Download </button>
											<?php } ?>
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<div class="media-object">Karip</div>
									</td>
									<td><center>
										<?php if (!empty($berkas['karip'])) { ?>
											<i class="far fa-check-circle fa-2x"></i>
										<?php } ?></center>
									</td>
									<td>
										<center>
											<?php if ($this->session->uid == "0000000001"){ ?>
												<button class="btn btn-info" type="button" name="button1" data-toggle="modal" data-target="#karip"> Upload </button>
											<?php }else {
												if (empty($berkas['karip'])) { ?>
													<button class="btn btn-info" type="button" name="button1" data-toggle="modal" data-target="#karip"> Upload </button>
												<?php } ?>
											<?php } ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (!empty($berkas['karip'])) { ?>
												<button class="btn btn-success" type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$user_berkas['norek'].'/5' ?>'"> Download </button>
											<?php } ?>
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<div class="media-object">KTP Suami Istri</div>
									</td>
									<td><center>
										<?php if (!empty($berkas['ktp_suami_istri'])) { ?>
											<i class="far fa-check-circle fa-2x"></i>
										<?php } ?></center>
									</td>
									<td>
										<center>
											<?php if ($this->session->uid == "0000000001"){ ?>
												<button class="btn btn-info" type="button" name="button1" data-toggle="modal" data-target="#ktpsi"> Upload </button>
											<?php }else {
												if (empty($berkas['ktp_suami_istri'])) { ?>
													<button class="btn btn-info" type="button" name="button1" data-toggle="modal" data-target="#ktpsi"> Upload </button>
												<?php } ?>
											<?php } ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (!empty($berkas['ktp_suami_istri'])) { ?>
												<button class="btn btn-success" type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$user_berkas['norek'].'/6' ?>'"> Download </button>
											<?php } ?>
										</center>
									</td>
								</tr>
								<tr>
									<td>
										<div class="media-object">SK</div>
									</td>
									<td><center>
										<?php if (!empty($berkas['sk'])) { ?>
											<i class="far fa-check-circle fa-2x"></i>
										<?php }	?></center>
									</td>
									<td>
										<center>
											<?php if ($this->session->uid == "0000000001"){ ?>
												<button class="btn btn-info" type="button" name="button1" data-toggle="modal" data-target="#sk"> Upload </button>
											<?php }else {
												if (empty($berkas['sk'])) { ?>
													<button class="btn btn-info" type="button" name="button1" data-toggle="modal" data-target="#sk"> Upload </button>
												<?php } ?>
											<?php } ?>
										</center>
									</td>
									<td>
										<center>
											<?php if (!empty($berkas['sk'])) { ?>
												<button class="btn btn-success" type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$user_berkas['norek'].'/7' ?>'"> Download </button>
											<?php } ?>
										</center>
									</td>
								</tr>
							</tbody>
						</table><!-- End Foo Table - Filtering -->
					</div>
				</div>
			</div>
			<div class="col-lg-2"></div>
		</div><!--End page content-->
	</div>
</div>
</div>
<div class="modal fade" id="kk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Upload Berkas Kartu Keluarga (KK) </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form  action="<?= base_url().'upload_kk/'.$user_berkas['norek'].'/'.$this->session->uid ?>" method="post" enctype="multipart/form-data" >
				<div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload KK : </h4>
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
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Upload Berkas Slip Gaji </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form  action="<?= base_url().'upload_slip/'.$user_berkas['norek'].'/'.$this->session->uid ?>" method="post" enctype="multipart/form-data" >
				<div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload Slip Gaji : </h4>
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
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Upload Berkas MPWP </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form  action="<?= base_url().'upload_npwp/'.$user_berkas['norek'].'/'.$this->session->uid ?>" method="post" enctype="multipart/form-data" >
				<div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload NPWP : </h4>
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
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Upload Berkas Foto Diri </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form  action="<?= base_url().'upload_foto_diri/'.$user_berkas['norek'].'/'.$this->session->uid ?>" method="post" enctype="multipart/form-data" >
				<div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload Foto Diri : </h4>
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
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Upload Berkas Karip </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form  action="<?= base_url().'upload_karip/'.$user_berkas['norek'].'/'.$this->session->uid ?>" method="post" enctype="multipart/form-data" >
				<div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload Karip : </h4>
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
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Upload Berkas KTP Suami Istri </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form  action="<?= base_url().'upload_ktp/'.$user_berkas['norek'].'/'.$this->session->uid ?>" method="post" enctype="multipart/form-data" >
				<div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload KTP Suami Istri : </h4>
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
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Upload Berkas SK </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form  action="<?= base_url().'upload_sk/'.$user_berkas['norek'].'/'.$this->session->uid ?>" method="post" enctype="multipart/form-data" >
				<div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload SK : </h4>
					<input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto"><br>
				</div>
				<div class="modal-footer">
					<input type="submit" value="Register" class="btn btn-primary" >
				</div>
			</form>
		</div>
	</div>
</div>
