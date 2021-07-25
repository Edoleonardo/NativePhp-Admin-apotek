<?php
require('../model/User.php');
checklogin();
$logo = GetDataLogo($conn);

if(isset($_GET['tgl1'])){
  $data_barang = DataOpname1($conn,$_GET['tgl1'],$_GET['tgl2'],$_GET['id_item']);
}else{
  $data_barang = DataOpname($conn);
}


$data_allbarang = GetDataBarang($conn);
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
    <table id="example1" class="table table-bordered table-striped" align="center">
        <thead>
            <tr>
                <td style="border:none;" >
                    <img width="100" src="images/logo/<?php echo $logo['nama_logo'] ?>" />
                </td>
                <td colspan="4" align="center" style="font-size: 20px; border:none;">
                    <h1>Apotek Centra Medika</h1>
                    <h4>Laporan Kartu Stock</h4>
                    <p>Jl. Daan Mogot No. 29 B
                    <br>Telp : 5522347 Tangerang</p>
                    <?php
                    if(isset($_GET['tgl1'])){
                    ?>
                    <h4>Periode : <?php echo $_GET['tgl1']." Sampai ".$_GET['tgl2']?></h4>
                    <?php }else{?>
                    <h4>Semua Data</h4>
                   <?php } ?>
                </td>
                <td style="border:none;">&nbsp;</td>
                <td style="border:none;">&nbsp;</td>
            </tr>
            <tr align="center">
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Keterangan</th>
                <th>Nomor Faktur</th>
                <th>Status</th>
                <th>Jumlah</th>
                <th>Sisa</th>
            </tr>
        </thead>
        <tbody >
        <?php while ($data = mysqli_fetch_assoc($data_barang)) {
              //$petugas = GetDataPetugas($data['id_petugas'], $conn);
              $barang = GetDetailBarang($data['id_item'], $conn);
            ?>
              <tr>
                <td><?php echo $data['create_date'] ?></td>
                <td><?php echo $barang['nama_barang'] ?></td>
                <td><?php echo number_format($barang['harga_barang']) ?></td>
                <td><?php echo $data['keterangan'] ?></td>
                <td><?php echo $data['no_faktur'] ?></td>
                <td><?php echo $data['status'] ?></td>
                <td><?php echo $data['jumlah_barang'] ?></td>
                <td><?php echo $data['sisah_stock'] ?></td>
              </tr>
            <?php } ?>
        </tbody>

        <tfoot>

            <tr>
                <td style="border:none;" >&nbsp;</td>
            </tr>
            <tr>
                <td style="border:none;" colspan="5"></td>
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
                <td style="border:none;" colspan="5"></td>
                <td style="border:none;" align="center"><?php echo $now['nama_petugas'] ?></td>
            </tr>
            <tr>
                <td style="border:none;">&nbsp;</td>
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
$html2pdf->output('pdf_laporan_kartustock.pdf', 'D');
?>