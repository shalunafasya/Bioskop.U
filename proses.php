<?php
//koneksi
$connect = mysqli_connect('localhost', 'root', '', 'bioskop');
//set variabel
$lat_long = $_POST['latlong'];
$nama_tempat = $_POST['nama_tempat'];
$kategori = $_POST['kategori'];
$keterangan = $_POST['keterangan'];
//input data
$insert = mysqli_query($connect, "insert into lokasi set
latlong='$lat_long', nama_tempat='$nama_tempat', kategori='$kategori',
keterangan='$keterangan' ");
//kembali
header("Location: index.php");
?>
