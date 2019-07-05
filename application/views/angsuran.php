<div class="boxed">
	<div id="content-container">
		<div class="pageheader hidden-xs">
      <h3> Angsuran</h3>
    </div>
    <div id="page-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Pinjaman Rp.<?php echo number_format($list_pinjaman['pinjaman'], 0, ".", ".") ?></h3>
						</div>
						<div class="panel-body">
							<table id="tabeluser" class="table table-bordered table-hover toggle-circle" data-page-size="10">
								<thead>
									<tr>
										<th>No</th>
										<th data-toggle="true">Angsuran</th>
										<th data-hide="phone, tablet"><center>Tanggal</center></th>
										<th data-hide="phone, tablet"><center>Status</center></th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($list_angsuran as $c):?>
									<tr>
										<td><?= $i; ?></td>
										<td style="width:40%;">Rp.<?php echo number_format($c['angsuran'], 0, ".", ".") ?></td>
										<td style="width:30%;"><center><?php echo tgl_indo($c['tanggal']); ?></center></td>
										<td style="width:30%;"><center><?php $st = $c['status'];?>
										<?php if ($st == "0"){ ?>
											Belum Lunas
										<?php }else{ ?>
											Lunas
										<?php } ?></center></td>
									</tr>
								<?php $i++; endforeach; ?>
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
