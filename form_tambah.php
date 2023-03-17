<?php
session_start();
if(!isset($_SESSION['iduser'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa | Web Siswa Kelas XII RPL 2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="judul">       
        <h2>Web Siswa Kelas XII RPL 2</h2>
        <h3>SMK Negeri 3 Pematangsiantar</h3>
    </div>

    <br />
    <a href="index.php">
        <button>< Lihat Semua Data</button>
    </a>

    <h3>Input Siswa</h3>
    <form action="proses_tambah.php" method="post">        
        <table>
            <tr>
                <td>Nis</td>
                <td>
                    <input type="text" name="nis" value="" required>
                </td>                   
            </tr>   
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" value="" required></td>                  
            </tr>   
            <tr>
                <td>Jenis Kelamin</td>
                <td><input type="text" name="jk" value="" required></td>                  
            </tr>   
            <tr>
                <td>No HP</td>
                <td><input type="number" name="nohp" value="" required></td>                   
            </tr>
            <tr>
                <td>Alamat</td>
                <td><input type="text" name="alamat" value="" required></td>                  
            </tr>   
                <td></td>
                <td><button type="submit">Simpan</button></td>                    
            </tr>               
        </table>
    </form>
    
</body>
</html>
