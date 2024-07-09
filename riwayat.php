<?php
session_start();
error_reporting(0);

     include 'koneksi/koneksi.php';
$db = new database();
// $data = $db->tampil_riwayat_pesan();

if (isset($_POST['cari1'])){
  $data = $db->cari_kode($_POST['keyword1']);
  }

  if (isset($_POST['cari'])){
    $data = $db->cari_nama($_POST['keyword']);
    }
  


function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
}   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan Online Minimarket</title>
    <link rel="icon" href="logo/logo2.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="assets_bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets_sweetalert/css/animate.min.css">
    <link rel="stylesheet" href="assets_sweetalert/css/sweetalert2.min.css">
  <script src="assets_sweetalert/js/sweetalert2.min.js"></script>
</head>
<body>
<style>
  a:link{color:#D9D9D9;text-decoration:none;font-size: 25px;}
  a:visited{color:#D9D9D9;}
  a.nav-link:hover{text-decoration: underline;color: white;}
  a:active{color:white;}
  
</style>
<!-- awal navbar -->
<nav class="navbar navbar-expand-sm fixed-top navbar-primary border border-primary-10000" 
style="height: 95px;background-color: #2940D3;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="logo/logo2.png" alt="Logo" style="width:330px;">
      
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar" >
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link"  href="customer.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" style="text-decoration: underline;color: white;" href="riwayat.php">Riwayat Pemesanan</a>
        </li>
        
      </ul>
      
    </div>
  </div>
  </nav>
  <br>

  <!-- akhir navbar --> 
  <section id="riwayat" style="padding-top: 100px;">
  
  <table align="center" style="border: #2940D3; width: 1000px;" class="table table-bordered table-striped table-hover">
      <tr>
        <td align="center">
        <form action="" method="POST">
                <input type="text" required="required" placeholder="Cari Nama Pemesan" style=" width: 300px;" name="keyword" autocomplete="off">
                <input type="submit" value="cari" name="cari">
          </form> 
        </td>
        <td align="center">
        <form action="" method="POST">
                <input type="text" required="required" placeholder="Cari Kode Pemesanan" style=" width: 300px;" name="keyword1" autocomplete="off">
                <input type="submit" value="cari" name="cari1">
          </form> 
        </td>
      </tr>
  </table>

  <table align="center" style="border: #2940D3; width: 1000px;" class="table table-bordered table-striped table-hover">
    
    <tr align="center">
        <th>No</th>
        <th>Nama Pemesan</th>
        <th>Tanggal Pesan</th>
        <!-- <th>Pembelian</th>
        <th>Sub Total</th> -->
        <th>Kode</th>
        
      </tr>
      <?php
      if($data > 0){
      $no1 = 1;
       foreach ($data as $d){
      ?>
      <tr>
        <td align="center"><?php echo $no1++; ?></td>
        <td style="padding-left : 30px;;"><?php echo $d['nama'] ?></td>
        <td align="center"><?php echo $d['tanggal']?></td>
        <!-- <td align="center">
      <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $d['id_pemesanan'] ?>" 
      class="btn btn-primary">Lihat</button>
            <?php
      include 'kasir/modal/barang.php';
      ?>
      </td>
        <td align="center"><?php echo rupiah ($d['sub_total']); ?></td> -->
        <td align="center"><?php echo $d['kode_bayar']?></td>
        
      </tr>
      <?php
    }
    ?>
    <?php
      }else{
    ?>
        <tr>
          <td colspan="7" style="font-size: 30px;" align="center">
          <b>
          Silahkan Masukan Nama Pemesan <br>
          atau Kode Pemesanan di Pencarian
          </b>
          </td>
        </tr>
    <?php
      }
    ?>
  </table>
  </section>
   
  
  </div>
  
</div>
<script src="assets_bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>