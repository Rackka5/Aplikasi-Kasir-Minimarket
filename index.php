<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
  <link rel="stylesheet" href="assets_bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets_sweetalert/css/animate.min.css">
  <link rel="stylesheet" href="assets_sweetalert/css/sweetalert2.min.css">
  <script src="assets_sweetalert/js/sweetalert2.min.js"></script>
</head>
<body>
    <!-- Awal alert username dan pasword salah -->

  <script>
    <?php
    if (isset($_GET['pesan'])) {
      if ($_GET['pesan'] == "gagal") {
    ?>
        Swal.fire({
          icon: "error",
          title: "Maaf",
          text: "Username atau Password Anda Salah!",
        });

    <?php
      }
    }
    ?>
  </script>
<nav class="navbar navbar-expand-sm fixed-top navbar-primary border border-primary-10000" 
style="height: 95px;background-color: #2940D3;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="logo/logo2.png" alt="Logo" style="width:330px;">
      
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar" >
      <ul class="navbar-nav mx-auto">
      <li><h2 style="color: white;padding-right : 340px;font-size: 45px;">Halaman login</h2></li>
      </ul>
      
    </div>
  </div>
  </nav>
  <br>
  <br>
<!-- akhir alert username dan pasword salah -->
    <form action="proses/p_login.php" method="POST">
        
        <table border="0" align="center" style="width:580px; height : 540px; 
        background-color : #AAD7D9 ;border:8px solid #5B9BD5 ; margin : 5rem auto; border-radius : 25px; ">
      <tr>
        <td style=" width: 200px; padding-left: 4rem;">
          <b style="font-size : 25px ;">Username</b>
          <br>
          <input style="background-color: white; border : 3px solid #5B9BD5;  
                width: 86%; height : 10%; font-size : 20px;" type="text" name="username" required="required">
          <br>
          <br>
          <b style="font-size : 25px ;">Password</b>
          <br>
          <input style="background-color: white; border : 3px solid #5B9BD5; width: 86%; ; height : 10%;  
                font-size : 20px;" type="password" name="password" required="required">
          <br>
          <br>
          <b style="font-size : 25px ;">Jabatan</b>
          <br>
          <select style="background-color: white; border : 3px solid #5B9BD5; width: 86%; ; height : 10%;  
                font-size : 20px;" name="jabatan">
            <option value="admin">Admin</option>
            <option value="petugas">Kasir</option>
          </select>
          <br>
          <br>
          <input type="submit" value="Login" style="background-color : #16C2F7 ; 
                width: 86%; border : 3px solid #5B9BD5; color : white;	padding: 10px 20px; font-size: 15pt; ">
          
          
          <br>
          <br>
          
        </td>

        </td>
      </tr>


    </table>
    </form>
</body>
<script src="assets_bootstrap/js/bootstrap.bundle.min.js"></script>

</html>