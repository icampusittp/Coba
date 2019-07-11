<?php
$conn = mysqli_connect("localhost", "root", "", "samsung");
																				//Buat koneksi dulu ke database



?>
<body>
<h1>History HP
  <input type='button'value='Back to Home'onClick='top.location="index.php"'> 	<!-- TOMBOL BACK-->
</h1>
	<?php for($tahun = 2019; $tahun>=2014; $tahun-- ) { 						//Pengulangan selama 5tahun
	echo "<h3 style='color:green;'>$tahun</h3>";?>
	<br>
	
	
	<b>Desember ~ July</b>
	<table border="1" cellpadding="10" cellspacing="0">							<!-- Tabel bulan 12~7 -->
		<tbody>
			<tr>
				<th>No.</th>
				<th>Kode Hp</th>
				<th>Tgl Masuk</th>
				<th width="200px">Nama Hp</th>
				<th>Gambar</th>
				<th width="120px">Harga_hp</th>
			</tr>
<?php $a = 1;?>
<?php
$akhir="$tahun-12-30";															// Menampilkan isi tabel bulan 12~7
$awal="$tahun-07-01";
$sql = "SELECT * FROM data_samsung WHERE tgl_masuk BETWEEN '$awal' AND '$akhir' ORDER BY tgl_masuk DESC";
$query = mysqli_query($conn, $sql);			
while ($row = mysqli_fetch_array($query))
{
	?><tr>	
			<td><?php echo $a; ?></td>
			<td><?php echo $row["kode_hp"]; ?></td>
			<td><?php echo $row["tgl_masuk"]; ?></td>
			<td><?php echo $row["nama_hp"]; ?></td>
			<td><img src="img/<?php echo $row["gambar"]?>" width="120"></td>
			<td><?php echo $row["harga_hp"]; ?></td>
		</tr>
	<?php $a++;}?>
	</tbody>
	</table>
	
	
	<b>Juny ~ January</b>														<!-- Tabel bulan 7~1 -->
<table border="1" cellpadding="10" cellspacing="0">
			<tbody>
				<tr>
				<th>No.</th>
				<th>Kode Hp</th>
				<th>Tgl Masuk</th>
				<th width="200px">Nama Hp</th>
				<th>Gambar</th>
				<th width="120px">Harga_hp</th>
			</tr>
<?php $a = 1;?>
<?php
$akhir="$tahun-07-01";															// Menampilkan isi tabel bulan 7~1
$awal="$tahun-01-01";
$sql = "SELECT * FROM data_samsung WHERE tgl_masuk BETWEEN '$awal' AND '$akhir' ORDER BY tgl_masuk DESC";
$query = mysqli_query($conn, $sql);			
while ($row = mysqli_fetch_array($query))
{
	?><tr>	
			<td><?php echo $a; ?></td>
			<td><?php echo $row["kode_hp"]; ?></td>
			<td><?php echo $row["tgl_masuk"]; ?></td>
			<td><?php echo $row["nama_hp"]; ?></td>
			<td><img src="img/<?php echo $row["gambar"]?>" width="120"></td>
			<td><?php echo $row["harga_hp"]; ?></td>
		</tr>
	<?php $a++;}?>
</table>
<hr/>
<br>
</body>
<?php } ?>