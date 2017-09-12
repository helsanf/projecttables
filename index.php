<html>
<?php
include "koneksi.php";

$query ="SELECT * FROM siswa";
$r = mysqli_query($conn,$query)
or die("Error: ".mysqli_error($conn));
 ?>
<head>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">
	<script type="text/javascript" language="javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
	<title>Aplikasi CRUD Plus Upload Gambar dengan PHP</title>
</head>
<body>
	<div class="container">
	<h1>Data Siswa</h1>
	<a href="form_simpan.php">Tambah Data</a><br><br>
	<table id="data_table" class="table table-striped table-bordered" >
		<thead>
				<tr>
					<th>Foto</th>
					<th>NIS</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Telepon</th>
					<th>Alamat</th>
					<th>Aksi</th>
					<th>delete</th>
				</tr>
		</thead>
	
	<?php
	// Load file koneksi.php

	/*$perPage = 5; // perhalaman ada berapa Isi
	$page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1; // sama dengan fungsi if
	$start = ($page >1) ? ($page * $perPage) - $perPage : 0;

	$articles ="SELECT * FROM siswa LIMIT $start, $perPage";
	$result2 = mysqli_query($connect,$articles);

	$all = "SELECT * FROM siswa";
	$result = mysqli_query($connect,$all);
	$total = mysqli_num_rows($result);

	$pages = ceil($total/$perPage);
*/

	//$query = "SELECT * FROM siswa"; // Query untuk menampilkan semua data siswa
	//$sql = mysqli_query($connect, $query); // Eksekusi/Jalankan query dari variabel $query

	while ($data = mysqli_fetch_array($r)) { // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td><img src='images/".$data['foto']."' width='50' height='50'></td>";
		echo "<td>".$data['nis']."</td>";
		echo "<td>".$data['nama']."</td>";
		echo "<td>".$data['jenis_kelamin']."</td>";
		echo "<td>".$data['telp']."</td>";
		echo "<td>".$data['alamat']."</td>";
		echo "<td><a href='form_ubah.php?nis=".$data['nis']."'>Ubah</a></td>";
		echo "<td><a href='proses_hapus.php?nis=".$data['nis']."'>Hapus</a></td>";
		echo "</tr>";
	}

	?>

	</table>
	<?php /*<div class="" align="center">?>
	  <?php for($i=1; $i<=$pages; $i++){ ?>
	    <ul class="pagination pagination-lg">
   			<li><a href="?halaman=<?php echo $i?>"> <?php echo $i?></a></li>
			</ul>
	    <?php } */ ?>
	  </div>
</div>

</body>
<script>
$(document).ready(function(){
    $('#data_table').DataTable();
});
</script>
</html>
