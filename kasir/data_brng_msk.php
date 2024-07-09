<?php
            session_start();
     include '../koneksi/koneksi.php';
$db = new database();
   
function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
}   

$jumlah_data_perhalaman = 7;
$result = mysqli_query($db->koneksi,("SELECT 
tbl_barang.nama_barang,
tbl_barang.kode_barang,
tbl_barang_masuk.tgl_masuk,
tbl_barang_masuk.jumlah
FROM tbl_barang_masuk INNER JOIN tbl_barang ON
        tbl_barang_masuk.nama_barang = tbl_barang.nama_barang"));
$jumlah_data = mysqli_num_rows($result);
$jumlah_halaman = ceil($jumlah_data / $jumlah_data_perhalaman);

if (isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}
$awal_data = ($jumlah_data_perhalaman * $page) - $jumlah_data_perhalaman;


$data = $db->tampil_barang_masuk_pagination($awal_data,$jumlah_data_perhalaman); 
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


<body>

<nav class="navbar navbar-expand-sm fixed-top navbar-primary border border-primary-10000" style="height: 95px;background-color: #2940D3;">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
    <ul class="navbar-nav me-auto pe-1 pt-20 me-5">
        <li><img src="../logo/logo2.png" style="width: 330px;"></li>
      </ul>
      <ul class="navbar-nav mx-auto pe-2 pt-20 me-11">
        <li><h2 style="color: white;">Dashboard Kasir</h2></li>
      </ul>
      <ul class="navbar-nav ms-auto pe-1 pt-20 me-11">
      <li class="dropdown">
           
         <button style="margin-top: 10px;background-color:  #2940D3;
         border : 2px solid white; width: 200px;height : 50px ;" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo $_SESSION['nama'] ?>
 </button>
 <ul class="dropdown-menu">
   <li><a style="font-size: 20px;width: 200px;height : 20px ;" class="dropdown-item" href="logout.php">Log Out</a></li>
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
  <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 250px; height: 90vh; background-color :  #333A73; ">
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="dashboard.php" class="nav-link" aria-current="page">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Dashboard</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="kasir.php" class="nav-link ">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Pemesanan Offline</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="kasir1.php" class="nav-link ">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Pemesanan Online</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="data_barang.php" class="nav-link ">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Barang</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="data_member.php" class="nav-link">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Member</b>
      </a>
    </li>

    <li class="nav-item">
      <a href="data_brng_msk.php" class="nav-link active">
        <b class="bi bi-house me-2" style="color: white;font-size : 17.5px; padding-left : 1rem;">Data Barang Masuk</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="data_pemesanan.php" class="nav-link">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 17.5px; padding-left : 1rem;">Data Pemesanan</b>
      </a>
    </li>
  </ul>
  
</div>
<!-- Akhir Sidebar  -->

<!-- Isi Dari Sidebar -->
<div class="col-sm-5 mb-4 ">
    <br>
                        <!-- awal dari tabel -->
						<div class="card text-center" 
                        style="width: 1200px; height: 560px; ">
							<div class="card-body text-black">
								<!-- isi tabel -->
								 <table style="border: #2940D3; margin-top: 25px;" class="table table-bordered table-striped table-hover">

                                    <tr>
                                       <th>No</th>
                                       <th>Nama Barang</th>
                                       <th>Supplier</th>
                                       <th>Kode Barang</th>
                                       <th>Tanggal Masuk</th>
                                       <th>Jumlah</th>       
                                    </tr>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $d){
                                      
                                    ?>
                                    <tr>
                                      <td><?php echo $no++; ?></td>
                                      <td align="left" style="padding-left: 35px;"><?php echo $d['nama_barang'] ?></td>
                                      <td><?php echo $d['supplier'] ?></td>
                                      <td><?php echo $d['kode_barang'] ?></td>
                                      <td><?php echo $d['tgl_masuk'] ?></td>
                                      <td><?php echo $d['jumlah'] ?> pcs</td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    <td colspan="10">
    <br>
  <?php
if ($page > 1){
?>
 <button style="width: 50px;height: 40px;"><a style="font-size: 20px;color: blue;  text-decoration: none;" href="data_brng_msk.php?page=<?php echo $page - 1 ?>"><<</a></button>
<?php
}
?>
    
    <?php  
for($i = 1; $i <= $jumlah_halaman; $i++) {
  $angka = $i."";
?>

<a style="font-size: 20px; text-decoration: none;" href="data_brng_msk.php?page=<?php echo $i?>">
<button style="width:50px; height: 40px;
<?php if(isset($_GET['page']) && $_GET['page'] === $angka){ 
  echo 'background-color:blue;color: white;'; 
}elseif (!isset($_GET['page']) && $i === 1){
  echo 'background-color:blue;color: white;'; 
  }else{ 
    echo'backgrund-color:white;color:blue;'; 
    } 
    ?>"><?php echo $i; ?></button></a>
 

 <?php
}
 ?>
<?php
if ($page < $jumlah_halaman){
?>
 <button style="width: 50px;height: 40px;"><a style="font-size: 20px;color: blue;  text-decoration: none;" href="data_brng_msk.php?page=<?php echo $page + 1 ?>">>></a></button>
<?php
}
?>
  </td>
                                 </table>
								
							</div>
						</div>
                        <!-- akhir dari tabel -->
					</div>

    
       
  </div>
</div>
<script src="../assets_bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>