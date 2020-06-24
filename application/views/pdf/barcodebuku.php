<?php

error_reporting(0);

// require_once('/TCPDF-master/examples/tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF('Potrait', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Library Management System');
$pdf->SetTitle('Rekap Data Buku');
$pdf->SetSubject('Rekap Data Buku');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins('10', '5', '10');
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 11);

// add a page
$pdf->AddPage();

$html='"<table border=1 cellpadding=5 cellspacing=0>"';
$a=0;
$html.='<tr>';
for ($b=0; $b<1; $b++){
	foreach ($buku->result() as $dataBuku) {
	if($a % 5 ==0){
		$html .="</tr><tr>";
	}
	$html.='<td style="text-align: center; width: 180px;">'.$dataBuku->judul_buku.'<br><img src="'.base_url('index.php/book/set_barcode/').$dataBuku->no_referensi.'"</td>';
	$a++;
	}
}
echo $html;
$html.='</tr></table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');



//Close and output PDF document
$pdf->Output('Rekap Data Buku.pdf', 'I');

?>