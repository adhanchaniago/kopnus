<div class="boxed">
  <div id="content-container">
    <div class="pageheader hidden-xs">
      <h3><i class="fa fa-home"></i> Dashboard </h3>
    </div>
    <div id="page-content">
      <div class="row">
        <div class="col-md-3 eq-box-md grid">
          <div class="panel">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-10">
                  <h3 class="mar-no"> <span class="counter"><?= $nasabah; ?> Orang</span></h3>
                  <p class="mar-ver-5"> Jumlah Nasabah </p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fas fa-users fa-3x text-success"></i> </div>
              </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-10">
                  <h3 class="mar-no"> <span class="counter">Rp.<?php echo number_format($pinjaman, 0, ".", ".") ?></span></h3>
                  <p class="mar-ver-5"> Total Pinjaman </p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fas fa-hand-holding-usd fa-3x text-danger"></i> </div>
              </div>
            </div>
          </div>
          <div class="panel">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-10">
                  <h3 class="mar-no"> <span class="counter">Rp.<?php echo number_format($angsuran, 0, ".", ".") ?></span></h3>
                  <p class="mar-ver-5"> Total Pembayaran </p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-2"> <i class="fas fa-money-bill fa-3x text-primary"></i> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-9 eq-box-md grid">
            <div class="panel panel-1">
                <div class="panel-body">
                    <!--Flot Spline Chart placeholder -->
                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                    <div class="col-sm">

                      <img src="" alt=""style="height:500px" width="100%">
                    </div>
                    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                </div>
            </div>
        </div>
      </div>
    </div>
     <!--===================================================-->
    <!--END MAIN NAVIGATION-->
  </div>
  <!-- FOOTER -->
  <!--===================================================-->
  <footer id="footer">
    <p class="pad-lft">&#0169; 2019 KOPNUS</p>
  </footer>
  <!--===================================================-->
  <!-- END FOOTER -->
</div>
