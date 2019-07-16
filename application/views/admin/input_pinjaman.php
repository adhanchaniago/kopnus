<div class="boxed">
	<div id="content-container">
		<div class="pageheader hidden-xs">
      <h3> Input Pinjaman </h3>
    </div>
    <div id="page-content">
			<div class="row">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">Input Pinjaman</h3>
						</div>
						<div class="panel-body">
							<form  id="form_input" name="form_input" class="panel-body form-horizontal" action="<?= base_url().'simpan_pinjaman/'.$inptpinj['norek']; ?>" method="post">
								<input type="hidden" name="id" value="<?= $inptpinj['norek']; ?>">
								<div class="form-group">
									<label class="col-md-3 control-label">Tanggal</label>
									<div class="col-md-9">
										<p class="form-control-static"><?= tgl_indo(date('Y-m-d')); ?></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label">Nama Nasabah</label>
									<div class="col-md-9">
										<p class="form-control-static"><?= $inptpinj['nama']; ?></p>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-text-input">Pinjaman</label>
									<div class="col-md-9">
										<input type="number" id="input" class="form-control a2" name="pinjaman" class="uang" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" placeholder="Isi Pinjaman" autofocus required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-text-input">Angsuran</label>
									<div class="col-md-9">
										<select class="form-control b2" name="angsuran_kali" id="select1" onchange="OnChange(this.value)">
											<option value="12">12 Kali</option>
											<option value="13">13 Kali</option>
											<option value="14">14 Kali</option>
											<option value="15">15 Kali</option>
											<option value="16">16 Kali</option>
											<option value="17">17 Kali</option>
											<option value="18">18 Kali</option>
											<option value="19">19 Kali</option>
											<option value="20">20 Kali</option>
											<option value="21">21 Kali</option>
											<option value="22">22 Kali</option>
											<option value="23">23 Kali</option>
											<option value="24">24 Kali</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="demo-text-input">Pembayaran Angsuran Tiap Bulan</label>
									<div class="col-md-9">
										<input type="text" id="a" class="form-control c2" name="tampil" readonly>
									</div>
								</div>
								<center>
									<button type="submit" name="button" class="btn">Simpan</button>
								</center>
							</form>
						</div>
					</div>
				</div>
			</div><!--End page content-->
		</div>
	</div>
</div>
<script>
function OnChange(value){
	var a = parseInt($(".a2").val());
	var b = parseInt($(".b2").val());
	var c = (a * 0.01 * b + a)/b;
	var d = c.toFixed(0);
 	$(".c2").val(d);
}</script>
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
