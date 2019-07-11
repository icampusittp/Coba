<?php
/*
	NOTE CARA MENGATASI HACK ;
	-> required = Data yang telah di tenetukan oleh required tidak boleh kosong
	->htmlspecialchars = Mengantisipasi scrip hack menggunakan bahasa css

form action="" -> Untuk menentukan kemana data yang akan dikirimkan di dalam form

->Cek apakah tombol submit sudah pernah ditekan atau belum ?
*/

//Jangan lupa untuk menghubungkan ke functions.php
require 'functions.php';

// ->Cek apakah tombol submit sudah pernah ditekan atau belum ?
if( isset($_POST["submit"]) ){ // Data yang akan diinputkan akan dikirimkan ke database

	// Cara cek apakah data berhasil di tambahkan atau tidak
	// Menggunakan java script
	if ( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('Data berhasil ditambahkan !');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "
			<script>
			alert('Data Gagal  di tambahkan ! Mohon di inputkan kembali !');
			document.location.href = 'index.php' ;
			</script>
		";
	}
}



 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Samsung</title>
</head>
<body>
	<h1>Tambah Data Samsung</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="kode_hp"> Kode Hp : </label>
				<input type="text" name="kode_hp" id="kode_hp" required>
			</li>
			<li>
				<label for="tgl_masuk"> Tanggal Masuk : </label>
				<input type="text" name="tgl_masuk" id="tgl_masuk" required>
			</li>
			<li>
				<label for="nama_hp"> Nama Hp : </label>
				<input type="text" name="nama_hp" id="nama_hp"required>
			</li>
			<li>
				<label for="gambar"> Gambar : </label>
				<input type="file" name="gambar" id="gambar" required>
			</li>
			<li>
				<label for="harga_hp"> Harga Hp : </label>
				<input type="text" name="harga_hp" id="harga_hp" required>
			</li>
			<li>
				<button type="submit" name="submit">Tambah Data !</button>
			</li>
		</ul>
		


	</form>



</body>
</html>