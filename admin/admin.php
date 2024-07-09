<?php
            session_start();
     include '../koneksi/koneksi.php';
$db = new database();                
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Administrator</title>
    <link rel="icon" href="../logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets_bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets_sweetalert/css/animate.min.css">
    <link rel="stylesheet" href="../assets_sweetalert/css/sweetalert2.min.css">
  <script src="../assets_sweetalert/js/sweetalert2.min.js"></script>

</head>


<body>

<nav class="navbar navbar-expand-sm fixed-top navbar-primary border border-primary-10000" 
style="height: 95px;background-color: #2940D3;">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
    <ul class="navbar-nav me-auto pe-1 pt-20 me-5">
        <li><img src="../logo/logo2.png" style="width: 330px;"></li>
      </ul>
      <ul class="navbar-nav mx-auto pe-2 pt-20 me-11">
        <li><h2 style="color: white;">Dashboard Administrator</h2></li>
      </ul>
      <ul class="navbar-nav ms-auto pe-1 pt-20 me-11">
      <li class="dropdown">
           
         <button style="margin-top: 10px;background-color:  #2940D3;
         border : 2px solid white; width: 200px;height : 50px ;" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo $_SESSION['nama'] ?>
 </button>
 <ul class="dropdown-menu">
   <li><a style="font-size: 20px;width: 200px;height : 40px ;" class="dropdown-item" href="logout.php">Log Out</a></li>
 </ul>
      </ul>
      
        
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- akhir navbar -->

<!-- Awal Sidebar -->

<br>
<br>
<div class="container-fluid" style="padding-top : 3rem;">
  <div class="row">
  <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 250px; height: 130vh; background-color : #333A73; ">
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="admin.php" class="nav-link active" aria-current="page">
        <b class="bi bi-house me-2" style="font-size : 18px; padding-left : 1rem;">Dashboard</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="data_kasir.php" class="nav-link ">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Petugas</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="data_barang.php" class="nav-link ">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Barang</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="data_brng_msk.php" class="nav-link">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 17.5px; padding-left : 1rem;">Data Barang Masuk</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="data_member.php" class="nav-link">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Member</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="data_pemesanan.php" class="nav-link">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Pemesanan</b>
      </a>
    </li>
  </ul>
  
</div>
<!-- Akhir Sidebar  -->

<!-- Isi Dari Sidebar -->
<div class="col-sm-5 mb-4">
    <br>
                        <!-- awal Kontak Kami -->
						<div class="card text-center" 
                        style="width: 1200px; height: 600px; ">
							<div class="card-body text-black">
							
              <div class="container px- text-center">

  <div class="row gx-4">

  <div class="col">
     
      <div class="p-3 bg-primary" style=" height: 200px; border:4px solid #5B9BD5 ; ">

      <table  style="width: 500px;" align="center">
      <?php
      $data=mysqli_query($db->koneksi,"SELECT COUNT(id_barang) AS barang FROM tbl_barang");
      while($d= mysqli_fetch_array($data)) {
      ?>
          <tr>
            <td align="left">
              <h3 style="color: white;">Data Barang</h3>
              <br>
              <h3 style="color: white;">Jumlah : <?php echo $d['barang'] ?></h3>
            </td>
            <td align="center"><img src="icon_gambar/data_barang.png" style="width: 140px;"></td>
          </tr>
      <?php
      }
      ?>
      </table> 
      
    </div>
    <a href="data_barang.php">
      <div class="card-header text-white text-center" style="background-color: #2940D3; ">
        <h4>Data Barang</h4>
      </div>
    </a>

      <br>
 
	  <div class="p-3 bg-primary" style=" height: 200px; border:4px solid #5B9BD5 ;">
      
      
      <table  style="width: 500px;" align="center">
      <?php
      $data=mysqli_query($db->koneksi,"SELECT COUNT(id_barang_msk) AS barang_msk FROM tbl_barang_masuk");
      while($d= mysqli_fetch_array($data)) {
      ?>
          <tr>
            <td align="left">
              <h3 style="color: white;">Data Barang Masuk</h3>
              <br>
              <h3 style="color: white;">Jumlah : <?php echo $d['barang_msk'] ?></h3>
            </td>
            <td align="center"><img src="icon_gambar/brng_msk2.png" style="margin-right: 30px;width: 170px;"></td>
          </tr>
      <?php
      }
      ?>
      </table> 
    </div>
    <a href="data_brng_msk.php">
      <div class="card-header text-white text-center" style="background-color: #2940D3;">
        <h4>Data Barang Masuk</h4>
      </div>
    </a>    
    </div>
    
    <div class="col">
     
      <div class="p-3 bg-primary" style=" height: 200px; border:4px solid #5B9BD5 ;">
       
      <table  style="width: 500px;" align="center">
      <?php
      $data=mysqli_query($db->koneksi,"SELECT COUNT(id_member) AS member FROM tbl_member");
      while($d= mysqli_fetch_array($data)) {
      ?>
          <tr>
            <td align="left">
              <h3 style="color: white;">Data Member</h3>
              <br>
              <h3 style="color: white;">Jumlah : <?php echo $d['member'] ?></h3>
            </td>
            <td align="center"><img src="icon_gambar/member1.png" style="margin-right: 30px;width: 130px;"></td>
          </tr>
      <?php
      }
      ?>
      </table> 
      
    </div>
    <a href="data_member.php">
      <div class="card-header text-white text-center" style="background-color: #2940D3;">
        <h4>Data Member</h4>
      </div>
    </a>
    
      <br>
     

        
	  <div class="p-3 bg-primary" style=" height: 200px; border:4px solid #5B9BD5 ;">
      
    <table  style="width: 500px;" align="center">
      <?php
      $data=mysqli_query($db->koneksi,"SELECT COUNT(id_pemesanan) AS id FROM tbl_pemesanan");
      while($d= mysqli_fetch_array($data)) {
      ?>
          <tr>
            <td align="left">
              <h3 style="color: white;">Data Pemesanan</h3>
              <br>
              <h3 style="color: white;">Jumlah : <?php echo $d['id'] ?></h3>
            </td>
            <td align="center"><img src="icon_gambar/pemesanan.png" style="margin-right: 30px;width: 150px;"></td>
          </tr>
      <?php
      }
      ?>
      </table> 
  
     
    </div>
    <a href="data_pemesanan.php">
      <div class="card-header text-white text-center" style="background-color: #2940D3;">
        <h4>Data Pemesanan</h4>
      </div>
    </a>
</div>
<div class="col-sm-5 mb-4">
    <br>

    <div class="card text-center" 
                        style="width: 1100px; height: 300px; ">
							<div class="card-body text-black">
              <table class="p-3 bg-primary" style="height: 200px; border:4px solid #5B9BD5 ;width: 600px;" align="center">
      <?php
      $data=mysqli_query($db->koneksi,"SELECT COUNT(id_user) AS id FROM tbl_user WHERE jabatan = 'petugas'");
      while($d= mysqli_fetch_array($data)) {
      ?>
          <tr>
            <td align="left">
              <h3 style="padding-left: 30px;color: white;">Data Petugas</h3>
              <br>
              <h3 style="padding-left: 30px;color: white;">Jumlah : <?php echo $d['id'] ?></h3>
            </td>
            <td align="center"><img src="icon_gambar/kasir.png" style="margin-right: 30px;width: 150px;"></td>
          </tr>
          <tr><td><br></td></tr>
          <tr>
            <td colspan="5">
            <a href="data_petugas.php">
      <div class="card-header text-white text-center" style="background-color: #2940D3;">
        <h4>Data Petugas</h4>
      </div>
    </a>
            </td>
          </tr>
      <?php
      }
      ?>
      
      </table> 
      
              </div>
                    
    </div>
</div>

    
       
  </div>
</div>
<script src="../assets_bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>