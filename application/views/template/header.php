<?php  ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Library Management System</title>

<link href="<?php echo base_url('assets/') ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/') ?>css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url('assets/') ?>css/bootstrap-table.css" rel="stylesheet">
<link href="<?php echo base_url('assets/') ?>css/styles.css" rel="stylesheet">

<!--Icons-->
<script src="<?php echo base_url('assets/') ?>js/lumino.glyphs.js"></script>

<!-- Custom Select -->
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.min.css"/>

<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Perpus</span>takaan</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> <?php echo $this->session->userdata['pustakawan']; ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="<?php echo base_url('index.php/settings/user/').encrypt_url($this->session->userdata['id_pustakawan']) ?>"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
							<li><a href="<?php echo base_url('index.php/settings/aplikasi') ?>"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
							<li><a href="<?php echo base_url('index.php/login/logout') ?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
							
		</div><!-- /.container-fluid -->
	</nav>