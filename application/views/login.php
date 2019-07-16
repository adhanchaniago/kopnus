<div class="boxed">
	<div id="content-container">
		<div class="pageheader hidden-xs"></div>
		<div id="page-content">
			<div class="lock-wrapper">
				<div class="row">
					<div class="col-xs-12">
						<div class="lock-box">
							<div class="main">
								<h3>Login</h3>
								<?php if ($cek == "1"): ?>
									<div class="alert alert-danger" role="alert">
										Username dan password salah
									</div>
								<?php endif; ?>
								<form role="form" action="<?= base_url().'signin' ?>" method="post">
									<div class="form-group">
										<label for="inputUsernameEmail">Nama</label>
										<input type="text" class="form-control" name="nama" autofocus required>
									</div>
									<div class="form-group">
										<label for="inputPassword">Password</label>
										<input type="password" class="form-control" name="password" required>
									</div>
									<button type="submit" class="btn btn btn-primary pull-right">Log In</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
