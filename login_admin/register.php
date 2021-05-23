<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <div class="login_wrapper">
        <div id="register">
          <section class="login_content">
            <form action="register_user.php" method="post">
              <h1>Register Petugas</h1>
              <div>
                <input type="text" class="form-control" name="nama" placeholder="Nama" required="" />
              </div>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="pass1" placeholder="Password" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="pass2" placeholder="Ulang Password" required="" />
              </div>
              <div>
                <button class="btn btn-default submit" name="register" >Register</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                  <a href="../login_admin/login_admin.php" class="to_register"> Log in </a>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
