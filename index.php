<?php 
require 'functions.php'; //Memanggil file functions.php. bisa juga menggunakan inclued

$samsunggalaxy = query("SELECT * FROM data_samsung");
// ASC Cara mengurutkan terkecil sampai terbesar
// DESC cara mengurutkan terbesar sampai terkecil

// Tombol cari ditekan
if (isset ($_POST["cari"]) ){
	$samsunggalaxy = cari($_POST["keyword"]);
}

//Bila ingin menampikan dalam bentuk satuan menggunakan WHERE tgl_masuk = 'SS20-19-Q1'

//query data data_samsung disimpan ke dalam variabel samsunggalaxy(berbentuk array)

/*
Ambil Data dari tabel data_samsung

->(mysqli_query()) memiliki parameter dua. Yaitu connect ke Databasenya dan juga Tabel_Databasenya

-> Penggunaan query, akan mengembalikan dua hal.
	Jika BERHASIL, maka query akan dilakukan, seperti menambah tatap menambah, menghapus tetap menghapus, dan mengembalikan nilai TRUE

	Jika GAGAL, maka fungsi mysqli_query tidak akan berjalan querynya atau akan mengembalikan nilai FALSE
*/


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Samsung Galaxy</h1>

<a href="tambah.php">Tambah Data Samsung Galaxy</a>
<br><br>

<form action="" method="post">

	<input type="text" name="keyword" name="mencari" size="40" autofocus placeholder="Mauskkan keyword pencarian anda.. " autocomplete="Off">
	<button type="submit" name="cari"> Search</button>

</form>
<br>
<table border="1" cellpadding="10" cellspacing="0">

	<tr>
		 <th>No.</th>
		 <th>Aksi</th>
		 <th>Kode Hp</th>
		 <th>Tgl Masuk</th>
		 <th>Nama Hp</th>
		 <th>Gambar</th>
		 <th>Harga_hp</th>
	</tr>

	<?php $i = 1; ?>
	<?php foreach( $samsunggalaxy as $row ) : ?>
	<tr>
		<td><?= $i; ?></td>
		<td>
			<a href="ubah.php?id=<?= $row["id"];?>">Edit</a> |
			<a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm('Apakah anda YAKIN untuk menghapus data tersebut?');">Hapus</a>
		</td>
		<td><?= $row["kode_hp"]; ?></td>
		<td><?= $row["tgl_masuk"]; ?></td>
		<td><?= $row["nama_hp"]; ?></td>
		<td><img src="img/<?= $row["gambar"] ;?>" width="120"></td>
		<td><?= $row["harga_hp"]; ?></td>
	</tr>
	<?php $i++; ?>
	<?php endforeach; ?>

</table>

</body>
</html>