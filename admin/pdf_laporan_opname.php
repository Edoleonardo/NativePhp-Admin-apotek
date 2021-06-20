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
                <td style="border:none;" >
                    <img width="100" src="images/logo/<?php echo $logo['nama_logo'] ?>" />
                </td>
                <td style="border:none;" colspan="4" align="center" style="font-size: 20px;">
                    <h1>Apotek Centra Medika</h1>
                    <h4>Laporan Stock Opname</h4>
                    <!-- <h4><?php //echo 'Periode ' . $getStart . ' s/d ' . $getEnd ?></h4> -->
                </td>
                <td style="border:none;">&nbsp;</td>
            </tr>
            <tr align="center">
            <th>Tanggal</th>
            <th>Nama Barang</th>
            <th>Harga Barang</th>
            <th>Faktur/Keterangan</th>
            <th>Status</th>
            <th>Jumlah Barang</th>
            <th>Sisa</th>
            </tr>
        </thead>
        <tbody align="center">
        <?php while ($data = mysqli_fetch_assoc($data_barang)) {
              //$petugas = GetDataPetugas($data['id_petugas'], $conn);
              $barang = GetDetailBarang($data['id_item'], $conn);
            ?>
              <tr>
                <td><?php echo $data['create_date'] ?></td>
                <td><?php echo $barang['nama_barang'] ?></td>
                <td><?php echo $barang['harga_barang'] ?></td>
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
        </tfoot>
    </table>
    <br>
</div>
<?php
// $html = ob_get_clean();


// require __DIR__ . '../../vendors/autoload.php';

// use Spipu\Html2Pdf\Html2Pdf;

// $html2pdf = new Html2Pdf('P', 'A4', 'en');
// $html2pdf->writeHTML($html);
//$html2pdf->output('pdf_laporan.pdf', 'D');
?>