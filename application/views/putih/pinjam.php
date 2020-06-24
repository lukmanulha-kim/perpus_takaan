<?php  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Halaman Peminjaman</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<fieldset style="width: 60%; margin: auto;">
		<legend><a href="<?php echo base_url('index.php/'); ?>" title="Beranda">Beranda</a> | <a href="<?php echo base_url('index.php/'); ?>book" title="Data Buku">Data Buku</a> | <a href="<?php echo base_url('index.php/'); ?>siswa" title="Data Siswa">Data Siswa</a> | <a href="<?php echo base_url('index.php/'); ?>guru" title="Data Guru">Data Guru</a> | Pinjam Buku | <a href="<?php echo base_url('index.php/'); ?>report" title="Rekap Data & Laporan">Rekap Data & Laporan</a></legend>

		<center>
			<a href="<?php echo base_url('index.php/') ?>pinjam/peminjam" title="Data Peminjam">Data Peminjam</a>
		</center>
		<hr>

		<form action="<?php echo base_url('index.php/') ?>pinjam/addpeminjam" method="post">
			<table style="width: 100%; margin: auto;" cellpadding="3">
				<tr>
					<td><b>Data Buku</b></td>
				</tr>
				<tr>
					<td>No Referensi</td>
					<td>:</td>
					<td><input type="text" name="i_referensi" id="i_referensi" placeholder="No Referensi" onkeyup="autofillBuku()" required style="width: 100%" autofocus></td>
				</tr>
				<tr>
					<td>Judul Buku</td>
					<td>:</td>
					<td><input type="text" name="i_nama" id="i_nama" placeholder="Judul Buku" style="width: 100%" readonly></td>
				</tr>
				<tr>
					<td>Pengarang</td>
					<td>:</td>
					<td><input type="text" name="i_pengarang" id="i_pengarang" placeholder="Nama Pengarang" style="width: 100%" readonly></td>
				</tr>
				<tr>
					<td><b>Data Peminjam</b></td>
				</tr>
				<tr id="peminjam" style="display: none">
					<td>Pilih Peminjam</td>
					<td>:</td>
					<td>
						<select name="pilih_peminjam" onchange="pilihPeminjam(this)" required style="width: 100%;">
							<option value="0">Pilih Peminjam</option>
							<option value="1">Guru</option>
							<option value="2">Siswa</option>
							<!-- <option value="3">Lainnya</option> -->
						</select>
					</td>
				</tr>
				<tr id="Guru" style="display: none">
					<td>Nama Guru</td>
					<td>:</td>
					<td>
						<select name="i_guru" id="i_guru" style="width: 100%;">
							<option value="">Pilih Guru</option>
							<?php foreach ($guru->result() as $dataguru) {
								echo "<option value='$dataguru->id_guru'>$dataguru->nama_guru</option>";
							} ?>
						</select>
					</td>
				</tr>
				<tr id="Siswa" style="display: none">
					<td>Nama Siswa</td>
					<td>:</td>
					<td>
						<select name="i_siswa" id="i_siswa" style="width: 100%;">
							<option value="">Pilih Siswa</option>
							<?php foreach ($siswa->result() as $datasiswa) {
								echo "<option value='$datasiswa->id_siswa'>$datasiswa->nama_siswa | $datasiswa->kelas </option>";
							} ?>
						</select>
					</td>
				</tr>
				<tr id="Lain" style="display: none">
					<td>Nama Peminjam</td>
					<td>:</td>
					<td><input type="text" name="i_nama" placeholder="Nama Peminjam" style="width: 100%"></td>
				</tr>
				<tr>
					<?php $dateNow = date('Y-m-d'); ?>
					<td>Tanggal Pinjam</td>
					<td>:</td>
					<td><input type="date" name="i_tglpinjam" value="<?php echo $dateNow; ?>" style="width: 100%"></td>
				</tr>
				<tr>
					<?php  $dateReturn = date_create($dateNow); 
					date_add($dateReturn, date_interval_create_from_date_string('7 days')); ?>
					<td>Tanggal Kembali</td>
					<td>:</td>
					<td><input type="date" name="i_tglkembali" value="<?php echo date_format($dateReturn, 'Y-m-d'); ?>" style="width: 100%"></td>
				</tr>
				<tr id="Button" style="display: none">
					<td></td>
					<td></td>
					<td><input type="submit" name="i_simpan" value="Simpan" id="i_simpan"></td>
				</tr>
			</table>
		</form>
	</fieldset>
<script src="<?php echo base_url() ?>assets/js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	function autofillBuku() {
		var referensi = $("#i_referensi").val();
		$.ajax({
			url : '<?php echo base_url() ?>index.php/pinjam/cek_buku/'+referensi,
			// data : 'referensi='+referensi,
		}).success(function(data){
			var json = data;
			obj = JSON.parse(json);

			$("#i_nama").val(obj.judul_buku);
			$("#i_pengarang").val(obj.pengarang);

			var Judul = obj.judul_buku;
			if (Judul=='Tidak Ada Data') {
				// if (alert('Data Buku Tidak Ditemukan');) {					
				// }else{window.location.reload();}
				if(alert('Data Buku Tidak Ditemukan')){}else{window.location.reload();};
				document.getElementById('peminjam').style='display: none;';
			}else if(Judul=='Stok Buku Sedang Dipinjam Semua'){
				if(alert('Stok Buku Kosong')){}else{window.location.reload();};
				document.getElementById('peminjam').style='display: none;';
			}else{
				document.getElementById('peminjam').style='display: ;';
				document.getElementById('Button').style='display: ;';
			}

		});
	}

	function pilihPeminjam(select) {
		var Peminjam = select.value;
		// alert(Peminjam);
		if (Peminjam==1) {
			document.getElementById('Guru').style='display: ;';
			document.getElementById('Siswa').style='display: none;';
			document.getElementById('Lain').style='display: none;';
		}else if (Peminjam==2) {
			document.getElementById('Siswa').style='display: ;';
			document.getElementById('Guru').style='display: none;';
			document.getElementById('Lain').style='display: none;';
		}else{
			document.getElementById('Lain').style='display: none;';
			document.getElementById('Guru').style='display: none;';
			document.getElementById('Siswa').style='display: none;';	
		}
	}
</script>
</body>
</html>