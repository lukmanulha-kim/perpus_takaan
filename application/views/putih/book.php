<?php?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Buku</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<fieldset style="width: 60%; margin: auto">
		<legend><a href="<?php echo base_url('index.php/'); ?>" title="Beranda">Beranda</a> | Data Buku | <a href="siswa" title="Data Siswa">Data Siswa</a> | <a href="guru" title="Data Guru">Data Guru</a> | <a href="pinjam" title="Pinjam Buku">Pinjam Buku</a> | <a href="report" title="Rekap Data & Laporan">Rekap Data & Laporan</a></legend>

		<center><a href="book/addbook" title="Tambah Data Buku">Tambah Data Buku</a> | <a href="book/import" title="Import Data Buku">Import Data Buku (Excel)</a></center>
		<hr>

		<table border="1" cellpadding="1" cellspacing="0" style="margin: auto;width: 100%;">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul Buku</th>
					<th>Pengarang</th>
					<th>Volume/Jilid</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<th>Kondisi</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				foreach ($buku->result() as $databuku) {
				?>
				<tr>
					<td><?php echo $no++ ?></td>
					<td><?php echo $databuku->judul_buku ?></td>
					<td><?php echo $databuku->pengarang ?></td>
					<td><?php if($databuku->volume_jilid==0){echo"-";}else{echo $databuku->volume_jilid;}?></td>
					<td><?php echo $databuku->jumlah ?></td>
					<td><?php echo $databuku->harga ?></td>
					<td><?php echo $databuku->kondisi ?></td>
					<td>Edit</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</fieldset>
	
</body>
</html>