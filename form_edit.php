<?php
session_start();
if(!isset($_SESSION['iduser'])) {
  header("Location: login.php");
  exit();
}

include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Siswa | Web Siswa Kelas XII RPL 2</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="judul">    
    <h2>Web Siswa Kelas XII RPL 2</h2>
    <h3>SMK Negeri 3 Pematangsiantar</h3>
  </div>

  <br />
  <a href="index.php">
    <button>< Lihat Semua Data Siswa</button>
  </a>
  
  <h3>Edit Siswa</h3>
  <form action="proses_edit.php" method="post">
    <?php
    $id = $_GET['id'];

    $query = $con->prepare("SELECT * FROM siswa WHERE id = :id");
    $query->bindValue(':id', $id);
    $query->execute();
    $data = $query->fetch();

    // Check if the data exists
    if (!$data) {
      echo "<h4>Data tidak ditemukan.</h4>";
      exit;
    }
    ?>    
    <table>
      <tr>
        <td>Nis</td>
        <td>
          <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
          <input type="text" name="nis" value="<?php echo $data['nis'] ?>" required>
        </td>          
      </tr>  
      <tr>
        <td>Nama</td>
        <td><input type="text" name="nama" value="<?php echo $data['nama'] ?>" required></td>          
      </tr>  
      <tr>
        <td>Jenis Kelamin</td>
        <td><input type="text" name="jk" value="<?php echo $data['jk'] ?>" required></td>          
      </tr>  
      <tr>
        <td>No HP</td>
        <td><input type="text" name="nohp" value="<?php echo $data['nohp'] ?>" required></td>          
      </tr>
      <tr>
        <td>Alamat</td>
        <td><input type="text" name="alamat" value="<?php echo $data['alamat'] ?>" required></td>          
      </tr>    
      <tr>
        <td></td>
        <td><button type="submit">Simpan</button></td>        
      </tr>        
    </table>
  </form>
</body>
</html>
