<?php 

require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF('Landscape', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Library Management System');
$pdf->SetTitle('Test PDF 1');
$pdf->SetSubject('Test PDF 1');
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
$pdf->SetMargins('10', '10', '10');
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
$pdf->SetFont('dejavusans', '', 10);

// add a page
$pdf->AddPage();

// create some HTML content
$subtable = '<table border="1" cellspacing="6" cellpadding="4"><tr><td>a</td><td>b</td></tr><tr><td>c</td><td>d</td></tr></table>';

$html = '<h2 style="text-align:center;">Rekap Data Buku Perpustakaan .......</h2>
<table border="1" cellspacing="0" cellpadding="3">
	<thead>
		<tr>
			<th style="text-align: center; width:30;">No</th>
			<th style="text-align: center; " width="400">Judul Buku</th>
			<th style="text-align: center;">Nama Pengarang</th>
			<th style="text-align: center;" width="90">Jilid/Volume</th>
			<th style="text-align: center;" width="70">Jumlah</th>
			<th style="text-align: center;" width="70">Harga</th>
			<th style="text-align: center;" width="181">Kondisi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td style="text-align: center; width:30;">1</td>
			<td width="400">Konsep Teologi Rasional dalam Tafsir Al-Manar & Konsep Teologi Rasional dalam Tafsir Al-Manar</td>
			<td style="text-align: center;">A. Athaillah</td>
			<td style="text-align: center;" width="90">1</td>
			<td style="text-align: center;" width="70">4</td>
			<td style="text-align: center;" width="70">50000</td>
			<td style="text-align: center;" width="181">Sangat Baik</td>
		</tr>
	</tbody>
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');



//Close and output PDF document
$pdf->Output('test-pdf-1.pdf', 'I');

?>