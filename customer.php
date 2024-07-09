<?php
session_start();
error_reporting(0);

include 'koneksi/koneksi.php';
$db = new database();
//pagination
$jumlah_data_perhalaman = 9;
$result = mysqli_query($db->koneksi, ("SELECT * FROM tbl_barang"));
$jumlah_data = mysqli_num_rows($result);
$jumlah_halaman = ceil($jumlah_data / $jumlah_data_perhalaman);

if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 1;
}
$awal_data = ($jumlah_data_perhalaman * $page) - $jumlah_data_perhalaman;

$data = $db->tampil_barang_cus_pagination($awal_data, $jumlah_data_perhalaman);

if (isset($_POST['cari'])) {
  $data = $db->cari_barang_cus($_POST['keyword']);
}

if (isset($_POST['semua'])) {
  $data = $db->tampil_barang_cus();
}

function rupiah($angka)
{
  $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
  return $hasil_rupiah;
}

if (isset($_POST['simpan'])) {
  /// is_numeric() memeriksa apakah sebuah nilai merupakan sebuah angka atau tidak.
  if (isset($_GET['id_barang']) && is_numeric($_GET['id_barang'])) {
    
    if (isset($_POST['jumlah']) && is_numeric($_POST['jumlah'])){
      $jumlah = (int)$_POST['jumlah'];
    if (isset($_SESSION['keranjang3'][$_GET['id_barang']])) {


    }if ($jumlah > 0) {
      $_SESSION['keranjang3'][$_GET['id_barang']] = $jumlah;
  } elseif ($jumlah < 0) {

  }
  }
}
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
    a:link {
      color: #D9D9D9;
      text-decoration: none;
      font-size: 25px;
    }

    a:visited {
      color: #D9D9D9;
    }

    a.nav-link:hover {
      text-decoration: underline;
      color: white;
    }

    a:active {
      color: white;
    }
  </style>
  <!-- awal navbar -->
  <nav class="navbar navbar-expand-sm fixed-top navbar-primary border border-primary-10000" style="height: 95px;background-color: #2940D3;">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="logo/logo2.png" alt="Logo" style="width:330px;">

      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link" style="text-decoration: underline;color: white;" href="customer.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="riwayat.php">Riwayat Pemesanan</a>
          </li>
         
          </li>
        </ul>

      </div>
    </div>
  </nav>
  <br>

  <!-- akhir navbar -->


  <!-- section untuk menampilkan data barang diminimarket -->
  <section id="travel" style="padding-top: 8rem;">

    <div class="container">
      <div class="card-header text-white text-center" style="margin-bottom: 30px;
    height: 180px; border : 4px solid #2940D3;">
        <div class="offcanvas offcanvas-end" tabindex="-1" style="width: 500px;" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Daftar Belanja</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>

          <table align="center" style="width: 500px;margin-bottom : 20px;">
            <tr>
              <td align="right" colspan="3">
                <a href="customer.php?&aksi=hapus"><button type="button" class="btn btn-warning">Hapus Semua</button> </a>
              </td>
            </tr>
            <?php
            if (isset($_GET['aksi'])) {
              if ($_GET['aksi'] == 'hapus') {
                unset($_SESSION['keranjang3']);
              }
            }
            ?>
          </table>

          <form action="proses/proses_pemesanan.php?aksi=pesan" method="POST">

            <table align="center" style="border: #2940D3; width: 450px;" class="table table-bordered table-striped table-hover">

              <!-- <tr>
            <th align="center">Pemesan</th>
            <th align="center">:</th>
            <th align="left"><input style="width: 300px;" type="text" required="required" name="nama_cus"></th>
          </tr> -->
              <?php
              $tanggal = date("d");
              $kode = rand(1111, 9999);
              $hasil = $kode . $tanggal;

              ?>
              <tr>
                <th align="center">Kode</th>
                <th align="center">:</th>
                <th align="left"><input type="number" style="padding-right: 110px;" value="<?php echo $hasil; ?>" readonly="readonly" name="kode"></th>
              </tr>
            </table>

            <table align="center" style="border: #2940D3; width: 450px;" class="table table-bordered table-striped table-hover">
              <tr>
                <td align="left" colspan="5">Tanggal : <?php echo "" . date("Y/m/d") . ""; ?>
                  <input type="hidden" name="tgl_pemesanan" value="<?php echo "" . date("Y/m/d") . ""; ?>">
                </td>

              </tr>
              <tr align="center">
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
              </tr>

              <?php
              $no = 1;
              $total = 0;
              foreach ($_SESSION['keranjang3'] as $key => $value) {
                foreach ($data as $d) {
                  if ($d['id_barang'] == $key) {
                    $total += $d['harga'] * $value;
                    // $harga =+ $d['harga'];
                    // $value1 =+ $value;
                    // $rumus = $harga * $value1;
                    // $total =+ $rumus;


              ?>


                    <tr>

                      <input type="hidden" name="id_barang[]" value="<?php echo $d['id_barang'] ?>">
                      <td align="center"><?php echo $no++; ?></td>
                      <td><?php echo $d['nama_barang'] ?>
                        <input type="hidden" name="nama_barang[]" value="<?php echo $d['nama_barang'] ?>">
                      </td>
                      <td align="center"><?php echo rupiah($d['harga']) ?></td>
                      <td align="left"><?php echo $value ?>
                        <input type="hidden" name="jumlah[]" value="<?php echo $jumlah ?>">
                      </td>
                    </tr>

              <?php
                  }
                }
              }
              ?>
              <tr>
                <td colspan="5">Total : <?php echo $total ?>
                  <input type="hidden" value="<?php echo $total ?>" name="total">
                </td>
                </td>
              </tr>
              <!-- <tr>
  <td align="center" colspan="5"><input type="submit" value="Pesan" class="btn btn-primary">
  </td>
</tr> -->
            </table>
          </form>
          <!-- <table>
                    <tr>
                        <td style="width: 100px;">Total</td>
                        <td>:</td>
                        <td style="padding-left: 15px;"><span id="total"><?php echo $total ?></span>
                        <input type="hidden" value="<?php echo $total ?>" name="total"></td>
                    </tr>
</table> -->
        </div>
        <form action="proses/proses_pemesanan.php?aksi=pesan" method="POST">
          <table align="center" style="height:80px;width: 1200px;">
            <?php
            $total = 0;
            foreach ($_SESSION['keranjang3'] as $key => $value) {
               $angka += $value;
              foreach ($data as $d) {
                if ($d['id_barang'] == $key) {
                  $total += $d['harga'] * $value;
                 

            ?>
                  <input type="hidden" name="tgl_pemesanan" value="<?php echo "" . date("Y/m/d") . ""; ?>">
                  <input type="hidden" name="id_barang[]" value="<?php echo $d['id_barang'] ?>">
                  <input type="hidden" name="jumlah[]" value="<?php echo $angka ?>"></td>
                  <input type="hidden" name="nama_barang[]" value="<?php echo $d['nama_barang'] ?>"></td>
                  <input type="hidden" value="<?php echo $total ?>" name="total"></td>


            <?php
                }
              }
            }
            ?>
            <tr>
              <td><br></td>
            </tr>
            <tr>
              <td align="left" colspan="3" style="color: black;">
                Pemesan : <input style="width: 300px;" type="text" required="required" name="nama_cus">
                Kode : <input type="number" style="padding-right: 110px;" value="<?php echo $hasil; ?>" readonly="readonly" name="kode">
              </td>
            <tr>
              <td colspan="4">
                <hr style="border:4px solid #2940D3">
              </td>
            </tr>
            <tr>
              <td align="left" style="width: 280px;">
                <?php if($angka == 0){ ?>

                  <button style="border-radius: 10px; margin-top : 5px; margin-left: 20px; width: 55px; height: 45px;" type="button" class="position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                  <img src="gambar/keranjang.png" style="width: 30px;">
                </button>

                <?php }else{ ?>

                  <button style="border-radius: 10px; margin-top : 5px; margin-left: 20px; width: 55px; height: 45px;" type="button" class="position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                <?php echo  $angka; ?>
                </span>
                  <img src="gambar/keranjang.png" style="width: 30px;">
                </button>

                <?php } ?>
              </td>
              <td style="width: 400px;" align="center">
                <h1 style="color: black;">Total : <?php echo rupiah($total) ?></h1>
              </td>
              <td style="width: 400px;"><input style="width: 100px; height: 50px; font-size: 25px;" type="submit" value="Pesan" class="btn btn-primary"></td>
            </tr>

          </table>
        </form>
      </div>

      <div class="card-header text-white text-center" style="height: 50px;">
        <form action="" method="POST">
          <input type="text" placeholder="Cari Barang" style=" height: 40px; width: 400px;" name="keyword" autocomplete="off">
          <input type="submit" style="height: 35px ; width: 50px;" value="cari" name="cari">
          <input type="submit" style="margin-left: 25px;height: 35px ; width: 80px;" value="Semua" name="semua" class="btn btn-primary">
        </form>

      </div>

      <div class="mt-3">
        <div class="row justify-content-center mb-3">
          <?php
          if ($data > 0) {
            foreach ($data as $d) {
            ?>
              <div class="col-sm-4 mb-2">

                <div class="card text-center" class="text-center" style=" font-size: 28px; height : 550px; background-color: white; border:4px solid #5B9BD5; border-radius: 30px;">
                  <form action="customer.php?id_barang=<?php echo $d['id_barang']; ?>" method="POST">
                    <br>
                    <p><img src="kasir/gambar/<?php echo $d['gambar'] ?>" style="width: 150px; height: 150px;"></p>
                    <p><?php echo $d['nama_barang'] ?></p>
                    <p><?php echo rupiah($d['harga']) ?></p>
                    <p><input type="number" name="jumlah"></p>
                    <p>
                      <input type="submit" name="simpan" style="width: 130px; height: 50px;" class="btn btn-primary" value="Tambah">
                    </p>

                    <br>
                  </form>
                </div>
                </a>
              </div>

            <?php
            }
            ?>

            <div class="card-header text-white text-center" style="height: 50px;">
              <br>
              <?php
              if ($page > 1) {
              ?>
                <button style="width: 50px;height: 40px;"><a style="font-size: 20px;color: blue;  text-decoration: none;" href="customer.php?page=<?php echo $page - 1 ?>">
                    << </a></button>
              <?php
              }
              ?>

              <?php
              for ($i = 1; $i <= $jumlah_halaman; $i++) {
                $angka = $i . "";
              ?>

                <a style="font-size: 20px; text-decoration: none;" href="customer.php?page=<?php echo $i ?>">
                  <button style="width:50px; height: 40px;
<?php if (isset($_GET['page']) && $_GET['page'] === $angka) {
                  echo 'background-color:blue;color: white;';
                } elseif (!isset($_GET['page']) && $i === 1) {
                  echo 'background-color:blue;color: white;';
                } else {
                  echo 'backgrund-color:white;color:blue;';
                }
?>"><?php echo $i; ?></button></a>


              <?php
              }
              ?>
              <?php
              if ($page < $jumlah_halaman) {
              ?>
                <button style="width: 50px;height: 40px;"><a style="font-size: 20px;color: blue;  text-decoration: none;" href="customer.php?page=<?php echo $page + 1 ?>">>></a></button>
              <?php
              }
              ?>

            </div>
          <?php
          } else {
          ?>
            <div class="card text-center" class="text-center" style=" font-size: 28px; height : 450px; background-color: white;">
              <b style="font-size: 30px;">Hasil pencarian "<?php echo $_POST['keyword'] ?>" tidak ada</b>
            </div>
          <?php
          }
          ?>
        </div>
      </div>
  </section>


  </div>
  <script src="assets_bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>