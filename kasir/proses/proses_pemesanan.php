<?php

error_reporting(0);

include '../../koneksi/koneksi.php';
$db = new database; 

$aksi = $_GET['aksi'];

if ($aksi == 'pesan'){

   
    
    $bayar = $_POST['bayar'];
    $potongan = $_POST['diskon'];
    $subtotal = $_POST['total'];
    $total = $subtotal - $potongan;
    $kembalian =  $bayar -  $total ;
    // var_dump($_POST['id_barang']);
    $id = implode(",",$_POST['id_barang']);
    $nama = implode(",",$_POST['nama_barang']);
    $jum = implode(",",$_POST['jumlah']);

    if($bayar < $total){
        header("location:../kasir.php?pesan=minus");

    }else{
    $db->pemesanan($_POST['tgl_pemesanan'],$id,$nama,$jum,
    $_POST['total'],$_POST['bayar'],$kembalian,$_POST['id_member'],$potongan);
    header("location:../kasir.php?aksi=hapus");
    };


//     $id1 = $_POST['id_barang'];
//     $jumlah = $_POST['jumlah'];
//     $gabung = array_combine($id1,$jumlah);
    
//     $data=mysqli_query($db->koneksi,"SELECT * FROM tbl_barang");
// // membuat query dan menyimpanya di dalam variabel data
//     while($data1=mysqli_fetch_assoc($data)){
//     /// merubah $data menjadi array assosiatif dengan mysqli_fetch_assoc($data)
//     $hasil[]=$data1;
//     // selanjutnya akan kita simpan di array hasil
//     }foreach ($gabung as $key => $value){
//     foreach($hasil as $d){
//         if($d['id_barang'] == $key){
//             // selanjutanya kita buat if untuk mencocokan $d['id_barang'] yang ada di db 
//             // dengan $key yang kita dapat dari $c
//             $id=$d['id_barang'];
//             // kita tampung $d['id_barang'] ke dalam $id
//             // karena SQL tidak bisa menerima bentuk $d['id_barang'] untuk memproses
//             $kurang= $d['stok'] - $value;
//             // membuat perhitungan nya $value adalah value dari variabel array $C perhatikan di line 19
           
//             // cek apakah sesuai dengan pengurannya (opsional)
//             mysqli_query($koneksi,"UPDATE tbl_barang SET stok ='$kurang' WHERE id_barang='$id'");
//         }
//     }
// }

}else if ($aksi == 'pesan_online'){
    
    $id = implode(",",$_POST['id_barang']);
    $jum = implode(",",$_POST['jumlah']);

    $bayar = $_POST['bayar'];
    $total = $_POST['total'];
    $kembalian =  $bayar -  $total ;

    if($bayar < $total){
        header("location:../kasir1.php?pesan=minus");
        
    }else{
    $db->pemesanan_online($id,$jum,$_POST['id_pemesanan'],$_POST['id_member'],$total,$bayar,$kembalian);
    header("location:../kasir1.php?aksi=hapus");
    };
}

?>