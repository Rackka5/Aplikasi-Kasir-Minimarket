<?php
session_start();

?>                 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
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
        <li><h2 style="color: white;">Dashboard Kasir</h2></li>
      </ul>
      <ul class="navbar-nav ms-auto pe-9 pt-20 me-10">
        <li class="nav-item">
            <a href="../data_barang.php">
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
  <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 250px; height: 100vh; background-color : #AAD7D9; ">
  <ul class="nav nav-pills flex-column mb-auto">
  <li class="nav-item">
      <a href="../dashboard.php" class="nav-link" aria-current="page">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Dashboard</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="../kasir.php" class="nav-link ">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Pemesanan Offline</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="../kasir1.php" class="nav-link ">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Pemesanan Online</b>
      </a>
    </li> 
    <li class="nav-item">
      <a href="../data_barang.php" class="nav-link active">
        <b class="bi bi-house me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Barang</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="../data_member.php" class="nav-link">
        <b class=" bi bi-file-earmark-text me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Member</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="../data_brng_msk.php" class="nav-link ">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 17.5px; padding-left : 1rem;">Data Barang Masuk</b>
      </a>
    </li>
    <li class="nav-item">
      <a href="../data_pemesanan.php" class="nav-link ">
        <b class="bi bi-file-earmark-text me-2" style="color: white;font-size : 17.5px; padding-left : 1rem;">Data Pemesanan</b>
      </a>
    </li>
  </ul>
  
</div>
<!-- Akhir Sidebar  -->

<!-- Isi Dari Sidebar -->
<div class="col-sm-5 mb-4">
    <br>

    <div class="card text-center" 
                        style="width: 1200px; height: 680px; ">
							<div class="card-body text-black">
                <br>
								<form action="../proses/proses_barang.php?aksi=tambah" method="POST" enctype="multipart/form-data">
                                    <table align="center" style="background-color : #AAD7D9 ;
                        border : 8px solid #5B9BD5; border-radius: 30px;width: 750px; height : 600px;">
                        
                              <tr>
                                <td><br></td>
                              </tr>
                              <tr>
                                <td colspan="3" align="center"><img id="preview" src="#"  style="width : 100px; "></td>
                            </tr>
                            <script>
                            function previewImage(event) {
                            const input = event.target;
                            const preview = document.getElementById('preview');

                            if (input.files && input.files[0]) {
                                const reader = new FileReader();

                                reader.onload = function (e) {
                                    preview.src = e.target.result;
                                    preview.style.display = 'block';
                                };

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>
                    <tr>
                      <td><br></td>
                    </tr>    
                            </tr>
                                <td style="padding-left: 50px;width:220px; font-family : times new roman ; font-size : 25px ;" align="left">Gambar</td>
                                <td align="center">:</td>
                                <td align="left"><input type="file" required  name="gambar" accept="image/*" onchange="previewImage(event)"></td>
                            </tr>
                            <tr>
                            <td align="left" style="padding-left: 50px;width:220px; font-family : times new roman ; font-size : 25px ;"><h>Tanggal Masuk</h></td>
                            <td align="center" style="width:50px;">:</td>
                            <td align="left"><input type="text" style="width: 200px;  height : 40px;border : 3px solid #5B9BD5; border-radius: 10px;" value="<?php echo "" . date("Y/m/d") . ""; ?>" name="tgl_masuk" readonly="readonly"></td>
                          </tr>    
                              <tr>
                            <td align="left" style="padding-left: 50px;width:220px; font-family : times new roman ; font-size : 25px ;"><h sty>Nama Barang</h></td>
                            <td align="center" style="width:50px;">:</td>
                            <td align="left"><input type="text" style="width: 400px;  height : 40px;border : 3px solid #5B9BD5; border-radius: 10px;" name="nama_barang" required></td>
                          </tr>
                          <tr>
                            <td align="left" style="padding-left: 50px;font-family : times new roman ; font-size : 25px ;"><h>Kode Barang</h></td>
                            <td>:</td>
                            <td align="left"><input type="text" style="width: 400px; height : 40px;border : 3px solid #5B9BD5; border-radius: 10px;" name="kode_barang" required></td>
                            </tr>
                          <tr>
                            <td align="left" style="padding-left: 50px;font-family : times new roman ; font-size : 25px ;">Harga</td>
                            <td>:</td>
                            <td align="left"><input type="number" style="width: 200px; height : 40px;border : 3px solid #5B9BD5; border-radius: 10px;" name="harga" required></td>
                          </tr>
                          <tr>
                            <td align="left" style="padding-left: 50px;font-family : times new roman ; font-size : 25px ;">Jumlah Barang</td>
                            <td>:</td>
                            <td align="left"><input type="number" style="width: 200px; height : 40px;border : 3px solid #5B9BD5; border-radius: 10px;" name="stok" required></td>
                          </tr> 
                         
                                            <td colspan="3"><input type="submit" style="background-color : #16C2F7 ; 
                width: 86%; border : 3px solid #5B9BD5; color : white; margin-bottom : 1rem; 	padding: 10px 20px ; font-size: 15pt; "  value="Simpan"></td>
                                        </tr>
                                    </table>
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
