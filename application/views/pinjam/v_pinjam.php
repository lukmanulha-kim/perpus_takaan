<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Pinjam Buku</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h3>Pinjam Buku | <a href="<?php echo base_url('index.php/pinjam/peminjam') ?>" title="Import Data" class="btn btn-primary">Data Peminjam</a></h3>
			</div>
		</div><!--/.row-->
				
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="alert alert-danger">
							Hubungi Developer Via E-Mail <code>lukmanha73@gmail.com</code> Untuk Versi Lengkap ☺
						</div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!-- /.row -->
		
	</div><!--/.main-->

<script src="<?php echo base_url() ?>assets/js/jquery-1.12.4.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	function autofillBuku() {
		var referensi = $("#i_referensi").val();
		$.ajax({
			url : '<?php echo base_url() ?>index.php/pinjam/cek_buku/'+referensi,
			contentType: false,
	        cache: false,
	        processData:false,
	        beforeSend: function (){
	                   $("#loading").show(1000).html("<img src='<?php echo base_url('assets/img/') ?>Spin.gif' height='50'>");                   
	                   },
	        success: function(data, textStatus, jqXHR){
	                $("#result").html(data);
	                $("#loading").hide();
	        },
	            error: function(jqXHR, textStatus, errorThrown){
	     }
		}).success(function(data){
			var json = data;
			obj = JSON.parse(json);

			$("#i_nama").val(obj.judul_buku);
			$("#i_pengarang").val(obj.pengarang);

			var Judul = obj.judul_buku;
			if (Judul=='Tidak Ada Data') {
				// if(alert('Data Buku Tidak Ditemukan')){}else{window.location.reload();};
				document.getElementById('peminjam').style='display: none;';
			}else if(Judul=='Stok Buku Sedang Dipinjam Semua'){
				// if(alert('Stok Buku Kosong')){}else{window.location.reload();};
				document.getElementById('peminjam').style='display: none;';
			}else if(Judul=='Buku Hilang'){
				// if(alert('Data Buku Tidak Ditemukan')){}else{window.location.reload();};
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
			document.getElementById('i_siswa').required;
			document.getElementById('Guru').style='display: none;';
			document.getElementById('Lain').style='display: none;';
		}else{
			document.getElementById('Lain').style='display: none;';
			document.getElementById('Guru').style='display: none;';
			document.getElementById('Siswa').style='display: none;';	
		}
	}
</script>