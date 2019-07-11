<div class="boxed">
	<div id="content-container">
		<div class="pageheader hidden-xs">
      <h3> <i class="fas fa-file"></i> Laporan Jatuh Tempo </h3>
    </div>
    <div id="page-content">
			<div class="col-lg-12">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">Laporan Nasabah Jatuh Tempo</h3>
				</div>
			<div class="panel-body">
				<form class="form-inline" action="<?= base_url().'tampilkan_laporan' ?>" method="post">	
					<div class="form-group mar-hor">
						<input type="date" class="form-control" name="date1">
					</div>
						<div class="form-group mar-hor">
							<h4>Sampai</h4>
						</div>
					<div class="form-group mar-rgt">
						<input type="date" class="form-control" name="date2">
					</div>
					<button class="btn btn-info ml-2" type="submit">Tampilkan</button>
				</form>
				<div class="panel-body1">
					<table id="tabel_laporan" class="table table-bordered table-hover toggle-circle" data-page-size="10">
						<thead>
							<tr>
								<th>No</th>
								<th data-toggle="true">Nama</th>
								<th data-hide="phone, tablet"><center>Angsuran Ke-</center></th>
								<th data-hide="phone, tablet"><center>Tanggal</center></th>
							</tr>
						</thead>
						<?php if (!empty($laporan)) {
							$i=1; foreach ($laporan as $l ):?>
							<tbody>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $l['nama']; ?></td>
								</tr>
							</tbody>
							<?php $i++; endforeach; } ?>
					<tfoot>
						<tr>
							<td colspan="10">
								<div class="text-right">
									<ul class="pagination">
									</ul>
								</div>
							</td>
						</tr>
					</tfoot>
					</table><!-- End Foo Table - Filtering -->
				</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
