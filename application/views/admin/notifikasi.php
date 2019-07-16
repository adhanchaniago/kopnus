<div class="boxed">
	<!--CONTENT CONTAINER-->
	<section id="content-container">
		<div class="pageheader hidden-xs">
			<h3> <i class="fas fa-bell fa-lg"></i> Notifikasi </h3>
		</div>
		<div id="page-content">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="panel">
						<div class="panel-body">
							<div class="tab-base">
								<!--Tabs Content-->
								<div class="tab-content">
									<div id="demo-lft-tab-1" class="tab-pane fade active in">
										<table class="table table-responsive">
											<thead>
												<tr>
													<th>No</th>
													<th data-toggle="true">Nasabah</th>
													<th data-hide="phone, tablet"><center>Pesan</center></th>
													<th data-hide="phone, tablet"><center>Tanggal</center></th>
												</tr>
											</thead>
											<tbody>
												<?php $i=1; foreach ($data_pesan as $d):
													if ($d['tanggal'] > date("Y-m-d") ) {?>
												<tr>
													<td><?= $i; ?></td>
													<td><?= $d['nama']; ?></td>
													<td>Angsuran Ke-<?= $d['angsuran_ke']; ?> akan jatuh tempo</td>
													<td><?= tgl_indo($d['tanggal']); ?></td>
												</tr>
											<?php }else{ ?>
												<tr>
													<td><?= $i; ?></td>
													<td><?= $d['nama']; ?></td>
													<td>Angsuran Ke-<?= $d['angsuran_ke']; ?> telah jatuh tempo</td>
													<td><?= tgl_indo($d['tanggal']); ?></td>
												</tr>
											<?php }$i++; endforeach; ?>
											</tbody>
										</table>
									</div>
								</div>
								</div>
							</div>
							<!--===================================================-->
							<!--End Default Tabs (Left Aligned)-->
						</div>
					</div>
				</div>
			</div>
		<!--===================================================-->
		<!--End page content-->
	</section>
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
