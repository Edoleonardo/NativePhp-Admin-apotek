<?php
require('../model/User.php');
checklogin();
$logo = GetDataLogo($conn);
$data_barang = GetDataBarang($conn);
$data_barang2 = GetStokDataBarang($conn);
$dataBarangSatuan = mysqli_fetch_assoc($data_barang2);

$data_eoq = GetDataEoq($conn);
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

  <title>Apotek Centra Medika</title>

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
                    <li><a href="stock_opname.php">Stock Opname</a></li>
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
        <div class="row">
          <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
              <div class="x_title">
                <h3>Economic Order Quantity</h3>
                <button id="eoq" type="button" class="btn btn-success" data-toggle="modal" data-target="#eoqmodal">Economic Order Quantity</button>
              </div>
              <div class="x_content">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
                      <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th>Nama barang</th>
                            <th>Permintaan /Hari</th>
                            <th>Harga Penyimpanan /hari</th>
                            <th>Harga Unit /Pesan</th>
                            <th>Waktu Proses Beli</th>
                            <th>Rekomendasi EOQ</th>
                            <th>Jarak Pesan Barang</th>
                            <th>Titik Pesan Ulang</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php while ($data = mysqli_fetch_assoc($data_eoq)) {
                            $barang = GetDetailBarang($data['id_item'], $conn);
                          ?>
                            <tr>
                              <td><?php echo $barang['nama_barang'] ?></td>
                              <td><?php echo number_format($data['demand']) ?> Unit</td>
                              <td>Rp. <?php echo number_format($data['harga_simpan']) ?></td>
                              <td>Rp. <?php echo number_format($data['harga_unit']) ?></td>
                              <td><?php echo number_format($data['lead_time']) ?> Hari</td>
                              <td><?php echo number_format($data['hasil_eoq']) ?> Unit</td>
                              <td><?php echo number_format($data['hasil_jarak_pesan']) ?> Hari</td>
                              <td><?php echo number_format($data['ROP']) ?> Unit</td>
                              <td>
                                <form action="../model/User.php" method="post">
                                  <input type="hidden" name="id" value="<?php echo $data['id_eoq'] ?>">
                                  <button style="background-color:red;" type="submit" name="deleteeoq" class="btn cart_quantity_delete"><i class="fa fa-times"></i></button>
                                </form>
                              </td>
                            </tr>
                          <?php } ?>
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
  <!------------------ Modal----------------------->
  <div class="modal fade" id="eoqmodal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Economic Order Quantity</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="x_content">
            <!-- start form for validation -->
            <form action="../model/user.php" method="post">
              <label>Pilih Barang :</label>
              <select class="form-control" name="id_item" id="id_item">
                <?php
                $data_barang = GetDataBarang($conn);
                while ($allbarang = mysqli_fetch_assoc($data_barang)) { ?>
                  <option value="<?php echo $allbarang['id_item'] ?>"><?php echo $allbarang['nama_barang'] ?></option>
                <?php } ?>
              </select>
              <br>
              <label>Pilih Hari Data Permintaan :</label>
              <input type="date" name="hari" id="hari" class="form-control" required /><br>
              <label>Permintaan Unit /Hari (Demand) :</label>
              <input type="number" id="vall" name="demand" class="form-control" required /><br>
              <label>Harga Penyimpanan /Hari (Holding Cost)</label>
              <input type="number" step="0.01" min="0.01" name="hold" class="form-control" required /><br>
              <label>Harga Unit /Pesan (Cost)</label>
              <input type="number" step="0.01" name="cost" class="form-control" required /><br>
              <label>Waktu Prose /Hari (Lead Time)</label>
              <input type="number" id="lead" name="lead" class="form-control" required /><br>
              <br />
              <button type="submit" class="btn btn-primary" name="eoq">Submit</button>
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
  <script>
    $(document).on("click", "#eoq", function() {
      getTime()
    });

    $('#id_item').change(function() {
      getTime();
      getDemand();
    });

    $('#hari').change(function() {
      getTime();
      getDemand();
    });


    function getTime() {
      var id = $('#id_item').val();
      $.ajax({
        url: "../model/user.php", //the page containing php script
        type: "post", //request type,
        dataType: 'json',
        data: {
          permintaan: 1,
          id: id
        },
        success: function(data) {
          $("#lead").val(data.lead_time);
        }
      });
    }

    function getDemand() {
      var id = $('#id_item').val();
      var hari = $('#hari').val();

      $.ajax({
        url: "../model/user.php", //the page containing php script
        type: "post", //request type,
        dataType: 'json',
        data: {
          getEOQ: 1,
          itemID: id,
          hari: hari
        },
        success: function(data) {
          $("#vall").val(data.jml);
        }
      });
    }
  </script>
</body>

</html>