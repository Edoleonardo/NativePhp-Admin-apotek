<?php
require('../model/User.php');
checklogin();
$logo = GetDataLogo($conn);
$data_supplier = GetDataSupplier($conn);
$pesan = GetDataPesan($conn);
$totalpesan = GetCountPesan($conn);
$now = GetDataPetugas($_SESSION['id_petugas'], $conn);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <link rel="icon" href="images/logo/<?php echo $logo['nama_logo'] ?>" type="image/ico" />

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

  <title>Apotek Centra Medika</title>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
  <!-- Datatables -->

  <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.php" class="site_title"><img width="50px" src="../admin/images/logo/<?php echo $logo['nama_logo'] ?>" /> <span>Apotek Centra Medika</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="../admin/images/profile/<?php echo $now['img'] ?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2> <?php echo $now['nama_petugas'] ?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="index.php">Barang</a></li>
                    <li><a href="barang_masuk.php">Barang Masuk</a></li>
                    <li><a href="barang_keluar.php">Barang Keluar</a></li>
                    <li><a href="supplier.php">Supplier</a></li>
                    <li><a href="kategori.php">Kategori</a></li>
                    <li><a href="brand.php">Brand</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-print"></i> Cetak Laporan <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="kartu_stock.php">Kartu Stock</a></li>
                    <li><a href="laporan.php">Laporan Barang</a></li>
                    <li><a href="laporan_masuk.php">Laporan Barang Masuk</a></li>
                    <li><a href="laporan_keluar.php">Laporan Barang Keluar</a></li>
                  </ul>
                </li>
              </ul>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-folder-open-o"></i> EOQ <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="eoq.php">Economic Order Quantity</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
              <li class="nav-item dropdown open" style="padding-left: 15px;">
                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="../admin/images/profile/<?php echo $now['img'] ?>" alt=""><?php echo $now['nama_petugas'] ?>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../admin/profile.php"> Profile</a>
                    <a class="dropdown-item" href="../login_admin/logout_admin.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
              </li>
              <li role="presentation" class="nav-item dropdown open">
                <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <?php if ($totalpesan['total'] != 0) { ?>
                    <span class="badge bg-green"><?php echo $totalpesan['total'] ?></span>
                  <?php } ?>
                </a>
                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                  <?php while ($data_pesan = mysqli_fetch_assoc($pesan)) { ?>
                    <li class="nav-item" onclick="myFunction()">
                      <a class="dropdown-item">
                        <span class="image"><img src="../admin/images/barang/<?php echo $data_pesan['img'] ?>" alt="Profile Image" /></span>
                        <span>
                          <span id="namabarang" class="<?php echo $data_pesan['nama_barang'] ?>">Barang <?php echo $data_pesan['nama_barang'] ?></span>
                          <span class="time"><?php echo $data_pesan['create_date'] ?></span>
                        </span>
                        <span class="message">
                          <?php echo $data_pesan['desc'] ?>, Sisah Stock <?php echo $data_pesan['stock'] ?>
                        </span>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">

        <br />

        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h2>Profile</h2>
                <div class="clearfix"></div>
              </div>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modallogo">Ganti Logo</button>
              <div class="x_content">
                <br />
                <div style="text-align: center;">
                  <a type="button" data-toggle="modal" data-target="#modalfoto">
                    <img style="border: solid; max-width: 150px;" src="../admin/images/profile/<?php echo $now['img'] ?>">
                  </a>
                </div>
                <form action="../model/user.php" method="post">
                  <br><br>
                  <div class="item form-group">
                    <input type="hidden" name="id" value="<?php echo $now['id_petugas'] ?>">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Petugas</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input type="text" name="nama" class="form-control" value="<?php echo $now['nama_petugas'] ?>"></input>
                    </div>
                  </div>
                  <div class="item form-group">
                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email Petugas</label>
                    <div class="col-md-6 col-sm-6 ">
                      <input disabled type="email" name="email" class="form-control" value="<?php echo $now['email'] ?>">
                    </div>
                  </div>
                  <div class="item form-group" style="text-align: center;">
                    <div class="col-md-6 col-sm-6 offset-md-3">
                      <button type="submit" name="ubahnama" class="btn btn-success">Simpan</button>
                    </div>
                  </div>
                </form>
                <div class="text-center">
                  <button class="btn btn-success pass" data-toggle="modal" data-target="#ubahpass">Ubah Password</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!------------------ Modal Ubah Foto----------------------->
        <div class="modal fade" id="modalfoto" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Upload Foto</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="x_content">
                  <!-- start form for validation -->
                  <form action="../model/user.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $now['id_petugas'] ?>">
                    <input type="file" name="img"> <span class="text-muted">jpg, png</span></td>
                    <br><br>
                    <button type="submit" class="btn btn-primary" name="fotoprofile">Upload</button>
                  </form>
                  <!-- end form for validations -->

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- Modal -->
        <!------------------ Modal Ubah Logo----------------------->
        <div class="modal fade" id="modallogo" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Upload Logo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="x_content">
                  <!-- start form for validation -->
                  <form action="../model/user.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $now['id_petugas'] ?>">
                    <input type="file" name="img"> <span class="text-muted">jpg, png</span></td>
                    <br><br>
                    <button type="submit" class="btn btn-primary" name="fotologo">Upload</button>
                  </form>
                  <!-- end form for validations -->

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- Modal -->
        <!------------------ Modal Ubah Password----------------------->
        <div class="modal fade" id="ubahpass" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Ubah Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="x_content">
                  <!-- start form for validation -->
                  <form action="../model/user.php" method="post">
                    <br><br>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password Lama</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="password" name="passlama" class="form-control"></input>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Password Baru</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="password" name="pass1" class="form-control">
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Ketik Ulang Password</label>
                      <div class="col-md-6 col-sm-6 ">
                        <input type="password" name="pass2" class="form-control">
                      </div>
                    </div>
                    <div class="item form-group" style="text-align: center;">
                      <div class="col-md-6 col-sm-6 offset-md-3">
                        <input type="hidden" name="id" value="<?php echo $now['id_petugas'] ?>">
                        <button type="submit" name="ubahpassword" class="btn btn-success">Ubah</button>
                      </div>
                    </div>
                  </form>
                  <!-- end form for validations -->
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- Modal -->
      </div>
      <!-- /page content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="../vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="../vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="../vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- gauge.js -->
  <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
  <!-- bootstrap-progressbar -->
  <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>
  <!-- Skycons -->
  <script src="../vendors/skycons/skycons.js"></script>
  <!-- Flot -->
  <script src="../vendors/Flot/jquery.flot.js"></script>
  <script src="../vendors/Flot/jquery.flot.pie.js"></script>
  <script src="../vendors/Flot/jquery.flot.time.js"></script>
  <script src="../vendors/Flot/jquery.flot.stack.js"></script>
  <script src="../vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="../vendors/DateJS/build/date.js"></script>
  <!-- JQVMap -->
  <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
  <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="../vendors/moment/min/moment.min.js"></script>
  <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- Datatables -->
  <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="../vendors/jszip/dist/jszip.min.js"></script>
  <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="../build/js/custom.min.js"></script>
  <script>
    $(document).on("click", " li>.dropdown-item", function() {
      var a = $(this).find("#namabarang").attr('class');
      if (!a) {
        a = "";
      }
      sessionStorage.setItem("key", a);

      window.location.href = 'index.php';
    });
  </script>
</body>

</html>