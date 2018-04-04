<?php
include "data/koneksi.php";
$tanggal = $_POST['tanggal'];
$nama    = $_POST['nama'];
$kode    = $_POST['kode'];
$a       = $_POST['1'];
$b       = $_POST['2'];
$c       = $_POST['3'];
$d       = $_POST['4'];
$e       = $_POST['5'];
$f       = $_POST['6'];
$g       = $_POST['7'];
$h       = $_POST['8'];
$i       = $_POST['9'];
$j       = $_POST['10'];
$k       = $_POST['11'];
$l       = $_POST['12'];

$jumlah = $a+$b+$c+$d+$e+$f+$g+$h+$i+$j+$k+$l;
if($jumlah != 12) {
$simpan = "INSERT INTO `status_inspeksi` (`no`, `kode`, `status`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `tgl_inspeksi`, `nama`) VALUES (NULL, '$kode', '0', '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k', '$l', '$tanggal', '$nama');";
$proses = mysqli_query($connect, $simpan);
$kondisi = "UPDATE `apar` SET `kondisi` = '0' WHERE `apar`.`kode` = '$kode';";
$jalankan = mysqli_query($connect, $kondisi);
} else {
$simpan = "INSERT INTO `status_inspeksi` (`no`, `kode`, `status`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `h`, `i`, `j`, `k`, `l`, `tgl_inspeksi`, `nama`) VALUES (NULL, '$kode', '1', '$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k', '$l', '$tanggal', '$nama');";
$proses = mysqli_query($connect, $simpan);
$kondisi = "UPDATE `apar` SET `kondisi` = '1' WHERE `apar`.`kode` = '$kode';";
$jalankan = mysqli_query($connect, $kondisi);
}

$update = "UPDATE `inspeksi_apar` SET `tgl_inspeksi` = '$tanggal', `status_inspeksi` = '1' WHERE `inspeksi_apar`.`kode` = '$kode';";
$proses = mysqli_query($connect, $update);
echo "<script>alert('Data Berhasil Disimpan');window.location = 'laporan.php';</script>";
 ?>
