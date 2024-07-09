<?php
error_reporting(0);

            session_start();
     include '../koneksi/koneksi.php';
$db = new database();
$tampil = $db->tampil_barang();
$tampil_member = $db->tampil_member();

if (isset($_POST['cari'])){
$data = $db->cari($_POST['keyword']);
}

if (isset($_POST['cari1'])){
  $data1 = $db->cari_member($_POST['keyword1']);
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
        $_SESSION['keranjang'][$_GET['id_barang'] ]=1;
    }
} 
    
      }
      
      if (isset($_POST['simpan1'])){
        /// is_numeric() memeriksa apakah sebuah nilai merupakan sebuah angka atau tidak.
        if (isset($_GET['id_member']) && is_numeric($_GET['id_member'])){
          
         /// cek apakah ada nilai get didalam array
        if(isset($_SESSION['member'][$_GET['id_member']])){
           
            $_SESSION['member'][$_GET['id_member']]++;
        }else{
            $_SESSION['member'][$_GET['id_member'] ]=1;
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

<script>
    <?php
    if (isset($_GET['pesan'])) {
      if ($_GET['pesan'] == "minus") {
    ?>
        Swal.fire({
          icon: "error",
          title: "Gagal",
          text: "Transaksi Gagal Karena Tidak Sesuai Total Pembelian",
        });

    <?php
      }
    }
    ?>
  </script>


<nav class="navbar navbar-expand-sm fixed-top navbar-primary border border-primary-10000" style="height: 95px;background-color: #2940D3;">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
    <ul class="navbar-nav me-auto pe-1 pt-20 me-5">
        <li><img src="../logo/logo2.png" style="width: 330px;"></li>
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
  <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 250px; height: 115vh; background-color : #333A73; ">
  <ul class="nav nav-pills flex-column mb-auto">
  <li class="nav-item">
      <a href="dashboard.php" class="nav-link " aria-current="page">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Dashboard</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="kasir.php" class="nav-link active">
        <b class="bi bi-house me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Pemesanan Offline</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="kasir1.php" class="nav-link">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Pemesanan Online</b>
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
    <li class="nav-item">
      <a href="data_brng_msk.php" class="nav-link">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 17.5px; padding-left : 1rem;">Data Barang Masuk</b>
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
<br>
<div class="col-sm-5 " >
    <br>
                  <!--table pencarian Barang -->       
						<div class="card text-center " 
                        style="width: 630px; height: 300px;border:3px solid #5B9BD5 ; ">
                        <div class="card-header bg-primary text-white text-center">
            <h4>Pencarian Barang</h4>
            </div>
							<div class="card-body text-black">
								<!-- Deskripsi -->
								 <table style="border: #2940D3;" class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <form action="" method="POST">
                                            <td colspan="7" align="left">
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
                                        <!-- <td><input type="number" name="jumlah" style="width: 50px;"></td> -->
                                        
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

                        <br>

                                    <!-- pencarian id member minimarket -->

                                      <div class="card text-center" 
                                      style="width: 630px; height: 250px;border:3px solid #5B9BD5 ; ">
                                      <div class="card-header bg-primary text-white text-center">
                                      <h4>Pencarian Member Minimarket</h4>
                                      </div>
                                      <div class="card-body text-black">
                                      <!-- Deskripsi -->
                                      
                                      <table style="border: #2940D3;" class="table table-bordered table-striped table-hover">
                                      <tr>
                                        <form action="" method="POST">
                                            <td colspan="7" align="left">
                                            <input type="text" name="keyword1" size="22" autocomplete="off">
                                            <input type="submit" value="cari" name="cari1">
                                            </td>
                                        </form>
                                    </tr>
                                      <tr>
                                      <td>No</td>
                                      <td>Nama Member</td>
                                      <td>Data Diri</td>
                                      <td>Poin</td>
                                      <td>Aksi</td>
                                      </tr>
                                      <?php
                                    if ($data1 > 0){
                                      $no = 1;
                                      foreach($data1 as $d){
                                        
                                    ?>
                                     <form action="kasir.php?id_member=<?php echo $d['id_member']; ?>" method="POST">
                                     <tr>
                                          <td style="width: 10px;"><?php echo $no++; ?></td>
                                          <td style="width: 250px;"><?php echo $d['nama'] ?></td>
                                          <td>
                                          <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $d['id_member'] ?>" 
    class="btn btn-primary">Lihat</button>  
    
    <?php
include 'modal/member.php';
?>
                                          </td>
                                          <td><?php echo $d['poin'] ?></td>
                                          <td><input type="submit" name="simpan1"  class="btn btn-primary"  value="Tambah"></td>
                                      </tr>
                                     </form>
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


                        
					</div>
                     <!--table Total Belanja Customer -->
          <div class="col-12 col-lg-6" style="width: 600px;padding-top: 25px;padding-left: 50px;">
							<div class="card">
              <div class="card-header bg-primary text-white text-center" style="border:3px solid #5B9BD5 ;">
            <h4>Total Belanja</h4>
            </div>
								<div class="card-body" style="border:3px solid #5B9BD5 ;">
                <table style="width: 500px;">
                   <tr>
                    <td>
                    <form action="kasir.php" method="GET">
                      Aktifkan Member : 
                      <select name="status">
                       <option disable selected hidden >Pilih</option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak">Tidak</option>
                      </select>
                      <input type="submit" value="Pilih">
                      </form> 
                    </td>
                    <td align="right" colspan="3">
                    <a href="kasir.php?&aksi=hapus"><button type="button" class="btn btn-warning">Hapus Semua</button> </a>
                        </td>
                   </tr>                 
                </table>
                
                      
                <form action="proses/proses_pemesanan.php?aksi=pesan" method="POST">
                <input type="hidden" name="tgl_pemesanan" readonly="readonly" 
                value="<?php echo "" . date("Y/m/d") . ""; ?>">
                
                  <table style="width: 500px;margin-bottom : 20px;">
                   
                    <?php
                    if (isset($_GET['aksi'])){
                        if ($_GET['aksi'] == 'hapus'){
                            unset($_SESSION['keranjang']);
                            unset($_SESSION['member']);
                        }
                    }
                    ?>
                  </table>
                  <table style="border: #2940D3;" class="table table-bordered table-striped table-hover">

                  
                  
                  <tr>
                    <td colspan="5">Tanggal : <?php echo "" . date("Y/m/d") . ""; ?></td>
                  </tr> 
                  <tr align="center">
                      <td>No</td>
                      <td>Nama Barang</td>
                      <td>Harga</td>
                      <td>Jumlah</td>
                    </tr>
                    <?php
                       $no = 1;
                       $total = 0;
    foreach ($_SESSION['keranjang'] as $key => $value) {
        foreach($tampil as $d){
            if($d['id_barang'] == $key){
$total += $d['harga'] * $value;
$kurang = $d['stok'] - $value;
              // $harga =+ $d['harga'];
              // $value1 =+ $value;
              // $rumus = $harga * $value1;
              // $total =+ $rumus;


           ?>     
           
           
                    <tr >
                    <?php
                    
                    
                    ?>

                        <input type="hidden" name="stok_kurang[]" value="<?php echo $kurang ?>">
                        <input type="hidden" name="id_barang[]" value="<?php echo $d['id_barang'] ?>">
                        <td align="center"><?php echo $no++; ?></td>
                        <td><?php echo $d['nama_barang'] ?>
                        <input type="hidden" name="nama_barang[]" value="<?php echo $d['nama_barang'] ?>"></td>
                        <td align="center"><?php echo rupiah ($d['harga']) ?></td>
                        <td align="center"><?php echo $value ?>
                        <input type="hidden" name="jumlah[]" value="<?php echo $value ?>"></td>
                    </tr>

                    <?php
            }}}
                   ?>
                  
                  </table>
                    
                  <table>
                  
                  <?php
                    if ($_SESSION['member'] == NULL){
                    ?>
                    <tr>
                        <td style="width: 100px;">Sub Total</td>
                        <td>:</td>
                        <td style="padding-left: 15px;"><?php echo $total ?>
                        <input type="hidden" value="<?php echo $total ?>" name="total"></td>
                        </td>
                    </tr>
                    <tr>
                      <td><br></td>
                    </tr>
                    <tr>
                        <td>Bayar</td>  
                        <td>:</td>
                        <td style="padding-left: 15px;"><input type="number" required id="jumlahBayar" name="bayar" oninput="hitungKembalian()"></td>
                    </tr>
                    <tr>
                        <td style="width: 100px;">Total</td>
                        <td>:</td>
                        <td style="padding-left: 15px;"><span id="total"><?php echo $total ?></span>
                        <input type="hidden" value="<?php echo $total ?>" name="total"></td>
                    </tr>
                    <tr>
                        <td>Kembalian</td>
                        <td>:</td>
                        <td style="padding-left: 15px;"><span id="kembalian">0</span>
                    </tr>

                    <tr>
                      <td><br></td>
                    </tr>

                    <tr>
                   
                    <td>Member</td>
                      <td>:</td>
                      <td style="padding-left: 15px;">0
                      <input type="hidden" value="0" readonly name="id_member">
                      </td>
                    </tr>
                        
                      <tr>
                        <td>Potongan</td>
                        <td>:</td>
                        <td style="padding-left: 15px;"><?php echo $diskon ?>
                      </tr> 

                      
                      <?php
                      }else if ($_SESSION['member'] > 0){
                      ?>

                      <?php
                      
                      
                    
                      foreach ($_SESSION['member'] as $key => $value) {
                        foreach($tampil_member as $d){
                            if($d['id_member'] == $key){
                              
                              $sub = $total;
                              $poin = $d['poin'];
                              $diskon = $poin * 10;
                              $potongan = $total - $diskon;
                      ?>
                      <tr>
                        <td style="width: 100px;">Sub Total</td>
                        <td>:</td>
                        <td style="padding-left: 15px;"><?php echo $sub ?>
                        <input type="hidden" value="<?php echo $sub ?>" name="total">
                        </td>
                    </tr>
                   
                  <tr>
                    <td><br></td>
                  </tr>
                    <tr>
                        <td>Bayar</td>  
                        <td>:</td>
                        <td style="padding-left: 15px;">
                        <input type="number" id="jumlahBayar" required name="bayar" oninput="hitungKembalian()"></td>
                    </tr>
                    <?php
                  if (isset($_GET['status'])) {
                    if (($_GET['status']) == 'tidak'){
                  ?>
                    <tr>
                        <td style="width: 100px;">Total</td>
                        <td>:</td>
                        <td style="padding-left: 15px;"><span id="total"><?php echo $sub ?></span>
                        
                        </td>
                    </tr>
                    <?php
                    }
                  }
                    ?>
                    <?php
                  if (isset($_GET['status'])) {
                    if (($_GET['status']) == 'aktif'){
                  ?>
                    <tr>
                        <td style="width: 100px;">Total</td>
                        <td>:</td>
                        <td style="padding-left: 15px;"><span id="total"><?php echo $potongan ?></span>
                        
                        </td>
                    </tr>
                    <?php
                    }
                  }else{
                    ?>
                 <tr>
                        <td style="width: 100px;">Total</td>
                        <td>:</td>
                        <td style="padding-left: 15px;"><span id="total"><?php echo $sub ?></span>
                        
                        </td>
                    </tr>
                    <?php
                    }
                    
                    ?>
                    <tr>
                        <td>Kembalian</td>
                        <td>:</td>
                        <td style="padding-left: 15px;"><span id="kembalian">0</span>
                    </tr>

                    <tr>
                      <td><br></td>
                    </tr>
                                   
                      <td>Member</td>
                      <td>:</td>
                      <td style="padding-left: 15px;"><?php echo $d['id_member'] ?>
                      
                      <input type="hidden" value="<?php echo $d['id_member'] ?>" readonly name="id_member">
                      </td>
                  <?php
                  if (isset($_GET['status'])) {
                    if (($_GET['status']) == 'aktif'){
                  ?>
                      <tr>
                        <td>Potongan</td>
                        <td>:</td>
                        <td style="padding-left: 15px;"><?php echo $diskon ?>
                        <input type="hidden" readonly name="diskon" value="<?php echo $diskon ?>"></td>
                      </tr>

                  <?php
                    }
                  }
                  ?>
                   <?php
                  if (isset($_GET['status'])) {
                    if (($_GET['status']) == 'tidak'){
                  ?>
                      <tr>
                        <td>Potongan</td>
                        <td>:</td>
                        <td style="padding-left: 15px;">0
                        <input type="hidden" readonly name="diskon" value="0"></td>
                      </tr>

                  <?php
                    }
                  }else{
                  ?>
                 <tr>
                        <td>Potongan</td>
                        <td>:</td>
                        <td style="padding-left: 15px;">0
                        <input type="hidden" readonly name="diskon" value="0"></td>
                      </tr>
                  <?php
                  }
                  ?>
                      <?php
                      }
                      
                    }
                  }
                
                      ?>
                      
                      
                    </tr>
                   <?php
                      }
                    
                    
                   ?>
                  </table>

                  <script>
  function hitungKembalian() {
            // Ambil nilai subtotal dan jumlah bayar
            var total = parseFloat(document.getElementById('total').innerText);
            var jumlahBayar = parseFloat(document.getElementById('jumlahBayar').value);
            
            // Hitung kembalian
            var kembalian = jumlahBayar - total;

            // Tampilkan kembalian
            document.getElementById('kembalian').innerText = kembalian;
        }
</script>


                  <table style="width: 500px; height: 50px;margin-top: 20px;">
                  
                    <tr>
                        
                        <td align="center">
                          <input class="btn btn-primary" type="submit" value="Simpan">
                        </td>
                    </tr>
                    
                  </table> 
                             
                  </form>    
									
								</div>
							</div>
  </div>
</div>
    
       
  </div>
  
<script>
$rumus = $d['harga'] * $value;
</script>

<script src="../assets_bootstrap/js/bootstrap.bundle.min.js"></script>


</body>
</html>