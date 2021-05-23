<?php
require('../connect/conn.php');
require('../session/session.php');
if (isset($_POST['btnlogin'])) {

    $email = strtoupper($_POST['email']);
    $password = trim($_POST['password']);

    //create some sql statement             
    $sql = "SELECT id_petugas FROM  tbl_petugas WHERE  upper(email) =  '" . $email . "' AND  password =  password(" . $password . ")";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $numrows = mysqli_num_rows($result);
        // get nmbr of result
        if ($numrows == 1) {   // kalau hasilnya ktmu dan 1
            $user = mysqli_fetch_array($result);
                // msukin data yg login ke session
                $_SESSION['id_petugas'] = $user['id_petugas'];

                msg('Login Berhasil!!', '../admin/'); 
        } else {
            msg('Maaf, username / password yang dimasukan salah, silahkan coba kembali.', '../login_admin/login_admin.php'); 
        }
    } 
}

function msg($pesan, $url)
{
?>
   <script type="text/javascript">
      alert('<?php echo $pesan ?>');
      window.location = '<?php echo $url ?>';
   </script>
<?php
}

?>