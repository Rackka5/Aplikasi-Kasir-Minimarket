
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
    
    <div class="modal fade" id="exampleModal<?php echo $d['id_barang'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 " id="exampleModalLabel">Gambar Barang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped table-hover" align="center" style="width: 380px;">
          <tr>
            <td>
                <img src="../kasir/gambar/<?php echo $d['gambar'] ?>" style="width: 300px; height: 300px;" >
            </td>
          </tr>
    
          
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