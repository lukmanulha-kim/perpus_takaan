<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Guru</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<fieldset style="width: 60%; margin: auto">
		<legend>
			<a href="<?php echo base_url('index.php/'); ?>" title="Beranda">Beranda</a> | 
			<a href="<?php echo base_url('index.php/'); ?>book" title="Data Buku">Data Buku</a> | 
			<a href="<?php echo base_url('index.php/'); ?>siswa" title="Data Siswa">Data Siswa</a> | 
			Data Guru | 
			<a href="<?php echo base_url('index.php/'); ?>pinjam" title="Pinjam Buku">Pinjam Buku | 
			<a href="<?php echo base_url('index.php/'); ?>report" title="Rekap Data & Laporan">Rekap Data & Laporan</a>
		</legend>

		<center><a href="guru/addguru" title="Tambah Data Buku">Tambah Data Guru</a> | <a href="guru/import" title="Import Data guru">Import Data Guru (Excel)</a></center>
		<hr>

		<table border="1" cellpadding="1" cellspacing="0" style="margin: auto; width: 100%;">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama guru</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				foreach ($guru->result() as $dataguru) {
				?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $dataguru->nama_guru ?></td>
					<td><?php echo $dataguru->status ?></td>
					<td>Edit</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</fieldset>
	
</body>
</html>