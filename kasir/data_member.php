<?php
            session_start();
     include '../koneksi/koneksi.php';
$db = new database();
$data = $db->tampil_member();                
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

<script>
        function hapus(){
 var result = confirm("Apakah Anda yakin ingin menghapus akun tersebut?");
    if (result) {
        
    }else{

    }    
    return result;       
}
    </script>

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
      <a href="data_member.php" class="nav-link active">
        <b class="bi bi-house me-2" style="color: white;font-size : 18px; padding-left : 1rem;">Data Member</b>
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
<div class="col-sm-5 mb-4 ">
    <br>
                        <!-- awal dari tabel -->
						<div class="card text-center" 
                        style="width: 1200px; height: 560px; ">
							<div class="card-body text-black">
								<!-- isi tabel -->
								 <table style="border: #2940D3;" class="table table-bordered table-striped table-hover">
                                    <tr > 
                                        <td colspan="9" align="left">
                                        <a href="daftar/daftar_member.php" style="margin-bottom: 4px; background-color : #92D050;
                                        font-size : 20px; width: 200px;" class="btn btn-success">+ Tambah Data</a></td>
                                    </tr>
                                    <tr>
                                        <th style="width: 20px;">No</th>
                                        <th style="width: 120px;">Id Member</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th style="width: 250px;">Nomor Telepon</th>
                                        <th>Poin</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $d){
                                    ?>
                                    <tr>
                                      <td><?php echo $no++; ?></td>
                                      <td><?php echo $d['id_member'] ?></td>
                                      <td><?php echo $d['nama'] ?></td>
                                      <td><?php echo $d['alamat'] ?></td>
                                      <td><?php echo $d['email']?></td>
                                      <td><?php echo $d['no_tlp'] ?></td>
                                      <td style="width: 100px;"><?php echo $d['poin'] ?></td>
                                      <!-- <td style="width: 100px;"> 
                                        <a href="daftar/edit_member.php?id_member=
                                        <?php echo $d['id_member']; ?>&aksi=edit"> <button type="button" class="btn btn-primary">Edit</button> </a>
                                        </td> -->
                                        <td style="width: 100px;">
                                        <a href="proses/proses_member.php?id_member=<?php echo $d['id_member']; ?>&aksi=hapus" 
                                        onclick="return hapus()"><button type="button" class="btn btn-danger">Hapus</button> </a>
                                        </td>
                                    </tr>
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