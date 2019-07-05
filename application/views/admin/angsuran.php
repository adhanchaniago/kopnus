<div class="boxed">
	<div id="content-container">
		<div class="pageheader hidden-xs">
      <h3>
				<a class="back" href="<?= base_url().'pinjaman_admin/'.$usr_angsuran['norek'] ?>"><i class="fas fa-arrow-circle-left  fa-lg"></i></a>
				Angsuran <?= $usr_angsuran['nama']; ?> </h3>
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
								<?php $i=1; foreach ($list_angsuran as $k ):?>
								<tbody>
									<tr>
										<td><?= $i; ?></td>
										<td style="width:40%;">Rp.<?php echo number_format($k['angsuran'], 0, ".", ".") ?></td>
										<td style="width:30%;"><center>
									<?php echo tgl_indo($k['tanggal']); ?></center></td>
										<td style="width:30%;"><center>
											<?php  $var = $k['status']; ?>
											<?php if ($var == "1") {?>
												<p>Lunas</p>
											<?php }else {?>
												<form class="" action="<?= base_url().'bayar/'.$k['id_angsuran'].'/'.$k['id_pinjaman'] ?>" method="post">
													<div class="row">
														<select class="form-control select" name="status_angsuran" id="select1" onchange="showDiv('hidden_div', this)">
															<option value="0">Belum Lunas</option>
															<option value="1">Lunas</option>
														</select>
														<div id="hidden_div" style="display: none;">
															<button type="submit" class="button2"  name="button"><i class="far fa-save"></i></button>
														</div>
													</div>
												</form>
											<?php } ?>
										</center></td>
									</tr>
								</tbody>
							<?php $i++; endforeach; ?>
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
			</div><!--End page content-->
		</div>
	</div>
</div>
<script type="text/javascript">
function showDiv(divId, element)
{
		document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
}
</script>
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
