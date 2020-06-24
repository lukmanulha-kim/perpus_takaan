<?php  ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li class="active"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></li>
				<!-- <li class="active">Icons</li> -->
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked folder"><use xlink:href="#stroked-folder"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $totalBuku->totalBuku; ?></div>
							<div class="text-muted">Buku</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $totalSiswa->totalSiswa; ?></div>
							<div class="text-muted">Siswa</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $totalGuru->totalGuru; ?></div>
							<div class="text-muted">Guru</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php echo $totalPeminjam->totalPeminjam; ?></div>
							<div class="text-muted">Peminjam</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Grafik Peminjaman Buku Perpustakaan Tahun <?php $Tahun1 = date('Y'); echo $Tahun2 = $Tahun1-1; echo "-".$Tahun1; ?></div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<div class="pull-right">
								<a class="btn btn-primary"></a> <span class="text-muted">Tahun <?php echo $Tahun1 ?></span> | <a class="btn btn-default"></a> <span class="text-muted">Tahun <?php echo $Tahun2 ?></span>
							</div>
							<canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
<script type="text/javascript">
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
		
		var lineChartData = {
				labels : ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],
				datasets : [
					{
						label: "My First dataset",
						fillColor : "rgba(220,220,220,0.2)",
						strokeColor : "rgba(220,220,220,1)",
						pointColor : "rgba(220,220,220,1)",
						pointStrokeColor : "#fff",
						pointHighlightFill : "#fff",
						pointHighlightStroke : "rgba(220,220,220,1)",
						data : [<?php echo $januari2->januari2.','.$februari2->februari2.','.$maret2->maret2.','.$april2->april2.','.$mei2->mei2.','.$juni2->juni2.','.$juli2->juli2.','.$agustus2->agustus2.','.$september2->september2.','.$oktober2->oktober2.','.$november2->november2.','.$desember2->desember2; ?>]
					},
					{
						label: "My Second dataset",
						fillColor : "rgba(48, 164, 255, 0.2)",
						strokeColor : "rgba(48, 164, 255, 1)",
						pointColor : "rgba(48, 164, 255, 1)",
						pointStrokeColor : "#fff",
						pointHighlightFill : "#fff",
						pointHighlightStroke : "rgba(48, 164, 255, 1)",
						data : [<?php echo $januari1->januari1.','.$februari1->februari1.','.$maret1->maret1.','.$april1->april1.','.$mei1->mei1.','.$juni1->juni1.','.$juli1->juli1.','.$agustus1->agustus1.','.$september1->september1.','.$oktober1->oktober1.','.$november1->november1.','.$desember1->desember1; ?>]
					}
				]

			}

	window.onload = function(){
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
			responsive: true
		});
		var chart2 = document.getElementById("bar-chart").getContext("2d");
		window.myBar = new Chart(chart2).Bar(barChartData, {
			responsive : true
		});
		var chart3 = document.getElementById("doughnut-chart").getContext("2d");
		window.myDoughnut = new Chart(chart3).Doughnut(doughnutData, {responsive : true
		});
		var chart4 = document.getElementById("pie-chart").getContext("2d");
		window.myPie = new Chart(chart4).Pie(pieData, {responsive : true
		});
		
	};

	var legendHolder = document.createElement('div');
	legendHolder.innerHTML = bar.generateLegend();

	document.getElementById('legend').appendChild(legendHolder.firstChild);
</script>
	</div>	<!--/.main-->