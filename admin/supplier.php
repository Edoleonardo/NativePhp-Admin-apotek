<?php
require('../model/User.php');
checklogin();
$data_supplier = GetDataSupplier($conn);
$pesan = GetDataPesan($conn);
$totalpesan = GetCountPesan($conn);
$now = GetDataPetugas($_SESSION['id_petugas'],$conn);

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
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
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
    <!-- Modall -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $now['nama_petugas']?></h2>
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
                      <li><a href="index.php">Home</a></li>
                      <li><a href="barang_masuk.php">Barang Masuk</a></li>
                      <li><a href="barang_keluar.php">Barang Keluar</a></li>
                      <li><a href="supplier.php">Supplier</a></li>
                      <li><a href="kategori.php">Kategori</a></li>
                      <li><a href="brand.php">Brand</a></li>
                    </ul>
                  </li>
                  <li>
                  <a href="laporan.php"> Download Laporan </a>
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
                    <img src="images/img.jpg" alt=""><?php echo $now['nama_petugas']?>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item"  href="javascript:;"> Profile</a>
                    <a class="dropdown-item"  href="../login_admin/logout_admin.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
                <li role="presentation" class="nav-item dropdown open">
                  <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <?php if ($totalpesan['total'] != 0){ ?>
                    <span class="badge bg-green"><?php echo $totalpesan['total']?></span>
                    <?php } ?>
                  </a>
                  <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                  <?php while($data_pesan = mysqli_fetch_assoc($pesan)){?>
                    <li class="nav-item" onclick="myFunction()">
                      <a class="dropdown-item">
                        <span class="image"><img src="../admin/images/barang/<?php echo $data_pesan['img'] ?>" alt="Profile Image" /></span>
                        <span>
                          <span id="namabarang">Barang <?php echo $data_pesan['nama_barang'] ?></span>
                          <span class="time"><?php echo $data_pesan['create_date'] ?></span>
                        </span>
                        <span class="message">
                          Stock hampir habis, sisah <?php echo $data_pesan['stock'] ?>
                        </span>
                      </a>
                    </li>
                    <li class="nav-item">
                    <?php } ?>
                    <form action="../model/user.php" method="post">
                      <div class="text-center">
                          <button  class="dropdown-item" type="submit" name="hapuspesan">Hapus Semua Pesan</button>
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
            <h3>Supplier</h3>
          </div>
          <!-- /top tiles -->

          <br />

          <div class="row">
            <div class="col-md-12 col-sm-12 ">
              <div class="x_panel">
                <div class="x_title">
                  <div class="clearfix"></div>
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">Tambah Supplier</button>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                          <div class="card-box table-responsive">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                      <tr>
                        <th>Nama Supplier</th>
                        <th>Alamat Supplier</th>
                        <th>Kontak Supplier</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $i=0; 
                    while($data = mysqli_fetch_assoc($data_supplier)){?>
                      <tr>
                        <td><?php echo $data['nama_supplier'] ?></td>
                        <td><?php echo $data['alamat_supplier'] ?></td>
                        <td><?php echo $data['kontak_supplier'] ?></td>
                        <td><?php echo $data['create_date'] ?></td>
                        <td>										
                          <form action="../model/User.php" method="post">
											      <input type="hidden" name="id" value="<?php echo $data['id_supplier'] ?>">
											      <button style="background-color:red;" type="submit" name="deletesupp" class="btn cart_quantity_delete"><i class="fa fa-times"></i></button>
											      <button  style="background-color:grey;" type="button" class="btn btn-lg" data-toggle="modal" data-dismiss="modal" data-target="#update_alamat<?php echo $i?>"><i class="fa fa-edit"></i></button>
										      </form> 
                      </td>
                      </tr>
                      <div class="modal fade" id="update_alamat<?php echo $i?>" role="dialog">
									        <div class="modal-dialog">
									        	<!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Edit Data Supplier</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
			                        					<div class="x_content">

			                        						<!-- start form for validation -->
			                        						<form action="../model/user.php" method="post" >
			                        							<label for="fullname">Nama Supplier :</label>
			                        							<input type="text" name="nama" class="form-control" value="<?php echo $data['nama_supplier'] ?>" required />
			                        							<label for="email">Alamat Supplier :</label>
			                        							<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat_supplier'] ?>" required />
                                            <label for="email">No Hp :</label>
			                        							<input type="number" name="nohp" class="form-control" value="<?php echo $data['kontak_supplier'] ?>" required />
			                        									<br />
			                        							<input type="hidden" name="id" class="form-control" value="<?php echo $data['id_supplier'] ?>" required />
                                            <button type="submit" class="btn btn-primary" name="editsupplier" >Edit</button>
			                        						</form>
			                        						<!-- end form for validations -->

			                        					</div>
			                        				</div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
									        </div>
								      </div>
                    <?php  $i+=1; }?>
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
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Supplier</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
								<div class="x_content">

									<!-- start form for validation -->
									<form action="../model/user.php" method="post" >
										<label for="fullname">Nama Supplier :</label>
										<input type="text" name="nama" class="form-control" required />
										<label for="email">Alamat Supplier :</label>
										<input type="text" name="alamat" class="form-control" required />
                    <label for="email">No Hp :</label>
										<input type="number" name="nohp" class="form-control"  required />

												<br />
                    <button type="submit" class="btn btn-primary" name="tmbhsupplier" >Tambah</button>
									</form>
									<!-- end form for validations -->

								</div>
							</div>
   
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
	
  </body>
</html>
