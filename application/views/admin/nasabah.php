<div class="boxed">
	<div id="content-container">
		<div class="pageheader hidden-xs">
      <h3> Nasabah </h3>
    </div>
    <div id="page-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Nasabah</h3>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<input id="demo-foo-search" type="text" placeholder="Cari nama" class="form-control search-input" autocomplete="off">
									</div>
								</div>
							</div>
							<table id="tabeluser" class="table table-bordered table-hover toggle-circle" data-page-size="10">
								<thead>
									<tr>
										<th>Norek</th>
										<th data-toggle="true">Nama Nasabah</th>
										<th data-hide="phone, tablet"><center>Pinjaman</center></th>
										<th data-hide="phone, tablet"><center>Berkas</center></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($listusr as $dft) : ?>
									<tr>
										<td><center><?= $dft['norek'];  ?></center></td>
										<td style="width:65%;"><?= $dft['nama'];  ?></td>
										<td><center><a style="width:70%;" href="<?= base_url().'pinjaman_admin/'.$dft['norek']; ?>" class="btn btn-primary btn-sm">Lihat</a></center></td>
										<td><center><a style="width:70%;" href="<?= base_url().'berkas_admin/'.$dft['norek']; ?>" class="btn btn-primary btn-sm">Lihat</a></center></td>
									</tr>
								<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="6">
											<div class="text-right">
												<ul class="pagination"></ul>
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
