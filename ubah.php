<?php 
/*
 	NOTE =
 	->method="post" = Tidak ingin mencantumkan di URLnya
*/

// Jangan lupa untuk menghubungkan ke functions.php
require 'functions.php';


// Ambil data di URL
$id = $_GET["id"];
// Query data_samsung berdasarkan id
$dss = query("SELECT * FROM data_samsung WHERE id = $id")[0];




// ->Cek apakah tombol submit sudah pernah ditekan atau belum ?
if( isset($_POST["submit"]) ){ // Data yang akan diinputkan akan dikirimkan ke database
	

	// Cara cek apakah data berhasil  diubah
	// Menggunakan java script
	if ( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil diubah !');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
			alert('Data Gagal  diubah ! Mohon di inputkan kembali !');
			document.location.href = 'index.php' ;
			</script>
		";
	}
}



 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Eit Data Samsung</title>
</head>
<body>
	<h1>Edit Data Samsung</h1>

	<form action="" method="post">
		<input type="hidden" name="id" value="<?= $dss["id"]; ?>">
		<ul>
			<li>
				<label for="kode_hp"> Kode Hp : </label>
				<input type="text" name="kode_hp" id="kode_hp" required value="<?= $dss["kode_hp"]; ?>">
			</li>
			<li>
				<label for="tgl_masuk"> Tanggal Masuk : </label>
				<input type="text" name="tgl_masuk" id="tgl_masuk" required value="<?= $dss["tgl_masuk"]; ?>"> 
			</li>
			<li>
				<label for="nama_hp"> Nama Hp : </label>
				<input type="text" name="nama_hp" id="nama_hp"required value="<?= $dss["nama_hp"]; ?>">
			</li>
			<li>
				<label for="gambar"> Gambar : </label>
				<input type="text" name="gambar" id="gambar" required value="<?= $dss["gambar"]; ?>">
			</li>
			<li>
				<label for="harga_hp"> Harga Hp : </label>
				<input type="text" name="harga_hp" id="harga_hp" required value="<?= $dss["harga_hp"]; ?>">
			</li>
			<li>
				<button type="submit" name="submit">Edit Data !</button>
			</li>
		</ul>
		
	</form>

</body>
</html>