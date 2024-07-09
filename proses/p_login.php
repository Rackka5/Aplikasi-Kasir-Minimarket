<?php

session_start();

include '../koneksi/koneksi.php';
$db = new database();
// menangkap username dan password dari post
$username = mysqli_real_escape_string($db->koneksi, $_POST['username']);
$password = mysqli_real_escape_string($db->koneksi,$_POST['password']);
$jabatan = mysqli_real_escape_string($db->koneksi,$_POST['jabatan']);


// memeriksa user di tbl_user
$login = mysqli_query($db->koneksi,"SELECT * from tbl_user where username='$username' and password='$password'
 and jabatan = '$jabatan'");
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_array($login);

    if($data['jabatan']=="admin"){	
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['username'] = $username;
            $_SESSION['jabatan'] = "admin";
            header("location:../admin/admin.php");

    }else if($data['jabatan']=="petugas"){
        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['username'] = $username;
        $_SESSION['jabatan'] = "petugas";
        header("location:../kasir/dashboard.php");

    }else{
	
        header("location:index.php?pesan=gagal");
    }

}else{
    header("location:../index.php?pesan=gagal");
}



?>