<?php 
// Koneksikan ke database
$db = mysqli_connect("localhost", "root", "", "samsung");

function query($query){
	global $db;
	$result = mysqli_query($db, $query); //Lemarinya
	$rows = []; //kotak kosong
	while( $row = mysqli_fetch_assoc($result))
	//Ambil baju kemudian dipindahkan kekotak kosong atau menggunakan program pengulangan (Looping)
	{
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data) {
	global $db;

	// Ambil data dari tiap elemen dalam form
	$kode_hp = htmlspecialchars($data["kode_hp"]);
	$tgl_masuk = htmlspecialchars($data["tgl_masuk"]);
	$nama_hp = htmlspecialchars($data["nama_hp"]);
	$harga_hp = htmlspecialchars($data["harga_hp"]);

	// Upload Gambar
	$gambar = upload();
	if( !$gambar ){
		return false;
	}

	// Query insert data
	$query = "INSERT INTO data_samsung
				VALUES
				('','$kode_hp','$tgl_masuk', '$nama_hp', '$gambar', '$harga_hp')
				";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}



function upload(){	
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// Cek apakah tidak ada Gambar yang di upload
	if ( $error === 4 ) {
		echo "<script>
				alert('Pilih gambarnya terlebih dahulu');
				</script>";
			return false;
	}

	// Cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));
	if (  !in_array($ekstensiGambar, $ekstensiGambarValid) ){
		echo "<script>
				alert('Mohon untuk mengulangi kembali pada file upload gambar ! Terimakasih...');
				</script>";
			return false;
	}

	// Cara cek jika ukurannya terlalu besar
	if( $ukuranFile > 1000000 ){
		echo "<script>
				alert('Ukuran file terlalu besar. Mohon ulangi kembali ! Terimakasih...');
				</script>";
			return false;
	}

	// Lolos pengecekan, gambar siap diupload 
	// Membuat nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .='.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file( $tmpName, 'img/'. $namaFileBaru);

	return $namaFileBaru;

}


function hapus($id){
	global $db;
	mysqli_query($db, "DELETE FROM data_samsung WHERE id = $id");

	return mysqli_affected_rows($db);
}


function ubah($data){
	global $db;

	$id = $data["id"];
	// Ambil data dari tiap elemen dalam form
	$kode_hp = htmlspecialchars($data["kode_hp"]);
	$tgl_masuk = htmlspecialchars($data["tgl_masuk"]);
	$nama_hp = htmlspecialchars($data["nama_hp"]);
	$gambar = htmlspecialchars($data["gambar"]);
	$harga_hp = htmlspecialchars($data["harga_hp"]);

	// Query insert data
	$query = "UPDATE data_samsung SET
		kode_hp = '$kode_hp',
		tgl_masuk ='$tgl_masuk',
		nama_hp = '$nama_hp',
		gambar = '$gambar',
		harga_hp = '$harga_hp'
		WHERE id = $id	
		";
	mysqli_query($db, $query);

	return mysqli_affected_rows($db);
}

function filter ($keyword,$merek){
	if(preg_match("/murah/i", $keyword)) {
			$query = "SELECT * FROM data_samsung WHERE nama_hp LIKE '%$merek%' ORDER BY harga_hp ASC";//Fungsi termurah ( apabila ada kata "murah")
			return query($query);
		}
		else if(preg_match("/mahal/i", $keyword)) {
			$query = "SELECT * FROM data_samsung WHERE nama_hp LIKE '%$merek%' ORDER BY harga_hp DESC";//Fungsi termahal( apabila ada kata "mahal")
			return query($query);	
		}
		else if(preg_match("/baru/i", $keyword)) {
			$query = "SELECT * FROM data_samsung WHERE nama_hp LIKE '%$merek%' ORDER BY tgl_masuk DESC";//Fungsi termbaru ( apabila ada kata "baru")
			return query($query);	
		}else if(preg_match("/lama/i", $keyword)) {
			$query = "SELECT * FROM data_samsung WHERE nama_hp LIKE '%$merek%' ORDER BY tgl_masuk ASC";//Fungsi Terlama (apabila ada kata "lama")
			return query($query);
		}else{//Bila  Bila tidak terdapat merek spesifik maka langsung query dibawah ini"
		$query = "SELECT * FROM data_samsung WHERE 
				kode_hp LIKE '%$keyword%' OR
				tgl_masuk LIKE '%$keyword%' OR
				nama_hp LIKE '%$keyword%' OR
				harga_hp LIKE '%$keyword%'
		";
		return query($query);
	}
}
	
function cari($input){ //Filter besarakan merek
	
	if(preg_match("/xi/i", $input)) { //Bila terdapan kata "Xi maka menjalankan fungsi filter(xiaomi)"
		$merk = "xiaomi";
  		return filter($input,$merk);
	}elseif(preg_match("/sams/i", $input)){ //Bila terdapan kata "sams maka menjalankan fungsi filter(samsung)"
		$merk = "samsung";
  		return filter($input,$merk);
	}elseif(preg_match("/nokia/i", $input)){
		$merk = "nokia";
  		return filter($input,$merk);
	}elseif(preg_match("/sejarah/i", $input)){
		 header ("location:history.php");
	}elseif(preg_match("/history/i", $input)){
		 header ("location:history.php");
	}elseif(preg_match("/hp/i", $input)){
		 $merk = " ";
		 return filter($input,$merk);
	}else{
		echo "<h2 style='color:red; text-align:center;'>Masukan Keyword Yang Benar!</h2>";
		echo "<h5 style='color:grey; text-align:center;'>Mungkin yang anda maksud Xiaomi, Nokia, Samsung?</h5>";
		$query = "SELECT * FROM data_samsung";
		return query($query);
	}

}



?>	