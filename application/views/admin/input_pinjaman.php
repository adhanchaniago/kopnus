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
										<p class="form-control-static">
											<?php
											 $tgl=date('d-m-Y');
											 echo $tgl;
											 ?>
										</p>
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
											<input type="text" id="input" class="form-control a2" name="pinjaman" class="uang" onkeyup="OnChange(this.value)" onKeyPress="return isNumberKey(event)" placeholder="">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="demo-text-input">Angsuran</label>
										<div class="col-md-9">
											<select class="form-control b2" name="angsuran_kali" id="select1" onchange="OnChange(this.value)">
									      <option value="12">12 Bulan</option>
									      <option value="13">13 Bulan</option>
									      <option value="14">14 Bulan</option>
									      <option value="15">15 Bulan</option>
												<option value="16">16 Bulan</option>
									      <option value="17">17 Bulan</option>
									      <option value="18">18 Bulan</option>
									      <option value="19">19 Bulan</option>
												<option value="20">20 Bulan</option>
									      <option value="21">21 Bulan</option>
									      <option value="22">22 Bulan</option>
									      <option value="23">23 Bulan</option>
												<option value="24">24 Bulan</option>
									    </select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label" for="demo-text-input">Pembayaran Angsuran Tiap Bulan</label>
										<div class="col-md-9">
											<input type="text" id="a" class="form-control c2" name="tampil" value="" readonly>
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
} ?>
</div>
<script >
function OnChange(value){
	var a = parseInt($(".a2").val());
	var b = parseInt($(".b2").val());
	var c = (a * 0.01 * b + a)/b;
	var d = c.toFixed(0);
 	$(".c2").val(d);
}
</script>
<script type="text/javascript">

	var rupiah = document.getElementById('a');
	rupiah.addEventListener('keyup', function(e){
		// tambahkan 'Rp.' pada saat form di ketik
		// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
		rupiah.value = formatRupiah(this.value, 'Rp. ');
	});

	/* Fungsi formatRupiah */
	function formatRupiah(angka, prefix){
		var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

		// tambahkan titik jika yang di input sudah menjadi angka ribuan
		if(ribuan){
			separator = sisa ? '.' : '';
			rupiah += separator + ribuan.join('.');
		}

		rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
	}
</script>
