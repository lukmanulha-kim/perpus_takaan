<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Peminjam</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<fieldset style="width: 60%; margin: auto">
		<legend><a href="<?php echo base_url('index.php/'); ?>" title="Beranda">Beranda</a> | <a href="<?php echo base_url('index.php/'); ?>book" title="Data Buku">Data Buku</a> | <a href="<?php echo base_url('index.php/'); ?>siswa" title="Data Siswa">Data Siswa</a> | <a href="<?php echo base_url('index.php/'); ?>guru" title="Data Guru">Data Guru</a> | <a href="<?php echo base_url('index.php/'); ?>pinjam" title="Pinjam Buku">Pinjam Buku</a> | <a href="<?php echo base_url('index.php/'); ?>report" title="Rekap Data & Laporan">Rekap Data & Laporan</a></legend>

		<table border="1" cellpadding="1" cellspacing="0" style="width: 100%">
			<caption><b>Data Peminjam Siswa</b></caption>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Siswa</th>
					<th>Kelas</th>
					<th>Tanggal Pinjam - Kembali</th>
					<th>Status Peminjaman</th>
					<th>Tanggal Dikembalikan</th>
					<th>Status Pengembalian</th>
					<th>Denda</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($peminjamSiswa->result() as $peminjamSiswa) { ?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $peminjamSiswa->nama_siswa; ?></td>
						<td><?php echo $peminjamSiswa->kelas; ?></td>
						<td style="text-align: center;"><?php echo pinjam::TglIndo($peminjamSiswa->tgl_pinjam).' - '.pinjam::TglIndo($peminjamSiswa->tgl_kembali); ?></td>
						<td><?php echo $peminjamSiswa->status_peminjaman; ?></td>
						<td><?php if ($peminjamSiswa->tgl_dikembalikan=='0000-00-00'){echo "-";}else{echo $peminjamSiswa->tgl_dikembalikan;} ?></td>
						<td><?php echo $peminjamSiswa->status_pengembalian; ?></td>
						<td>
							<?php
								// $tglKembali = $peminjamSiswa->tgl_kembali;
								// $tglKembali = new Datetime($tglKembali); 

								// $tglSekarang = new Datetime();

								// $perbedaan = $tglKembali->diff($tglSekarang);

								// //gabungkan
								// echo $perbedaan->d*1000;
								echo $peminjamSiswa->denda;
							?>
						</td>
						<td><a href="<?php echo base_url('index.php/pinjam/kembali/').encrypt_url($peminjamSiswa->id_peminjam) ?>">Dikembalikan</a> | <a href="<?php echo base_url('index.php/pinjam/hilang/').encrypt_url($peminjamSiswa->id_peminjam) ?>">Hilang</a> | <a href="<?php echo base_url() ?>">Rusak</a></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

		<hr>

		<table border="1" cellpadding="1" cellspacing="0" style="width: 100%">
			<caption><b>Data Peminjam Guru</b></caption>
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Guru</th>
					<th>Tanggal Pinjam - Kembali</th>
					<th>Status Peminjaman</th>
					<th>Tanggal Dikembalikan</th>
					<th>Status Pengembalian</th>
					<th>Denda</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1; foreach ($peminjamGuru->result() as $peminjamGuru) { $dateNow = date('Y-m-d');?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $peminjamGuru->nama_guru; ?></td>
						<td style="text-align: center;"><?php echo pinjam::TglIndo($peminjamGuru->tgl_pinjam).' - '.pinjam::TglIndo($peminjamGuru->tgl_kembali); ?></td>
						<td><?php echo $peminjamGuru->status_peminjaman; ?></td>
						<td><?php if ($peminjamGuru->tgl_dikembalikan=='0000-00-00'){echo "-";}else{echo $peminjamGuru->tgl_dikembalikan;} ?></td>
						<td><?php echo $peminjamGuru->status_pengembalian; ?></td>
						<td>
							<?php
								// $tglKembali = $peminjamGuru->tgl_kembali;
								// $tglKembali = new Datetime($tglKembali); 

								// $tglSekarang = new Datetime();

								// $perbedaan = $tglKembali->diff($tglSekarang);
								// //gabungkan
								// echo $perbedaan->d*1000;

								echo $peminjamGuru->denda;
							?>
						</td>
						<td>
							<a href="<?php echo base_url('index.php/pinjam/kembali/').encrypt_url($peminjamGuru->id_peminjam) ?>">Dikembalikan</a> | <a href="<?php echo base_url('index.php/pinjam/hilang/').encrypt_url($peminjamGuru->id_peminjam) ?>">Hilang</a> | <a href="<?php echo base_url() ?>">Rusak</a>
						</td>

					</tr>
				<?php } ?>
			</tbody>
		</table>

	</fieldset>
</body>
</html>