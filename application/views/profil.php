
	<div id="content-container">
		<div class="pageheader hidden-xs">
      <h3> Profil </h3>
    </div>
    <div id="page-content">
			<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
      	<div class="userWidget-1">
        	<div class="avatar bg-info">
            <img src="<?= base_url().'asset/upload/'.$user['foto'] ?>" alt="avatar">
            <div class="name osLight"> <?= $user['nama']; ?> </div>
          </div>
          <br><br><br>
        </div>
        <div class="panel">
        	<div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user"> </i> Informasi Nasabah </h3>
          </div>
          <div class="panel-body">
          	<table class="table">
              <tbody>
                <tr>
                	<td><i class="fas fa-map-marker-alt ph-5"></i></td>
                  <td> Alamat </td>
                  <td> <?= $user['alamat']; ?> </td>
                </tr>
                <tr>
                  <td><i class="fa fa-phone ph-5"></i></td>
                  <td> Telepon </td>
                  <td> <?= $user['no_tlp']; ?> </td>
                </tr>
              </tbody>
            </table>
          </div>
				</div>
      </div>
			<div class="row">
				<div class="col-sm-3">
					<div class="card">
						<div class="card-body" >
							<form  action="<?= base_url().'update' ?>" method="post" enctype="multipart/form-data" >
								<h4 class="a" for="exampleFormControlFile1" >Upload Foto Profil : </h4>
								<input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto" required><br>
								<input type="submit" value="Register" class="btn btn-primary" >
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
