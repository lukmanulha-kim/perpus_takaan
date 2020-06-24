<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li><a href="<?php echo base_url('index.php/book') ?>">Buku</a></li>
				<li class="active">Import Data Buku</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3>Import Data Buku <!-- | <a href="<?php echo base_url('index.php/book/import') ?>" title="Import Data" class="btn btn-primary">Import Data Buku</a> --></h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="alert bg-info" role="alert">
					<svg class="glyph stroked sound on"><use xlink:href="#stroked-sound-on"/></svg> Silahkan Download Template Import Data Buku, <a href="<?php echo base_url('templateimport/FormatUploadDataBuku.xlsx') ?>" title="Template Import Data Buku">disini.</a>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="post" action="<?php echo base_url('index.php/book/upload') ?>" enctype="multipart/form-data">
							<div class="form-group">
								<label>Import File Excel</label>
								<input name="i_file" type="file" class="form-control">
								<p class="help-block">Silahkan Download Template Import Data Buku, <a href="<?php echo base_url('templateimport/FormatUploadDataBuku.xlsx') ?>"" title="Template Import Data Buku">disini.</a></p>
							</div>

							<div class="form-group">
								<input type="submit" name="preview" value="Preview Data" class="btn btn-primary">
							</div>							
						</form>
						<?php
		                if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
		                  if(isset($upload_error)){ // Jika proses upload gagal
		                    echo "<div class='alert alert-danger'>".$upload_error."</div>"; // Muncul pesan error upload
		                    // die; // stop skrip
		                  }

		                  echo "<hr>";

		                  // Buat sebuah tag form untuk proses import data ke database
		                  echo "<form method='post' action='".base_url("index.php/book/doimport")."'>";
		                  
		                  // Buat sebuah div untuk alert validasi kosong
		                  // echo "<div style='color: red;' id='kosong'>
		                  // Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
		                  // </div>";
		                  
		                  echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>
		                  <tr>
		                    <th colspan='7'>Preview Data</th>
		                  </tr>
		                  <tr>
		                    <th>No Referensi</th>
		                    <th>Judul Buku</th>
		                    <th>Nama Pengarang</th>
		                    <th>Volume/Jilid</th>
		                    <th>Jumlah Buku</th>
		                    <th>Harga</th>
		                    <th>Kondisi</th>
		                  </tr>";
		                  
		                  $numrow = 1;
		                  $kosong = 0;
		                  
		                  // Lakukan perulangan dari data yang ada di excel
		                  // $sheet adalah variabel yang dikirim dari controller
		                  foreach($sheet as $row){ 
		                    // Ambil data pada excel sesuai Kolom
		                    $no_ref = $row['A']; // Ambil data no_referensi
		                    $judul = $row['B']; // Ambil data judul
		                    $nama = $row['C']; // Ambil data nama
		                    $volume = $row['D']; // Ambil data volume/jilid
		                    $jumlah = $row['E'];
		                    $harga = $row['F'];
		                    $kondisi = $row['G']; // Ambil data kondisi
		                    
		                    // Cek jika semua data tidak diisi
		                    if($no_ref == "" && $judul == "" && $nama == "" && $volume == "" && $jumlah == "" && $harga == "" && $kondisi == "")
		                      continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
		                    
		                    // Cek $numrow apakah lebih dari 1
		                    // Artinya karena baris pertama adalah nama-nama kolom
		                    // Jadi dilewat saja, tidak usah diimport
		                    if($numrow > 1){
		                      // Validasi apakah semua data telah diisi
		                      $noref_td = ( ! empty($no_ref))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
		                      $judul_td = ( ! empty($judul))? "" : " style='background: #E07171;'"; // Jika NISN kosong, beri warna merah
		                      $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
		                      $volume_td = ( ! empty($volume))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
		                      $jumlah_td = ( ! empty($jumlah))? "" : " style='background: #E07171;'"; // Jika Tempat Lahir kosong, beri warna merah
		                      $harga_td = ( ! empty($harga))? "" : " style='background: #E07171;'"; // Jika Tanggal Lahir kosong, beri warna merah
		                      $kondisi_td = ( ! empty($kondisi))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
		                      
		                      // Jika salah satu data ada yang kosong
		                      if($no_ref == "" or $judul == "" or $nama == "" or $volume == "" or $jumlah == "" or $harga == "" or $kondisi == ""){
		                        $kosong++; // Tambah 1 variabel $kosong
		                      }
		                      
		                      echo "<tr>";
		                      echo "<td".$noref_td.">".$no_ref."</td>";
		                      echo "<td".$judul_td.">".$judul."</td>";
		                      echo "<td".$nama_td.">".$nama."</td>";
		                      echo "<td".$volume_td.">".$volume."</td>";
		                      echo "<td".$jumlah_td.">".$jumlah."</td>";
		                      echo "<td".$harga_td.">".$harga."</td>";
		                      echo "<td".$kondisi_td.">".$kondisi."</td>";
		                      echo "</tr>";
		                    }
		                    
		                    $numrow++; // Tambah 1 setiap kali looping
		                  }
		                  
		                  echo "</table>";
		                  
		                  // Cek apakah variabel kosong lebih dari 0
		                  // Jika lebih dari 0, berarti ada data yang masih kosong
		                  if($kosong > 0){
		                  ?>  
		                    <script>
		                    $(document).ready(function(){
		                      // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
		                      $("#jumlah_kosong").html('<?php echo $kosong; ?>');
		                      
		                      $("#kosong").show(); // Munculkan alert validasi kosong
		                    });
		                    </script>
		                  <?php
		                  }else{ // Jika semua data sudah diisi
		                    echo "<hr>";
		                    
		                    // Buat sebuah tombol untuk mengimport data ke database
		                    echo "<input type='submit' name='i_simpan' value='Simpan' class='btn btn-sm btn-primary'>    ";
		                    echo "<input type='reset' name='' value='Batal' class='btn btn-sm  btn-danger'>";
		                  }
		                  
		                  echo "</form>";
		                }  

		              ?>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->