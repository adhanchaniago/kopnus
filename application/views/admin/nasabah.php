<div class="boxed">
	<div id="content-container">
		<div class="pageheader hidden-xs">
      <h3><i class="fas fa-users"></i> Nasabah </h3>
    </div>
    <div id="page-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Nasabah</h3>
						</div>
						<div class="panel-body">
								<div class="col-sm-6">
									<form class="" action="<?= base_url('nasabah') ?>" method="post">
										<div class="form-group">
											<div class="row">
												<div class="col-sm-8">
													<input id="demo-foo-search" type="text" name="cari"placeholder="Cari nama" class="form-control search-input" autocomplete="off"  autofocus>
												</div>
												<div class="col-sm-4">
													<input class="btn btn-primary" height="250px" type="submit" value="Cari" name="submit">
												</div>
											</div>
										</div>
									</form>
								</div>
							<table id="tabeluser" class="table table-bordered table-hover toggle-circle" data-page-size="10">
								<thead>
									<tr>
										<th width="15%"><center>Norek</center></th>
										<th data-toggle="true"><center>Nama Nasabah</center></th>
										<th width="15%"><center>Pinjaman</center></th>
										<th width="15%"><center>Berkas</center></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($listusr as $dft) : ?>
									<tr>
										<td><center><?= $dft['norek'];  ?></center></td>
										<td><?= $dft['nama'];  ?></td>
										<td><center><a style="width:70%;" href="<?= base_url().'pinjaman_admin/'.$dft['norek']; ?>" class="btn btn-primary btn-sm">Lihat</a></center></td>
										<td><center><a style="width:70%;" href="<?= base_url().'berkas_admin/'.$dft['norek']; ?>" class="btn btn-primary btn-sm">Lihat</a></center></td>
									</tr>
								<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="6">
											<div class="text-right">
												<ul class="pagination"><?= $this->pagination->create_links(); ?></ul>
											</div>
										</td>
									</tr>
								</tfoot>
							</table><!-- End Foo Table - Filtering -->
						</div>
					</div>
				</div>
			</div><!--End page content-->
		</div>
	</div>
</div>
