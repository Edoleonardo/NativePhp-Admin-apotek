<?php
require('../model/User.php');
checklogin();
$count = Getcount($conn);
$data_supp = GetDataSupplier($conn);
$data_brand = GetDataBrand($conn);
$data_kat = GetDataKategori($conn);
if (isset($_GET['bln'])) {
  $data_barang = Laporan($_GET['bln'], $conn);
} else {
  $data_barang = GetDataBarang($conn);
}
$pesan = GetDataPesan($conn);
$totalpesan = GetCountPesan($conn);
$now = GetDataPetugas($_SESSION['id_petugas'], $conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Apotek</title>

  <!-- Bootstrap -->
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
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
            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="../admin/images/profile/<?php echo $now['img']?>" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Welcome,</span>
              <h2><?php echo $now['nama_petugas'] ?></h2>
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
                    <li><a href="laporan.php">Laporan Barang</a></li>
                    <li><a href="laporan.php">Laporan Barang Masuk</a></li>
                    <li><a href="laporan.php">Laporan Barang Keluar</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
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
                  <img src="../admin/images/profile/<?php echo $now['img']?>" alt=""><?php echo $now['nama_petugas'] ?>
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
                          <span id="namabarang">Barang <?php echo $data_pesan['nama_barang'] ?></span>
                          <span class="time"><?php echo $data_pesan['create_date'] ?></span>
                        </span>
                        <span class="message">
                          <?php echo $data_pesan['desc'] ?>, Sisah Stock <?php echo $data_pesan['stock'] ?>
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                    <?php } ?>
                    <form action="../model/user.php" method="post">
                      <div class="text-center">
                        <button class="dropdown-item" type="submit" name="hapuspesan">Hapus Semua Pesan</button>
                      </div>
                    </form>
                    </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <div class="page-title">
            <div class="title_left">
              <h3>Laporan Bulanan</h3>
            </div>

            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <form action="../model/user.php" method="post">
                    <input type="month" id="start" name="bln">
                    <button type="submit" class="btn btn-primary" name="laporan">Pilih Bulan</button>
                  </form>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card-box table-responsive">
                        <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                          <thead>
                            <tr>
                              <th>Kode Barang</th>
                              <th>Nama Barang</th>
                              <th>Stock</th>
                              <th>Deskripsi</th>
                              <th>Harga Barang</th>
                              <th>Kategori</th>
                              <th>Supplier</th>
                              <th>Brand</th>
                              <th>Tempo Kadaluarsa</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php while ($data = mysqli_fetch_assoc($data_barang)) {
                              $kategori = GetKategoriDetiail($data['id_kategori'], $conn);
                              $brand = GetBrandDetiail($data['id_brand'], $conn);
                              $supplier = GetSupplierDetiail($data['id_supplier'], $conn);
                            ?>
                              <tr>
                                <td><?php echo $data['kode_barang'] ?></td>
                                <td><?php echo $data['nama_barang'] ?></td>
                                <td><?php echo $data['stock_barang'] ?></td>
                                <td><?php echo $data['deskripsi'] ?></td>
                                <td><?php echo $data['harga_barang'] ?></td>
                                <td><?php echo $kategori['nama_kategori'] ?></td>
                                <td><?php echo $supplier['nama_supplier'] ?></td>
                                <td><?php echo $brand['nama_brand'] ?></td>
                                <td><?php echo $data['create_date'] ?></td>
                              </tr>
                            <?php }  ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <!-- /page content -->

  <!-- footer content -->
  <footer>
    <div class="pull-right">
      Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
    </div>
    <div class="clearfix"></div>
  </footer>
  <!-- /footer content -->
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
  <!-- iCheck -->
  <script src="../vendors/iCheck/icheck.min.js"></script>
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

</body>

</html>