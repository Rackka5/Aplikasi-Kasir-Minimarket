<?php
session_start();
include '../../koneksi/koneksi.php';
$db = new database;
$data = $db->tampil_edit_kasir($_GET['id_user']);
?>                 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kasir</title>
    <link rel="icon" href="../../logo/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../../assets_bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets_sweetalert/css/animate.min.css">
  <link rel="stylesheet" href="../../assets_sweetalert/css/sweetalert2.min.css">
  <script src="../../assets_sweetalert/js/sweetalert2.min.js"></script>

</head>


<body>

<nav class="navbar navbar-expand-sm fixed-top navbar-primary border border-primary-10000" style="height: 95px;background-color: #2940D3;">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
    <ul class="navbar-nav me-auto pe-1 pt-20 me-5">
        <li><img src="../../logo/logo2.png" style="width: 330px;"></li>
      </ul>
      <ul class="navbar-nav mx-auto pe-2 pt-20 me-11">
        <li><h2 style="color: white;">Dashboard Administrator</h2></li>
      </ul>
      <ul class="navbar-nav ms-auto pe-9 pt-20 me-10">
        <li class="nav-item">
            <a href="../data_kasir.php">
            <button style="background-color: white; border : 3px solid orange; width : 100px; height: 45px ;
            border-radius : 10%">Kembali <img src="../../gambar/kembali.png" width="20px"></button></a>
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
  <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 250px; height: 90vh;background-color : #333A73; ">
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="../admin.php" class="nav-link " >
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Dashboard</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="" class="nav-link active">
        <b class="bi bi-house me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Petugas</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="../data_barang.php" class="nav-link ">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Barang</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="../data_brng_msk.php" class="nav-link">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 17.5px; padding-left : 1rem;">Data Barang Masuk</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="../data_member.php" class="nav-link">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Member</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="../data_pemesanan.php" class="nav-link">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Pemesanan</b>
      </a>
    </li>
  </ul>
  
</div>
<!-- Akhir Sidebar  -->

<!-- Isi Dari Sidebar -->
<div class="col-sm-5 mb-4">
    <br>

    <div class="card text-center" 
                        style="width: 1200px; height: 600px; ">
							<div class="card-body text-black">
                <br>
                <?php
foreach($data as $d){
    ?>
								<form action="../proses/proses_kasir.php?aksi=edit" method="POST">
                                    <table align="center" style="background-color : #AAD7D9 ;
                        border : 8px solid #5B9BD5; border-radius: 30px;width: 650px; height : 450px;">
                              <tr>
                                <td><br></td>
                              </tr>
                              <tr>
                                <input type="hidden" name="id_user" value="<?php echo $d['id_user'] ?>">
                            <td style="font-family : times new roman ; font-size : 25px ;"><h sty>Nama </h></td>
                            <td align="center" style="width:50px;">:</td>
                            <td align="left"><input type="text" style="width: 400px;  height : 40px;border : 3px solid #5B9BD5; border-radius: 10px;" 
                            name="nama" value="<?php echo $d['nama'] ?>" required></td>
                          </tr>
                          <tr>
                            <td style="font-family : times new roman ; font-size : 25px ;"><h>Username</h></td>
                            <td>:</td>
                            <td align="left"><input type="text" style="width: 400px; height : 40px;border : 3px solid #5B9BD5; border-radius: 10px;" 
                            name="username" value="<?php echo $d['username'] ?>" required></td>
                            </tr>
                          <tr>
                            <td style="font-family : times new roman ; font-size : 25px ;">Password</td>
                            <td>:</td>
                            <td align="left"><input type="text" style="width: 400px; height : 40px;border : 3px solid #5B9BD5; border-radius: 10px;" 
                            name="password" value="<?php echo $d['password'] ?>" required></td>
                          </tr> 
                          <tr>
                            <td style="font-family : times new roman ; font-size : 25px ; ">Jabatan</td>
                            <td>:</td>
                            <td align="left">
                                                <select name="jabatan" style="width: 200px; height: 40px; border : 3px solid #5B9BD5; border-radius: 10px;">
                                                    <option value="petugas">Kasir</option>
                                                </select>
                                            </td>
                            
                            </td>                              
                                      
                                        <tr>
                                            <td colspan="3"><input type="submit" style="background-color : #16C2F7 ; 
                width: 86%; border : 3px solid #5B9BD5; color : white; margin-bottom : 1rem; 	padding: 10px 20px ; font-size: 15pt; "  value="Simpan"></td>
                                        </tr>
                                    </table>
                                    <?php
}
                                    ?>
                                </form>
                            
							</div>
						</div>

					</div>

    
       
  </div>
</div>
<!--akhir dari Isi Sidebar -->
<script src="../../assets_bootstrap/js/bootstrap.bundle.min.js"></script>
		
        


</body>
</html>
