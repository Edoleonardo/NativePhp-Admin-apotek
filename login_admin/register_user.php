<?php
require('../connect/conn.php');
require('../session/session.php');
if (isset($_POST['register'])) {

    if($_POST['pass1'] != $_POST['pass2']){
        msg('Ulang password tidak sama', '../login_admin/register.php');
    }
    $sql = "SELECT * from tbl_petugas where email = '" . $_POST['email'] . "' ";
    $check = mysqli_query($conn, $sql); // untuk check email agar tidak bisa register dengan email yang sama
    $check_data = mysqli_fetch_assoc($check);
    if ($check_data) { // untuk check email agar tidak bisa register dengan email yang sama
       msg('Email Sudah Pernah Dipakai', '../login_admin/register.php');
    } else {
 
 
       $sql = "INSERT INTO tbl_petugas (nama_petugas, img, email, password) 
          VALUES ('" . $_POST['nama'] . "','img.jpg' , '" . $_POST['email'] . "',  password('" . $_POST['pass1'] . "')) ";
       $result = mysqli_query($conn, $sql);
 
       if ($result) {
          msg('Register Telah Berhasil Silakan Login!!', '../login_admin/login_admin.php');
       } else {
          msg('Register Gagal', '../login_admin/register.php');
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