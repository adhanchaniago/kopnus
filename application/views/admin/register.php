<div class="boxed">
	<div id="content-container">
		<div class="pageheader hidden-xs">
      <h3> Register </h3>
    </div>
    <div id="page-content">

<div class="lock-wrapper">
		<div class="panel lock-box">
				<h4> Register User</h4>
				<?php if ($info == "1"): ?>
					<div class="alert alert-danger" role="alert">
						Password tidak sama !!!
					</div>
				<?php endif; ?>
				<?php if ($info == "0"): ?>
					<div class="alert alert-success" role="alert">
						Register Berhasil
					</div>
				<?php endif; ?>
				<?php if ($info == "3"): ?>
					<div class="alert alert-danger" role="alert">
						Norek Telah Digunakan.
					</div>
				<?php endif; ?>
				<div class="row">
						<form id="registration" class="form-inline" action="<?= base_url().'req' ?>" method="post">
								<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<div id="demo-error-container"></div>
								</div>
								<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<div class="text-left">
												<label for="signupInputName" class="control-label">Norek</label>
												<input id="signupInputName" type="text" placeholder="isi norek" class="form-control" name="norek" required/>
										</div>
								</div>
								<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<div class="text-left">
												<label for="signupInputName" class="control-label">Nama</label>
												<input id="signupInputName" type="text" placeholder="Isi Nama" class="form-control" name="nama" required/>
										</div>
								</div>
								<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<div class="text-left">
												<label for="signupInputPassword" class="control-label">Password</label>
												<input id="signupInputPassword" type="password" placeholder="Password" class="form-control lock-input" name="password" minlength="5" required/>
										</div>
								</div>
								<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<div class="text-left">
												<label for="signupInputRepassword" class="control-label">Retype Password</label>
												<input id="signupInputRepassword" type="password" placeholder="Retype Password" class="form-control lock-input" name="confirmPassword" minlength="5" required/>
										</div>
								</div>
								<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<div class="text-left">
												<label for="signupInputName" class="control-label">Alamat</label>
												<input id="signupInputName" type="text" placeholder="Isi Alamat" class="form-control" name="alamat" required/>
										</div>
								</div>
								<div class="form-group col-md-12 col-sm-12 col-xs-12">
										<div class="text-left">
												<label for="signupInputName" class="control-label">No Telepon</label>
												<input id="signupInputName" type="text" placeholder="Isi Telepon" class="form-control" name="no_tlp" minlength="8" required/>
										</div>
								</div>
								<center>
								<button type="submit" class="btn btn-block btn-primary">Daftar</button>
							</center>
						</form>
				</div>
		</div>
</div>
</div>
</div>
</div>
