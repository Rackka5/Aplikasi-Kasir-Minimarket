<?php
     include '../../koneksi/koneksi.php';
$db = new database();

$data = $db->struk_pemasukan($_GET['tgl_dari'],$_GET['tgl_sampai']);

function rupiah($angka){
    $hasil_rupiah = number_format($angka,2,',','.');
    return $hasil_rupiah;
}   
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir</title>
    <link rel="icon" href="../logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <!-- <link rel="stylesheet" href="../assets_bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets_sweetalert/css/animate.min.css">
    <link rel="stylesheet" href="../assets_sweetalert/css/sweetalert2.min.css">
  <script src="../assets_sweetalert/js/sweetalert2.min.js"></script> -->

</head>

<table align="center" style="width: 750px;" border="1">
<tr>
            <td colspan="8" align="center">
            <?php
$tgl_dari = $_GET['tgl_dari'];
$tgl_sampai = $_GET['tgl_sampai'];

$data1 = mysqli_query($db->koneksi,
"SELECT SUM(sub_total) as jumlah FROM `tbl_pemesanan`  WHERE tanggal BETWEEN '$tgl_dari' AND '$tgl_sampai' ORDER BY tanggal DESC ;");
while($d = mysqli_fetch_array($data1)){

  $data12 = mysqli_query($db->koneksi,
  "SELECT SUM(potongan) as potongan FROM `tbl_pemesanan` WHERE tanggal BETWEEN '$tgl_dari' AND '$tgl_sampai' ORDER BY tanggal DESC ;");
  while($da = mysqli_fetch_array($data12)){  
  
    ?>
    <?php 
$jumlah = $d['jumlah']; 
$ptongan = $da['potongan'];
$hasil = $jumlah - $ptongan;

    ?>

    <h2>Total Pemasukan : <?php echo rupiah ($hasil); ?></h2>
    <?php
}
}
    ?>
            </td>
          </tr>       
<tr>
                                       <th>No</th>
                                       <th>Tanggal Pemesanan</th>
                                       <th>Sub Total</th>
                                       <th>Bayar</th>
                                       <th>Potongan</th>
                                       <th>Total</th>
                                       <th>Member</th>
                                       <th>Poin</th>
                                    </tr>
                                    <?php
                                    $no1 = 1;
                                    foreach ($data as $d){
                                        $sub = $d['sub_total'];
                                        $potongan = $d['potongan'];
                                        $total1 = $sub - $potongan; 
                                    ?>
                                    <tr align="center">
                                        <td><?php echo $no1++; ?></td>
                                        <td><?php echo $d['tanggal'] ?></td>
                                        <td><?php echo rupiah ($d['sub_total']) ?></td>
                                        <td><?php echo rupiah ($d['bayar']) ?></td>
                                        <td><?php echo rupiah ($d['potongan']) ?></td>
                                        <td><?php echo rupiah ($total1) ?></td>
                                        <td> <?php
                                        if ($d['id_member'] == 0){
                                            echo '-';
                                        }else{
                                            echo $d['id_member'];
                                        }
                                        ?></td>
                                        <td> <?php
                                        if ($d['poin'] == 0){
                                            echo '-';
                                        }else{
                                            echo $d['poin'];
                                        }
                                        ?></td>

                                    </tr>
                                    <?php
                                    }
                                  
                                    ?>
</table>

<!-- <script src="../assets_bootstrap/js/bootstrap.bundle.min.js"></script> -->


</body>
</html>