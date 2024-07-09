<?php

include '../koneksi/koneksi.php';
$db = new database();
$aksi = $_GET['aksi'];

if ($aksi == 'pesan'){
    $id = implode(",",$_POST['id_barang']);
    $nama = implode(",",$_POST['nama_barang']);
    $jum = implode(",",$_POST['jumlah']);
    $db->customer_pesen($_POST['tgl_pemesanan'],$id,$nama,$jum
    ,$_POST['total'],$_POST['kode'],$_POST['nama_cus']);
    header("location:../customer.php?aksi=hapus");
}

?>
