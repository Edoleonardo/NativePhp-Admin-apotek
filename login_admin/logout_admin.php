<?php

session_start();

// 2. Unset all the session variables
// session_destroy();
unset($_SESSION['id_petugas']);

?>
<script type="text/javascript">
    alert("Anda Berhasil Keluar!!");
    window.location = "../login_admin/login_admin.php";
</script>