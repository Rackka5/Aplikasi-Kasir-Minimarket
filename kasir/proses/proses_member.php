<?php

include '../../koneksi/koneksi.php';
$db = new database; 

$aksi = $_GET['aksi'];
if($aksi == 'tambah'){
    $db->tambah_member($_POST['nama'],$_POST['alamat'],$_POST['no_tlp'],$_POST['email']);
    header("location:../data_member.php");
}elseif ($aksi == 'hapus'){
    $db->hapus_member($_GET['id_member']);
    header("location:../data_member.php");
}elseif ($aksi == 'edit'){
    
}
?>