<?php
class database{

    var $host = "localhost";
    var $username = "root";
    var $password = "";
    var $database = "db_kasir2";
    var $koneksi="";

    function __construct(){
                $this->koneksi = mysqli_connect($this->host,$this->username,$this->password,$this->database);
    
    }

    function tampil_kasir(){
            $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_user WHERE jabatan = 'petugas' ORDER BY id_user DESC");
            while($d = mysqli_fetch_array($data)){
                $hasil[] = $d;
            }
            return $hasil;
    }

    function hapus_kasir($id_user){
        mysqli_query($this->koneksi,"DELETE FROM tbl_user WHERE id_user = '$id_user'");
    }

    function tambah_kasir($nama,$username,$password,$jabatan){
        mysqli_query($this->koneksi,"INSERT INTO tbl_user
        Values('','$nama','$username','$password','$jabatan')");

    }

    function tampil_edit_kasir($id_user){
            $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_user WHERE id_user = '$id_user'");
            while($d = mysqli_fetch_array($data)){
                $hasil[] = $d;
            }
            return $hasil;
    }

    function edit_kasir($id_user,$nama,$username,$password,$jabatan){
        mysqli_query($this->koneksi,"UPDATE tbl_user SET nama='$nama', username='$username' 
        , password = '$password', jabatan = '$jabatan' WHERE id_user = '$id_user'");
    }

    function cari($keyword){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_barang WHERE kode_barang = '$keyword'");
            while($d = mysqli_fetch_array($data)){
                $hasil[] = $d;
            }
            return $hasil;
    }

    function tampil_member(){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_member ORDER BY id_member DESC");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
}

    function tambah_member($nama,$alamat,$no_tlp,$email){
        mysqli_query($this->koneksi,"INSERT INTO tbl_member
        Values('','$nama','$alamat','$no_tlp','$email','0')");
    }

    function hapus_member($id_member){
        mysqli_query($this->koneksi,"DELETE FROM tbl_member WHERE id_member = '$id_member'");
    }

    function tampil_edit_member($id_member){

    }

    function edit_member($id_member){
        
    }

    public function tampil_barang(){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_barang ORDER BY id_barang DESC");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }
    
    function tampil_barang_pagination($page, $jumlah){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_barang ORDER BY id_barang DESC LIMIT $page , $jumlah  ");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tampil_barang_cus_pagination($page,$jumlah){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_barang LIMIT $page , $jumlah ");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tampil_barang_cus(){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_barang");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function tambah_barang($tgl_masuk,$nama_barang,$kode_barang,$harga,$stok,$gambar,$supplier){
        mysqli_query($this->koneksi,"INSERT INTO tbl_barang
        Values('','$nama_barang','$harga','$stok','$kode_barang','$tgl_masuk','$gambar','$supplier')");

        mysqli_query($this->koneksi,"INSERT INTO tbl_barang_masuk
        Values('','0','$stok','$tgl_masuk','$nama_barang','$supplier')");

        
    }function tampil_brng($id_barang){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_barang WHERE id_barang = '$id_barang'");
            while($d = mysqli_fetch_array($data)){
                $hasil[] = $d;
            }
            return $hasil;
    

    }function tambah_stok($harga,$nama_barang,$id_barang,$tgl_masuk,$jumlah,$supplier){
        mysqli_query($this->koneksi,"INSERT INTO tbl_barang_masuk
        Values('','$id_barang','$jumlah','$tgl_masuk','$nama_barang','$supplier')");

mysqli_query($this->koneksi,"UPDATE tbl_barang SET harga = '$harga' WHERE id_barang = '$id_barang'");

    }function tampil_barang_masuk(){
        $data = mysqli_query($this->koneksi,"SELECT 
        tbl_barang_masuk.supplier,
        tbl_barang.nama_barang,
        tbl_barang.kode_barang,
        tbl_barang_masuk.tgl_masuk,
        tbl_barang_masuk.jumlah
        FROM tbl_barang_masuk INNER JOIN tbl_barang ON
                tbl_barang_masuk.nama_barang = tbl_barang.nama_barang ORDER BY id_barang_msk DESC");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    
    }function tampil_barang_masuk_pagination($page,$jumlah){
        $data = mysqli_query($this->koneksi,"SELECT 
        tbl_barang_masuk.supplier,
        tbl_barang.nama_barang,
        tbl_barang.kode_barang,
        tbl_barang_masuk.tgl_masuk,
        tbl_barang_masuk.jumlah
        FROM tbl_barang_masuk INNER JOIN tbl_barang ON
                tbl_barang_masuk.nama_barang = tbl_barang.nama_barang ORDER BY id_barang_msk DESC LIMIT $page, $jumlah");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    
    }function hapus_barang($id_barang){
        mysqli_query($this->koneksi,"DELETE FROM tbl_barang WHERE id_barang = '$id_barang'");
    
    }function edit_barang($id_barang,$nama_barang,$kode_barang,$harga){
        mysqli_query($this->koneksi,"UPDATE tbl_barang SET nama_barang='$nama_barang', kode_barang='$kode_barang' 
        ,harga = '$harga' WHERE id_barang = '$id_barang'");
   
    }function cari_barang($keyword){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_barang 
        WHERE kode_barang LIKE '%$keyword%' OR 
              nama_barang LIKE '%$keyword%'");
            while($d = mysqli_fetch_array($data)){
                $hasil[] = $d;
            }
            return $hasil;

        }function cari_barang_cus($keyword){
            $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_barang 
            WHERE nama_barang LIKE '%$keyword%'");
                while($d = mysqli_fetch_array($data)){
                    $hasil[] = $d;
                }
                return $hasil;
        
    
   
    // }function pemesanan($tgl_pemesanan,$id,$nama,$jum,$total,$bayar,$kembalian){
    //     mysqli_query($this->koneksi,"INSERT INTO tbl_pemesanan
    //     VALUES('','0','$tgl_pemesanan','$nama','$id','$jum','$total','$bayar','$kembalian',1,'0')");

    //  }function pemesanan($tgl_pemesanan,$id,$nama,$jum,$total,$bayar,$kembalian){
    //     if($total >= '10000' && $total >= '30000' ){
    //     mysqli_query($this->koneksi,"INSERT INTO tbl_pemesanan
    //     VALUES('','0','$tgl_pemesanan','$nama','$id','$jum','$total','$bayar','$kembalian',1,'0',100)");
    //     }

    }function pemesanan($tgl_pemesanan,$id,$nama,$jum,$total,$bayar,$kembalian,$id_member,$diskon){
        
        
        if($id_member == 0){
        mysqli_query($this->koneksi,"INSERT INTO tbl_pemesanan
        VALUES('','0','$tgl_pemesanan','$nama','$id','$jum','$total','$bayar','$kembalian',1,'0',0,'','0')");

        $data = $this->tampil_barang();
        //menampilkan seluruh tbl_barang dari function tampil_barang
        $id_barang = explode(",",$id);
        //membuat  array dengan cara meng explode $id 
        $jumlah = explode(",",$jum);
        //membuat array dengan cara meng explode $jum
        $gabung = array_combine($id_barang,$jumlah);
        //selanjutnya kita kombinasikan variabel $id_barang dengan $jumlah bedasarkan NILAI INDEXnya

        foreach ($gabung as $key => $value){
         // membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $gabung 
        foreach ($data as $d){
        // membuat membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $hasil
        // tujuan perulangan yang kedua ini untuk mendapatkan data dari database atau dari array $hasil yang sudah 
        // menjadi array assosiatif
                if ($d['id_barang'] == $key){
        //membuat if untuk mencocokan id_barang dengan $key dari $gabung
                    $id_barang = $d['id_barang'];
        //membuat variabel id_barang untuk menampung id_barang dari tbl_barang
                    $kurang = $d['stok'] - $value;
        //membuat perhitungan di variabel kurang untung mengurangi stok
                
        mysqli_query($this->koneksi,"UPDATE tbl_barang SET stok = '$kurang' WHERE id_barang = '$id_barang'");
        // memberikan perintah untuk update setiap perulangannya       
                }
            }
        }
        
    }else if($id_member > 0 && $total <= '9999'){
        //membuat if jika ada member dan pembeliannya lebih dari 10000 dan kurang sama dengan 30000
        
        mysqli_query($this->koneksi,"INSERT INTO tbl_pemesanan
        VALUES('','$id_member','$tgl_pemesanan','$nama','$id','$jum','$total','$bayar','$kembalian',1,'0',0,'','$diskon')");
        //membuat perintah untuk mengisi ke tbl_pemesanan dengan menambahkan poin = 10

        $data = $this->tampil_barang();
        //menampilkan seluruh tbl_barang dari function tampil_barang
        $id_barang = explode(",",$id);
        //membuat  array dengan cara meng explode $id 
        $jumlah = explode(",",$jum);
        //membuat array dengan cara meng explode $jum
        $gabung = array_combine($id_barang,$jumlah);
        //selanjutnya kita kombinasikan variabel $id_barang dengan $jumlah bedasarkan NILAI INDEXnya

        foreach ($gabung as $key => $value){
         // membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $gabung 
        foreach ($data as $d){
        // membuat membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $hasil
        // tujuan perulangan yang kedua ini untuk mendapatkan data dari database atau dari array $hasil yang sudah 
        // menjadi array assosiatif
                if ($d['id_barang'] == $key){
        //membuat if untuk mencocokan id_barang dengan $key dari $gabung
                    $id_barang = $d['id_barang'];
        //membuat variabel id_barang untuk menampung id_barang dari tbl_barang
                    $kurang = $d['stok'] - $value;
        //membuat perhitungan di variabel kurang untung mengurangi stok
                
        mysqli_query($this->koneksi,"UPDATE tbl_barang SET stok = '$kurang' WHERE id_barang = '$id_barang'");
        // memberikan perintah untuk update setiap perulangannya       
                }
            }
        }

        }else if($id_member > 0 && $total >= '10000' && $total <= '30000' ){
        //membuat if jika ada member dan pembeliannya lebih dari 10000 dan kurang sama dengan 30000
        
        mysqli_query($this->koneksi,"INSERT INTO tbl_pemesanan
        VALUES('','$id_member','$tgl_pemesanan','$nama','$id','$jum','$total','$bayar','$kembalian',1,'0',10,'','$diskon')");
        //membuat perintah untuk mengisi ke tbl_pemesanan dengan menambahkan poin = 10

        $data = $this->tampil_barang();
        //menampilkan seluruh tbl_barang dari function tampil_barang
        $id_barang = explode(",",$id);
        //membuat  array dengan cara meng explode $id 
        $jumlah = explode(",",$jum);
        //membuat array dengan cara meng explode $jum
        $gabung = array_combine($id_barang,$jumlah);
        //selanjutnya kita kombinasikan variabel $id_barang dengan $jumlah bedasarkan NILAI INDEXnya

        foreach ($gabung as $key => $value){
         // membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $gabung 
        foreach ($data as $d){
        // membuat membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $hasil
        // tujuan perulangan yang kedua ini untuk mendapatkan data dari database atau dari array $hasil yang sudah 
        // menjadi array assosiatif
                if ($d['id_barang'] == $key){
        //membuat if untuk mencocokan id_barang dengan $key dari $gabung
                    $id_barang = $d['id_barang'];
        //membuat variabel id_barang untuk menampung id_barang dari tbl_barang
                    $kurang = $d['stok'] - $value;
        //membuat perhitungan di variabel kurang untung mengurangi stok
                
        mysqli_query($this->koneksi,"UPDATE tbl_barang SET stok = '$kurang' WHERE id_barang = '$id_barang'");
        // memberikan perintah untuk update setiap perulangannya       
                }
            }
        }
            
        }else if($id_member > 0 && $total >= '30001' && $total <= '50000' ){
            mysqli_query($this->koneksi,"INSERT INTO tbl_pemesanan
            VALUES('','$id_member','$tgl_pemesanan','$nama','$id','$jum','$total','$bayar','$kembalian',1,'0',30,'','$diskon')");
         
        

        }else if($id_member > 0 && $total >= '50001' && $total <= '100000' ){
            mysqli_query($this->koneksi,"INSERT INTO tbl_pemesanan
            VALUES('','$id_member','$tgl_pemesanan','$nama','$id','$jum','$total','$bayar','$kembalian',1,'0',50,'','$diskon')");
        
        $data = $this->tampil_barang();
        //menampilkan seluruh tbl_barang dari function tampil_barang
        $id_barang = explode(",",$id);
        //membuat  array dengan cara meng explode $id 
        $jumlah = explode(",",$jum);
        //membuat array dengan cara meng explode $jum
        $gabung = array_combine($id_barang,$jumlah);
        //selanjutnya kita kombinasikan variabel $id_barang dengan $jumlah bedasarkan NILAI INDEXnya

        foreach ($gabung as $key => $value){
         // membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $gabung 
        foreach ($data as $d){
        // membuat membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $hasil
        // tujuan perulangan yang kedua ini untuk mendapatkan data dari database atau dari array $hasil yang sudah 
        // menjadi array assosiatif
                if ($d['id_barang'] == $key){
        //membuat if untuk mencocokan id_barang dengan $key dari $gabung
                    $id_barang = $d['id_barang'];
        //membuat variabel id_barang untuk menampung id_barang dari tbl_barang
                    $kurang = $d['stok'] - $value;
        //membuat perhitungan di variabel kurang untung mengurangi stok
                
        mysqli_query($this->koneksi,"UPDATE tbl_barang SET stok = '$kurang' WHERE id_barang = '$id_barang'");
        // memberikan perintah untuk update setiap perulangannya       
                }
            }
        }

        }else if($id_member > 0 && $total >= '100001' ){
            mysqli_query($this->koneksi,"INSERT INTO tbl_pemesanan
            VALUES('','$id_member','$tgl_pemesanan','$nama','$id','$jum','$total','$bayar','$kembalian',1,'0',70,'','$diskon')");
        
        $data = $this->tampil_barang();
        //menampilkan seluruh tbl_barang dari function tampil_barang
        $id_barang = explode(",",$id);
        //membuat  array dengan cara meng explode $id 
        $jumlah = explode(",",$jum);
        //membuat array dengan cara meng explode $jum
        $gabung = array_combine($id_barang,$jumlah);
        //selanjutnya kita kombinasikan variabel $id_barang dengan $jumlah bedasarkan NILAI INDEXnya

        foreach ($gabung as $key => $value){
         // membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $gabung 
        foreach ($data as $d){
        // membuat membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $hasil
        // tujuan perulangan yang kedua ini untuk mendapatkan data dari database atau dari array $hasil yang sudah 
        // menjadi array assosiatif
                if ($d['id_barang'] == $key){
        //membuat if untuk mencocokan id_barang dengan $key dari $gabung
                    $id_barang = $d['id_barang'];
        //membuat variabel id_barang untuk menampung id_barang dari tbl_barang
                    $kurang = $d['stok'] - $value;
        //membuat perhitungan di variabel kurang untung mengurangi stok
                
        mysqli_query($this->koneksi,"UPDATE tbl_barang SET stok = '$kurang' WHERE id_barang = '$id_barang'");
        // memberikan perintah untuk update setiap perulangannya       
                }
            }
        }

        }

    }function tampl_pemesanan(){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_pemesanan");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;   
        
    }function tampil_pemesanan($page,$jumlah){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_pemesanan WHERE status = 'lunas' 
        ORDER BY id_pemesanan DESC LIMIT $page, $jumlah");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;

    }function tampil_pemesanan1($page,$jumlah){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_pemesanan WHERE status = 'lunas' 
        ORDER BY id_pemesanan DESC LIMIT $page, $jumlah");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;   

    }function tampil_barang_psn(){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_pemesanan ");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
        
    }function cari_member($keyword1){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_member WHERE id_member = '$keyword1'");
            while($d = mysqli_fetch_array($data)){
                $hasil[] = $d;
            }
            return $hasil;
    
    }function  tampil_struk($id_pemesanan){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_pemesanan WHERE id_pemesanan = '$id_pemesanan'");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;

    }function cari_kode($keyword){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_pemesanan WHERE kode_bayar = '$keyword' && status='belum'");
            while($d = mysqli_fetch_array($data)){
                $hasil[] = $d;
            }
            return $hasil;

    }function cari_nama($keyword){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_pemesanan WHERE nama LIKE '%$keyword%' && status='belum'");
            while($d = mysqli_fetch_array($data)){
                $hasil[] = $d;
            }
            return $hasil;
    

    }function pemesanan_online($id,$jum,$id_pemesanan,$id_member,$total,$bayar,$kembalian){
        

        if($id_member == 0){
        
            $data = $this->tampil_barang();
            //menampilkan seluruh tbl_barang dari function tampil_barang
            $id_barang = explode(",",$id);
            //membuat  array dengan cara meng explode $id 
            $jumlah = explode(",",$jum);
            //membuat array dengan cara meng explode $jum
            $gabung = array_combine($id_barang,$jumlah);
            //selanjutnya kita kombinasikan variabel $id_barang dengan $jumlah bedasarkan NILAI INDEXnya
    
            foreach ($gabung as $key => $value){
             // membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $gabung 
            foreach ($data as $d){
            // membuat membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $hasil
            // tujuan perulangan yang kedua ini untuk mendapatkan data dari database atau dari array $hasil yang sudah 
            // menjadi array assosiatif
                    if ($d['id_barang'] == $key){
            //membuat if untuk mencocokan id_barang dengan $key dari $gabung
                        $id_barang = $d['id_barang'];
            //membuat variabel id_barang untuk menampung id_barang dari tbl_barang
                        $kurang = $d['stok'] - $value;
            //membuat perhitungan di variabel kurang untung mengurangi stok
                    
            mysqli_query($this->koneksi,"UPDATE tbl_barang SET stok = '$kurang' WHERE id_barang = '$id_barang'");
            // memberikan perintah untuk update setiap perulangannya       
            mysqli_query($this->koneksi,"UPDATE tbl_pemesanan SET  
            bayar = '$bayar', kembalian = '$kembalian', status = 'lunas'  WHERE id_pemesanan = '$id_pemesanan'");
                    }
                }
            }

            
       
        
        }else if($id_member > 0 && $total >= '10000' && $total <= '30000' ){ 
         
        mysqli_query($this->koneksi,"UPDATE tbl_pemesanan SET id_member = '$id_member', 
        bayar = '$bayar', kembalian = '$kembalian', status = 'lunas', poin = '10'  WHERE id_pemesanan = '$id_pemesanan'");    
       
       $data = $this->tampil_barang();
        //menampilkan seluruh tbl_barang dari function tampil_barang
        $id_barang = explode(",",$id);
        //membuat  array dengan cara meng explode $id 
        $jumlah = explode(",",$jum);
        //membuat array dengan cara meng explode $jum
        $gabung = array_combine($id_barang,$jumlah);
        //selanjutnya kita kombinasikan variabel $id_barang dengan $jumlah bedasarkan NILAI INDEXnya

        foreach ($gabung as $key => $value){
         // membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $gabung 
        foreach ($data as $d){
        // membuat membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $hasil
        // tujuan perulangan yang kedua ini untuk mendapatkan data dari database atau dari array $hasil yang sudah 
        // menjadi array assosiatif
                if ($d['id_barang'] == $key){
        //membuat if untuk mencocokan id_barang dengan $key dari $gabung
                    $id_barang = $d['id_barang'];
        //membuat variabel id_barang untuk menampung id_barang dari tbl_barang
                    $kurang = $d['stok'] - $value;
        //membuat perhitungan di variabel kurang untung mengurangi stok
                
        mysqli_query($this->koneksi,"UPDATE tbl_barang SET stok = '$kurang' WHERE id_barang = '$id_barang'");
        // memberikan perintah untuk update setiap perulangannya       
                }
            }
        }

        }else if($id_member > 0 && $total >= '30001' && $total <= '50000' ){
        mysqli_query($this->koneksi,"UPDATE tbl_pemesanan SET id_member = '$id_member', 
        bayar = '$bayar', kembalian = '$kembalian', status = 'lunas', poin = '30'  WHERE id_pemesanan = '$id_pemesanan'");    
            
       
       $data = $this->tampil_barang();
        //menampilkan seluruh tbl_barang dari function tampil_barang
        $id_barang = explode(",",$id);
        //membuat  array dengan cara meng explode $id 
        $jumlah = explode(",",$jum);
        //membuat array dengan cara meng explode $jum
        $gabung = array_combine($id_barang,$jumlah);
        //selanjutnya kita kombinasikan variabel $id_barang dengan $jumlah bedasarkan NILAI INDEXnya

        foreach ($gabung as $key => $value){
         // membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $gabung 
        foreach ($data as $d){
        // membuat membuat perulangan dengan foreach yang perulangannya akan disesuaikan dari data array $hasil
        // tujuan perulangan yang kedua ini untuk mendapatkan data dari database atau dari array $hasil yang sudah 
        // menjadi array assosiatif
                if ($d['id_barang'] == $key){
        //membuat if untuk mencocokan id_barang dengan $key dari $gabung
                    $id_barang = $d['id_barang'];
        //membuat variabel id_barang untuk menampung id_barang dari tbl_barang
                    $kurang = $d['stok'] - $value;
        //membuat perhitungan di variabel kurang untung mengurangi stok
                
        mysqli_query($this->koneksi,"UPDATE tbl_barang SET stok = '$kurang' WHERE id_barang = '$id_barang'");
        // memberikan perintah untuk update setiap perulangannya       
                }
            }
        }

        }else if($id_member > 0 && $total >= '50001' && $total <= '100000' ){
        mysqli_query($this->koneksi,"UPDATE tbl_pemesanan SET id_member = '$id_member', 
        bayar = '$bayar', kembalian = '$kembalian', status = 'lunas', poin = '50'  WHERE id_pemesanan = '$id_pemesanan'");       
        
        

        }else if($id_member > 0 && $total >= '100001' ){
        mysqli_query($this->koneksi,"UPDATE tbl_pemesanan SET id_member = '$id_member', 
        bayar = '$bayar', kembalian = '$kembalian', status = 'lunas', poin = '70'  WHERE id_pemesanan = '$id_pemesanan'");   
        
        }

    }function customer_pesen($tgl,$id,$nama,$jumlah,$total,$kode,$nama_cus){
        mysqli_query($this->koneksi,"INSERT INTO tbl_pemesanan
        VALUES('','0','$tgl','$nama','$id','$jumlah','$total','0','0',2,'$kode',0,'$nama_cus',0)");
    
    }function tampil_riwayat_pesan(){
        $data = mysqli_query($this->koneksi,"SELECT * FROM tbl_pemesanan WHERE status = 'belum' 
        ORDER BY id_pemesanan DESC");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    
    }function pemasukan($tgl_dari,$tgl_sampai,$page,$jumlah){
        $data = mysqli_query($this->koneksi,
        "SELECT * FROM tbl_pemesanan WHERE tanggal BETWEEN '$tgl_dari' AND '$tgl_sampai' 
        ORDER BY tanggal DESC LIMIT $page, $jumlah;");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;

    }function struk_pemasukan($tgl_dari,$tgl_sampai){
        $data = mysqli_query($this->koneksi,
        "SELECT * FROM tbl_pemesanan WHERE tanggal BETWEEN '$tgl_dari' AND '$tgl_sampai' ORDER BY tanggal ASC ;");
        while($d = mysqli_fetch_array($data)){
            $hasil[] = $d;
        }
        return $hasil;
    }

}

?>