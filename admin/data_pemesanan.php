<?php
error_reporting(0);

            session_start();
     include '../koneksi/koneksi.php';
$db = new database();

//pagination
$jumlah_data_perhalaman = 7;
$jumlah_data_perhalaman1 = 10;

$result = mysqli_query($db->koneksi,("SELECT * FROM tbl_pemesanan"));
$jumlah_data = mysqli_num_rows($result);
$jumlah_halaman = ceil($jumlah_data / $jumlah_data_perhalaman);

if (isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page = 1;
}
$awal_data = ($jumlah_data_perhalaman * $page) - $jumlah_data_perhalaman;


$data = $db->tampil_pemesanan($awal_data,$jumlah_data_perhalaman);    
function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
}   

if (isset($_GET['cari'])){
  $data = $db->pemasukan($_GET['tgl_dari'],$_GET['tgl_sampai'],$awal_data,$jumlah_data_perhalaman1);
  }
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
  <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 250px; height: 120vh;background-color : #333A73; ">
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="admin.php" class="nav-link " aria-current="page">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Dashboard</b>
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
      <a href="data_brng_msk.php" class="nav-link ">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 17.5px; padding-left : 1rem;">Data Barang Masuk</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="data_member.php" class="nav-link">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Member</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="data_pemesanan.php" class="nav-link active">
        <b class="bi bi-house me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Pemesanan</b>
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
            <td colspan="11" align="center">
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
<?php 
if ($hasil == 0 ){

  $data1 = mysqli_query($db->koneksi,
"SELECT SUM(sub_total) as jumlah FROM `tbl_pemesanan` WHERE status = 'lunas'");
while($d = mysqli_fetch_array($data1)){

  $data12 = mysqli_query($db->koneksi,
  "SELECT SUM(potongan) as potongan FROM `tbl_pemesanan` WHERE status = 'lunas'");
  while($da = mysqli_fetch_array($data12)){  

$jumlah = $d['jumlah']; 
$ptongan = $da['potongan'];
$hasil = $jumlah - $ptongan;
?>

 <h2>Total Pemasukan : <?php echo rupiah ($hasil); ?></h2>
 
<?php
  }
}
}else{

?>
    <h2>Total Pemasukan : <?php echo rupiah ($hasil); ?></h2>
<?php
}
?>
    
    <?php
}
}
    ?>
            </td>
          </tr>       
                 <tr>
  <td colspan="11" align="left"> 
    <form action="" method="GET">

    <input type="date" required name="tgl_dari">
    <input type="date" required name="tgl_sampai">
    <input type="submit" value="cari" name="cari">
    <?php
 if($_GET['tgl_dari'] == NULL){
    ?>
<a href=""><button type="button" class="btn btn-warning">Cetak</button> </a>
    <?php
 }else{
    ?>
<a href="proses/proses_pemasukan.php?tgl_dari=<?php echo $_GET['tgl_dari'] ?>&tgl_sampai=<?php echo $_GET['tgl_sampai'] ?>
    "><button type="button" class="btn btn-warning">Cetak</button> </a>
    <?php
 }
    ?>
    </form>
   
  </td>
                                </tr>
                                    <tr>
                                       <th>No</th>
                                       <th>Pembelian</th>
                                       <th>Tanggal Pemesanan</th>
                                       <th>Sub Total</th>
                                       <th>Potongan</th>
                                       <th>Total</th>
                                       <th>Bayar</th>
                                       <th>Member</th>
                                       <th>Poin</th>
                                       <th>Struk</th>       
                                    </tr>
                                    <?php
                                    $no1 = 1;
                                    foreach ($data as $d){
                                      $sub = $d['sub_total'];
                                      $potongan = $d['potongan'];
                                      $total1 = $sub - $potongan;   
                                    ?>
                                    <tr>
                                        <td><?php echo $no1++; ?></td>
                                        <td>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $d['id_pemesanan'] ?>" 
                                        class="btn btn-primary">Lihat</button>  
                                        <!-- <a href="modal/barang.php?id_pemesanan=<?php echo $d['id_pemesanan'] ?>"  data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-primary">
                                            Lihat
                                        </a></td> -->
                                        <?php
                        include 'modal/barang.php';
                        ?>
                                        
                                         
                                      </td> 
                                        <td><?php echo $d['tanggal'] ?></td>
                                        <td><?php echo rupiah ($d['sub_total']) ?></td>
                                        <td><?php echo rupiah($d['potongan']) ?></td>
                                        <td><?php echo rupiah($total1)?></td>
                                        <td><?php echo rupiah ($d['bayar']) ?></td>
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
                                        <td><a href="proses/proses_struk.php?id_pemesanan=<?php echo $d['id_pemesanan'] ?>"><button type="button" class="btn btn-warning">Detail</button> </a></td>

                                    </tr>
                                    <?php
                                    }
                                  
                                    ?>
                          
                        <?php
                        if ($_GET['tgl_dari'] == NULL){
                        ?>
          <td colspan="10">
    <br>
  <?php
if ($page > 1){
?>
 <button style="width: 50px;height: 40px;"><a style="font-size: 20px;color: blue;  text-decoration: none;" href="data_pemesanan.php?page=<?php echo $page - 1 ?>"><<</a></button>
<?php
}
?>
    
    <?php  
for($i = 1; $i <= $jumlah_halaman; $i++) {
  $angka = $i."";
?>

<a style="font-size: 20px; text-decoration: none;" href="data_pemesanan.php?page=<?php echo $i?>">
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
 <button style="width: 50px;height: 40px;"><a style="font-size: 20px;color: blue;  text-decoration: none;" href="data_pemesanan.php?page=<?php echo $page + 1 ?>">>></a></button>
<?php
}
?>
  </td>
        
                        <?php
                        }else{
                        ?>

                        <?php
                        }
                        ?>
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