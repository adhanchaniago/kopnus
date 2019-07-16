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
							<div class="form-group mar-hor"><h4>Sampai</h4></div>
							<div class="form-group mar-rgt">
								<input type="date" class="form-control" name="date2">
							</div>
							<button class="btn btn-info ml-2" type="submit">Tampilkan</button>
						</form>
						<div class="col-lg-10">
							<div class="panel-body1">
								<table id="tabel_laporan" class="table table-bordered table-hover toggle-circle" data-page-size="10">
									<thead>
										<tr>
											<th><center>Norek</center></th>
											<th data-toggle="true" width="25%"><center>Nama Nasabah</center></th>
											<th><center>Angsuran Ke-</center></th>
											<th><center>Biaya Angsuran</center></th>
											<th><center>Tanggal Angsuran</center></th>
											<th><center>Status</center></th>
										</tr>
									</thead>
									<?php if (!empty($laporan)) {
									$i=1; foreach ($laporan as $l ):?>
									<tbody>
										<tr>
											<td><center><?= $l['norek']; ?></center></td>
											<td><?= $l['nama']; ?></td>
											<td><center>Ke-<?= $l['angsuran_ke']; ?></center></td>
											<td><center>Rp.<?= number_format($l['angsuran'], 0, ".", ".") ?></center></td>
											<td><center><?= tgl_indo($l['tanggal']); ?></center></td>
											<td><center><?php $st = $l['status'];?>
												<?php if ($st == "0"){ ?>
													Belum Lunas
												<?php } ?></center></td>
											</tr>
										</tbody>
										<?php $i++; endforeach; } ?>
									</table><!-- End Foo Table - Filtering -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
} ?>
