<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tambah Guru</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<fieldset style="width: 60%; margin: auto">
		<legend>Tambah Data Guru | <a href="<?php echo base_url('index.php/guru') ?>" title="Data Guru">Data Guru</a></legend>

		<form action="<?php echo base_url('index.php/guru/add') ?>" method="post">
			<table style="width: 100%; margin: auto;" cellpadding="3">
				<tr>
					<td>Nama Guru</td>
					<td>:</td>
					<td><input type="text" name="i_nama" placeholder="Nama Guru" autofocus required style="width: 100%;"></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><label><input type="radio" name="i_status" value="Aktif">Aktif</label> | <label><input type="radio" name="i_status" value="Tidak Aktif">Tidak Aktif</label></td>
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