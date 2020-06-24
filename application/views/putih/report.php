<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Rekap Data & Laporan</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<fieldset style="width: 60%; margin: auto">
		<legend>
			<a href="<?php echo base_url('index.php/'); ?>" title="Beranda">Beranda</a> | 
			<a href="<?php echo base_url('index.php/'); ?>book" title="Data Buku">Data Buku</a> | 
			<a href="<?php echo base_url('index.php/'); ?>siswa" title="Data Siswa">Data Siswa</a> | 
			<a href="<?php echo base_url('index.php/'); ?>guru" title="Data Guru">Data Guru </a>| 
			<a href="<?php echo base_url('index.php/'); ?>pinjam" title="Pinjam Buku">Pinjam Buku</a> | 
			Rekap Data & Laporan
		</legend>

		<table style="margin: auto; width: 50%; float: left;" border="1">
			<caption>Rekap Data</caption>
			<tr>
				<td style="text-align: center">
					<a href="<?php echo base_url('index.php/report/peminjam'); ?>" title="Rekap Data Peminjam">Rekap Data Peminjam</a> | 
					<a href="<?php echo base_url('index.php/report/buku'); ?>" title="Rekap Data Buku">Rekap Data Buku</a> | 
					<a href="<?php echo base_url('index.php/report/siswa'); ?>" title="Rekap Data Siswa">Rekap Data Siswa</a> | 
					<a href="<?php echo base_url('index.php/report/guru'); ?>" title="Rekap Data Guru">Rekap Data Guru</a>
				</td>
			</tr>
		</table>

		<table style="margin: auto; width: 50%; float: right;">
			<form action="<?php echo base_url('index.php/report/bulanan') ?>" method="post">
				<tr>
					<caption>Laporan Peminjaman</caption>
					<td style="width: 30%;">Bulan</td>
					<td>:</td>
					<td>
						<select name="i_bulan" required style="width: 100%;">
							<option value="">Pilih Bulan</option>
							<option value="01">Januari</option>
							<option value="02">Februari</option>
							<option value="03">Maret</option>
							<option value="04">April</option>
							<option value="05">Mei</option>
							<option value="06">Juni</option>
							<option value="07">Juli</option>
							<option value="08">Agustus</option>
							<option value="09">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><input type="submit" name="i_laporan" value="Cetak Laporan"></td>
				</tr>
			</form>
		</table>

	</fieldset>
	
</body>
</html>