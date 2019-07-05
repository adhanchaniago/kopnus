<div class="boxed">
	<div id="content-container">
		<div class="pageheader hidden-xs">
			<h3>
					<a class="back" href="<?= base_url().'nasabah' ?>"><i class="fas fa-arrow-circle-left  fa-lg"></i></a>
					 Pinjaman <?= $dtlpinj['nama']; ?> </h3>
    </div>
    <div id="page-content">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel">
						<div class="panel-heading">
							<div class="row">
								<div class="col-sm-6">
									<h3 class="panel-title">Daftar Pinjaman</h3>
								</div>
								<div class="col-sm-3"></div>
								<div class="col-sm-3">
									<button class="btn btn-primary btn-sm btns" style="float:right;" type="button" onclick="location.href='<?php echo base_url().'input_pinjaman/'.$dtlpinj['norek']; ?>'">Input Pinjaman</button>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<table id="tabeluser" class="table table-bordered table-hover toggle-circle" data-page-size="10">
								<thead>
									<tr>
										<th>No</th>
										<th data-toggle="true">Pinjaman</th>
										<th data-hide="phone, tablet"><center>Tanggal Pengambilan</center></th>
										<th data-hide="phone, tablet"><center>Status</center></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($listpinj as $h) :?>
									<tr>
										<td><?= $i; ?></td>
										<td style="width:40%;">Rp.<?php echo number_format($h['pinjaman'], 0, ".", ".") ?></td>
										<td style="width:30%;"><center><?php echo tgl_indo($h['tanggal']); ?></center></td>
										<td style="width:30%;"><center>
											<?php $st = $h['status'];?>
											<?php if ($st == "0"){ ?>
												Belum Lunas
											<?php }else{ ?>
												Lunas
											<?php } ?>
										</center></td>
										<td><center>
											<button class="btn btn-primary btn-sm" type="button" onclick="location.href='<?= base_url().'angsuran_admin/'. $h['id_pinjaman'].'/'. $dtlpinj['norek']; ?>'">Lihat</button>
										</center>
										</td>
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
