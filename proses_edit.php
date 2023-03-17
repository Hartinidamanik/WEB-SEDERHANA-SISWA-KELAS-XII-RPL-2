<?php 
session_start();
if(!isset($_SESSION['iduser'])) {
  header("Location: login.php");
  exit();
}

include "koneksi.php";

$params = [
    "id"        => $_POST['id'],
    "nis"       => $_POST['nis'],
    "nama"      => $_POST['nama'],
    "jk"        => $_POST['jk'],
    "nohp"      => $_POST['nohp'],
    "alamat"    => $_POST['alamat']
];

$sql = "UPDATE siswa SET
            nis = :nis,
            nama = :nama,
            jk = :jk,
            nohp = :nohp,
            alamat = :alamat
        WHERE id = :id";
$query = $con->prepare($sql);

if($query->execute($params)) {
    echo "<script>alert('Data berhasil diedit'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Data gagal diedit');</script>";
}
