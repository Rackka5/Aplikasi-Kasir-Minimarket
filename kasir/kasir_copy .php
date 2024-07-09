<?php
error_reporting(0);

            session_start();
     include '../koneksi/koneksi.php';
$db = new database();
$tampil = $db->tampil_barang();

if (isset($_POST['cari'])){
$data = $db->cari($_POST['keyword']);
}

function rupiah($angka){
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
}

//cek apabila menekan tombol dengan nama 'simpan'
if (isset($_POST['simpan'])){
    /// is_numeric() memeriksa apakah sebuah nilai merupakan sebuah angka atau tidak.
    if (isset($_GET['id_barang']) && is_numeric($_GET['id_barang'])){
     /// cek apakah ada nilai get didalam array
    if(isset($_SESSION['keranjang'][$_GET['id_barang']])){
       
        $_SESSION['keranjang'][$_GET['id_barang']]++;
    }else{
        $_SESSION['keranjang'][$_GET['id_barang']]=1;
    }
} 
    
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


<body>



<nav class="navbar navbar-expand-sm fixed-top navbar-primary border border-primary-10000" style="height: 95px;background-color: #2940D3;">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
    <ul class="navbar-nav me-auto pe-1 pt-20 me-5">
        <li><img src="../logo/logo2.png" style="width: 200px;"></li>
      </ul>
      <ul class="navbar-nav mx-auto pe-12 pt-20 me-11">
        <li><h2 style="color: white;">Dashboard Kasir</h2></li>
      </ul>
      <ul class="navbar-nav ms-auto pe-1 pt-20 me-11">
      <li class="dropdown">
           
         <button style="margin-top: 10px;background-color:  #2940D3;
         border : 2px solid white; width: 250px;height : 50px ;" class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <?php echo $_SESSION['nama'] ?>
 </button>
 <ul class="dropdown-menu">
   <li><a style="font-size: 20px;width: 200px;height : 50px ;" class="dropdown-item" href="#">Profil</a></li>
   <li><a style="font-size: 20px;width: 200px;height : 50px ;" class="dropdown-item" href="logout.php">Log Out</a></li>
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
  <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 250px; height: 95vh; background-color : black; ">
  <ul class="nav nav-pills flex-column mb-auto">
  <li class="nav-item">
      <a href="dashboard.php" class="nav-link " aria-current="page">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Dashboard</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="kasir.php" class="nav-link active">
        <b class="bi bi-house me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Pemesanan</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="data_barang.php" class="nav-link ">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Barang</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="data_member.php" class="nav-link ">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Member</b>
      </a>
    </li>
    </li>
   
  </ul>
  
</div>
<!-- Akhir Sidebar  -->

<!-- Isi Dari Sidebar -->
<div class="col-sm-5 mb-4" >
    <br>
                  <!--table pencarian Barang -->       
						<div class="card text-center " 
                        style="width: 600px; height: 230px;border:3px solid #5B9BD5 ; ">
                        <div class="card-header bg-primary text-white text-center">
            <h4>Pencarian Barang</h4>
            </div>
							<div class="card-body text-black">
								<!-- Deskripsi -->
								 <table style="border: #2940D3;" class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <form action="" method="POST">
                                            <td colspan="6" align="left">
                                            <input type="text" name="keyword" size="22" autocomplete="off">
                                            <input type="submit" value="cari" name="cari">
                                            </td>
                                        </form>
                                    </tr>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama Barang</td>
                                        <td>Kode</td>
                                        <td>Harga</td>
                                        <td>Stok</td>
                                        <td>Aksi</td>
                                    </tr>
                                    <?php
                                    if ($data > 0){
                                      $no = 1;
                                      foreach($data as $d){
                                    ?>
                                    <tr >
                                        <form action="kasir.php?id_barang=<?php echo $d['id_barang']; ?>" method="POST">
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $d['nama_barang'] ?></td>
                                        <td><?php echo $d['kode_barang'] ?></td>
                                        <td><?php echo rupiah ($d['harga']) ?></td>
                                        <td><?php echo $d['stok'] ?></td>
                                        <td><input type="submit" name="simpan"  class="btn btn-primary"  value="Tambah"></td>
                                        </form>
                                        
                                    </tr>
                                    <?php
                                      }
                                    }else{
                                                                
                                      ?>
                                      <?php
                                    }
                                   
                                    ?>
                                    

                                 </table>
								
							</div>
						</div>
                        
                        <br>

                        <!--table keranjang Barang -->

                        <div class="card text-center" 
                        style="width: 600px; height: 400px;border:3px solid #5B9BD5 ; ">
                        <div class="card-header bg-primary text-white text-center">
            <h4>Keranjang Barang</h4>
            </div>
                        <div class="card-body text-black">
								<!-- Deskripsi -->
               <form action="" method="POST">
               <table style="border: #2940D3;" class="table table-bordered table-striped table-hover">
                       <tr>
                        <td>No</td>
                        <td>Nama Barang</td>
                        <td>Kode</td>
                        <td>Harga</td>
                        <td>Jumlah</td>
                       </tr>
                       <?php
                       $no = 1;
    foreach ($_SESSION['keranjang'] as $key => $value) {
      print_r($_SESSION['keranjang']);
        foreach($tampil as $d){
            if($d['id_barang'] == $key){
           ?>
                        <tr>
                            <td style="width: 10;"><?php echo $no++; ?></td>
                            <td><?php echo $d['nama_barang'] ?><input type="hidden" name="nama" value="<?php echo $d['nama_barang'] ?>"></td>
                            <td><?php echo $d['kode_barang'] ?><input type="hidden" name="kode" value="<?php echo $d['kode_barang'] ?>"></td>
                            <td><?php echo rupiah ($d['harga']) ?><input type="hidden" name="harga" value="<?php echo $d['harga'] ?>"></td>
                            <td>
                            <?php
                            if ($d['stok'] > 1){
                            ?>
                            <input style="width: 100px;" type="number" name="jumlah" min="0" value="1">
                            <?php
                            }
                            ?>
                            </td>
                        </tr>
           <?php
        }
      
    }
}
                       ?>
                     
                      
                       <tr>
                        <td align="left" colspan="3">
                        <a href="kasir.php?&aksi=hapus"><button type="button" class="btn btn-warning">Hapus Semua</button> </a>
                        </td>
                        <td colspan="2">
                            <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                        </td>
                    </tr>
                    <?php
                    if (isset($_GET['aksi'])){
                        if ($_GET['aksi'] == 'hapus'){
                            unset($_SESSION['keranjang']);
                        }
                    }
                    ?>
                </table>
               </form>
								
							</div>
						</div>

                        
					</div>
                     <!--table Total Belanja Customer -->
          <div class="col-12 col-lg-6" style="width: 600px;padding-top: 25px;padding-left: 50px;">
							<div class="card">
              <div class="card-header bg-primary text-white text-center">
            <h4>Total Belanja</h4>
            </div>
								<div class="card-body">
                  <form action="" name="POST">
                  <table style="border: #2940D3;" class="table table-bordered table-striped table-hover">
                  <tr>
                    <td colspan="5">Tanggal : <input type="text" name="tgl_pemesanan" readonly="readonly" value="<?php echo "" . date("Y/m/d") . ""; ?>"></td>
                  </tr> 
                  <tr align="center">
                      <td>No</td>
                      <td>Nama Barang</td>
                      <td>Harga</td>
                      <td>Jumlah</td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                   
                  </table>  
                  <table>
                    <tr>
                        <td style="width: 100px;">Sub Total</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Bayar</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Kembalian</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                  </table>
                  <table style="width: 500px; height: 50px;">
                    <tr>
                        <td align="center"><input class="btn btn-primary" type="submit" value="Simpan"></td>
                    </tr>
                   
                  </table>            
                  </form>    
									
								</div>
							</div>
  </div>
</div>
    
       
  </div>
  

<script src="../assets_bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>