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
										<th data-toggle="true">Pinjaman</th>
										<th data-hide="phone, tablet"><center>Tanggal Pengambilan</center></th>
										<th data-hide="phone, tablet"><center>Status</center></th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1; foreach ($pinjaman as $l):?>
									<tr>
										<td><?= $i; ?></td>
										<td style="width:40%;"><a href="<?= base_url().'angsuran/'. $l['id_pinjaman'].'/'. $this->session->uid; ?>">Rp.<?php echo number_format($l['pinjaman'], 0, ".", ".") ?></a></td>
										<td style="width:30%;"><center><?= $l['tanggal']; ?></center></td>
										<td style="width:30%;"><center><?php $st = $l['status'];?>
										<?php if ($st == "0"){ ?>
											Belum Lunas
										<?php }else{ ?>
											Lunas
										<?php } ?></center></td>
									</tr>
								<?php $i++;
							endforeach; ?>
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
