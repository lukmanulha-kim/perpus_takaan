<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tambah Buku</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<fieldset style="width: 60%; margin: auto">
		<legend>Tambah Data Buku | <a href="<?php echo base_url('index.php/book') ?>" title="Data Buku">Data Buku</a></legend>

		<form action="<?php echo base_url('index.php/book/add') ?>" method="post">
			<table style="width: 100%; margin: auto;" cellpadding="3">
				<tr>
					<td>No Referensi</td>
					<td>:</td>
					<td><input type="number" name="i_noref" placeholder="No Referensi" autofocus required style="width: 100%;"></td>
				</tr>
				<tr>
					<td>Judul Buku</td>
					<td>:</td>
					<td><input type="text" name="i_judul" placeholder="Judul Buku" required style="width: 100%;"></td>
				</tr>
				<tr>
					<td>Nama Pengarang</td>
					<td>:</td>
					<td><input type="text" name="i_pengarang" placeholder="Nama Pengarang" required style="width: 100%;"></td>
				</tr>
				<tr>
					<td>Volume/Jilid</td>
					<td>:</td>
					<td><input type="number" name="i_volume" placeholder="Volume/Jilid" required style="width: 100%;"></td>
				</tr>
				<tr>
					<td>Jumlah</td>
					<td>:</td>
					<td><input type="number" name="i_jumlah" placeholder="Jumlah" required style="width: 100%;"></td>
				</tr>
				<tr>
					<td>Harga Buku</td>
					<td>:</td>
					<td><input type="number" name="i_harga" placeholder="Harga Buku" required style="width: 100%;"></td>
				</tr>
				<tr>
					<td>Kondisi</td>
					<td>:</td>
					<td><label><input type="radio" name="i_kondisi" value="Sangat Baik">Sangat Baik</label> | <label><input type="radio" name="i_kondisi" value="Baik">Baik</label> | <label><input type="radio" name="i_kondisi" value="Rusak">Rusak</label></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="i_simpan" value="Simpan"></td>
				</tr>
			</table>
		</form>
		
	</fieldset>
	
</body>
</html>