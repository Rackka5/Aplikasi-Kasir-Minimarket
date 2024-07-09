<?php
            session_start();
     include '../../koneksi/koneksi.php';
$db = new database();
$data = $db->tampil_struk($_GET['id_pemesanan']);  
   
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
    <link rel="stylesheet" href="../assets_bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets_sweetalert/css/animate.min.css">
    <link rel="stylesheet" href="../assets_sweetalert/css/sweetalert2.min.css">
  <script src="../assets_sweetalert/js/sweetalert2.min.js"></script>

</head>

<table align="center"  width="700px" height="450px" 
                style="font-size: 27px; background-color : white; border : 4px solid black;">
                          <?php
                          foreach ($data as $d){
                            $total = $d['sub_total'] - $d['potongan'];
                          ?>
                <tr>
                    <td align="center" colspan="3"><br><H2 style="padding-left: 40px;">Struk Pembelian Raka Market</H2></td>
                </tr>
                <tr>
                    <td colspan="4"><hr style="border:4px solid black"></td>
                </tr>   
                <tr>
                    <td><br></td>
                </tr>
                <?php
          $no = 1;
          $nama = explode(',', $d['nama_barang']);
          $jum  = explode(',', $d['jumlah']);
         foreach ($nama as $row => $barang){
           $jumlah = $jum[$row];
          ?>
              
              <tr >
                    <td  align="left" style="padding-left: 30px;width: 380px;font-size: 20px;"><?php echo $barang ?></td>
                    <td align="center"  ><?php echo $jumlah ?></td>
                    <td></td>
                </tr>
                 

                <?php
         }              
                  ?>

<tr>
                    <td colspan="4"><hr style="border:4px solid #000000"></td>
                </tr>
                <tr>
                  <td><br></td>
                </tr>
                <tr>
                  
                  <td align="right" style="width: 380px;">Sub Total</td>
                  <td align="center" style="width: 100px;">:</td>
                  <td style="width: 50px;"><?php echo rupiah ($d['sub_total']) ?></td>
                </tr>
                <tr>
                  
                  <td align="right" style="width: 380px;">Potongan</td>
                  <td align="center" style="width: 100px;">:</td>
                  <td style="width: 50px;"><?php echo rupiah ($d['potongan']) ?></td>
                </tr>
                <tr>
                  
                  <td align="right" style="padding-right: 38px;width: 380px;">Tunai</td>
                  <td align="center" style="width: 100px;">:</td>
                  <td style="width: 50px;"><?php echo rupiah ($d['bayar']) ?></td>
                </tr>
                <tr>
                  <td><br></td>
                </tr>
                <tr>
                  
                  <td align="right" style="width: 380px;padding-right: 40px;">Total</td>
                  <td align="center" style="width: 100px;">:</td>
                  <td style="width: 50px;"><?php echo rupiah ($total) ?></td>
                </tr>
                <tr>    
                  <td align="right" style="padding-left: 30px;width: 380px;">Kembali</td>
                  <td align="center" style="width: 100px;">:</td>
                  <td style="width: 50px;"><?php echo rupiah ($d['kembalian']) ?></td>
                </tr>
                <tr>
                    <td><br></td>
                </tr>

                    <?php
                          }
                      ?>
                                </table>
<script src="../assets_bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>