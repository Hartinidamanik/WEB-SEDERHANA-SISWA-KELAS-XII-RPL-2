<?php 
session_start();
if(!isset($_SESSION['iduser'])) {
	echo "<script>window.location='login.php';</script>";
}
include "koneksi.php";

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jk = $_POST['jk'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];

$query = $con->prepare("INSERT INTO siswa (nis, nama, jk, nohp, alamat) 
                        VALUES (:nis, :nama, :jk, :nohp, :alamat)");

$query->bindparam(':nis', $nis); 
$query->bindparam(':nama', $nama);
$query->bindparam(':jk', $jk);
$query->bindparam(':nohp', $nohp);
$query->bindparam(':alamat', $alamat);

if($query->execute()) {
    echo "<script>alert('Data Siswa berhasil ditambahkan'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Data gagal ditambahkan');</script>";
}

