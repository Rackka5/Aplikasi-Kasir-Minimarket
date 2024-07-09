<?php

include '../../koneksi/koneksi.php';
$db = new database; 



$aksi = $_GET['aksi'];
if($aksi == "hapus"){
    $db->hapus_barang($_GET['id_barang']);
header("location:../data_barang.php");

}elseif  ($aksi == 'tambah'){

$rand = rand();
$ekstensi = array('png','jpg','jpeg','gif');
$filename = $_FILES['gambar']['name'];
$ukuran = $_FILES['gambar']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

    if(!in_array($ext,$ekstensi) ) {
        header("location:../data_barang.php");
    }else{
        if($ukuran < 1044070){
    $gambar = $rand.'_'.$filename;
    move_uploaded_file($_FILES['gambar']['tmp_name'], '../../kasir/gambar/'.$rand.'_'.$filename);
    $db->tambah_barang($_POST['tgl_masuk'],$_POST['nama_barang'],$_POST['kode_barang'],
    $_POST['harga'],$_POST['stok'], $gambar,$_POST['supplier']);
    header("location:../data_barang.php");
}else{
    header("location:../data_barang.php");
}
}  


}elseif ($aksi == 'edit'){
    $db->edit_barang($_POST['id_barang'],$_POST['nama_barang'],$_POST['kode_barang'],$_POST['harga'],$_POST['stok']);
    header("location:../data_barang.php");

}elseif  ($aksi == 'stok'){
        $db->tambah_stok($_POST['harga'],$_POST['nama_barang'],$_POST['id_barang'],$_POST['tgl_masuk'],$_POST['jumlah'],$_POST['supplier']);
        header("location:../data_barang.php");
}
?>  