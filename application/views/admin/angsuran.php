<div class="boxed">
	<div id="content-container">
		<div class="pageheader hidden-xs">
			<h3><a class="back" href="<?= base_url().'pinjaman_admin/'.$usr_angsuran['norek'] ?>"><i class="fas fa-arrow-circle-left  fa-lg"></i></a>Angsuran <?= $usr_angsuran['nama']; ?></h3>
		</div>
		<div id="page-content">
			<div class="col-lg-2"></div>
			<div class="col-lg-8">
				<div class="panel">
					<div class="panel-heading">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="panel-title">Pinjaman Rp.<?php echo number_format($list_pinjaman['pinjaman'], 0, ".", ".") ?></h3>
							</div>
							<div class="col-sm-3"></div>
							<div class="col-sm-3">
								<div class="row">
									<button class="btn btn-info btns" type="button" name="button1" data-toggle="modal" data-target="#berkas"> Upload </button>
									<button class="btn btn-success btns" type="button" name="button2" onclick="location.href='<?= base_url().'download/'.$id."/8" ?>'"> Download </button>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<table id="tabelangsuran" class="table table-bordered table-hover toggle-circle" data-page-size="10">
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
										<td style="width:40%;">Rp.<?= number_format($k['angsuran'], 0, ".", ".") ?></td>
										<td style="width:30%;"><center><?= tgl_indo($k['tanggal']); ?></center></td>
										<td style="width:30%;"><center><?php  $var = $k['status']; if ($var == "1") {?><p>Lunas</p><?php }else {?>
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
						</table><!-- End Foo Table - Filtering -->
					</div>
				</div>
			</div><!--End page content-->
		</div>
	</div>
</div>
<div class="modal fade" id="berkas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Upload Berkas Perjanjian </h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<form  action="<?= base_url().'upload_perjanjian/'.$id; ?>" method="post" enctype="multipart/form-data" >
				<div class="modal-body">
					<h4 class="a" for="exampleFormControlFile1" >Upload Perjanjian : </h4>
					<input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto"><br>
				</div>
				<div class="modal-footer">
					<input type="submit" value="Register" class="btn btn-primary" >
				</div>
			</form>
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
