<div id="container" class="effect mainnav-sm navbar-fixed mainnav-fixed">
  <header id="navbar">
    <div id="navbar-container" class="boxed">
        <!--Navbar Dropdown-->
      <div class="navbar-content clearfix">
        <ul class="nav navbar-top-links pull-left">
          <li class="tgl-menu-btn">
            <a class="mainnav-toggle" href="#"> <i class="fa fa-bars fa-lg"></i></a>
          </li>
        </ul>
        <ul class="nav navbar-top-links pull-left">
          <?php if (isset($this->session->uid)){
            if ($this->session->uid == "1") {
            ?>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle"> <i class="fa fa-bell fa-lg"></i> <span class="badge badge-header badge-danger"></span><?= $jumlah; ?></a>
            <!--Notification dropdown menu-->
            <div class="dropdown-menu dropdown-menu-md with-arrow">
              <div class="pad-all bord-btm">
                <div class="h4 text-muted text-thin mar-no"> Notification </div>
              </div>
              <div class="nano scrollable">
                <div class="nano-content">
                  <ul class="head-list">
                    <!-- Dropdown list-->
                    <?php foreach ($jatuh_tempo as $p) :?>
                    <li>
                      <a href="#" class="media">
                        <div class="media-left"> <span class="icon-wrap icon-circle bg-danger"> <i class="far fa-calendar-alt fa-lg"></i> </span> </div>
                        <div class="media-body">
                          <div class="text-nowrap"><?= $p['nama']; ?> Angsuran Ke-<?= $p['id_angsuran']; ?> Telah Jatuh Tempo</div>
                        </div>
                      </a>
                    </li>
                  <?php endforeach; ?>
                    <!-- Dropdown list-->
                    <!--   <li>
                      <a href="#" class="media">
                        <div class="media-left"> <span class="icon-wrap icon-circle bg-success"> <i class="fas fa-user fa-lg"></i> </span> </div>
                        <div class="media-body">
                          <div class="text-nowrap">Selamat Datang</div>
                          <small class="text-muted">1 Bulan Yang Lalu</small>
                        </div>
                      </a>
                    </li>-->
                  </ul>
                </div>
              </div>
            </div>
          </li>
        <?php }else {?>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle"> <i class="fa fa-bell fa-lg"></i> <span class="badge badge-header badge-danger"></span><?= $jumlah; ?></a>
            <!--Notification dropdown menu-->
            <div class="dropdown-menu dropdown-menu-md with-arrow">
              <div class="pad-all bord-btm">
                <div class="h4 text-muted text-thin mar-no"> Notification </div>
              </div>
              <div class="nano scrollable">
                <div class="nano-content">
                  <ul class="head-list">
                    <!-- Dropdown list-->
                    <?php foreach ($jatuh_tempo as $p) :?>
                    <li>
                      <a href="#" class="media">
                        <div class="media-left"> <span class="icon-wrap icon-circle bg-danger"> <i class="far fa-calendar-alt fa-lg"></i> </span> </div>
                        <div class="media-body">
                          <div class="text-nowrap"><?= $p['nama']; ?> Angsuran Ke-<?= $p['id_angsuran']; ?> Telah Jatuh Tempo</div>
                        </div>
                      </a>
                    </li>
                  <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          </li>
        <?php } ?>
        <?php } ?>
        </ul>

        <ul class="nav navbar-top-links pull-right">
          <?php if( !isset( $this->session->uid ) ){?>
            <li><a href="<?= base_url().'login' ?>"> <i class="fa fa-user fa-fw"></i> Login </a></li>
          <?php } ?>
          <?php if( isset( $this->session->uid ) ){?>
            <li id="dropdown-user" class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle text-right">
              <span class="pull-right"> <img class="img-circle img-user media-object" src="<?= base_url().'asset/upload/'.$user['foto'] ?>" alt="Profile Picture"> </span>
                <div class="username hidden-xs"><?= $this->session->nama; ?> </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right with-arrow">
            <!-- User dropdown menu -->
              <ul class="head-list">
                <li><a href="<?= base_url().'profil' ?>"> <i class="fa fa-user fa-fw"></i> Profil </a></li>
                <li><a href="<?= base_url().'signout' ?>"> <i class="fas fa-sign-out-alt"></i> Logout </a></li>
              </ul>
            </div>
            </li>
              <?php } ?>
              <!--End user dropdown-->
          </ul>
        </div>  <!--End Navbar Dropdown-->
      </div>
  </header><!--END NAVBAR-->
  <nav id="mainnav-container">
  <!--Brand logo & name-->
  <!--================================-->
  <div class="navbar-header">
    <a href="index.html" class="navbar-brand">
      <i class="brand-icon"></i>
      <div class="brand-title"><span class="brand-text">KOPNUS</span></div>
    </a>
  </div><!--End brand logo & name-->
  <div id="mainnav"><!--Menu-->
    <div id="mainnav-menu-wrap">
      <div class="nano">
        <div class="nano-content">
          <ul id="mainnav-menu" class="list-group">
            <!--Category name-->
            <li class="list-header">Menu List</li><!--Menu list item-->
            <li> <a href="<?= base_url() ?>"> <i class="fa fa-home"></i> <span class="menu-title"> Dashboard </span></a></li>
            <?php if ( $this->session->uid == "1"): ?>
            <li> <a href="<?= base_url().'register' ?>"> <i class="fas fa-user-plus"></i> <span class="menu-title"> Register </span></a></li>
            <?php endif; ?>
            <?php if( isset( $this->session->uid ) ){?>
            <?php if ( $this->session->uid == "1"): ?>
            <li><a href="#"><i class="fa fa-file"></i><span class="menu-title"> Dokumen </span><i class="arrow"></i></a>
            <!--Submenu-->
            <ul class="collapse">
              <li><a href="<?= base_url().'nasabah' ?>"> Nasabah </a></li>
            </ul>
            </li>
            <?php endif; ?>
            <?php if ( $this->session->uid !== "1"): ?>
            <li><a href=""><i class="fa fa-file"></i><span class="menu-title"> Dokumen </span><i class="arrow"></i></a>
            <!--Submenu-->
            <ul class="collapse">
              <li><a href="<?= base_url().'pinjaman' ?>"> Pinjaman </a></li>
              <li><a href="<?= base_url().'angsuran' ?>"> Angsuran </a></li>
              <li><a href="<?= base_url().'berkas' ?>"> Berkas </a></li>
            </ul>
            </li>
            <?php endif; ?>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div><!--End menu-->
  </div>
  </nav>
