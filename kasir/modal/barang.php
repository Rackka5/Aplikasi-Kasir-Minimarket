
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    
    <div class="modal fade" id="exampleModal<?php echo $d['id_pemesanan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 " id="exampleModalLabel">Daftar Pembelian</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped table-hover" align="center" style="width: 380px;">
          <tr align="center">
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
          </tr>
          <?php
          $no = 1;
          $nama = explode(',', $d['nama_barang']);
          $jum  = explode(',', $d['jumlah']);
         foreach ($nama as $row => $barang){
           $jumlah = $jum[$row];
          ?>
          <tr>
            <td align="center"><?php echo $no++; ?></td>
            <td align="center"><?php echo $barang ?></td>
            <td align="center"><?php echo $jumlah ?></td>
          </tr>
          <?php
 }
          ?>
          
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        
    
</body>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</html>