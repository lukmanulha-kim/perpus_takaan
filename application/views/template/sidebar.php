<?php  ?>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<!-- <form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form> -->
		<ul class="nav menu">
			<br>

			<li><a href="<?php echo base_url() ?>"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>

			<li role="presentation" class="divider"></li>

			<li><a href="<?php echo base_url('index.php/book') ?>"><svg class="glyph stroked folder"><use xlink:href="#stroked-folder"/></svg> Data Buku</a></li>

			<li><a href="<?php echo base_url('index.php/siswa') ?>"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg> Data Siswa</a></li>

			<li><a href="<?php echo base_url('index.php/guru') ?>"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg> Data Guru</a></li>

			<?php if ($this->session->userdata['level']=='Admin') { ?>
				<li><a href="<?php echo base_url('index.php/user') ?>"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg> Data User</a></li>

				<li><a href="<?php echo base_url('index.php/settings/aplikasi') ?>"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Pengaturan</a></li>
			<?php } ?>

			<li role="presentation" class="divider"></li>

			<li><a href="<?php echo base_url('index.php/pinjam') ?>"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"/></svg> Pinjam Buku</a></li>

			<li><a href="<?php echo base_url('index.php/denda') ?>"><svg class="glyph stroked folder"><use xlink:href="#stroked-folder"/></svg> Denda</a></li>

			<li role="presentation" class="divider"></li>

			<li><a href="<?php echo base_url('index.php/report') ?>"><svg class="glyph stroked line-graph"><use xlink:href="#stroked-line-graph"></use></svg> Rekap Data &amp; Laporan</a></li>
		</ul>

	</div><!--/.sidebar-->