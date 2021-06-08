<?php
require('../connect/conn.php');
require('../session/session.php');

function checklogin()
{
   if (!isset($_SESSION['id_petugas'])) {
      header("location: ../login_admin/login_admin.php");
   }
}
// Brand //
if (isset($_POST['tmbhbrand'])) {
   InsertBrand($conn);
}
if (isset($_POST['editbrand'])) {
   EditBrand($conn);
}
if (isset($_POST['deletebrand'])) {
   Deletebrand($conn);
}

// Kategori //
if (isset($_POST['tmbhkategori'])) {
   InsertKategori($conn);
}
if (isset($_POST['editkategori'])) {
   EditKategori($conn);
}
if (isset($_POST['deletekat'])) {
   DeleteKategori($conn);
}

// Supplier //
if (isset($_POST['tmbhsupplier'])) {
   InsertSupplier($conn);
}
if (isset($_POST['editsupplier'])) {
   EditSupplier($conn);
}
if (isset($_POST['deletesupp'])) {
   DeleteSupplier($conn);
}

// index //
if (isset($_POST['tmbhbarang'])) {
   InsertBarang($conn);
}
if (isset($_POST['hapusbarang'])) {
   DeleteBarang($conn);
}
if (isset($_POST['updatebarang'])) {
   UpdateBarang($conn);
}
if (isset($_POST['hapuspesan'])) {
   HapusPesan($conn);
}
if (isset($_POST['eoq'])) {
   Eoq($conn);
}
if (isset($_POST['totalhari'])) {
   TotalEoq($conn);
}

// keluar //
if (isset($_POST['krngbarang'])) {
   KeluarBarang($conn);
}

// masuk stock //
if (isset($_POST['tmbhstock'])) {
   MasukBarang($conn);
}

//stok saat ini 
if (isset($_POST['stok_now'])) {
   stokNow($conn);
}

// Laporan//
if (isset($_POST['laporan'])) {
   LaporanRoute($conn);
}
if (isset($_POST['laporanmasuk'])) {
   LaporanRouteMasuk($conn);
}
if (isset($_POST['laporankeluar'])) {
   LaporanRouteKeluar($conn);
}

//Profile 
if (isset($_POST['fotoprofile'])) {
   FotoProfile($conn);
}
if (isset($_POST['ubahnama'])) {
   NamaProfile($conn);
}
if (isset($_POST['ubahpassword'])) {
   UbahPassword($conn);
}
if (isset($_POST['fotologo'])) {
   UbahLogo($conn);
}

function GetKategoriDetiail($id, $conn)
{
   $sql = "SELECT * FROM tbl_kategori where id_kategori = '" . $id . "'";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   return $data;
}

function GetBrandDetiail($id, $conn)
{
   $sql = "SELECT * FROM tbl_brand where id_brand = '" . $id . "' ";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   return $data;
}
function GetDataPetugas($id, $conn)
{
   $sql = "SELECT * FROM tbl_petugas where id_petugas = '" . $id . "' ";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   return $data;
}
function GetDetailBarang($id, $conn)
{
   $sql = "SELECT * FROM tbl_barang where id_item = '" . $id . "' ";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   return $data;
}
function GetSupplierDetiail($id, $conn)
{
   $sql = "SELECT * FROM tbl_supplier where id_supplier = '" . $id . "' ";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   return $data;
}

function GetDataBarangMasuk($conn)
{
   $sql = "SELECT * FROM tbl_barang_masuk ORDER BY create_date desc";
   $item = mysqli_query($conn, $sql);
   return $item;
}
function GetDataBarangKeluar($conn)
{
   $sql = "SELECT * FROM tbl_barang_keluar ORDER BY date desc";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function GetDataBarang($conn)
{
   $sql = "SELECT * FROM tbl_barang where status = 'ACTIVE'";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function GetStokDataBarang($conn)
{
   $sql = "SELECT * FROM tbl_barang where status = 'ACTIVE'";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function GetDataBrand($conn)
{
   $sql = "SELECT * FROM tbl_brand WHERE status = 'ACTIVE' ORDER by create_date desc ";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function GetDataKategori($conn)
{
   $sql = "SELECT * FROM tbl_Kategori where status = 'ACTIVE' order by create_date desc";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function GetCountPesan($conn)
{
   $sql = "SELECT count(id_pesan) as total FROM tbl_pesan";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   return $data;
}

function GetDataPesan($conn)
{
   $sql = "SELECT * FROM tbl_pesan ";
   $item = mysqli_query($conn, $sql);
   return $item;
}
function GetDataLogo($conn)
{
   $sql = "SELECT * FROM tbl_logo ORDER by create_date DESC LIMIT 1";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   return $data;
}
function GetDataEoq($conn)
{
   $sql = "SELECT * FROM tbl_eoq";
   $item = mysqli_query($conn, $sql);
   return $item;
}

function TotalEoq($conn)
{
   $sql = "SELECT * FROM tbl_barang_keluar where date = CURRENT_DATE ";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);

   echo json_encode($data);
}


function Getcount($conn)
{
   $arr = [];

   $sql = "SELECT count(id_barang) as total FROM tbl_barang ";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   $arr[0] = $data['total'];

   $sql = "SELECT count(id_masuk) as total FROM tbl_barang_masuk where create_date = CURDATE()";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   $arr[1] = $data['total'];

   $sql = "SELECT count(id_keluar) as total FROM tbl_barang_keluar where date = CURDATE()";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   $arr[2] = $data['total'];

   $sql = "SELECT count(id_supplier) as total FROM tbl_supplier WHERE status = 'ACTIVE' ";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   $arr[3] = $data['total'];

   return $arr;
}

function Eoq($conn){
   $sql = "SELECT id_item FROM  tbl_barang WHERE id_item = '".$_POST['id_item']."' ";
   $result = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($result);

   $eoq = sqrt((2 * $_POST['demand'] * $_POST['cost'])/$_POST['hold']);
   $t = $eoq / $_POST['demand'];
   $rop = (abs($_POST['lead']-round($t)))*$_POST['demand'];
   // $rop = max($rop,0);

   if(!$data){

      $sql = "INSERT INTO `tbl_eoq` (`id_item`, `demand`, `harga_simpan`, `harga_unit`, `lead_time`, `hasil_eoq`, `hasil_jarak_pesan`, `ROP`) VALUES ('".$_POST['id_item']."', '".$_POST['demand']."', '".$_POST['hold']."', '".$_POST['cost']."', '".$_POST['lead']."', '".$eoq."', '".$t."', '".$rop."') ";
      $result = mysqli_query($conn, $sql);

      if ($result) {
         msg('Berhasil diTambah', '../admin/eoq.php');
      } else {
         msg('Gagal Tambah data!!', '../admin/eoq.php');
      }
   }else{

      $sql = "DELETE FROM `tbl_eoq` WHERE `tbl_eoq`.`id_item` = '".$_POST['id_item']."'";
      $result = mysqli_query($conn, $sql);

      $sql = "INSERT INTO `tbl_eoq` (`id_item`, `demand`, `harga_simpan`, `harga_unit`, `lead_time`, `hasil_eoq`, `hasil_jarak_pesan`, `ROP`) VALUES ('".$_POST['id_item']."', '".$_POST['demand']."', '".$_POST['hold']."', '".$_POST['cost']."', '".$_POST['lead']."', '".$eoq."', '".$t."', '".$rop."') ";
      $result = mysqli_query($conn, $sql);

      if ($result) {
         msg('Berhasil diTambah', '../admin/eoq.php');
      } else {
         msg('Gagal Tambah data!!', '../admin/eoq.php');
      }

   }

}

function EditBrand($conn)
{
   $sql = "UPDATE tbl_brand SET nama_brand = '" . $_POST['nama'] . "' WHERE id_brand = '" . $_POST['id'] . "' ";
   $result = mysqli_query($conn, $sql);

   if ($result) {
      msg('Berhasil di Edit', '../admin/brand.php');
   } else {
      msg('Gagal Edit data!!', '../admin/brand.php');
   }
}

function HapusPesan($conn)
{
   $sql = "truncate tbl_pesan";
   $result = mysqli_query($conn, $sql);

   header("location: ../admin/index.php");
}
function DellPesan($conn)
{
   $sql = "truncate tbl_pesan";
   $result = mysqli_query($conn, $sql);
}

function GetDetailPesan($id, $conn)
{
   $sql = "SELECT * FROM tbl_pesan where id_barang = '" . $id . "' HAVING COUNT(id_barang) > 0";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   $text = 0;

   if (isset($data['desc'])){
   if($data['desc'] == 'Stock barang hampir habis'){
      $text = 'background-color:#f54e42;'; 

   }else{
      $text = 'background-color:#ffa500;';

   }
   }
   return $text;
}

function KeluarBarang($conn)
{
   $sql = "SELECT * FROM tbl_barang where id_item = '" . $_POST['id_item'] . "' ";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);

   if ($data['stock_barang'] >= $_POST['stock']) {

      $sql = "INSERT INTO `tbl_barang_keluar` (`id_petugas`, `id_item`, `jumlah_barang`, `date`) VALUES ('" . $_SESSION['id_petugas'] . "', '" . $_POST['id_item'] . "', '" . $_POST['stock'] . "', now()) ";
      $result = mysqli_query($conn, $sql);

      $stock = $data['stock_barang'] - $_POST['stock'];
      $sql = "UPDATE tbl_barang SET stock_barang = '" . $stock . "' WHERE id_item = '" . $_POST['id_item'] . "' ";
      $result = mysqli_query($conn, $sql);

      DellPesan($conn);
      CheckStock($conn);
      
   } else {
      msg('Stock Kurang', '../admin/barang_keluar.php');
   }

   if ($result) {
      msg('Berhasil di Kurang', '../admin/barang_keluar.php');
   } else {
      msg('Gagal Edit data!!', '../admin/barang_keluar.php');
   }
}

function MasukBarang($conn)
{
   $sql = "SELECT * FROM tbl_barang where id_item = '" . $_POST['id_item'] . "' ";
   $item = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);

   $sql = "INSERT INTO `tbl_barang_masuk` ( `id_item`, `id_petugas`, `jumlah_barang`, `no_faktur`, `create_date`) VALUES ('" . $_POST['id_item'] . "', '" . $_SESSION['id_petugas'] . "', '" . $_POST['stock'] . "', '" . $_POST['faktur'] . "', now())  ";
   $result = mysqli_query($conn, $sql);

   $stock = $data['stock_barang'] + $_POST['stock'];
   $sql = "UPDATE tbl_barang SET stock_barang = '" . $stock . "' WHERE id_item = '" . $_POST['id_item'] . "' ";
   $result = mysqli_query($conn, $sql);
   DellPesan($conn);
   CheckStock($conn);


   if ($result) {
      msg('Berhasil di Tambah', '../admin/barang_masuk.php');
   } else {
      msg('Gagal Tambah data!!', '../admin/barang_masuk.php');
   }
}

function stokNow($conn)
{
   $sql = "SELECT * FROM tbl_barang where id_item = '" . $_POST['id'] . "' ";
   $result = mysqli_query($conn, $sql);
   $result = mysqli_fetch_assoc($result);
   echo json_encode($result);
}

function Deletebrand($conn)
{

   $sql = "UPDATE tbl_brand set status = 'IN-ACTIVE' WHERE tbl_brand.id_brand = " . $_POST['id'] . "";
   $result = mysqli_query($conn, $sql);

   if ($result) {
      msg('Berhasil di Delete', '../admin/brand.php');
   } else {
      msg('Gagal Delete data!!', '../admin/brand.php');
   }
}
function InsertBrand($conn)
{

   $sql = "INSERT INTO tbl_brand ( nama_brand , create_date, status) 
     VALUES ( '" . $_POST['nama'] . "', now(), 'ACTIVE')";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      msg('Brand Berhasil Ditambah', '../admin/brand.php');
   } else {
      msg('Gagal Upload data!!', '../admin/brand.php');
   }
}

function NamaProfile($conn){
   $sql = "UPDATE tbl_petugas SET nama_petugas = '" . $_POST['nama'] . "' WHERE id_petugas = '" . $_POST['id'] . "' ";
   $result = mysqli_query($conn, $sql);

   if ($result) {
      msg('Berhasil di Ubah', '../admin/profile.php');
   } else {
      msg('Gagal Ubah data!!', '../admin/profile.php');
   }
}

function EditKategori($conn)
{
   $sql = "UPDATE tbl_Kategori SET nama_kategori = '" . $_POST['nama'] . "', kode_rak = '" . $_POST['kode'] . "' WHERE id_kategori = '" . $_POST['id'] . "' ";
   $result = mysqli_query($conn, $sql);

   if ($result) {
      msg('Berhasil di Edit', '../admin/kategori.php');
   } else {
      msg('Gagal Edit data!!', '../admin/kategori.php');
   }
}

function DeleteKategori($conn)
{

   $sql = "UPDATE tbl_Kategori set status = 'IN-ACTIVE' WHERE tbl_Kategori.id_kategori = " .$_POST['id'] . "";
   $result = mysqli_query($conn, $sql);

   if ($result) {
      msg('Berhasil di Delete', '../admin/kategori.php');
   } else {
      msg('Gagal Delete data!!', '../admin/kategori.php');
   }
}

function InsertKategori($conn)
{

   $sql = "INSERT INTO tbl_kategori ( nama_kategori ,kode_rak, create_date,status) 
     VALUES ( '" . $_POST['nama'] . "','" . $_POST['kode'] . "', now() , 'ACTIVE')";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      msg('Kategori Berhasil Ditambah', '../admin/kategori.php');
   } else {
      msg('Gagal Upload data!!', '../admin/kategori.php');
   }
}

function GetDataSupplier($conn)
{
   $sql = "SELECT * FROM tbl_supplier WHERE status = 'ACTIVE' ORDER by create_date desc";
   $item = mysqli_query($conn, $sql);
   return $item;
}


function EditSupplier($conn)
{
   $sql = "UPDATE tbl_supplier SET nama_supplier = '" . $_POST['nama'] . "', alamat_supplier = '" . $_POST['alamat'] . "', kontak_supplier = '" . $_POST['nohp'] . "' WHERE id_supplier = '" . $_POST['id'] . "' ";
   $result = mysqli_query($conn, $sql);

   if ($result) {
      msg('Berhasil di Edit', '../admin/supplier.php');
   } else {
      msg('Gagal Edit data!!', '../admin/supplier.php');
   }
}

function DeleteSupplier($conn)
{

   $sql = "UPDATE tbl_supplier set status = 'IN-ACTIVE' WHERE tbl_supplier.id_supplier = " .$_POST['id']. "";
   $result = mysqli_query($conn, $sql);

   if ($result) {
      msg('Berhasil di Delete', '../admin/supplier.php');
   } else {
      msg('Gagal Delete data!!', '../admin/supplier.php');
   }
}

function InsertSupplier($conn)
{

   $sql = "INSERT INTO tbl_supplier ( nama_supplier ,alamat_supplier, kontak_supplier, create_date, status) 
     VALUES ( '" . $_POST['nama'] . "','" . $_POST['alamat'] . "','" . $_POST['nohp'] . "', now(),'ACTIVE')";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      msg('supplier Berhasil Ditambah', '../admin/supplier.php');
   } else {
      msg('Gagal Upload data!!', '../admin/supplier.php');
   }
}

function FotoProfile($conn){

   $img = $_FILES['img']['name'];
   date_default_timezone_set("Asia/Bangkok");
   $id_item = date("his") . date("Ymd");
   $nama = $_FILES['img']['name'];
   $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
   $x = explode('.', $nama);   // dpt nama tanpa ekstensi file
   $ekstensi = strtolower(end($x));    // jdiin hruf kecil ekstensinya
   $ukuran    = $_FILES['img']['size'];   //ukuran brp
   $file_tmp = $_FILES['img']['tmp_name'];    //temp filenya apa
   if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {    // kalau ekstensinya bener
      if ($ukuran < 4044070) {        // max 4 mb
         move_uploaded_file($file_tmp, '../admin/images/profile/' . $id_item . $nama);
         
         $sql = "UPDATE `tbl_petugas` SET `img` = '".$id_item . $nama."' WHERE `tbl_petugas`.`id_petugas` = '".$_POST['id']."';";
         $result = mysqli_query($conn, $sql);


         if ($result) {
            msg('Data berhasil diubah!!', '../admin/profile.php');
         } else {
            msg('Gagal mengubah data!!', '../admin/profile.php');
         }
      } else {
         msg('Ukuran file max 4mb!!', '../admin/profile.php');
      }
   } else {
      msg('Ekstensi File yang diupload hanya diperbolehkan png / jpg!!', '../admin/profile.php');
   }

}

function UbahLogo($conn){
   $img = $_FILES['img']['name'];
   date_default_timezone_set("Asia/Bangkok");
   $id_item = date("his") . date("Ymd");
   $nama = $_FILES['img']['name'];
   $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
   $x = explode('.', $nama);   // dpt nama tanpa ekstensi file
   $ekstensi = strtolower(end($x));    // jdiin hruf kecil ekstensinya
   $ukuran    = $_FILES['img']['size'];   //ukuran brp
   $file_tmp = $_FILES['img']['tmp_name'];    //temp filenya apa
   if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {    // kalau ekstensinya bener
      if ($ukuran < 4044070) {        // max 4 mb
         move_uploaded_file($file_tmp, '../admin/images/logo/' . $id_item . $nama);


            $sql = "truncate tbl_logo";
            $result = mysqli_query($conn, $sql);

            $sql = "INSERT INTO `tbl_logo` (`nama_logo`, `create_date`) VALUES ( '" . $id_item . $nama."',  now())";
            $result = mysqli_query($conn, $sql);


         if ($result) {
            msg('Data berhasil diubah!!', '../admin/profile.php');
         } else {
            msg('Gagal mengubah data!!', '../admin/profile.php');
         }
      } else {
         msg('Ukuran file max 4mb!!', '../admin/profile.php');
      }
   } else {
      msg('Ekstensi File yang diupload hanya diperbolehkan png / jpg!!', '../admin/profile.php');
   }
}

function InsertBarang($conn)
{

   $img = $_FILES['img']['name'];
   date_default_timezone_set("Asia/Bangkok");
   $id_item = date("his") . date("Ymd");
   $nama = $_FILES['img']['name'];
   $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
   $x = explode('.', $nama);   // dpt nama tanpa ekstensi file
   $ekstensi = strtolower(end($x));    // jdiin hruf kecil ekstensinya
   $ukuran    = $_FILES['img']['size'];   //ukuran brp
   $file_tmp = $_FILES['img']['tmp_name'];    //temp filenya apa
   if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {    // kalau ekstensinya bener
      if ($ukuran < 4044070) {        // max 4 mb
         move_uploaded_file($file_tmp, '../admin/images/barang/' . $id_item . $nama);

         $sql = "INSERT INTO `tbl_barang` ( `id_item`,`id_kategori`, `id_supplier`, `id_brand`, `kode_barang`, `nama_barang`, `stock_barang`, `gambar_barang`, `qr_code`, `deskripsi`, `harga_barang`,`tempo_barang`, `create_date`, `status`) VALUES ('" . $id_item . "','" . $_POST['kategori'] . "', '" . $_POST['supplier'] . "', '" . $_POST['brand'] . "', '" . $_POST['kode'] . "', '" . $_POST['nama'] . "', '" . $_POST['stock'] . "', '" . $id_item . $nama . "', '3121231', '" . $_POST['deskripsi'] . "', '" . $_POST['harga'] . "', '" . $_POST['tanggal'] . "',now(),'ACTIVE')";
         $result = mysqli_query($conn, $sql);
         $sql = "INSERT INTO `tbl_barang_masuk` (`id_item`, `id_petugas`, `jumlah_barang`, `no_faktur`, `create_date`) VALUES ('" . $id_item . "', '" . $_SESSION['id_petugas'] . "','" . $_POST['stock'] . "','" . $_POST['faktur'] . "', now()) ";
         $result = mysqli_query($conn, $sql);

         DellPesan($conn);
         CheckStock($conn);        

         if ($result) {
            msg('Data berhasil ditambah!!', '../admin');
         } else {
            msg('Gagal menambah data!!', '../admin');
         }
      } else {
         msg('Ukuran file max 4mb!!', '../admin');
      }
   } else {
      msg('Ekstensi File yang diupload hanya diperbolehkan png / jpg!!', '../admin');
   }
}

function UbahPassword($conn)
{

   $password = trim($_POST['passlama']);

   //create some sql statement             
   $sql = "SELECT id_petugas FROM  tbl_petugas WHERE id_petugas = " . $_POST['id'] . " AND  password =  password('" . $password . "')";
   $result = mysqli_query($conn, $sql);

   if ($result) {
       $numrows = mysqli_num_rows($result);
       // get nmbr of result
       if ($numrows == 1) {   // kalau hasilnya ktmu dan 1
         if ($_POST['pass1'] == $_POST['pass2']) {
            $password1 = trim($_POST['pass1']);
            $sql = "UPDATE tbl_petugas SET password = password('" .  $password1 . "') WHERE id_petugas = " . $_POST['id'] . " ";
            $result = mysqli_query($conn, $sql);

            msg('Password berhasil diubah!!', '../admin/profile.php');
         } else {
            msg('Password tidak sama!!', '../admin/profile.php');
         }
       } else {
           msg('Maaf, Password Lama Salah', '../admin/profile.php');
       }
   } else {
       msg('Maaf, Password Lama Salah', '../admin/profile.php');
   }


}

function UpdateBarang($conn)
{
   $img = $_FILES['img']['name'];
   if ($img) {
      date_default_timezone_set("Asia/Bangkok");
      $id_item = date("his") . date("Ymd");
      $nama = $_FILES['img']['name'];
      $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
      $x = explode('.', $nama);   // dpt nama tanpa ekstensi file
      $ekstensi = strtolower(end($x));    // jdiin hruf kecil ekstensinya
      $ukuran    = $_FILES['img']['size'];   //ukuran brp
      $file_tmp = $_FILES['img']['tmp_name'];    //temp filenya apa
      if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {    // kalau ekstensinya bener
         if ($ukuran < 4044070) {        // max 4 mb
            move_uploaded_file($file_tmp, '../admin/images/barang/' . $id_item . $nama);

            $sql = "UPDATE tbl_barang set gambar_barang= '" . $id_item . $nama . "',nama_barang = '" . $_POST['nama'] . "',kode_barang = '" . $_POST['kode'] . "',deskripsi = '" . $_POST['deskripsi'] . "',harga_barang = '" . $_POST['harga'] . "',tempo_barang = '" . $_POST['tanggal'] . "',id_kategori = '" . $_POST['kategori'] . "',id_supplier = '" . $_POST['supplier'] . "',id_brand = '" . $_POST['brand'] . "' WHERE tbl_barang.id_barang = " . $_POST['id_barang'] . "";
            $result = mysqli_query($conn, $sql);

            DellPesan($conn);
            CheckStock($conn);

            if ($result) {
               msg('Data berhasil diubah!!', '../admin');
            } else {
               msg('Gagal menambah data!!', '../admin');
            }
         } else {
            msg('Ukuran file max 4mb!!', '../admin');
         }
      } else {
         msg('Ekstensi File yang diupload hanya diperbolehkan png / jpg!!', '../admin');
      }
   } else {
      $sql = "UPDATE tbl_barang set nama_barang = '" . $_POST['nama'] . "',kode_barang = '" . $_POST['kode'] . "',deskripsi = '" . $_POST['deskripsi'] . "',harga_barang = '" . $_POST['harga'] . "',tempo_barang = '" . $_POST['tanggal'] . "',id_kategori = '" . $_POST['kategori'] . "',id_supplier = '" . $_POST['supplier'] . "',id_brand = '" . $_POST['brand'] . "' WHERE tbl_barang.id_barang = " . $_POST['id_barang'] . "";
      $result = mysqli_query($conn, $sql);

      DellPesan($conn);
      CheckStock($conn);

      if ($result) {
         msg('Data berhasil diubah!!', '../admin');
      } else {
         msg('Gagal diubah data!!', '../admin');
      }
   }
}

function DeleteBarang($conn)
{

   $sql = "UPDATE tbl_barang set status = 'IN-ACTIVE' WHERE tbl_barang.id_barang = " . $_POST['id_barang'] . "";
   $result = mysqli_query($conn, $sql);

   if ($result) {
      msg('Berhasil di Delete', '../admin/index.php');
   } else {
      msg('Gagal Delete data!!', '../admin/index.php');
   }
}

function CheckStock($conn)
{

   $sql = "SELECT * FROM tbl_barang where status = 'ACTIVE' AND stock_barang <= 10";
   $item = mysqli_query($conn, $sql);
   $insert = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   if ($data) {
      while ($data = mysqli_fetch_assoc($insert)) {
         $sql = "INSERT INTO `tbl_pesan` (`id_barang`, `nama_barang`, `img`, `stock`,`desc`, `create_date`) VALUES ('" . $data['id_barang'] . "', '" . $data['nama_barang'] . "', '" . $data['gambar_barang'] . "', '" . $data['stock_barang'] . "','Stock barang hampir habis', now()) ";
         $result = mysqli_query($conn, $sql);
      }
   }
   $sql = "SELECT * FROM tbl_barang where status = 'ACTIVE' AND tempo_barang <= now() ";
   $item = mysqli_query($conn, $sql);
   $insert = mysqli_query($conn, $sql);
   $data = mysqli_fetch_assoc($item);
   if ($data) {
      while ($data = mysqli_fetch_assoc($insert)) {
         $sql = "INSERT INTO `tbl_pesan` (`id_barang`, `nama_barang`, `img`, `stock`,`desc`, `create_date`) VALUES ('" . $data['id_barang'] . "', '" . $data['nama_barang'] . "', '" . $data['gambar_barang'] . "', '" . $data['stock_barang'] . "','Barang Kadaluarsa', now()) ";
         $result = mysqli_query($conn, $sql);
      }
   }
}

function Laporan($bln, $conn)
{
   $sql = "SELECT * FROM tbl_barang where status = 'ACTIVE' AND SUBSTRING(create_date,1, 7) = '" . $bln . "' ";
   $item = mysqli_query($conn, $sql);
   return  $item;
}

function LaporanBulanMasuk($bln, $conn)
{
   $sql = "SELECT * FROM tbl_barang_masuk where SUBSTRING(create_date,1, 7) = '" . $bln . "' ";
   $item = mysqli_query($conn, $sql);
   return  $item;
}

function LaporanBulanKeluar($bln, $conn)
{
   $sql = "SELECT * FROM tbl_barang_keluar where SUBSTRING(date,1, 7) = '" . $bln . "' ";
   $item = mysqli_query($conn, $sql);
   return  $item;
}

function LaporanRoute($conn)
{

   $url = '../admin/laporan.php?bln=' . $_POST['bln'];
   header("location:" . $url);
}
function LaporanRouteMasuk($conn)
{
   $url = '../admin/laporan_masuk.php?bln=' . $_POST['bln'];
   header("location:" . $url);
}
function LaporanRouteKeluar($conn)
{

   $url = '../admin/laporan_keluar.php?bln=' . $_POST['bln'];
   header("location:" . $url);
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
