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
    <table id="example1" class="table table-bordered table-striped" align="center" style="width: 100%; border-bottom-style: none; border-right-style: none; border-left-style: none;">
        <thead>
            <tr>
            <td style="border:none;">&nbsp;</td>
                <td style="border:none;" >
                    <img width="100" src="images/logo/<?php echo $logo['nama_logo'] ?>" />
                </td>
                <td colspan="4" align="center" style="font-size: 20px; border:none;">
                    <h1>Apotek Centra Medika</h1>
                    <h3>Laporan Barang</h3>
                    <p>Jl. Daan Mogot No. 29 B
                    <br>Telp : 5522347 Tangerang</p>
                    <br>
                    <!-- <h4><?php //echo 'Periode ' . $getStart . ' s/d ' . $getEnd ?></h4> -->
                </td>
                <td style="border:none;">&nbsp;</td>
                <td style="border:none;">&nbsp;</td>
            </tr>
            <tr align="center">
                <th style="width:12%;">Nama barang</th>
                <th style="width:12%;">Permintaan /Hari</th>
                <th style="width:12%;">Harga Penyimpanan /hari</th>
                <th style="width:12%;">Harga Unit /Pesan</th>
                <th style="width:12%;">Waktu Proses Beli</th>
                <th style="width:12%;">Rekomendasi EOQ</th>
                <th style="width:12%;">Jarak Pesan Barang</th>
                <th style="width:12%;">Titik Pesan Ulang</th>
            </tr>
        </thead>
        <tbody  align="center">
            <?php while ($data = mysqli_fetch_assoc($data_eoq)) {
              $barang = GetDetailBarang($data['id_item'], $conn);
            ?>
              <tr>
                <td  style="width:5%;"><?php echo $barang['nama_barang'] ?></td>
                <td  style="width:5%;"><?php echo number_format($data['demand']) ?> Unit</td>
                <td  style="width:5%;">Rp. <?php echo number_format($data['harga_simpan']) ?></td>
                <td  style="width:5%;">Rp. <?php echo number_format($data['harga_unit']) ?></td>
                <td  style="width:5%;"><?php echo number_format($data['lead_time']) ?> Hari</td>
                <td  style="width:5%;"><?php echo number_format($data['hasil_eoq']) ?> Unit</td>
                <td  style="width:5%;"><?php echo number_format($data['hasil_jarak_pesan']) ?> Hari</td>
                <td  style="width:5%;"><?php echo number_format($data['ROP']) ?> Unit</td>
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
$html2pdf->output('pdf_laporan_eoq.pdf', 'D');
?>