<div class="boxed">
	<div id="content-container">
		<div class="pageheader hidden-xs">
      <h3> Input Pinjaman </h3>
    </div>
    <div id="page-content">
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Input Pinjaman</h3>
						</div>
						<div class="panel-body">
							<form class="panel-body form-horizontal" action="<?= base_url().'simpan_pinjaman/'.$inptpinj['norek']; ?>" method="post">
								<input type="hidden" name="id" value="<?= $inptpinj['norek']; ?>">
								<div class="form-group">
									<label class="col-md-3 control-label">Tanggal</label>
									<div class="col-md-9">
										<p class="form-control-static">
											<?php
											 $tgl=date('d-m-Y');
											 echo $tgl;
											 ?>
										</p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Nama Nasabah</label>
									<div class="col-md-9">
										<p class="form-control-static"><?= $inptpinj['nama']; ?></p>
									</div>
								</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="demo-text-input">Pinjaman</label>
										<div class="col-md-9">
											<input type="text" id="demo-text-input" class="form-control" name="pinjaman" class="uang" placeholder="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="demo-text-input">Angsuran</label>
										<div class="col-md-9">
											<select class="form-control" name="angsuran_kali" id="exampleFormControlSelect1">
									      <option value="12">12 Bulan</option>
									      <option value="13">13 Bulan</option>
									      <option value="14">14 Bulan</option>
									      <option value="15">15 Bulan</option>
												<option value="16">16 Bulan</option>
									      <option value="17">17 Bulan</option>
									      <option value="18">18 Bulan</option>
									      <option value="19">19 Bulan</option>
												<option value="20">20 Bulan</option>
									      <option value="21">21 Bulan</option>
									      <option value="22">22 Bulan</option>
									      <option value="23">23 Bulan</option>
												<option value="24">24 Bulan</option>
									    </select>
										</div>
									</div>
									<center>
										<button type="submit" name="button" class="btn">Simpan</button>
									</center>
							</form>
						</div>
					</div>
				</div>
			</div><!--End page content-->
		</div>
	</div>
</div>
