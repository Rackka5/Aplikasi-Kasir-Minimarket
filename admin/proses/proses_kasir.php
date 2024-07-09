<?php

include '../../koneksi/koneksi.php';
$db = new database; 

$aksi = $_GET['aksi'];
if($aksi == "hapus"){
    $db->hapus_kasir($_GET['id_user']);
header("location:../data_kasir.php");
}elseif  ($aksi == 'tambah'){
    $db->tambah_kasir($_POST['nama'],$_POST['username'],$_POST['password'],$_POST['jabatan']);
    header("location:../data_kasir.php");
}elseif ($aksi == 'edit'){
    $db->edit_kasir($_POST['id_user'],$_POST['nama'],$_POST['username'],$_POST['password'],$_POST['jabatan']);
    header("location:../data_kasir.php");
}
?>