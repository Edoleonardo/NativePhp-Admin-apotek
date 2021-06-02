<?php
require('../model/User.php');
checklogin();
$count = Getcount($conn);
$data_supp = GetDataSupplier($conn);
$data_brand = GetDataBrand($conn);
$data_kat = GetDataKategori($conn);
$data_barang = GetDataBarang($conn);
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
  <link rel="icon" href="images/favicon.ico" type="image/ico" />

  <title>Gentelella Alela! | </title>

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
<style>
  .tile-stats {
    background-color: beige;
    height: 120px;
  }

  h1 {
    text-align: center;
  }


  .Stockbaranghampirhabis {
    background-color: #f54e42;
  }

  .BarangKadaluarsa {
    background-color: #ffa500;
  }

  .kanan {
    margin-left: 60%;
  }
</style>

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
              <img src="../admin/images/profile/<?php echo $now['img'] ?>" alt="..." class="img-circle profile_img">
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
                    <li><a href="laporan_masuk.php">Laporan Barang Masuk</a></li>
                    <li><a href="laporan_keluar.php">Laporan Barang Keluar</a></li>
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
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="../login_admin/logout_admin.php">
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
                <a class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                  <img src="../admin/images/profile/<?php echo $now['img'] ?>" alt=""><?php echo $now['nama_petugas'] ?>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../admin/profile.php"> Profile</a>
                    <a class="dropdown-item" href="../login_admin/logout_admin.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
              </li>
              <li role="presentation" class="nav-item dropdown open">
                <a class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <?php if ($totalpesan['total'] != 0) { ?>
                    <span class="badge bg-green"><?php echo $totalpesan['total'] ?></span>
                  <?php } ?>
                </a>
                <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                  <?php while ($data_pesan = mysqli_fetch_assoc($pesan)) { ?>
                    <li class="nav-item">
                      <a class="dropdown-item">
                        <span class="image"><img src="../admin/images/barang/<?php echo $data_pesan['img'] ?>" alt="Profile Image" /></span>
                        <span>
                          <span id="namabarang">Barang <?php echo $data_pesan['nama_barang'] ?></span>
                          <!-- <span class="hide hidden-name"><?php echo $data_pesan['nama_barang'] ?></span> -->
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
        <!-- top tiles -->
        <div class="row" style="display: inline-block;">
          <div class="row">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
              <div class="tile-stats">
                <h1><?php echo $count[0] ?></h1>
                <p><b>Total Barang</b></p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
              <div class="tile-stats">
                <h1><?php echo $count[1] ?></h1>
                <p><b> Total Barang Masuk</b></p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
              <div class="tile-stats">
                <h1><?php echo $count[2] ?></h1>
                <p><b> Total Barang Keluar</b></p>
              </div>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
              <div class="tile-stats">
                <h1><?php echo $count[3] ?></h1>
                <p><b> Total Supplier</b></p>
              </div>
            </div>
          </div>
        </div>
        <!-- /top tiles -->
        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <div class="clearfix"></div>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah Barang</button>
                <button type="button" class="btn btn-danger kanan" disabled>Stok kurang</button>
                <button type="button" class="btn btn-warning" disabled>Kadaluarsa</button>

              </div>
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>Gambar</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stock</th>
                            <th>Deskripsi</th>
                            <th>Harga Barang</th>
                            <th>Kategori</th>
                            <th>Supplier</th>
                            <th>Brand</th>
                            <th>Tempo Kadaluarsa</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>


                        <tbody>
                          <?php $i = 0;
                          while ($data = mysqli_fetch_assoc($data_barang)) {
                            $kategori = GetKategoriDetiail($data['id_kategori'], $conn);
                            $brand = GetBrandDetiail($data['id_brand'], $conn);
                            $supplier = GetSupplierDetiail($data['id_supplier'], $conn);
                            $pesan = GetDetailPesan($data['id_barang'], $conn);
                          ?>
                            <tr style="<?php echo $pesan ?>">
                              <td><img width="100px" class="responsive" src="../admin/images/barang/<?php echo $data['gambar_barang'] ?>" alt=""></td>
                              <td><?php echo $data['kode_barang'] ?></td>
                              <td><?php echo $data['nama_barang'] ?></td>
                              <td><?php echo $data['stock_barang'] ?></td>
                              <td><?php echo $data['deskripsi'] ?></td>
                              <td><?php echo $data['harga_barang'] ?></td>
                              <td><?php echo $kategori['nama_kategori'] ?></td>
                              <td><?php echo $supplier['nama_supplier'] ?></td>
                              <td><?php echo $brand['nama_brand'] ?></td>
                              <td><?php echo $data['tempo_barang'] ?></td>
                              <td><button style="background-color:grey;" type="button" class="btn btn-lg" data-toggle="modal" data-dismiss="modal" data-target="#update<?php echo $i ?>"><i class="fa fa-edit"></i></button></td>
                            </tr>
                            <!------------------ Modal UPDATE----------------------->
                            <div class="modal fade" id="update<?php echo $i ?>" role="dialog">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h4 class="modal-title">Tambah Barang</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  </div>
                                  <?php
                                  $data_supp = GetDataSupplier($conn);
                                  $data_brand = GetDataBrand($conn);
                                  $data_kat = GetDataKategori($conn);
                                  // $data_supp_detail = GetDetailSupplier($conn);
                                  // $data_brand_detail = GetDetailBrand($conn);
                                  // $data_kat_detail = GetDetailKategori($conn);
                                  ?>
                                  <div class="modal-body">
                                    <div class="x_content">
                                      <!-- start form for validation -->
                                      <form action="../model/user.php" method="post" enctype="multipart/form-data">
                                        <label>Upload Gambar :</label>
                                        <input type="file" name="img" class="form-control" /><br>
                                        <label>Nama Barang :</label>
                                        <input type="text" name="nama" value="<?php echo $data['nama_barang'] ?>" class="form-control" required /><br>
                                        <label>Kode Barang :</label>
                                        <input type="text" name="kode" value="<?php echo $data['kode_barang'] ?>" class="form-control" required /><br>
                                        <!-- <label>Stock Barang :</label>
	      									<input type="number" name="stock" class="form-control" required /> -->
                                        <label>Deskripsi :</label>
                                        <input type="text" name="deskripsi" value="<?php echo $data['deskripsi'] ?>" class="form-control" required /><br>
                                        <label>Harga Barang :</label>
                                        <input type="number" name="harga" value="<?php echo $data['harga_barang'] ?>" class="form-control" required /><br>
                                        <!-- <label>Nomor Faktur :</label>
	      									<input type="text" name="faktur" value="<?php echo $data['nama_barang'] ?>" class="form-control" required /> -->
                                        <label>Tempo Kadaluarsa :</label>
                                        <input type="date" name="tanggal" id="tgl_edit" min="" value="<?php echo $data['tempo_barang'] ?>" class="form-control" required /><br>
                                        <label>Supplier :</label>
                                        <select class="form-control" name="supplier">
                                          <?php while ($supplier = mysqli_fetch_assoc($data_supp)) { ?>
                                            <option value="<?php echo $supplier['id_supplier'] ?>"><?php echo $supplier['nama_supplier'] ?></option>
                                          <?php } ?>
                                        </select><br>
                                        <label>Brand :</label>
                                        <select class="form-control" name="brand">
                                          <?php while ($brand = mysqli_fetch_assoc($data_brand)) { ?>
                                            <option value="<?php echo $brand['id_brand'] ?>"><?php echo $brand['nama_brand'] ?></option>
                                          <?php } ?>
                                        </select><br>
                                        <label>Kategori :</label>
                                        <select class="form-control" name="kategori">
                                          <?php while ($kategori = mysqli_fetch_assoc($data_kat)) { ?>
                                            <option value="<?php echo $kategori['id_kategori'] ?>"><?php echo $kategori['nama_kategori'] ?></option>
                                          <?php } ?>
                                        </select>
                                        <br />
                                        <input Type="hidden" name="id_barang" value="<?php echo $data['id_barang'] ?>" />
                                        <button type="submit" class="btn btn-primary" name="updatebarang">Ubah</button>
                                        <button type="submit" class="btn btn-danger" name="hapusbarang">Hapus Barang</button>
                                      </form>
                                      <!-- end form for validations -->
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                            <!-- Modal -->
                          <?php $i += 1;
                          }  ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!------------------ Modal----------------------->
        <div class="modal fade" id="myModal" role="dialog">
          <?php
          $data_supp = GetDataSupplier($conn);
          $data_brand = GetDataBrand($conn);
          $data_kat = GetDataKategori($conn);
          ?>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Tambah Barang</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="x_content">
                  <!-- start form for validation -->
                  <form action="../model/user.php" method="post" enctype="multipart/form-data">
                    <label>Upload Gambar :</label>
                    <input type="file" name="img" class="form-control" /><br>
                    <label>Nama Barang :</label>
                    <input type="text" name="nama" class="form-control" required /><br>
                    <label>Kode Barang :</label>
                    <input type="text" name="kode" class="form-control" required /><br>
                    <label>Stock Barang :</label>
                    <input type="number" name="stock" class="form-control" required /><br>
                    <label>Deskripsi :</label>
                    <input type="text" name="deskripsi" class="form-control" required /><br>
                    <label>Harga Barang :</label>
                    <input type="number" name="harga" class="form-control" required /><br>
                    <label>Nomor Faktur :</label>
                    <input type="text" name="faktur" class="form-control" required /><br>
                    <label>Tempo Kadaluarsa :</label>
                    <input type="date" name="tanggal" id="tgl_input" min="" class="form-control" required /><br>
                    <label>Supplier :</label>
                    <select class="form-control" name="supplier">
                      <?php while ($supplier = mysqli_fetch_assoc($data_supp)) { ?>
                        <option value="<?php echo $supplier['id_supplier'] ?>"><?php echo $supplier['nama_supplier'] ?></option>
                      <?php } ?>
                    </select><br>
                    <label>Brand :</label>
                    <select class="form-control" name="brand">
                      <?php while ($brand = mysqli_fetch_assoc($data_brand)) { ?>
                        <option value="<?php echo $brand['id_brand'] ?>"><?php echo $brand['nama_brand'] ?></option>
                      <?php } ?>
                    </select><br>
                    <label>Kategori :</label>
                    <select class="form-control" name="kategori">
                      <?php while ($kategori = mysqli_fetch_assoc($data_kat)) { ?>
                        <option value="<?php echo $kategori['id_kategori'] ?>"><?php echo $kategori['nama_kategori'] ?></option>
                      <?php } ?>
                    </select>
                    <br />
                    <button type="submit" class="btn btn-primary" name="tmbhbarang">Tambah</button>
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

  <script type="text/javascript">
    // function myFunction() {
    //   const barang = document.getElementById("namabarang").innerHTML.substring(7);
    //   var table = $('#example').DataTable();

    //   console.log(barang);
    // }
  </script>
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
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
      dd = '0' + dd
    }
    if (mm < 10) {
      mm = '0' + mm
    }

    today = yyyy + '-' + mm + '-' + dd;

    $('#tgl_input').attr("min", today);
    // $('#tgl_edit').attr("min", today);

    $(document).on("click", ".dropdown-item", function() {
      // var nama = $(".hidden-name").text();
      var nama = $("#namabarang").text();
      console.log(nama)
    });
  </script>
</body>

</html>