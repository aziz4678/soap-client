<?php
error_reporting(1);
include "Client.php";
?>
<!doctype html>
	<!DOCTYPE html>
	<html>
	<head>
		<title></title>
	</head>
	<body>
		<a href="?page=home">Home</a> | <a href="?page=tambah">Tambah Data</a> | <a href="?page=daftar-data">Data Server</a>
		<br/><br/>

		<fieldset>
			<?php if($_GET['page']=='tambah') { ?>
			<legend>Tambah Data</legend>
				<form name="form" method="POST" action="proses.php">
					<input type="hidden" name="aksi" value="tambah"/>
					<label>ID Jurusan</label>
					<input type="text" name="id_jurusan"/>
					<br/>
					<label>Nama Jurusan</label>
					<input type="text" name="nama_jurusan"/>
					<br/>
					<label>Akreditasi</label>
					<input type="text" name="akreditasi"/>
					<br/>
					<label>Fakultas</label>
					<input type="text" name="fakultas"/>
					<br/>
					<button type="submit" name="simpan">Simpan</button>
				</form>
		<?php	} else if ($_GET['page']=='ubah') {
			$r = $abc->tampil_data($_GET['id_jurusan']);
		?>
		<legend>Ubah Data</legend>
			<form name="form" method="POST" action="proses.php">
				<input type="hidden" name="aksi" value="ubah"/>
				<input type="hidden" name="id_jurusan" value="<?=$r['id_jurusan']?>" />
				<label>ID Jurusan</label>
				<input type="text" value="<?=$_GET['id_jurusan']?>">
				<br/>
				<label>Nama Jurusan</label>
				<input type="text" name="nama_jurusan" value="<?=$r['nama_jurusan']?>">
				<br/>
				<label>Akreditasi</label>
				<input type="text" name="akreditasi" value="<?=$r['akreditasi']?>">
				<br/>
				<label>Fakultas</label>
				<input type="text" name="fakultas" value="<?=$r['fakultas']?>">
				<br/>
				<button type="submit" name="ubah">Ubah</button>
			</form>
			
		<?php unset($r);
			} else if ($_GET['page']=='daftar-data') {
		?>
		<legend>Daftar Data Server</legend>
			<table border="1">
				<tr><th width='5%'>No</th>
					<th width='10%'>ID Jurusan</th>
					<th width='65%'>Nama</th>
					<th width='5%'>Akreditasi</th>
					<th width='10%'>Fakultas</th>
					<th width='5%' colspan="2">Aksi</th>
				</tr>
				<?php 	$no = 1;
					$data_array = $abc->tampil_semua_data();
					foreach ($data_array as $r) {
				?>	<tr><td><?=$no?></td>
						<td><?=$r['id_jurusan']?></td>
						<td><?=$r['nama_jurusan']?></td>
						<td><?=$r['akreditasi']?></td>
						<td><?=$r['fakultas']?></td>
						<td><a href="?page=ubah&id_jurusan=<?=$r['id_jurusan']?>">Ubah</a></td>
						<td><a href="proses.php?aksi=hapus&id_jurusan=<?=$r['id_jurusan']?>" onclick="return confirm('Apakah Anda ingin menghapus data ini?')">Hapus</a></td>
					</tr>
				<?php	$no++;
					}
					unset($data_array,$r,$no);
				?>
			</table>
		<?php } else { ?>
		<legend>Home</legend>
			Aplikasi sederhana ini menggunakan SOAP dengan format data XML (Extensible Markup Language).
		</fieldset>
		<?php } ?>
	</body>
	</html>