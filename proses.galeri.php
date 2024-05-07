<?php
include_once "../koneksi.php";

$path = 'gambar/';
$a = $_FILES['fotogbr']['name'];
$jml = count($a);
for($i=0; $i < $jml ; $i++){
    $b = $a[$i];
    $c = $_FILES['fotogbr']['tmp_name'][$i];
    move_uploaded_file($c,$path.$b);
    $sql = $link->query("INSERT INTO foto VALUES ('','$b')");

    if($sql){
        echo"Data gambar berhasil masuk..";
    }else{
        echo"terjadi kesalahan..";
    }
    header('Location:foto.php');
}
?>