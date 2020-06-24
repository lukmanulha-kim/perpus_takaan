<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Siswa</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<fieldset style="width: 60%; margin: auto">
		<legend>
			<a href="<?php echo base_url('index.php/'); ?>" title="Beranda">Beranda</a> | 
			<a href="<?php echo base_url('index.php/'); ?>book" title="Data Buku">Data Buku</a> | 
			Data Siswa | 
			<a href="<?php echo base_url('index.php/'); ?>guru" title="Data Guru">Data Guru</a> | 
			<a href="<?php echo base_url('index.php/'); ?>pinjam" title="Pinjam Buku">Pinjam Buku | 
			<a href="<?php echo base_url('index.php/'); ?>report" title="Rekap Data & Laporan">Rekap Data & Laporan</a>
		</legend>

		<center><a href="siswa/addsiswa" title="Tambah Data Buku">Tambah Data Siswa</a> | <a href="siswa/import" title="Import Data Siswa">Import Data Siswa (Excel)</a></center>
		<hr>

		<table border="1" cellpadding="1" cellspacing="0" style="margin: auto; width: 100%;">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Siswa</th>
					<th>Kelas</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				foreach ($siswa->result() as $datasiswa) {
				?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $datasiswa->nama_siswa ?></td>
					<td><?php echo $datasiswa->kelas ?></td>
					<td><?php echo $datasiswa->status ?></td>
					<td>Edit</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</fieldset>
	
</body>
</html>