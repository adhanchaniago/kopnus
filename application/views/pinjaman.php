<div class="boxed">
	<div id="content-container">
		<div class="pageheader hidden-xs">
			<h3> Pinjaman </h3>
		</div>
		<div id="page-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Pinjaman</h3>
						</div>
						<div class="panel-body">
							<table id="tabeluser" class="table table-bordered table-hover toggle-circle" data-page-size="10">
								<thead>
									<tr>
										<th>No</th>
										<th>Pinjaman</th>
										<th><center>Tanggal Pengambilan</center></th>
										<th><center>Status</center></th>
										<th><center>Angsuran</center></th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($pinjaman as $l):?>
										<tr>
											<td><?= $i; ?></td>
											<td style="width:35%;">Rp.<?php echo number_format($l['pinjaman'], 0, ".", ".") ?></td>
											<td style="width:25%;"><center><?php echo tgl_indo($l['tanggal']); ?></center></td>
											<td style="width:25%;"><center><?php $st = $l['status'];?>
												<?php if ($st == "0"){ ?>
													Belum Lunas
												<?php }else{ ?>
													Lunas
												<?php } ?></center></td>
												<td><center>
													<button class="btn btn-primary btn-sm" type="button" onclick="location.href='<?= base_url().'angsuran/'. $l['id_pinjaman'].'/'. $this->session->uid; ?>'">Lihat</button>
												</center>
											</td>
										</tr>
										<?php $i++;endforeach; ?>
								</tbody>
							</table><!-- End Foo Table - Filtering -->
						</div>
					</div>
				</div>
			</div><!--End page content-->
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
