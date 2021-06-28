<?php
require('../model/User.php');
checklogin();
$logo = GetDataLogo($conn);
$count = Getcount($conn);
$data_supp = GetDataSupplier($conn);
$data_brand = GetDataBrand($conn);
$data_kat = GetDataKategori($conn);
if (isset($_GET['bln'])) {
  $data_keluar = LaporanBulanKeluar($_GET['bln'], $conn);
} else {
  $data_keluar = GetDataBarangKeluar($conn);
}
$pesan = GetDataPesan($conn);
$totalpesan = GetCountPesan($conn);
$now = GetDataPetugas($_SESSION['id_petugas'], $conn);

ob_start();
?>
<style>
    table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 50%;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    td {
        font-size: 12px;
    }

    th {
        text-align: center;
        background-color: gray;
        padding: 4px;
        color: white;
        font-size: 12px;
    }
</style>
<div style="text-align:center">
    <!-- <img width="100" src="images/home/logo.png"/> -->
    <table id="example1" class="table table-bordered table-striped" align="center" style=" border-bottom-style: none; border-right-style: none; border-left-style: none;">
        <thead>
            <tr>
            <td style="border:none;">&nbsp;</td>
                <td style="border:none;" >
                    <img width="100" src="images/logo/<?php echo $logo['nama_logo'] ?>" />
                </td>
                <td colspan="4" align="center" style="font-size: 20px; border:none;">
                    <h1>Apotek Centra Medika</h1>
                    <h3>Laporan Barang Keluar</h3>
                    <p>Jl. Daan Mogot No. 29 B
                    <br>Telp : 5522347 Tangerang</p>
                    <?php
                    if(isset($_GET['bln'])){
                    ?>
                    <h4>Periode : <?php echo $_GET['bln']?></h4>
                    <?php }else{?>
                    <h4>Semua Data</h4>
                   <?php } ?>
                    <!-- <h4><?php //echo 'Periode ' . $getStart . ' s/d ' . $getEnd ?></h4> -->
                </td>
                <td style="border:none;">&nbsp;</td>
                <td style="border:none;">&nbsp;</td>
            </tr>
             <tr align="center">
               <th>Nama Petugas</th>
               <th>Nama Barang</th>
               <th>Jumlah Keluar</th>
               <th>Keterangan</th>
               <th>Status</th>
               <th>Sisah Stock</th>
               <th>Tanggal Kadaluarsa</th>
               <th>Tanggal Keluar</th>
             </tr>
        </thead>
        <tbody>
         <?php while ($data = mysqli_fetch_assoc($data_keluar)) {
           $petugas = GetDataPetugas($data['id_petugas'], $conn);
           $barang = GetDetailBarang($data['id_item'], $conn);
         ?>
           <tr>
             <td><?php echo $petugas['nama_petugas'] ?></td>
             <td><?php echo $barang['nama_barang'] ?></td>
             <td><?php echo $data['jumlah_barang'] ?></td>
             <td><?php echo $data['keterangan'] ?></td>
             <td><?php echo $data['status'] ?></td>
             <td><?php echo $data['sisah_stock'] ?></td>
             <td><?php echo $barang['tempo_barang'] ?></td>
             <td><?php echo $data['create_date'] ?></td>
           </tr>
         <?php } ?>
        </tbody>
            
        <tfoot>

            <tr>
                <td style="border:none;" >&nbsp;</td>
            </tr>
            <tr>
                <td style="border:none;" colspan="6"></td>
                <td style="border:none;" align="center">Dibuat Oleh</td>
            </tr>
            <tr>
                <td style="border:none;">&nbsp;</td>
            </tr>
            <tr>
                <td style="border:none;">&nbsp;</td>
            </tr>
            <tr>
                <td style="border:none;">&nbsp;</td>
            </tr>
            <tr>
                <td style="border:none;">&nbsp;</td>
            </tr>
            <tr>
                <td style="border:none;" colspan="6"></td>
                <td style="border:none;" align="center"><?php echo $now['nama_petugas'] ?></td>
            </tr>
        </tfoot>
    </table>
    <br>
</div>
<?php
$html = ob_get_clean();


require __DIR__ . '../../vendors/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf('P', 'A4', 'en');
$html2pdf->writeHTML($html);
$html2pdf->output('pdf_laporan_barang_keluar.pdf', 'D');
?>