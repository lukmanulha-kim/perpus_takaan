<!DOCTYPE html>
<html>
<head>
	<title>Barcode Buku</title>
</head>
<body>
	<?php
	$hasil = "<table border=1; cellpadding=5; cellspacing=0 id=div1>";
		$a=0;
		$hasil.="<tr>";
		for ($b=0; $b<1; $b++){
			foreach ($buku->result() as $dataBuku) {
			if($a % 5 ==0){
				$hasil .="</tr><tr>";
			}
			$hasil.="<td style='text-align: center; width: 180px;'>".$dataBuku->judul_buku."<br><img src='".base_url('index.php/book/set_barcode/').encrypt_url($dataBuku->no_referensi)."'</td>";
			$a++;
			}
		}
		echo $hasil;
		$hasil.="</tr></table>";
	?>
</body>
</html>
