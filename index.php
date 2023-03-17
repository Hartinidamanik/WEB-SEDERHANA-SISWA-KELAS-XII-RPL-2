<?php
session_start();
if(!isset($_SESSION['iduser'])) {
	echo "<script>window.location='login.php';</script>";
}

include "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Siswa | Web Siswa Kelas XII RPL 2</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href='https://yukcoding.blogspot.com/favicon.ico' rel='icon' type='image/x-icon'/>
</head>
<body>
	<div class="judul">		
		<h2>Web Siswa Kelas XII RPL 2</h2>
		<h3>SMK Negeri 3 Pematangsiantar</h3>
	</div>

	<br />
	<div align="right">
		(Selamat datang di website kelas XII RPL 2, <?=$_SESSION['username']?>) |   
		<a href="logout.php">
			<span style="color:#ff3333">Logout</span>
		</a>
	</div>
	<div align="left">
		<a href="form_tambah.php">
			<button>+ Tambah Data Siswa</button>
		</a>
	</div>

	<h3>Data Siswa</h3>
	<div style="overflow: auto;">
		<table border="1" class="table">
			<tr>
				<th>No.</th>
				<th>Nis</th>
				<th>Nama</th>
				<th>Jenis Kelamin</th>
				<th>No HP</th>
				<th>Alamat</th>
				<th>Opsi</th>		
			</tr>
			<?php 
			$query = $con->query("SELECT * FROM siswa"); // tampil menggunakan method query
			$nomor = 1;
			while($data = $query->fetch(PDO::FETCH_ASSOC)) { ?>
				<tr>
					<td align="center"><?php echo $nomor++; ?>.</td>
					<td><?php echo $data['nis']; ?></td>
					<td><?php echo $data['nama']; ?></td>
					<td><?php echo $data['jk']; ?></td>
					<td><?php echo $data['nohp']; ?></td>
					<td><?php echo $data['alamat']; ?></td>
										<td width="90px" align="center">
						<a href="form_edit.php?id=<?php echo $data['id']; ?>"><button>Edit</button></a> 
						<a href="proses_hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin hapus data siswa?')"><button>Hapus</button></a>					
					</td>
				</tr>
			<?php
			} ?>
		</table>
	</div>
</body>
</html>
